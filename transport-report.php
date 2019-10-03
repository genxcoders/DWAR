<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Transport Report" clonable='1' parent='_coal_' order="4" />
<cms:embed "header.html" />
<div class="container-fluid">
	<div class="gxcpl-ptop-50"></div>
	<h4 class="gxcpl-no-margin">
	    TRANSPORTATION REPORT
	</h4>
	<!-- List View -->
	<div class="gxcpl-ptop-10"></div>
	<div class="gxcpl-divider-dark"></div>
	<div class="gxcpl-ptop-20"></div>
	<cms:embed 'searchtrans.html' />
	<cms:if transdate!="<cms:show my_search_str />">

	<!-- Transportation Table -->
	<div class="col-md-12">
		<div class="gxcpl-card">
			<div class="gxcpl-card-header">
				<h4>TRANSPORTATION</h4>
			</div>
			<div class="gxcpl-card-body	tableFixHead" style="overflow-x: auto;">
				<table class="gxcpl-table" width="100%" >
					<thead>
						<tr>
							<th class="text-center" rowspan="2" style="padding: 0;">Sr No</th>
							<th class="text-center" rowspan="2" style="padding: 0;">Dt</th>
							<th class="text-center" rowspan="2" style="padding: 0;">Siding</th>
							<th class="text-center" rowspan="2" style="padding: 0;">Tons</th>
							<!-- <th class="text-center" rowspan="2" style="padding: 0;">Action</th> -->
						</tr>
					</thead>
					<cms:set tontotal='0' scope='global' />
					<tbody>
						<cms:pages masterpage='transport.php' show_future_entries="1" custom_field="<cms:show my_search_str />"  >
							<cms:no_results>
								<tr>
									<cms:if k_user_access_level gt '7'>
									<td colspan="5" class="text-center">
										- No Result -
									</td>
									</cms:if>
								</tr>
							</cms:no_results>

								<tr>
									<td class="text-center" style="padding: 0;">
										<cms:show k_absolute_count />
									</td>
									<td class="text-center" style="padding: 0;">
										<cms:date transdate format="d/m/Y" />
									</td>
									<td class="text-center" style="padding: 0;">
										<cms:related_pages 'siding'>
											<cms:no_results>
												-NA-
											</cms:no_results>
											<cms:show k_page_title />
										</cms:related_pages>
									</td>
									<td class="text-center" style="padding: 0;">
										<cms:if tons >
											<cms:show tons />
										<cms:else />
											-NA-
										</cms:if>
									</td>	
								</tr>
								<cms:set tontotal = "<cms:add tontotal tons />" scope='global' />
						
						</cms:pages>
					</tbody>
				</table>
			</div>

			<div class="gxcpl-card-footer" style="line-height: 25px; margin-left: -80px;">
				<div class="row">
					<div class="col-md-11 text-right">
						<strong>Total Tons:</strong>
					</div>
					<div class="col-md-1" style="text-align: right; padding-left:0;">
						<cms:show tontotal />
					</div>
				</div>
			</div>

		</div>
		<div class="gxcpl-ptop-50"></div>
	</div>
	<!-- Transportation Table -->
	
	<cms:else />
	</cms:if>
</div>
<cms:embed "footer.html" />
<?php COUCH::invoke( ); ?>