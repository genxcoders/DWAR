<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Pointwise testing" clonable='1' order='1' >
	<cms:editable name='to_ho_relation' label='Related T/O Page Id' type='relation' has='one' masterpage=k_template_name  />
	<cms:editable name="locos" label="Locos" type="text" order='1' />
	<cms:editable name='to_ho' label='To or Ho' type='radio' opt_values='T/O=0 | H/O=1' class="col-md-6" order="2" />
	<cms:editable type='checkbox' name='select_type' label='Checked then fill input' opt_values='Yes' order='2' />

	<cms:editable name='is_interchanged' label='Interchange Status' type='checkbox' opt_values='YES=1' order='21' /> 

	<cms:func _into='my_cond' select_type=''>
        <cms:if "<cms:is 'Yes' in=select_type />">
            show
        <cms:else />
            hide
        </cms:if>
    </cms:func>
    <!-- Ho Interchange -->
    <cms:editable name="ho_interchange" label="HO Interchange"  type='relation' has='one' masterpage="interchange.php" not_active=my_cond order_dir='asc' />
    <!-- Ho Interchange -->

    <cms:func _into='my_cond' select_type=''>
        <cms:if "<cms:is 'Yes' in=select_type />">
            show
        <cms:else />
            hide
        </cms:if>
    </cms:func>
    <cms:editable name='today_interchange' label="Today's Interchange" type='checkbox' opt_values='Yes=1' not_active=my_cond />

    <cms:editable name='is_stabled' label='Stabled' type='checkbox' opt_values='YES=1' order='22' /> 
</cms:template>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" />
    <cms:load_edit />
    <script src="http://localhost/GenXCoders-CTO/DWAR/assets/js/jquery-1.11.1.js"></script>
    <style type="text/css">
    	#k_element_schedule{
    		display: none;
    	}
    </style>
    <div class="container">
    	<div class="row">
    		<div class="col-md-12">
    			<cms:set submit_success="<cms:get_flash 'submit_success' />" />
				<cms:if submit_success >
				<div class="alert alert-success">
				    <strong>Success!</strong>
				</cms:if>
    		</div>
    	</div>
    	<div class="row">
			<cms:form
		        masterpage=k_template_name
		        mode='create'
		        enctype='multipart/form-data'
		        anchor='0' 
		        method='post'
		        id="to_ho_pt_icp_form"
			>
                
	            <cms:if k_success >
            		<cms:db_persist_form
		                _invalidate_cache='0'
		                _auto_title='1'
		                locos="<cms:show frm_locos />"
	               	/>
	               	<cms:if frm_is_stabled ne '1'>
	                	<cms:db_persist_form
	                		_invalidate_cache       =   '0'
						    _masterpage             =   'test-pointwise.php'
						    _mode                   =   'create'
	                		to_ho					=	'1'
	                	/>
	            	</cms:if>
	              	<cms:if k_success >
	              	<cms:set ho_id = "<cms:pages masterpage='test-pointwise.php' limit='1' show_future_entries='1'><cms:related_pages 'ho_interchange' ><cms:show k_page_title /></cms:related_pages></cms:pages>" scope='global' />
	              		<cms:if frm_select_type eq 'Yes'> 
	              		<cms:db_persist
						    _auto_title             =   '0'
						    _invalidate_cache       =   '0'
						    _masterpage             =   'test-pointwise.php'
						    _mode                   =   'create'
						    k_page_title			=	"<cms:pages masterpage='test-pointwise.php' limit='1' show_future_entries='1'><cms:related_pages 'ho_interchange' ><cms:show k_page_title /></cms:related_pages></cms:pages>"
						    k_page_name				=	"<cms:random_name />"

		                	to_ho_relation          =   "<cms:show k_last_insert_id />"
						    ho_interchange			=	"<cms:pages masterpage='interchange.php' id="<cms:gpc 'f_ho_interchange' />" limit='1'><cms:show k_page_id /></cms:pages>"
						    k_page_id               =   "<cms:add '<cms:show k_last_insert_id />' '1' />"
						    locos="<cms:show frm_locos />"
						>

						    <cms:if k_error >
						        <cms:abort>
						            <cms:each k_error >
						                <br>asd<cms:show item />
						            </cms:each>
						        </cms:abort>
						    </cms:if>
						</cms:db_persist >
						</cms:if>
			            <cms:set_flash name='submit_success' value='1' />
			            <cms:redirect url="<cms:show k_page_link />" />
			        </cms:if>
		        </cms:if>
		        <cms:if k_error >
	        		<div class="col-md-4">
	        			<div class="alert alert-danger">
	            			<cms:each k_error >
	            				Error:<cms:show item /><br>
	            			</cms:each>
	                    </div>
	            	</div>
		        </cms:if>
		        <div style="padding-top: 40px;"></div>
			        <label>Loco</label>
			        <cms:input name="locos" type="bound" />
		        <br>

		        <div style="padding-top: 40px;"></div>
			        <cms:input name="to_ho" type="bound" />
		        <br>
		        <div class="col-md-2">
					<label>Interchange</label>
					<div class="gxcpl-ptop-5"></div>
					<cms:input type="bound" name="is_interchanged" value='1' />
					<div class="gxcpl-ptop-10"></div>
				</div>

		        <div class="form-group">
		            <label>Checked</label>
		            <cms:input name='select_type' type='bound' />
		        </div> 
		       
		        <div class="col-md-2" id="k_element_ho_interchange">
					<label for="ho_interchange">H/O Interchange</label>
					<div class="gxcpl-ptop-5"></div>
					<cms:hide>
    					<cms:input type="bound" name="ho_interchange" not_active=my_cond value="<cms:show k_page_id />" />
    				</cms:hide>
    				<select name="f_ho_interchange" id="f_ho_interchange" not_active=my_cond style="width: auto;">
    					<option value="">Select H/O Interchange Point</option>
    					<cms:pages masterpage='interchange.php'>
    					<option value="<cms:show k_page_id />"><cms:show k_page_title /></option>
    					</cms:pages>
    				</select>
					<div class="gxcpl-ptop-10"></div>
				</div>
				<div class="col-md-2" id="k_element_today_interchange">
					<label for="today_interchange">Today Interchange</label>
					<div class="gxcpl-ptop-5"></div>
					<cms:input type="bound" name="today_interchange" value='2' not_active=my_cond />
					<div class="gxcpl-ptop-10"></div>
				</div>
				<div class="col-md-2">
					<label>Stable</label>
					<div class="gxcpl-ptop-5"></div>
					<cms:input type="bound" name="is_stabled" />
					<div class="gxcpl-ptop-10"></div>
				</div>
		        <button class="btn btn-primary" type="submit" id="save_icp">SAVE</button>
			</cms:form>
		</div>
		
		<table border="1">
			<thead>
				<tr>
					<th>Sr. No.</th>
					<th>Loco</th>
					<th>Schedule</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<cms:pages masterpage=k_template_name show_future_entries='1' >
				<tr>
					<td><cms:show k_absolute_count /></td>
					<td><cms:show locos /></td>
					<td><cms:pages masterpage='test-pointwise.php' limit='1' show_future_entries='1'><cms:related_pages 'ho_interchange' ><cms:show k_page_title /></cms:related_pages></cms:pages></td>
					<td><cms:popup_edit "locos | is_stabled | to_ho " link_text="EDIT" /></td>
				</tr>
				</cms:pages>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
        //<![CDATA[
        <cms:conditional_js />
        //]]>
    </script>
    <script type="text/javascript">
    	var chk1 = $("is_interchanged[value='1']");
		var chk2 = $("today_interchanged[value='2']");

		chk1.on('change', function(){
		  chk2.prop('checked',this.checked);
		});
    </script>
<?php COUCH::invoke(); ?>