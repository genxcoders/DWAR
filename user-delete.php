<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Employee Delete' parent='_users_' order='7' />
<cms:embed 'header.html' />
	<div class="container">
		<div class="row">
			<!-- Section Divider -->
			<div class="gxcpl-ptop-10"></div>
			<!-- <div class="gxcpl-divider-dark"></div> -->
			<div class="gxcpl-ptop-10"></div>
			<!-- Section Divider -->

			<cms:set my_page_id="<cms:gpc method='get' var='id' />"/>
			<cms:pages masterpage=k_user_template id=my_page_id limit='1'>
				<cms:set username="<cms:show ipt_fname /> <cms:show ipt_lname />" scope="global" />
			</cms:pages>

			<!-- make sure it is a valid value before using it -->
			<cms:if "<cms:validate my_page_id validator='non_zero_integer' />">
			<cms:form 
                masterpage=k_user_template
                mode='edit'
                page_id=my_page_id
                method='post' 
                anchor='0'
            >
            <cms:if k_success>
                <cms:db_delete_form />
                <cms:if k_success>
                    <cms:redirect url="user-list.php" /> 
                </cms:if>
            </cms:if>
            <div class="row">
				<div class="col-md-12">
					<div class="gxcpl-card">
						<div class="gxcpl-ptop-30"></div>
						<!-- Delete -->
							<div class="gxcpl-card-body">
                                <div class="text-center">
                                    Are you sure you want to delete <strong>"<cms:show username />"</strong> user?
                                    <div class="gxcpl-ptop-20"></div>
                                </div>
                            </div>
                            <div class="gxcpl-card-footer">
                            	<center>
                                	<cms:input name='submit' type="submit" class="btn btn-danger btn-xs gxcpl-fw-700 gxcpl-shadow-2" value="CONFIRM DELETE" />
                                    <button class="btn btn-default btn-xs gxcpl-fw-700 gxcpl-shadow-2" type="button" onclick="window.location.href='<cms:show k_site_link />user-list.php';">
                                        CANCEL
                                    </button>
                                </center>
                                <div class="gxcpl-ptop-5"></div>
                            </div>
						<!-- Delete -->
					</div>
				</div>
			</div>
			</cms:form>
            </cms:if>
		</div>
	</div>
    <div class="gxcpl-ptop-50"></div>
	<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>