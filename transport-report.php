<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Transport Report" clonable='1' parent='_coal_' order="4" />
<cms:embed "header.html" />
<div class="container-fluid">
	<h4 class="gxcpl-no-margin">
	    DAILY TRANSPORTATION REPORT
	</h4>
	<!-- List View -->
	<div class="gxcpl-ptop-10"></div>
	<div class="gxcpl-divider-dark"></div>
	<div class="gxcpl-ptop-10"></div>
	<cms:embed 'searchtrnsrport.html' />

	<cms:if my_search_str eq '' >

	<cms:else />

	<!-- Transportation Table -->
	<div class="col-md-12">
		<div class="gxcpl-card">
			<!-- Body -->
			<div class="gxcpl-card-header">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="row">
							<div class="col-md-5 col-xs-12">
								<h5 class="gxcpl-no-margin">
									<strong>TRANSPORTATION REPORT FROM <cms:date "<cms:gpc 'from_date' method='get' />" format='d-m-Y' /> TO <cms:date "<cms:gpc 'to_date' method='get' />" format='d-m-Y' /></strong>
								</h5>
								<div class="gxcpl-ptop-5"></div>
							</div>
							<div class="col-md-3 col-md-offset-4 col-xs-12 text-center" id="buttons"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="gxcpl-card-body	tableFixHead gxcpl-padding-15" style="overflow-x: auto;">
				<table class="display table table-bordered" id="example4" style="width: 100% ! important;">
					<thead>
						<tr>
							<th class="text-center">Sr. No.</th>
							<th class="text-center">Date</th>
							<th class="text-center">Siding</th>
							<th class="text-center">Tons</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<cms:set tontotal='0' scope='global' />
					<tbody>
						<cms:pages masterpage='transport.php' show_future_entries="1" custom_field="<cms:show my_search_str />" orderby="transdate" order="asc" >
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
								<td class="text-center">
									<cms:show k_absolute_count />
								</td>
								<td class="text-center">
									<cms:date transdate format="d/m/Y" />
								</td>
								<td class="text-center">
									<cms:related_pages 'siding'>
										<cms:no_results>
											-NA-
										</cms:no_results>
										<cms:show k_page_title />
									</cms:related_pages>
								</td>
								<td class="text-center">
									<cms:if tons >
										<cms:show tons />
									<cms:else />
										-NA-
									</cms:if>
								</td>
								<td class="text-center">
									<cms:popup_edit ' siding | tons | transdate' link_text="<i class='fa fa-edit'></i>" />
									<a href="<cms:add_querystring "<cms:route_link 'delete_trans' rt_id=k_page_id />" "url=transport-report.php&from_date=<cms:date "<cms:gpc 'from_date' method='get' />" format='Y-m-d' />
									&to_date=<cms:date "<cms:gpc 'to_date' method='get' />" format='Y-m-d' />
									&submit=Search
									&k_hid_search=search
									&nc=1" />">
										<i class="fa fa-trash"></i>
									</a>
								</td>	
							</tr>
							<cms:set tontotal = "<cms:add tontotal tons />" scope='global' />
						</cms:pages>
							<tr>
								<td colspan="3" class="text-right">
									<strong>Total Tons:</strong>
								</td>
								<td style="display: none;"></td>
								<td style="display: none;"></td>
								<td class="text-center">
									<strong><cms:show tontotal /></strong>
								</td>
								<td></td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="gxcpl-ptop-50"></div>
	</div>
	<!-- Transportation Table -->
	</cms:if>
</div>
<div class="gxcpl-ptop-50"></div>
<cms:embed "footer.html" />
<?php COUCH::invoke( ); ?>