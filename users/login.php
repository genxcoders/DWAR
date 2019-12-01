<?php require_once( '../couch/cms.php' ); ?>
<cms:template title='Login' hidden='1' parent='_users_' order="2" />
    <cms:embed 'header.html' />
    <cms:if k_logged_in >

        <!-- this 'login' template also handles 'logout' requests. Check if this is so -->
        <cms:set action="<cms:gpc 'act' method='get'/>" />
    
        <cms:if action='logout' >
            <cms:process_logout />
        <cms:else />  
            <!-- what is an already logged-in member doing on the login page? Send back to homepage. -->
            <cms:redirect k_site_link />
        </cms:if>
    
    <cms:else />
		<!-- Logo -->
		<img src="<cms:show k_site_link />assets/images/Railway.png" class="gxcpl-login-logo">
		<h3 class="text-center gxcpl-shadow-white gxcpl-fw-700">
			Data-warehousing & Analysis of Reports 
		</h3>
		<h4 class="text-center gxcpl-shadow-white gxcpl-fw-700">
			Nagpur Division, Central Railway
		</h4>
		<!-- Logo -->
		<div class="gxcpl-ptop-20"></div>
		<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="gxcpl-br-4 gxcpl-shadow-2 gxcpl-bg-white">
							<!-- Login Title -->
							<h3 class="gxcpl-no-margin text-center">
								<div class="gxcpl-ptop-10"></div>
								Login
								<div class="gxcpl-ptop-10"></div>
							</h3>
							<!-- Login Title -->
							<!-- Form -->
							<cms:form method='post' anchor='0'>
					            <cms:if k_success >
					                <!-- 
					                    The 'process_login' tag below expects fields named 
					                    'k_user_name', 'k_user_pwd' and (optionally) 'k_user_remember', 'k_cookie_test'
					                    in the form
					                -->
					                <cms:set username="<cms:gpc 'k_user_name' method='get' />" />
									<cms:set password="<cms:gpc 'k_user_pwd' method='get' />" />
									<cms:set cookie="<cms:gpc 'k_cookie_test' method='get' />" />
					                <cms:process_login redirect='1' />
					                
					            </cms:if>
					            
					            <cms:if k_error >
				                	<div class="row">
						                <cms:each k_error >
							                <div class="col-md-12 text-center">
												<div class="alert alert-danger gxcpl-shadow-1">
													<i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> <cms:show item />
												</div>
												<div class="gxcpl-ptop-20"></div>
											</div>
										</cms:each>
									</div>
								</cms:if>   
								<!-- Username -->
								<div class="col-md-12">
									<div class="gxcpl-padding-15">
										<div class="row">
											<!-- Username -->
											<div class="col-md-12">
												<label>Username</label>
												<cms:input name="k_user_name" type="text" class="gxcpl-input-text" aria-describedby="username" />
												<div class="gxcpl-ptop-10"></div>
											</div>
											<!-- Username -->
											<!-- Password -->
											<div class="col-md-12">
												<label>Password</label>
												<cms:input name="k_user_pwd" type="password" class="gxcpl-input-text" placeholder="" aria-describedby="password" />
												<div class="gxcpl-ptop-10"></div>
											</div>
											<!-- Password -->
											<div class="col-md-12 checkbox">
											    <label>
										      	<cms:input type='checkbox' name='k_user_remember' opt_values='Remember me on this machine=1' /> <br/> 
											    </label>
											</div>
										</div>
									</div>
								</div>
								
								<input type="hidden" name="k_cookie_test" value="1" />

								<center>
									<button type="submit" class="btn btn-danger btn-sm gxcpl-fw-700 gxcpl-shadow-2" >
										<i class="fa fa-sign-in"></i> LOGIN
									</button>
								</center>
								<div class="gxcpl-ptop-10"></div>
								<div class="gxcpl-ptop-5"></div>
							</cms:form>
							<!-- Form -->

							<div class="text-center">
								Forgot Password? <a href="<cms:link k_user_lost_password_template />">Click here</a>
							</div>
							<div class="gxcpl-ptop-10"></div>
							<div class="gxcpl-ptop-5"></div>
						</div>
					</div>
				</div>
			</div>
		</cms:if>
		<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>