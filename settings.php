<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Settings' clonable="1" order="3">
	<cms:editable name='diff' label='Sign On Difference' type='text' validator="max_len=2 | non_negative_integer" class='col-md-12' />
</cms:template>
<cms:embed 'header.html' />
	<div class="container-fluid">
		<!-- Section Divider -->
		<h4 class="gxcpl-no-margin">
			SETTINGS
		</h4>
		<!-- List View -->
		<div class="gxcpl-ptop-10"></div>
		<div class="gxcpl-divider-dark"></div>
		<div class="gxcpl-ptop-20"></div>
		
		<!-- Pointwise Interchange -->
		<div class="row" >
			<cms:set submit_success="<cms:get_flash 'submit_success' />" />
		    <cms:if submit_success >
		    	<!-- <div class="row"> -->
			    	<div class="col-md-12">
			    		<div class="alert alert-success">
			    			<strong>Updated! </strong>Sigon hours for overdue updated successfully.
			    		</div>
			    	</div>
			    <!-- </div> -->
		    </cms:if>
        	<cms:form
		        masterpage=k_template_name
		        mode='create'
		        enctype='multipart/form-data'
		        method='post'
		        anchor='0' 
		    >
		        <cms:if k_success >
		            <cms:db_persist_form
		                _invalidate_cache='0'
		                k_page_title= "<cms:show frm_diff />"
		                k_page_name = "<cms:show k_page_title />"
		            />
		            <cms:if k_success >
			            <cms:set_flash name='submit_success' value='1' />
			            <cms:redirect url=k_template_name />
			        </cms:if>
		        </cms:if>

		        <cms:if k_error >
	        		<div class="col-md-4">
	        			<div class="alert alert-danger">
	            			<cms:each k_error >
	            				<cms:show item /><br>
	            			</cms:each>
	                    </div>
	            	</div>  
		        </cms:if>
		        <div class="col-md-12">
		        	<div class="gxcpl-card">
		        		<div class="gxcpl-card-header">
		        			<h4 class="gxcpl-no-margin">Pointwise Interchange Overdue (in hours)</h4>
		        		</div>
		        		<div class="gxcpl-card-body gxcpl-padding-10">
		        			<div class="row">
		        				<div class="col-md-2 text-center">
		        					<label>Overdue Hours</label>
		        				</div>
		        				<div class="col-md-4">
		        					<cms:input type="bound" name="diff" class="gxcpl-input-text" />
		        					<div class="gxcpl-ptop-10"></div>
		        				</div>
		        				<div class="col-md-6 text-center">
		        					<label>Current Overdue: <cms:pages limit='1' show_future_entries='1'><cms:show diff /></cms:pages> hrs</label>
		        					<div class="gxcpl-ptop-10"></div>
		        				</div>
		        			</div>
		        		</div>
		        		<div class="gxcpl-card-footer gxcpl-no-padding">
		        			<button class="btn btn-danger btn-sm gxcpl-fw-700" type="submit">
								<i class="fa fa-save fa-lg"></i> SAVE
							</button>
		        		</div>
		        	</div>
		        </div>
		    </cms:form>
		</div>
	</div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>