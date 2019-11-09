<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Pointwise Interchange" clonable='1' routable='1' parent='_ptic_' order='1'  >
	<!-- Editable -->
	<cms:editable name='icp_toho' type='row'>
		<cms:editable name="interchange" label="Interchange" type="dropdown" opt_values="No Preference =- | <cms:pages masterpage='interchange.php' order='asc'><cms:show k_page_title /><cms:if '<cms:not k_paginated_bottom />'>|</cms:if></cms:pages>" class="col-md-6" order="1" />
		<cms:ignore>
		<cms:editable name="interchange" label="Interchange" type="relation" has='one' masterpage='interchange.php' class="col-md-6" order_dir='asc' order='1' />
		</cms:ignore>
		<cms:editable name='to_ho' label='To or Ho' type='radio' opt_values='T/O=0 | H/O=1' class="col-md-6" order="2" />
		<cms:editable name='today_yesterday' label='Today or Yesterday Entry' type='radio' opt_values="Today=<cms:date format='d/m/Y' /> | Yesterday=<cms:date return='yesterday' format='d/m/Y'/>" class="col-md-6" order="3" />
	</cms:editable>
	<cms:editable name='tr_loco' type='row'>
		<cms:editable name="tr_name" label="Train Name" type="text" required="1" class="col-md-6"  order="3" />
		<cms:editable name="loco" label="Loco" type="text" required="1" class="col-md-6" order="4" />
	</cms:editable>
	<cms:editable name='sch_cmdt' type='row'>
		<cms:editable name="schedule_date" type="datetime" label="Schedule Date" show_labels="0" fields_separator="-" format='Y-m-d' default_time='@current' allow_time='0' required="1" class="col-md-4" order="5" />
		<cms:editable name="schedule" label="Schedule" type="text" required="1" class="col-md-2" order="6" />
		<cms:ignore>
			<cms:editable name="commodity" label="Commodity" type="dropdown" opt_values="Select = - NA - | <cms:pages masterpage='commodity.php' order='asc' ><cms:show k_page_title /><cms:if '<cms:not k_paginated_bottom />' >|</cms:if></cms:pages>" class="col-md-6" order="7" />
		</cms:ignore>
		<cms:editable name="commodity" label="Commodity" type="relation" masterpage='commodity.php' order_dir='asc' has='one' class="col-md-6" order="7" />
	</cms:editable>
	<cms:editable name='typ_lctn' type='row'>
		<cms:ignore>
			<cms:editable name="raketype" label="Rake Type" type="dropdown" opt_values="Select = - NA - | <cms:pages masterpage='type.php' order='asc' ><cms:show k_page_title /><cms:if '<cms:not k_paginated_bottom />' >|</cms:if></cms:pages>" class="col-md-6" order="8" />
		</cms:ignore>
		<cms:editable name="raketype" label="Rake Type" type="relation" masterpage='type.php' order_dir='asc' has='one' class="col-md-6" order="8" />
		<cms:ignore>
			<cms:editable name="location" label="Location" type="dropdown" opt_values="Select = - NA - | <cms:pages masterpage='location.php' order='asc' ><cms:show k_page_title /><cms:if '<cms:not k_paginated_bottom />' >|</cms:if></cms:pages>" required="1" class="col-md-6"
			order="9" />
		</cms:ignore>
		<cms:editable name="location" label="Location" type="relation" masterpage='location.php' order_dir='asc' has='one' required="1" class="col-md-6" order="9" />
	</cms:editable>
	<cms:editable name='arr_depr' type='row'>
		<cms:editable name="arrival_date" label="Arrival Date" type="datetime" fields_separator="/" format='Y-m-d' required="1" class="col-md-4" order="10" />
		<cms:editable name="arrival_time" label="Arrival Time" type="datetime" allow_time='1' am_pm='0' only_time='1' show_labels="0" minute_steps="1" class="col-md-2" order="11" />
		<cms:editable name="departure_date" label="Departure Date" format='Y-m-d' show_labels="0" fields_separator="-" default_time='@current' allow_time='0' type="datetime" class="col-md-4" order="12" />
		<cms:editable name="departure_time" label="Departure Time" type="datetime" show_labels="0" allow_time='1' am_pm='0' only_time='1' minute_steps="1" class="col-md-2" order="13" />
	</cms:editable>
	<cms:editable name='sng_le' type='row'>
		<cms:editable name="signon_date" label="Sign on Date" type="datetime" show_labels="0" format='Y-m-d' default_time='@current' required="1" class="col-md-6" order="14" />

		<cms:editable name="signon_time" label="Sign on Time" type="datetime" show_labels="0" allow_time='1' am_pm='0' format='1970-01-01 H:i:00' required='1' only_time='1'  minute_steps="1" class="col-md-2" />

		<cms:editable name='load' label='Load/ Empty' type='radio' opt_values='L=L | E=E' class="col-md-2" order='16' />
	</cms:editable>
	<cms:editable name='frm_to' type='row'>
		<cms:editable name='stn_from' label='Station From' type='text' class="col-md-6" order='17' />
		<cms:editable name='stn_to' label='Station To' type='text' class="col-md-6" order='18' />
	</cms:editable>
	<cms:editable name='ldut_rmk' type='row'>
		<cms:editable name='load_unit' label='Load Unit' type='text' class="col-md-6" order='19' />
		<cms:editable name="remark" label="Remark" type="text" class="col-md-6" order="20" />
	</cms:editable>
	<cms:editable name='is_interchanged' label='Interchange Status' type='checkbox' opt_values='YES=1' order='21' /> 
	<cms:editable name='is_stabled' label='Stabled' type='checkbox' opt_values='YES=1' order='22' /> 
	<cms:editable type='checkbox' name='select_type' label='Checked then fill input' opt_values='Yes' order='23' />

	<cms:func _into='my_cond' select_type=''>
        <cms:if "<cms:is 'Yes' in=select_type />">
            show
        <cms:else />
            hide
        </cms:if>
    </cms:func>
    <!-- Ho Interchange -->
    <cms:editable name="ho_interchange" label="HO Interchange"  type='relation' has='one' masterpage="interchange.php" not_active=my_cond  order='24'/>
    <!-- Ho Interchange -->
    <cms:editable name='to_ho_relation' label='Related T/O Page Id' type='relation' has='one' masterpage=k_template_name order='25' />

    <cms:func _into='my_cond' select_type=''>
        <cms:if "<cms:is 'Yes' in=select_type />">
            show
        <cms:else />
            hide
        </cms:if>
    </cms:func>
    <cms:editable name='today_interchange' label="Today's Interchange" type='checkbox' opt_values='YES=1'  order="26" />

    <!-- AQ Arrival -->
   	<cms:editable name='aq_arrival_date' label="AQ Arrival Date" type='datetime' format='Y-m-d' show_labels="0" default_time='@current' allow_time='0' order="27" class="col-md-3" />
   	<cms:editable name="aq_arrival_time" label="AQ Arrival Time" type='datetime' show_labels="0" allow_time='1' am_pm='0' only_time='1' minute_steps="1" order="28" class="col-md-3" />
   	<!-- AQ Arrival -->

   	<!-- AQ Departure -->
   	<cms:editable name='aq_departure_date' label="AQ Departure Date" type='datetime' format='Y-m-d' show_labels="0" default_time='@current' allow_time='0' order="29" class="col-md-3" />
   	<cms:editable name="aq_departure_time" label="AQ Departure Time" type='datetime' show_labels="0" allow_time='1' am_pm='0' only_time='1' minute_steps="1" order="30" class="col-md-3" />
   	<!-- AQ Departure -->

   	<!-- GNQ Arrival -->
   	<cms:editable name='gnq_arrival_date' label="GNQ Arrival Date" type='datetime' format='Y-m-d' show_labels="0" default_time='@current' allow_time='0' order="31" class="col-md-3" />
   	<cms:editable name="gnq_arrival_time" label="GNQ Arrival Time" type='datetime' show_labels="0" allow_time='1' am_pm='0' only_time='1' minute_steps="1" order="32" class="col-md-3" />
   	<!-- GNQ Arrival -->

   	<!-- GNQ Departure -->
   	<cms:editable name='gnq_departure_date' label="GNQ Departure Date" type='datetime' format='Y-m-d' show_labels="0" default_time='@current' allow_time='0' order="33" class="col-md-3" />
   	<cms:editable name="gnq_departure_time" label="GNQ Departure Time" type='datetime' show_labels="0" allow_time='1' am_pm='0' only_time='1' minute_steps="1" order="34" />
   	<!-- GNQ Departure -->

	<!-- Route -->
	<cms:route name='edit_ptic' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_ptic' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
	<!-- Route -->
	<!-- Editable -->
</cms:template>
<cms:no_cache />
<cms:embed 'header.html' />
    <!-- Content Here -->
	<div class="container-fluid">
		<!-- <div class="gxcpl-ptop-50"></div> -->
		<!-- Section Divider -->
		<h4 class="gxcpl-no-margin">
			POINTWISE INTERCHANGE
		</h4>
		<!-- List View -->
		<div class="gxcpl-ptop-10"></div>
		<div class="gxcpl-divider-dark"></div>
		<div class="gxcpl-ptop-10"></div>

		<!-- Pointwise Interchange -->
		<div class="row" >
			<cms:match_route debug='0' />
			<cms:if k_matched_route=='delete_ptic'>
			<cms:embed "ptwise-intrchnge/<cms:show k_matched_route />.html" />
			<cms:else />
        	<cms:set submit_success="<cms:get_flash 'submit_success' />" />
		    <cms:if submit_success >
		    	<!-- <div class="row"> -->
			    	<div class="col-md-12">
			    		<div class="alert alert-success">
			    			<strong>Success! </strong>Pointwise Interchange created successfully.
			    		</div>
			    	</div>
			    <!-- </div> -->
		    </cms:if>
		    <cms:embed 'searchicp.html' />
			<cms:form
		        masterpage=k_template_name
		        mode='create'
		        enctype='multipart/form-data'
		        method='post'
		        anchor='0'
		        name='manual-entry'
		        id="to_ho_pt_icp_form"
		    >
		    	<!-- Set For Year is less than current year -->
			    <cms:set my_dep_date = "<cms:date frm_departure_date format='Y-m-d' />" scope="global" />
				<cms:set my_curr_date = "<cms:date format='Y-m-d' />" scope="global" />
				<!-- Set For Year is less than current year -->
		        <cms:if k_success >
		        <cms:if my_dep_date le my_curr_date>
		            <cms:db_persist_form
		                _invalidate_cache='0'
		                k_page_title="<cms:show frm_interchange />_<cms:show my_toho />_<cms:show frm_tr_name />_<cms:date frm_arrival_date format='Y-m-d' />"
		                k_page_name = "<cms:show k_page_title />"
		                to_ho = "<cms:show my_toho />"
		                today_yesterday = "<cms:show my_today_yesterday />"
		                entry_diff = "<cms:pages masterpage='settings.php' limit='1' ><cms:show diff /></cms:pages>"
		                select_type = "Yes"
		            />
		        </cms:if>
	              	<cms:if k_success >
		                
	              		<cms:if frm_select_type eq 'Yes'> 
		              		<cms:db_persist
							    k_page_title			="<cms:pages masterpage='interchange.php' id="<cms:gpc 'f_ho_interchange' />" limit='1'><cms:show k_page_title /></cms:pages>_1_<cms:show frm_tr_name />_<cms:date frm_arrival_date format='Y-m-d' />"						    
							    _invalidate_cache       =   '0'
							    _masterpage             =   'pointwise-interchange.php'
							    _mode                   =   'create'
							    

			                	to_ho_relation          =   "<cms:show k_last_insert_id />"
							    select_type				= 	"<cms:show frm_select_type />"
							    to_ho					=	"1"
							    interchange				=	"<cms:pages masterpage='interchange.php' id="<cms:gpc 'f_ho_interchange' />" limit='1'><cms:show k_page_title /></cms:pages>"
							    ho_interchange			=	"<cms:pages masterpage='interchange.php' id="<cms:gpc 'f_ho_interchange' />" limit='1'><cms:show k_page_id /></cms:pages>"
							    today_yesterday			=	"<cms:show frm_today_yesterday />"
							    tr_name					=	"<cms:show frm_tr_name />"
							    loco					=	"<cms:show frm_loco />"
							    schedule_date			=	"<cms:date frm_schedule_date format='Y-m-d' />"
							    schedule				=	"<cms:show frm_schedule />"
							    commodity				=	"<cms:show frm_commodity />"
							    raketype				=	"<cms:show frm_raketype />"
							    location				=	"<cms:show frm_location />"
							    arrival_date			=	"<cms:date frm_arrival_date format='Y-m-d' />"
							    arrival_time			=	"<cms:date frm_arrival_time format='1970-01-01 H:i:00' />"
							    departure_date			=	"<cms:date frm_departure_date format='Y-m-d' />"
							    departure_time			=	"<cms:date frm_departure_time format='1970-01-01 H:i:00' />"
							    signon_date				=	"<cms:date frm_signon_date format='Y-m-d' />"
							    signon_time				=	"<cms:date frm_signon_time format='1970-01-01 H:i:00' />"
							    load					=	"<cms:show frm_load />"
							    stn_from				=	"<cms:show frm_stn_from />"
							    stn_to					=	"<cms:show frm_stn_to />"
							    load_unit				=	"<cms:show frm_load_unit />"
							    remark					=	"<cms:show frm_remark />"
							    is_stabled				=	"<cms:show frm_is_stabled />"
							    is_interchanged 		= 	"0"
							    today_interchange  		= 	"<cms:show frm_today_interchange />"
							    k_page_id               =   "<cms:add '<cms:show k_last_insert_id />' '1' />"
							    entry_diff 				=	"<cms:pages masterpage='settings.php' limit='1' ><cms:show diff /></cms:pages>"
							    aq_arrival_date 		=	"<cms:date frm_aq_arrival_date format='Y-m-d' />"
							    aq_arrival_time 		=	"<cms:date frm_aq_arrival_time format='1970-01-01 H:i:00' />"
							    aq_departure_date 		=	"<cms:date frm_aq_departure_date format='Y-m-d' />"
							    aq_departure_time 		=	"<cms:date frm_aq_departure_time format='1970-01-01 H:i:00' />"
							    gnq_arrival_date 		=	"<cms:date frm_gnq_arrival_date format='Y-m-d' />"
							    gnq_arrival_time 		=	"<cms:date frm_gnq_arrival_time format='1970-01-01 H:i:00' />"
							    gnq_departure_date 		=	"<cms:date frm_gnq_departure_date format='Y-m-d' />"
							    gnq_departure_time 		=	"<cms:date frm_gnq_departure_time format='1970-01-01 H:i:00' />"

							>

							    <cms:if k_error >
							        <cms:abort>
							            <cms:each k_error >
							                <br><cms:show item />
							            </cms:each>
							        </cms:abort>
							    </cms:if>
							</cms:db_persist >
						</cms:if>
			            <cms:if k_success >
				            <cms:set_flash name='submit_success' value='1' />
				            <cms:redirect url="<cms:route_link create_ptic.html />" />
				        </cms:if>
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
		         (<cms:show my_dep_date />::<cms:show my_curr_date />)
		        <div class="col-md-12">
	        		<div class="gxcpl-card">
	        			<div class="gxcpl-card-header">
	        				<h4 class="gxcpl-no-margin">MANUAL ENTRY</h4> 
	        			</div>
	        			<cms:hide>
	        				<cms:input type='bound' name="interchange"/>
	        			</cms:hide>
	        			<input type='text' name="f_interchange" value="<cms:show my_icp />" hidden='1' />
	        			<div class="gxcpl-card-body" style="border-radius: 0px 2px;">
	        				<div class="row gxcpl-padding-5">
		        				<div class="col-md-1 col-sm-6 col-xs-6">
		        					<label>Train *</label>
									<cms:input class="gxcpl-input-text text-uppercase" name="tr_name" type="bound" />
									<div class="gxcpl-ptop-10"></div>
		        				</div>
		        				<div class="col-md-2 col-sm-6 col-xs-6">
		        					<label>Loco *</label>
									<cms:input class="gxcpl-input-text" name="loco" type="bound" />
									<div class="gxcpl-ptop-10"></div>
		        				</div>
		        				<div class="col-md-3 text-center">
		        					<label>Schedule *</label>
		        					<div class="row">
										<div class="col-md-7 col-sm-6 col-xs-6">
											<cms:hide>
												<cms:input name="schedule_date" type="bound" />
											</cms:hide>
											<input class="gxcpl-input-text" name="f_schedule_date" type="date" value="<cms:date format='Y-m-d' />" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-5 col-sm-6 col-xs-6">
											<cms:input class="gxcpl-input-text text-uppercase" name="schedule" type="bound" />
											<div class="gxcpl-ptop-10"></div>
										</div>
									</div>
		        				</div>
		        				<div class="col-md-2 col-sm-4 col-xs-4">
		        					<label>Commodity</label>
									<cms:input name="commodity" type="bound" class="gxcpl-input-text" />
									<div class="gxcpl-ptop-10"></div>
		        				</div>
		        				<div class="col-md-2 col-sm-4 col-xs-4">
		        					<label>Type</label>
									<cms:input name="raketype" type="bound" class="gxcpl-input-text"/>
									<div class="gxcpl-ptop-10"></div>
		        				</div>
		        				<div class="col-md-2 col-sm-4 col-xs-4">
		        					<label>Location *</label>
									<cms:input name='location' type='bound' class='gxcpl-input-text' />
									<div class="gxcpl-ptop-10"></div>
		        				</div>
		        				<!-- NGP GCC Condition for TO -->
		        				<cms:if (my_icp='NGP') && (my_toho='0') >
		        					<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>NGP Arrival</label>
			        					<div class="row">
				        					<div class="col-md-12 col-sm-12 col-xs-12">
				        						<cms:hide>
													<cms:input type="bound" name="arrival_date" />
												</cms:hide>
												<input type="date" class="gxcpl-input-text" name="f_arrival_date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text input select" name="arrival_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>NGP Departure</label>
			        					<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
													<cms:input name="departure_date" type="bound" />
												</cms:hide>
												<input class="gxcpl-input-text" name="f_departure_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="departure_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>AQ Arrival</label>
			        					<div class="row">
				        					<div class="col-md-12 col-sm-12 col-xs-12">
				        						<cms:hide>
													<cms:input type="bound" name="aq_arrival_date" />
												</cms:hide>
												<input type="date" class="gxcpl-input-text" name="f_aq_arrival_date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text input select" name="aq_arrival_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>AQ Departure</label>
			        					<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
													<cms:input name="aq_departure_date" type="bound" />
												</cms:hide>
												<input class="gxcpl-input-text" name="f_aq_departure_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="aq_departure_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
	        						<label>Sign On *</label>
		        						<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
			        								<cms:input class="gxcpl-input-text" name="signon_date" type="bound"  />
			        							</cms:hide>
												<input class="gxcpl-input-text" name="f_signon_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="signon_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>	
										</div>
			        				</div>
			        				<div class="col-md-1 col-sm-6 col-xs-6 text-center-special">
			        					<label>Load</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='load' type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-1 col-sm-6 col-xs-6">
			        					<label>Remark</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='remark' class="gxcpl-input-text" type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
								<cms:else_if (my_icp='GCC') && (my_toho='0') />
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>GCC Arrival</label>
			        					<div class="row">
				        					<div class="col-md-12 col-sm-12 col-xs-12">
				        						<cms:hide>
													<cms:input type="bound" id="arprdate" name="arrival_date" />
												</cms:hide>
												<input type="date" class="gxcpl-input-text" name="f_arrival_date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text input select" name="arrival_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>GCC Departure</label>
			        					<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
													<cms:input name="departure_date" type="bound" id="dptprdate" />
												</cms:hide>
												<input class="gxcpl-input-text" name="f_departure_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="departure_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>GNQ Arrival</label>
			        					<div class="row">
				        					<div class="col-md-12 col-sm-12 col-xs-12">
				        						<cms:hide>
													<cms:input type="bound" name="gnq_arrival_date" />
												</cms:hide>
												<input type="date" class="gxcpl-input-text" name="f_gnq_arrival_date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text input select" name="gnq_arrival_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>GNQ Departure</label>
			        					<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
													<cms:input name="gnq_departure_date" type="bound" />
												</cms:hide>
												<input class="gxcpl-input-text" name="f_gnq_departure_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="gnq_departure_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
	        						<label>Sign On *</label>
		        						<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
			        								<cms:input class="gxcpl-input-text" name="signon_date" type="bound"  />
			        							</cms:hide>
												<input class="gxcpl-input-text" name="f_signon_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="signon_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>	
										</div>
			        				</div>
			        				<div class="col-md-1 col-sm-6 col-xs-6 text-center-special">
			        					<label>Load</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='load' type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-1 col-sm-6 col-xs-6">
			        					<label>Remark</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='remark' class="gxcpl-input-text" type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        			<cms:else_if my_toho eq '0' />
			        				<div class="col-md-3 col-sm-12 col-xs-12 text-center-special">
			        					<label>Arrival</label>
			        					<div class="row">
				        					<div class="col-md-12 col-sm-12 col-xs-12">
				        						<cms:hide>
													<cms:input type="bound" name="arrival_date" />
												</cms:hide>
												
												<input type="date" class="gxcpl-input-text" name="f_arrival_date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												
												<cms:input class="gxcpl-input-text input select" name="arrival_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-3 col-sm-12 col-xs-12 text-center-special">
			        					<label>Departure</label>
			        					<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
													<cms:input name="departure_date" type="bound" />
												</cms:hide>
												<input class="gxcpl-input-text" name="f_departure_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="departure_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-3 col-sm-12 col-xs-12 text-center-special">
		        						<label>Sign On *</label>
		        						<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
			        								<cms:input class="gxcpl-input-text" name="signon_date" type="bound"  />
			        							</cms:hide>
												<input class="gxcpl-input-text" name="f_signon_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="signon_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>	
										</div>
			        				</div>
			        				<div class="col-md-1 col-sm-6 col-xs-6 text-center-special">
			        					<label>Load</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='load' type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-6 col-xs-6">
			        					<label>Remark</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='remark' class="gxcpl-input-text" type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        			</cms:if>
			        			<!-- NGP GCC Condition for TO -->
			        			<!-- NGP GCC Condition for HO -->
		        				<cms:if (my_icp='NGP') && (my_toho='1') >
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>AQ Arrival</label>
			        					<div class="row">
				        					<div class="col-md-12 col-sm-12 col-xs-12">
				        						<cms:hide>
													<cms:input type="bound" name="aq_arrival_date" />
												</cms:hide>
												<input type="date" class="gxcpl-input-text" name="f_aq_arrival_date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text input select" name="aq_arrival_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>AQ Departure</label>
			        					<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
													<cms:input name="aq_departure_date" type="bound" />
												</cms:hide>
												<input class="gxcpl-input-text" name="f_aq_departure_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="aq_departure_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>NGP Arrival</label>
			        					<div class="row">
				        					<div class="col-md-12 col-sm-12 col-xs-12">
				        						<cms:hide>
													<cms:input type="bound" name="arrival_date" />
												</cms:hide>
												<input type="date" class="gxcpl-input-text" name="f_arrival_date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text input select" name="arrival_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>NGP Departure</label>
			        					<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
													<cms:input name="departure_date" type="bound" />
												</cms:hide>
												<input class="gxcpl-input-text" name="f_departure_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="departure_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
	        						<label>Sign On *</label>
		        						<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
			        								<cms:input class="gxcpl-input-text" name="signon_date" type="bound"  />
			        							</cms:hide>
												<input class="gxcpl-input-text" name="f_signon_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="signon_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>	
										</div>
			        				</div>
			        				<div class="col-md-1 col-sm-6 col-xs-6 text-center-special">
			        					<label>Load</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='load' type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-1 col-sm-6 col-xs-6">
			        					<label>Remark</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='remark' class="gxcpl-input-text" type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
								<cms:else_if (my_icp='GCC') && (my_toho='1') />
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>GNQ Arrival</label>
			        					<div class="row">
				        					<div class="col-md-12 col-sm-12 col-xs-12">
				        						<cms:hide>
													<cms:input type="bound" name="gnq_arrival_date" />
												</cms:hide>
												<input type="date" class="gxcpl-input-text" name="f_gnq_arrival_date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text input select" name="gnq_arrival_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>GNQ Departure</label>
			        					<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
													<cms:input name="gnq_departure_date" type="bound" />
												</cms:hide>
												<input class="gxcpl-input-text" name="f_gnq_departure_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="gnq_departure_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>GCC Arrival</label>
			        					<div class="row">
				        					<div class="col-md-12 col-sm-12 col-xs-12">
				        						<cms:hide>
													<cms:input type="bound" id="arprdate" name="arrival_date" />
												</cms:hide>
												<input type="date" class="gxcpl-input-text" name="f_arrival_date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text input select" name="arrival_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
			        					<label>GCC Departure</label>
			        					<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
													<cms:input name="departure_date" type="bound" id="dptprdate" />
												</cms:hide>
												<input class="gxcpl-input-text" name="f_departure_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="departure_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-12 col-xs-12 text-center-special">
	        						<label>Sign On *</label>
		        						<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
			        								<cms:input class="gxcpl-input-text" name="signon_date" type="bound"  />
			        							</cms:hide>
												<input class="gxcpl-input-text" name="f_signon_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="signon_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>	
										</div>
			        				</div>
			        				<div class="col-md-1 col-sm-6 col-xs-6 text-center-special">
			        					<label>Load</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='load' type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-1 col-sm-6 col-xs-6">
			        					<label>Remark</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='remark' class="gxcpl-input-text" type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        			<cms:else_if my_toho eq '1' />
			        				<div class="col-md-3 col-sm-12 col-xs-12 text-center-special">
			        					<label>Arrival</label>
			        					<div class="row">
				        					<div class="col-md-12 col-sm-12 col-xs-12">
				        						<cms:hide>
													<cms:input type="bound" name="arrival_date" />
												</cms:hide>
												<input type="date" class="gxcpl-input-text" name="f_arrival_date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text input select" name="arrival_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-3 col-sm-12 col-xs-12 text-center-special">
			        					<label>Departure</label>
			        					<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
													<cms:input name="departure_date" type="bound" />
												</cms:hide>
												<input class="gxcpl-input-text" name="f_departure_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="departure_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-3 col-sm-12 col-xs-12 text-center-special">
		        						<label>Sign On *</label>
		        						<div class="row">
			        						<div class="col-md-12 col-sm-12 col-xs-12">
			        							<cms:hide>
			        								<cms:input class="gxcpl-input-text" name="signon_date" type="bound"  />
			        							</cms:hide>
												<input class="gxcpl-input-text" name="f_signon_date" type="date" value="<cms:date format='Y-m-d' />" style="width: auto;" />
												<cms:input class="gxcpl-input-text" name="signon_time" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>	
										</div>
			        				</div>
			        				<div class="col-md-1 col-sm-6 col-xs-6 text-center-special">
			        					<label>Load</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='load' type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        				<div class="col-md-2 col-sm-6 col-xs-6">
			        					<label>Remark</label>
			        					<div class="row">
			        						<div class="col-md-12">
												<cms:input name='remark' class="gxcpl-input-text" type='bound' />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
			        				</div>
			        			</cms:if>
			        			<!-- NGP GCC Condition for HO -->
		        			</div>
		        			<div class="row gxcpl-padding">
		        				<div class="col-md-2 col-sm-6 col-xs-6">
		        					<label>Already Interchange</label>
		        					<div class="row">
		        						<div class="col-md-12">
				        					<cms:input type="bound" name="is_interchanged" class="interchange" />
				        					<div class="gxcpl-ptop-5"></div>
				        				</div>
				        			</div>
		        				</div>
		        				<div class="col-md-1 col-sm-6 col-xs-6">
		        					<label>Stable</label>
		        					<div class="row">
		        						<div class="col-md-12">
				        					<cms:input type="bound" name="is_stabled" />
				        					<div class="gxcpl-ptop-5"></div>
				        				</div>
				        			</div>
		        				</div>
		        				<cms:if my_toho='0'>

			        				<div class="col-md-2 col-sm-6 col-xs-6">
			        					<label>Copy to HO</label>
			        					<div class="row">
			        						<div class="col-md-12">
					        					<cms:input type="bound" name="select_type" />
					        					<div class="gxcpl-ptop-5"></div>
					        				</div>
					        			</div>
			        				</div>
			        				
			        				<div class="col-md-3 col-sm-6 col-xs-6" id="k_element_today_interchange">
			        					<label>In Today's Interchange?</label>
			        					<div class="row">
			        						<div class="col-md-12">
					        					<cms:input type="bound" name="today_interchange" not_active=my_cond class="td_interchange"  />
					        					<!-- <div class="gxcpl-ptop-10"></div> -->
					        				</div>
					        			</div>
			        				</div>

			        				<div class="col-md-3 col-sm-12 col-xs-12" id="k_element_ho_interchange">
			        					<label for="ho_interchange">H/O Interchange</label>
			        					<div class="row">
			        						<div class="col-md-12">
					        					<cms:hide>
						        					<cms:input type="bound" name="ho_interchange" not_active=my_cond value="<cms:show k_page_id />"  />
						        				</cms:hide>
						        				<select name="f_ho_interchange" id="f_ho_interchange" not_active=my_cond style="width: auto;" >
						        					<option value="">Select H/O Interchange Point</option>
						        					<cms:pages masterpage='interchange.php' order='asc'>
						        					<option value="<cms:show k_page_id />"><cms:show k_page_title /></option>
						        					</cms:pages>
						        				</select>
						        				<div class="gxcpl-ptop-10"></div>
					        				</div>
					        			</div>
			        				</div>
			        				
		        				</cms:if>

		        				<cms:if my_toho='1'>
		        				<div class="col-md-3">
		        					<label>In Today's Interchange?</label>
		        					<div class="row">
		        						<div class="col-md-12">
				        					<cms:input type="bound" name="today_interchange" class="td_interchange" />
				        					<div class="gxcpl-ptop-10"></div>
				        				</div>
				        			</div>
		        				</div>
		        				</cms:if>
		        			</div>
	        			</div>
	        			<div class="gxcpl-card-footer gxcpl-no-padding">
	        				<button class="btn btn-danger btn-sm gxcpl-fw-500">
								<i class="fa fa-save"></i> SAVE
							</button>
	        			</div>
	        		</div>
	        		<div class="gxcpl-ptop-10"></div>
	        	</div>
        	</cms:form>
        	</cms:if>
		</div>
		<!-- Pointwise Interchange -->
	</div>

	<cms:set curr_date="<cms:date format='Y-m-d' />" scope='global' />

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 ">
				<cms:if (my_icp != '-') && (my_toho != '') >
				<div class="gxcpl-card box">
					<div class="gxcpl-card-header gxcpl-no-margin">
						<div class="row">
							<!-- Title -->
							<div class="col-md-4 col-xs-6">
								<h4>
									<cms:pages masterpage="pointwise-interchange.php" limit="1" custom_field="interchange=<cms:gpc 'interchange' /> | to_ho=<cms:gpc 'to_ho' />">
										<cms:set my_icp="<cms:gpc 'interchange' />" scope='global' />
										<cms:if to_ho eq '0'>
											<cms:show 'T/O' />: <cms:show interchange />
										<cms:else_if to_ho eq '1' />
											<cms:show 'H/O' />: <cms:show interchange />
										<cms:else_if (interchange eq '-') && (to_ho eq '0' || to_ho eq '1') />
											<cms:show 'All interchange point T/O and H/O' />
										</cms:if>
									</cms:pages>
								</h4>
							</div>
							<!-- Title -->
							<!-- Show/Hide Button -->
							<div class="col-md-2 col-md-offset-5 col-xs-8 btn-group" role="group">
								<button id="btnShowip" class="btn btn-danger gxcpl-fw-700" type="button">
									<i class="fa fa-eye" aria-hidden="true"></i> SHOW
								</button>
								<button id="btnHideip" class="btn btn-primary gxcpl-fw-700" type="button">
									<i class="fa fa-eye-slash" aria-hidden="true"></i> HIDE
								</button>
								
							</div>
							<!-- Show/Hide Button -->
							<!-- Legend -->
							<div class="col-md-1 col-xs-4">
								<span class="col-md-1 pull-right" data-toggle="tooltip" data-placement="top" title="Table Legend">
								    <cms:embed 'legend.html' />
								</span>
								<div class="gxcpl-ptop-50"></div>
							</div>
							<!-- Legend -->
						</div>
					</div>
					<div class="gxcpl-card-body tableFixHead gxcpl-padding-15" style="overflow-x: auto;">
						<table class="display table table-bordered gxcpl-table-hover" id="pt-icp" style="width: 100% !important;">
							<thead>
								<tr>
									<th width="2%;" class="text-center">
										S. No	
									</th>
									<th width="4%;">
										Train
									</th>
									<th width="4%;">
										Loco
									</th>
									<th width="6%;">
										Schedule
									</th>
									<cms:if (my_icp eq 'NGP') && (my_toho eq '0') >
									<th width="4%;">
										NGP Arr
									</th>
									<th width="6%;">
										NGP Dep
									</th>
									<th width="4%;">
										AQ Arr
									</th>
									<th width="4%;">
										AQ Dep
									</th>
									<th width="4%;">
										Sign On
									</th>
									<th width="1%;">
										Location
									</th>
									<th width="6%;" style="display: none;">
										Type
									</th>
									<th width="4%;" style="display: none;">
										L/E
									</th>
									<th width="4%;" style="display: none;">
										Unit/s
									</th>
									<th width="6%;" style="display: none;">
										CMDT
									</th>
									<th width="6%;" style="display: none;">
										To
									</th>
									<th width="6%;" style="display: none;">
										From
									</th>
									<th width="7%;" style="z-index: 99;">
										Remark
									</th>
									<th width="4%;" class="text-center">
										Action
									</th>
									<cms:else_if (my_icp eq 'GCC') && (my_toho eq '0')  />
									<th width="4%;">
										GCC Arr
									</th>
									<th width="4%;">
										GCC Dep
									</th>
									<th width="4%;">
										GNQ Arr
									</th>
									<th width="4%;">
										GNQ Dep
									</th>
									<th width="4%;">
										Sign On
									</th>
									<th width="1%;">
										Location
									</th>
									<th width="6%;" style="display: none;">
										Type
									</th>
									<th width="4%;" style="display: none;">
										L/E
									</th>
									<th width="4%;" style="display: none;">
										Unit/s
									</th>
									<th width="6%;" style="display: none;">
										CMDT
									</th>
									<th width="6%;" style="display: none;">
										To
									</th>
									<th width="6%;" style="display: none;">
										From
									</th>
									<th width="7%;" style="z-index: 99;">
										Remark
									</th>
									<th width="4%;" class="text-center">
										Action
									</th>
									<cms:else_if my_toho eq '0' />
									<th width="4%;">
										Arrival
									</th>
									<th width="4%;">
										Departure
									</th>
									<th width="4%;">
										Sign On
									</th>
									<th width="1%;">
										Location
									</th>
									<th width="6%;" style="display: none;">
										Type
									</th>
									<th width="4%;" style="display: none;">
										L/E
									</th>
									<th width="4%;" style="display: none;">
										Unit/s
									</th>
									<th width="6%;" style="display: none;">
										CMDT
									</th>
									<th width="6%;" style="display: none;">
										To
									</th>
									<th width="6%;" style="display: none;">
										From
									</th>
									<th width="7%;" style="z-index: 99;">
										Remark
									</th>
									<th width="4%;" class="text-center">
										Action
									</th>
									</cms:if>
									<cms:if (my_icp eq 'NGP') && (my_toho eq '1') >
									<th width="4%;">
										AQ Arr
									</th>
									<th width="4%;">
										AQ Dep
									</th>
									<th width="4%;">
										NGP Arr
									</th>
									<th width="4%;">
										NGP Dep
									</th>
									<th width="4%;">
										Sign On
									</th>
									<th width="1%;">
										Location
									</th>
									<th width="6%;" style="display: none;">
										Type
									</th>
									<th width="4%;" style="display: none;">
										L/E
									</th>
									<th width="4%;" style="display: none;">
										Unit/s
									</th>
									<th width="6%;" style="display: none;">
										CMDT
									</th>
									<th width="6%;" style="display: none;">
										To
									</th>
									<th width="6%;" style="display: none;">
										From
									</th>
									<th width="7%;" style="z-index: 99;">
										Remark
									</th>
									<th width="4%;" class="text-center">
										Action
									</th>
									<cms:else_if (my_icp eq 'GCC') && (my_toho eq '1')  />
									<th width="4%;">
										GNQ Arr
									</th>
									<th width="4%;">
										GNQ Dep
									</th>
									<th width="4%;">
										GCC Arr
									</th>
									<th width="4%;">
										GCC Dep
									</th>
									<th width="4%;">
										Sign On
									</th>
									<th width="1%;">
										Location
									</th>
									<th width="6%;" style="display: none;">
										Type
									</th>
									<th width="4%;" style="display: none;">
										L/E
									</th>
									<th width="4%;" style="display: none;">
										Unit/s
									</th>
									<th width="6%;" style="display: none;">
										CMDT
									</th>
									<th width="6%;" style="display: none;">
										To
									</th>
									<th width="6%;" style="display: none;">
										From
									</th>
									<th width="7%;" style="z-index: 99;">
										Remark
									</th>
									<th width="4%;" class="text-center">
										Action
									</th>
									<cms:else_if my_toho eq '1' />
									<th width="4%;">
										Arr
									</th>
									<th width="4%;">
										Dep
									</th>
									<th width="4%;">
										Sign On
									</th>
									<th width="1%;">
										Location
									</th>
									<th width="6%;" style="display: none;">
										Type
									</th>
									<th width="4%;" style="display: none;">
										L/E
									</th>
									<th width="4%;" style="display: none;">
										Unit/s
									</th>
									<th width="6%;" style="display: none;">
										CMDT
									</th>
									<th width="6%;" style="display: none;">
										To
									</th>
									<th width="6%;" style="display: none;">
										From
									</th>
									<th width="7%;" style="z-index: 99;">
										Remark
									</th>
									<th width="4%;" class="text-center">
										Action
									</th>
									</cms:if>
								</tr>
							</thead>	
							<tbody>
								<cms:if my_toho eq '1'>
								<!-- Not Today's Interchange But Interchange with arrival date-->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged='1' | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | today_interchange<>1 " show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set arr_inter_ho ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'point-wise-intr.html' />	
								</cms:pages>
								<!-- Not Today's Interchange But Interchange with arrival date-->

								<!-- Interchange & today interchange with arrival date-->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged='1' | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | today_interchange=1 " show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set tdy_arr_inter_ho ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'point-wise-intr.html' />	
								</cms:pages>
								<!-- Interchange & today interchange with arrival date-->

								<!-- Not Interchange but today interchange with arrival date-->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged<>1 | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | today_interchange=1" show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set arr_nt_inter_ho ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'point-wise-intr.html' />
								</cms:pages>
								<!-- Not Interchange but today interchange with arrival date-->

								<!-- Not Interchange but today interchange with no arrival date-->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged<>1 | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date!=<cms:date my_today_yesterday format='Y-m-d' /> | today_interchange=1" show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set nt_inter_ho ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'point-wise-intr.html' />
								</cms:pages>
								<!-- Not Interchange but today interchange with no arrival date-->

								<cms:else_if my_toho eq '0' />
								<!-- Interchange with arrival date-->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged='1' | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> " show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set arr_inter_to ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'point-wise-intr.html' />	
								</cms:pages>
								<!-- Interchange with arrival date-->
								</cms:if>
								<!-- Not Interchange with arrival date-->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged<>1 | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | today_interchange<>1" show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set arr_nt_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'point-wise-intr.html' />
								</cms:pages>
								<!-- Not Interchange with arrival date-->

								<!-- Not Interchange with no arrival date-->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged<>1 | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date!=<cms:date my_today_yesterday format='Y-m-d' /> | today_interchange<>1" show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set nt_inter ="<cms:show k_total_records />" scope='global' />	
									<cms:embed 'point-wise-intr.html' />
								</cms:pages>
								<!-- Not Interchange with no arrival date-->
							</tbody>
						</table>
					</div>
					<cms:if my_toho eq '0'>
					<div class="gxcpl-card-body gxcpl-padding-10" style="line-height: 24px; text-align: left;">
						<strong>Forecasted:</strong><cms:add arr_inter_to "<cms:add arr_nt_inter nt_inter />" />
						<br>

						<strong>Already Interchanged: </strong><cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | <cms:gpc 'to_ho' method='get'  /> | is_interchanged=1 | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA" order='asc' orderby='arrival_time' count_only='1' />
						<br>				
					</div>
					<cms:else_if my_toho eq '1' />
					<div class="gxcpl-card-body gxcpl-padding-10" style="line-height: 24px; text-align: left;">
						<strong>Forecasted:</strong><cms:add tdy_arr_inter_ho "<cms:add arr_nt_inter_ho nt_inter_ho />" />
						<br>

						<strong>Already Interchanged: </strong><cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | <cms:gpc 'to_ho' method='get'  /> | is_interchanged=1 | to_ho=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " order='asc' orderby='departure_time' count_only='1' />
						<br>				
					</div>
					</cms:if>
				</div>
				</cms:if>
				<div class="gxcpl-ptop-30"></div>
			</div>
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
	<div class="modal fade emp-details" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>