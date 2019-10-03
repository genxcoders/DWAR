<?php require_once( '../couch/cms.php' ); ?>
<cms:template title='User Role' parent='_users_' order='7' clonable='1' >
	<cms:editable name='pointwise_interchange' label="Pointwise Interchange" type='group' order='1' />
		<cms:editable name='pointwise_interchange_officer' group='pointwise_interchange' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='pointwise_interchange_supervisor' group='pointwise_interchange' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='pointwise_interchange_train_clerk' group='pointwise_interchange' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

	<cms:editable name='pointwise_interchange_report' label="Pointwise Interchange Report" type='group' order='2' />
		<cms:editable name='pointwise_interchange_report_officer' group='pointwise_interchange_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='pointwise_interchange_report_supervisor' group='pointwise_interchange_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='pointwise_interchange_report_train_clerk' group='pointwise_interchange_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

	<cms:editable name='stable_train' label="Stable Train" type='group' order='3' />
		<cms:editable name='stable_train_officer' group='stable_train' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='stable_train_supervisor' group='stable_train' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='stable_train_clerk' group='stable_train' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

	<cms:editable name='coal' label="Coal" type='group' order='4' />
		<cms:editable name='coal_officer' group='coal' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='coal_supervisor' group='coal' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='coal_clerk' group='coal' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

	<cms:editable name='coal_report' label="Coal Report" type='group' order='5' />
		<cms:editable name='coal_report_officer' group='coal_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='coal_report_supervisor' group='coal_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='coal_report_clerk' group='coal_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

	<cms:editable name='transportation_report' label="Transportation Report" type='group' order='6' />
		<cms:editable name='transportation_report_officer' group='transportation_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='transportation_report_supervisor' group='transportation_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='transportation_report_clerk' group='transportation_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

	<cms:editable name='non_coal' label="Non-Coal" type='group' order='7' />
		<cms:editable name='non_coal_officer' group='non_coal' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='non_coal_supervisor' group='non_coal' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='non_coal_clerk' group='non_coal' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

	<cms:editable name='non_coal_report' label="Non-Coal Report" type='group' order='8' />
		<cms:editable name='non_coal_report_officer' group='non_coal_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='non_coal_report_supervisor' group='non_coal_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='non_coal_report_clerk' group='non_coal_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

	<cms:editable name='mid_night_position' label="Midnight Position" type='group' order='9' />
		<cms:editable name='mid_night_position_officer' group='mid_night_position' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='mid_night_position_supervisor' group='mid_night_position' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='mid_night_position_clerk' group='mid_night_position' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

	<cms:editable name='mid_night_position_report' label="Midnight Position Report" type='group' order='10' />
		<cms:editable name='mid_night_position_report_officer' group='mid_night_position_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='mid_night_position_report_supervisor' group='mid_night_position_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='mid_night_position_report_clerk' group='mid_night_position_report' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' /> 

	<cms:editable name='edit_users' label="Edit Users" type='group' order='11' />
		<cms:editable name='edit_users_officer' group='edit_users' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='edit_users_supervisor' group='edit_users' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='edit_users_clerk' group='edit_users' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' /> 

	<cms:editable name='add_users' label="Add Users" type='group' order='12' />
		<cms:editable name='add_users_officer' group='add_users' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='add_users_supervisor' group='add_users' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='add_users_clerk' group='add_users' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

	<cms:editable name='settings' label="Settings" type='group' order='13' />
		<cms:editable name='settings_officer' group='settings' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='1' />
		<cms:editable name='settings_supervisor' group='settings' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='2' />
		<cms:editable name='settings_clerk' group='settings' type='checkbox' opt_values='Create=1 || Read=2 || Update=3 || Delete=4' order='3' />

</cms:template>
<cms:embed 'header.html' />
	<div class="container-fluid">
		<div class="row">
			<cms:set submit_success="<cms:get_flash 'submit_success' />" />
		    <cms:if submit_success >
	    		<div class="col-md-12">
		    		<div class="alert alert-success">
		    			<strong>Success! </strong>Your application has been submitted.
		    		</div>
		    	</div>
		    </cms:if>

		    <cms:set my_template_name = 'users/users-role.php' />
		    <cms:set my_page_title = "User Role" />
		    
	        <cms:php>
	            global $CTX, $FUNCS;
	            $name = $FUNCS->get_clean_url( "<cms:show my_page_title />" );
	            $CTX->set( 'my_page_name', $name ); 
	        </cms:php>
	        <cms:set my_page_id='' 'global' />
	        <cms:pages masterpage=my_template_name page_name=my_page_name limit='1' show_future_entries='1'>
	            <cms:set my_page_id=k_page_id  'global' />
	        </cms:pages>  

		    <!-- 3. if 'my_page_id' is empty at this point, the page does not exist - so safe to create one now -->
		    <cms:if my_page_id=''>
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
			                _auto_title='0'
			                k_page_title = "User Roles"
			            />
			            <cms:if k_success >
				            <cms:set_flash name='submit_success' value='1' />
				            <cms:redirect k_page_link />
				        </cms:if>
			        </cms:if>

			        <cms:if k_error >
			            <div class="error">
			                <cms:each k_error >
			                    <br><cms:show item />
			                </cms:each>
			            </div>
			        </cms:if>
					<div class="col-md-12">
						<div class="gxcpl-card">
							<div class="gxcpl-card-header">
								<div class="row">
									<div class="col-md-3">
										
									</div>
									<div class="col-md-3">
										<strong>OFFICERS</strong>
									</div>
									<div class="col-md-3">
										<strong>SUPERVISOR</strong>
									</div>
									<div class="col-md-3">
										<strong>TRAIN CLERK</strong>
									</div>
								</div>
							</div>
							<!-- Pointwise Interchange Entry Sheet -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>POINTWISE INTERCHANGE ENTRY SHEET</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_train_clerk" value="<cms:show pointwise_interchange_train_clerk />" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Pointwise Interchange Entry Sheet -->
							<!-- Pointwise Interchange Report -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>POINTWISE INTERCHANGE REPORT</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_report_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_report_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_report_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Pointwise Interchange Report -->
							<!-- Stable Train -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>STABLE TRAIN</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="stable_train_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="stable_train_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="stable_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Stable Train -->
							<!-- Coal Entry Sheet -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>COAL ENTRY SHEET</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Coal Entry Sheet -->
							<!-- Coal Report -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>COAL REPORT</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_report_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_report_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_report_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Coal Report -->
							<!-- Transportation Report -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>TRANSPORTATION REPORT</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="transportation_report_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="transportation_report_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="transportation_report_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Transportation Report -->
							<!-- Non-Coal Entry Sheet -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>NON-COAL ENTRY SHEET</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Non-Coal Entry Sheet -->
							<!-- Non-Coal Report -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>NON-COAL REPORT</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_report_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_report_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_report_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Non-Coal Report -->
							<!-- Midnight Position -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>MID NIGHT POSITION</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Midnight Position -->
							<!-- Midnight Position Report -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>MID NIGHT POSITION REPORT</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_report_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_report_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_report_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Midnight Position Report -->
							<!-- Edit Users -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>EDIT USERS</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="edit_users_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="edit_users_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="edit_users_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Edit Users -->
							<!-- Add Users -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>ADD USERS</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="add_users_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="add_users_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="add_users_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Add Users -->
							<!-- Settings -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>SETTINGS</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="settings_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="settings_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="settings_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Settings -->
							<div class="gxcpl-card-footer">
								<button type="submit" class="btn btn-danger gxcpl-fw-700" name="user_roles">
									<i class="fa fa-save"></i> SAVE
								</button>
							</div>
						</div>
					</div>
				</cms:form>

			<cms:else />
			
				<cms:form
			        masterpage=k_template_name
			        mode='edit'
			        page_id='<cms:show my_page_id />'
			        enctype='multipart/form-data'
			        method='post'
			        anchor='0'
			    	>

			        <cms:if k_success >
			            <cms:db_persist_form
			                _invalidate_cache='0'
			                _auto_title='0'
			                k_page_title = "User Roles"
			            />
			            <cms:if k_success >
				            <cms:set_flash name='submit_success' value='1' />
				            <cms:redirect k_page_link />
				        </cms:if>
			        </cms:if>

			        <cms:if k_error >
			            <div class="error">
			                <cms:each k_error >
			                    <br><cms:show item />
			                </cms:each>
			            </div>
			        </cms:if>
					<div class="col-md-12">
						<div class="gxcpl-card">
							<div class="gxcpl-card-header">
								<div class="row">
									<div class="col-md-3">
										
									</div>
									<div class="col-md-3">
										<strong>OFFICERS</strong>
									</div>
									<div class="col-md-3">
										<strong>SUPERVISOR</strong>
									</div>
									<div class="col-md-3">
										<strong>TRAIN CLERK</strong>
									</div>
								</div>
							</div>
							<!-- Pointwise Interchange Entry Sheet -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>POINTWISE INTERCHANGE ENTRY SHEET</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_train_clerk" value="<cms:show pointwise_interchange_train_clerk />"/>
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Pointwise Interchange Entry Sheet -->
							<!-- Pointwise Interchange Report -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>POINTWISE INTERCHANGE REPORT</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_report_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_report_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="pointwise_interchange_report_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Pointwise Interchange Report -->
							<!-- Stable Train -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>STABLE TRAIN</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="stable_train_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="stable_train_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="stable_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Stable Train -->
							<!-- Coal Entry Sheet -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>COAL ENTRY SHEET</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Coal Entry Sheet -->
							<!-- Coal Report -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>COAL REPORT</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_report_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_report_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="coal_report_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Coal Report -->
							<!-- Transportation Report -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>TRANSPORTATION REPORT</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="transportation_report_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="transportation_report_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="transportation_report_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Transportation Report -->
							<!-- Non-Coal Entry Sheet -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>NON-COAL ENTRY SHEET</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Non-Coal Entry Sheet -->
							<!-- Non-Coal Report -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>NON-COAL REPORT</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_report_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_report_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="non_coal_report_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Non-Coal Report -->
							<!-- Midnight Position -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>MID NIGHT POSITION</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Midnight Position -->
							<!-- Midnight Position Report -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>MID NIGHT POSITION REPORT</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_report_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_report_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="mid_night_position_report_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Midnight Position Report -->
							<!-- Edit Users -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>EDIT USERS</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="edit_users_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="edit_users_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="edit_users_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Edit Users -->
							<!-- Add Users -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>ADD USERS</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="add_users_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="add_users_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="add_users_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Add Users -->
							<!-- Settings -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<div class="row">
									<div class="col-md-3">
										<strong>SETTINGS</strong>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="settings_officer" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="settings_supervisor" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="row">
											<div class="col-md-12">
												<cms:input type="bound" name="settings_train_clerk" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Settings -->
							<div class="gxcpl-card-footer">
								<button type="submit" class="btn btn-danger gxcpl-fw-700" name="user_roles">
									<i class="fa fa-save"></i> SAVE
								</button>
							</div>
						</div>
					</div>
				</cms:form>
			</cms:if>
		</div>
		<div class="gxcpl-ptop-50"></div>
	</div>
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>