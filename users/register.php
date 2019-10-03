<?php require_once( '../couch/cms.php' ); ?>
<cms:template title='Registration' hidden='1' parent='_users_' order="3" />
    <cms:embed 'header.html' />
			<!-- Content Here -->
		<div class="container">
			<div class="row">
				<div class="gxcpl-ptop-30"></div>

				<!-- Section Title -->
				<div class="col-md-10">
					<h4 class="gxcpl-no-margin">
						ADD USERS
						<div class="gxcpl-ptop-10"></div>
						<div class="gxcpl-divider-dark"></div>
						<div class="gxcpl-ptop-20"></div>
					</h4>
				</div>
				<div class="col-md-2">
					<button class="btn btn-warning btn-sm gxcpl-fw-700 gxcpl-shadow-2" type="button" onclick="window.location.href='<cms:show k_site_link />user-list.php';">
						<i class="fa fa-eye"></i> VIEW USERS LIST
					</button>
				</div>
				<!-- Section Title -->

				<!-- Section Divider -->
				<div class="gxcpl-ptop-10"></div>
				<!-- <div class="gxcpl-divider-dark"></div> -->
				<div class="gxcpl-ptop-10"></div>
				<!-- Section Divider -->
				<cms:set success_msg="<cms:get_flash 'success_msg' />" />
				    <cms:if success_msg >
				    	<div class="col-md-12 text-center">
							<div class="alert alert-success gxcpl-shadow-1">
								<strong>Success!</strong> Account has been created successfully and we have sent an email to the registered email id with the employee username and password.
							</div>
							<div class="gxcpl-ptop-20"></div>
						</div>
				    </cms:if>
				<!-- Form -->
				<cms:form 
	                masterpage=k_user_template 
	                mode='create'
	                enctype='multipart/form-data'
	                method='post'
	                anchor='0'
	                user_access_level="<cms:show frm_access_level />"
	                >

                    <cms:if k_success >        

	                    <cms:check_spam email=frm_extended_user_email />            

	                    <cms:db_persist_form 
	                        _invalidate_cache='0'
	                        k_page_title = "<cms:show frm_ipt_fname />_<cms:show frm_ipt_lname />"
	                        k_page_name = "<cms:show frm_ipt_mobile_number />"
	                    /> 
	                    <cms:if k_success >
	                        <cms:db_persist
	                        	_masterpage=k_user_template
	                        	_auto_title='0'
	                        	_mode='edit'
	                        	_page_id="<cms:show k_last_insert_id />"
	                        	ipt_role="<cms:related_pages 'ipt_role'><cms:show k_page_title /></cms:related_pages>"
	                        >
	                        	<cms:if k_error>
	                        		<cms:each k_error>
	                        			<cms:show item /><br>
	                        		</cms:each>
	                        	<cms:else_if k_success />
	                        		<cms:send_mail from="<cms:php>echo K_EMAIL_FROM;</cms:php>" to=frm_extended_user_email subject='New Account Confirmation' debug='1'>
			                            Please click the following link to activate your account:
			                            <cms:activation_link frm_extended_user_email />

			                            Thanks,
			                            Website Name
			                        </cms:send_mail>                        
			                                                
			                        <cms:set_flash name='success_msg' value='1' />
			                        <cms:redirect k_page_link />
	                        	</cms:if>
	                    	</cms:db_persist>		                        
	                    </cms:if> 
	                </cms:if>
	                <cms:if k_error >
	                	<div class="row">
			                <cms:each k_error >
				                <div class="col-md-4 text-center">
									<div class="alert alert-danger gxcpl-shadow-1">
										<cms:show item />
									</div>
									<div class="gxcpl-ptop-20"></div>
								</div>
							</cms:each>
						</div>
					</cms:if>
						<cms:input class="gxcpl-input-text" name='access_level' type='text' value='7' />
					<div class="row">               
						<div class="col-md-12">
							<div class="gxcpl-card ">
								<div class="gxcpl-card-body gxcpl-padding-30">
									<div class="row">
										<!-- First Name -->
										<div class="col-md-6">
											<label>First Name*</label>
											<cms:input class="gxcpl-input-text" type="bound" name="ipt_fname" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<!-- First Name -->
										<!-- Last Name -->
										<div class="col-md-6">
											<label>Last Name*</label>
											<cms:input class="gxcpl-input-text" type="bound" name="ipt_lname" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<!-- Last Name -->

										<!-- Email -->
										<div class="col-md-3">
											<label>Email*</label>
											<cms:input class="gxcpl-input-text" name='extended_user_email' type='bound' />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<!-- Email -->

										<!-- Designation -->
										<div class="col-md-3">
											<label>Designation*</label>
											<cms:input class="gxcpl-input-text" name='ipt_desig' type='bound' />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<!-- Designation -->
										<!-- Role -->
										<div class="col-md-3">
											<label>Role*</label><br>
											<cms:input class="gxcpl-input-text" name="ipt_role" type="bound" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<!-- Role -->
										<!-- Mobile No -->
										<div class="col-md-3">
											<label>Mobile No*</label>
											<cms:input class="gxcpl-input-text" type="bound" name="ipt_mobile_number" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<!-- Mobile No -->

										<!-- Mobile No -->
										<div class="col-md-12">
											<label>Permissions</label>
											<cms:input class="gxcpl-input-text" type="bound" name="admin_only_permissions" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<!-- Mobile No -->

										<div class="col-md-12">
											asd
											<cms:templatelist name='admin_only_permissions' help='1' />
										</div>

										<!-- Password -->
										<div class="col-md-6">
											<label>Password*</label>
											<cms:input class="gxcpl-input-text" name='extended_user_password' type='bound' />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<!-- Password -->
										<!-- Repeat Password -->
										<div class="col-md-6">
											<label>Repeat Password*</label>
											<cms:input class="gxcpl-input-text" name='extended_user_password_repeat' type='bound' />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<!-- Password -->
									</div>
								</div>
								<!-- Footer -->
								<div class="gxcpl-card-footer">			
									<button type="submit" class="btn btn-danger btn-sm gxcpl-fw-700">
										<i class="fa fa-plus"></i> ADD USER
									</button>
								</div>
								<!-- Footer -->
							</div>
						</div>
					</div>
				</cms:form>
			</div>
		</div>
		<div class="gxcpl-ptop-50"></div>
		<div class="gxcpl-ptop-50"></div>
		<!-- Content Here -->
	<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>