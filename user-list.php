<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Employee List' parent='_users_' order='4' >

</cms:template>
<cms:embed 'header.html' />

			<div class="container">
				<div class="row">
					<div class="gxcpl-ptop-30"></div>

					<!-- Section Title -->
					<div class="col-md-11">
						<h4 class="gxcpl-no-margin">
							USER LIST
							<div class="gxcpl-ptop-10"></div>
							<div class="gxcpl-divider-dark"></div>
							<div class="gxcpl-ptop-20"></div>
						</h4>
					</div>
					<div class="col-md-1">
						<cms:if k_user_access_level gt '7'>
							<button class="btn btn-danger btn-sm gxcpl-shadow-2 gxcpl-fw-700" type="button" style="margin-left: -30px;" onclick="window.location.href='<cms:link k_user_registration_template />';"><i class="fa fa-plus"></i> ADD USER</button>
						</cms:if>
					</div>
					<!-- Section Title -->

					<!-- Section Divider -->
					<div class="gxcpl-ptop-10"></div>
					<!-- <div class="gxcpl-divider-dark"></div> -->
					<div class="gxcpl-ptop-10"></div>
					<!-- Section Divider -->
					<!-- Table -->
					<div class="col-md-12">
						<!-- Card -->
						<div class="gxcpl-card">
							<!-- Body -->
							<div class="gxcpl-card-body gxcpl-padding-15">
								<table class="gxcpl-table ">
									<thead>
										<tr>
											<th>
												Sr. No.
											</th>
											<th>
												Name
											</th>
											<th>
												Designation
											</th>
											<th>
												Role
											</th>
											<th>
												Mobile Number
											</th>
											<th class="text-center">
												Action
											</th>
										</tr>
									</thead>
									<tbody>
										<cms:pages masterpage=k_user_template show_future_entries="1" paginate='1' limit='10' custom_field="extended_user_id > 1">
										<cms:no_results>
										<tr>
											<cms:if k_user_access_level gt '7'>
												<td colspan="6" class="text-center">
													- No Result -
												</td>
											</cms:if>
										</tr>
										</cms:no_results>
										<tr>
											<td>
												<cms:show k_absolute_count />
											</td>
											<td>
												<cms:show ipt_fname /> <cms:show ipt_lname />
											</td>
											<td>
												<cms:show ipt_desig />
											</td>
											<td>
												<cms:related_pages 'ipt_role' ><cms:show k_page_title /></cms:related_pages>
											</td>
											<td>
												<cms:show ipt_mobile_number />
											</td>
											<td class="text-center">
												<a href="<cms:show k_site_link />users/user-edit.php?id=<cms:show k_page_id />" class="btn btn-primary btn-xs gxcpl-fw-700" data-toggle="tooltip" data-placement="top" title="EDIT">
													<i class="fa fa-edit"></i>
												</a>
												<!-- <cms:if k_user_access_level gt '7'> -->
													<a href="<cms:show k_site_link />user-delete.php?id=<cms:show k_page_id />" class="btn btn-danger btn-xs gxcpl-fw-700" data-toggle="tooltip" data-placement="top" title="DELETE">
													<i class="fa fa-trash"></i>
												</a>
												<!-- </cms:if> -->
											</td>
										</tr>
										</cms:pages>
									</tbody>
								</table>
							</div>
							<!-- Body -->
							<!-- Pagination -->
								<center>
									<div class="btn-group gxcpl-fw-500" role="group">
										<cms:pages show_future_entries="1" paginate='1' limit='10' >
											<cms:paginator />
										</cms:pages>
									</div>
								</center>
								<!-- Pagination -->
						</div>
						<!-- Card -->
						<div class="gxcpl-ptop-30"></div>
					</div>
					<!-- Table -->

				</div>
				<div class="gxcpl-ptop-50"></div>
			</div>
		<!-- Site Container -->
		<div class="gxcpl-ptop-50"></div>
	<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>