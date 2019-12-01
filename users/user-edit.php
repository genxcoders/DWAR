<?php require_once( '../couch/cms.php' ); ?>
<cms:template title='Employee Edit' parent='_users_' order='5' />
<cms:embed 'header.html' />

			<div class="container">
				<div class="row">
					<!-- Section Title -->
					<div class="col-md-11 col-xs-9">
						<h4 class="gxcpl-no-margin">
							USER EDIT
						</h4>
					</div>
					<div class="col-md-1 col-xs-3">
						<button onclick="window.location.href='../user-list.php';" class="btn btn-danger btn-sm gxcpl-shadow-2 gxcpl-fw-700" type="button" data-toggle="tooltip" data-placement="top" title="LIST VIEW">
							<i class="fa fa-list fa-lg"></i> 
						</button>
					</div>
					<!-- Section Title -->
				</div>
				<div class="gxcpl-ptop-10"></div>
				<div class="gxcpl-divider-dark"></div>
				<div class="gxcpl-ptop-20"></div>
					<cms:set success_msg="<cms:get_flash 'success_msg' />" />
					    <cms:if success_msg >
					    	<div class="col-md-12">
								<div class="alert alert-success gxcpl-shadow-1">
									<strong>Success!</strong> Account has been updated succesfully !
								</div>
								<div class="gxcpl-ptop-20"></div>
							</div>
					    </cms:if>
					<!-- Form -->
					<cms:set my_page_id="<cms:gpc method='get' var='id' />"/>

					<!-- make sure it is a valid value before using it -->
				<div class="row">
					<cms:if "<cms:validate my_page_id validator='non_zero_integer' />">
					<cms:form 
		                masterpage=k_user_template 
		                mode='edit'
		                page_id=my_page_id
		                enctype='multipart/form-data'
		                method='post'
		                anchor='0'
		                >

	                <cms:if k_success >
				        <cms:db_persist_form />

				        <cms:if k_success >
				            <cms:set_flash name='success_msg' value='1' />
				            <cms:redirect url="<cms:show k_site_link />users/user-edit.php?id=<cms:show my_page_id />" /> 
				        </cms:if>
				    </cms:if>      
					<cms:if k_error >
						<div class="col-md-12">
							<cms:each k_error >
								<div class="alert alert-danger">
									<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> 
									<cms:show item />
								</div>
							</cms:each>
						</div>
					</cms:if>                       
					<div class="col-md-12">
						<div class="gxcpl-card ">
							<div class="gxcpl-card-body gxcpl-padding-15">
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
										<cms:input class="gxcpl-input-text" name="ipt_role" type="bound"/>
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
									<!-- Password -->
                                    <div class="gxcpl-ptop-20"></div>
                                    <div class="gxcpl-fc-light-red text-center">
                                        <!-- Message for editing password -->
                                        <small><strong>Enter values in <em>Password</em> and <em>Repeat Password</em> fields only is you want to change the password.</strong></small>
                                        <!-- Message for editing password -->
                                    </div>
                                    <div class="gxcpl-ptop-20"></div>
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
									<!-- Repeat Password -->
								</div>
							</div>
							<!-- Footer -->
							<div class="gxcpl-card-footer gxcpl-no-padding">			
								<button type="submit" class="btn btn-danger btn-sm gxcpl-fw-700">
									<i class="fa fa-save fa-lg"></i> UPDATE USER
								</button>
							</div>
							<!-- Footer -->
						</div>
					</div>
					</cms:form>
					</cms:if>
					<!-- From -->
				</div>
			</div>
		<!-- Site Container -->
		<div class="gxcpl-ptop-50"></div>
	<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>