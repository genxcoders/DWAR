<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Coal Report" clonable='1' parent='_coal_' order="3" />
<cms:embed 'header.html' />
<div class="container-fluid">
	<h4 class="gxcpl-no-margin">
		LOADING REPORT
	</h4>
	<!-- List View -->
	<div class="gxcpl-ptop-10"></div>
	<div class="gxcpl-divider-dark"></div>
	<div class="gxcpl-ptop-10"></div>
	
	<cms:embed 'searchcoal.html' />
	
	<cms:if my_search_str eq '' >

	<cms:else />
		<cms:set my_curr_date = "<cms:date format='Y-m-d' />" scope="global" />
		<cms:if (my_from_date gt my_curr_date) && (my_to_date gt my_curr_date)>
		    <div class="col-md-12">
		        <div class="alert alert-danger">
		            <i class="fa fa-exclamation-triangle fa-lg"></i> 
		            Error:<strong> From date and To date</strong> are greater than <strong>Current date </strong>
		        </div>
		    </div>
		<cms:else_if my_from_date gt my_to_date />
		    <div class="col-md-12">
		        <div class="alert alert-danger">
		            <i class="fa fa-exclamation-triangle fa-lg"></i> 
		            Error: <strong>From date </strong> is greater than <strong>To date </strong>.
		        </div>
		    </div>
		<cms:else_if my_to_date gt my_curr_date />
		    <div class="col-md-12">
		        <div class="alert alert-danger">
		            <i class="fa fa-exclamation-triangle fa-lg"></i> 
		            Error: <strong>To date </strong> is greater than <strong>Current date </strong>.
		        </div>
		    </div>
		<cms:else />
		    <!-- Coal Table -->
			<div class="col-md-12">		
				<!-- Card -->
				<div class="gxcpl-card">
					
					<!-- Body -->
					<div class="gxcpl-card-header">
						<div class="row">
							<div class="col-md-4 col-xs-12">
								<h5 class="gxcpl-no-margin">
									<strong>COAL REPORT FROM <cms:date "<cms:gpc 'from_date' method='get' />" format='d-m-Y' /> TO <cms:date "<cms:gpc 'to_date' method='get' />" format='d-m-Y' /></strong>
								</h5>
							 <div class="gxcpl-ptop-5"></div>
							</div>
							<div class="col-md-3 col-md-offset-5 col-xs-12 text-center" id="buttons"></div>
						</div>
					</div>
					
					<div class="gxcpl-card-body tableFixHead gxcpl-padding-15" style="overflow-x: auto;">
						<table class="display table table-bordered gxcpl-table-hover" id="example3" style="width: 100% ! important;">
							<thead>
								<tr>
									<!-- <th rowspan="2">Sr No</th> -->
									<th class="text-center" rowspan="2">Dt</th>
									<th class="text-center" rowspan="2">Ld Pt</th>
									<th class="text-center" rowspan="2">F/H</th>
									<th class="text-center" rowspan="2">Units</th>
									<th class="text-center" rowspan="2">Stock</th>
									<th class="text-center" rowspan="2">Desti</th>
									<th class="text-center" rowspan="2">Type</th>
									<th class="text-center" colspan="3">Rejection</th>
									<th class="text-center" colspan="3">BPC Particulars</th>
									<th class="text-center" colspan="3">Last Unldg. Pt.</th>
									<th class="text-center" rowspan="2">Remark</th>
									<th class="text-center" rowspan="2">Action</th>
								</tr>
								<tr>
									<th class="text-center" style="position: sticky; top: 34.6px;">No. Wgn</th>
									<th class="text-center" style="position: sticky; top: 34.5px;">Sr No.</th>
									<th class="text-center" style="position: sticky; top: 34.5px;">Reason</th>
									<th class="text-center" style="position: sticky; top: 34.5px;">Type</th>
									<th class="text-center" style="position: sticky; top: 34.5px;">Stn</th>
									<th class="text-center" style="position: sticky; top: 34.5px;">Dt</th>
									<th class="text-center" style="position: sticky; top: 34.5px;">%</th>
									<th class="text-center" style="position: sticky; top: 34.5px;">Stn</th>
									<th class="text-center" style="position: sticky; top: 34.5px;">Wgns</th>
								</tr>
							</thead>
							<cms:set fhtotal='0' scope='global' />
							<cms:set unttotal='0' scope='global' />
							<tbody>
								<cms:pages masterpage='coal.php' show_future_entries="1" custom_field="<cms:show my_search_str />" orderby="tdate" order="asc">
								<cms:no_results>
									<tr>
										<cms:if k_user_access_level gt '7'>
										<td colspan="18" class="text-center">
											- No Result - 
										</td>
										</cms:if>
									</tr>
								</cms:no_results>
								
									<tr>
										<td>
											<cms:date tdate format='d/m/Y' />
										</td>
										<td class="text-center">
											<cms:related_pages 'loading_point'>
												<cms:no_results>
													-NA-
												</cms:no_results>
												<cms:show k_page_title />
											</cms:related_pages>
										</td>
										<td class="text-center">
											<cms:if hlf_ful >
												<cms:number_format hlf_ful decimal_precision="1" />
											<cms:else />
												0
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if no_unit >
												<cms:show no_unit />
											<cms:else />
												0
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if stock = '-' || stock = '' >
												-NA-
											<cms:else />
												<cms:show stock />
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if desti >
												<cms:show desti />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if coal_type = '-' || coal_type = ''>
												-NA-
											<cms:else />
												<cms:show coal_type />
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if no_wgn_rjct >
												<cms:show no_wgn_rjct />
											<cms:else />
												0
											</cms:if>
										</td>
										<td class="text-center">
											<cms:show_repeatable 'my_repeatable'>
												<cms:if sr_no_rjct_wgn >
													<cms:show sr_no_rjct_wgn />
												<cms:else />
													-NA-
												</cms:if>
											</cms:show_repeatable>
										</td>
										<td class="text-center">
											<cms:show_repeatable 'my_repeatable'>
												<cms:if resn_rjct = '-'>
													-NA-
												<cms:else />
													<cms:show resn_rjct />
												</cms:if><br>
											</cms:show_repeatable>
										</td>
										<td class="text-center">
											<cms:if bpc_type = '-' || bpc_type = '' >
												-NA-
											<cms:else />
												<cms:show bpc_type />
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if bpc_stn >
												<cms:show bpc_stn />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if brkdt >
												<cms:date brkdt format="d/m/Y" />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if percentage >
												<cms:show percentage />
											<cms:else />
												0
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if unld_stn >
												<cms:show unld_stn />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if no_wagons >
												<cms:show no_wagons />
											<cms:else />
												0
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if colremrk >
												<cms:show colremrk />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:popup_edit 'tdate | loading_point | hlf_ful | no_unit | stock | desti | coal_type | colremrk | no_wgn_rjct | my_repeatable | bpc_type | bpc_stn | brkdt | percentage | unld_stn | no_wagons' link_text="<i class='fa fa-edit'></i>" />			
											<a href="<cms:add_querystring "<cms:route_link 'delete_coal' rt_id=k_page_id />" "url=coal-report.php&from_date=2019-10-01&to_date=2019-10-01&submit=Search&k_hid_search=search&nc=1" />" class="gxcpl-fw-700" data-toggle="tooltip" data-placement="top" title="DELETE">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
									
									<cms:set fhtotal = "<cms:add fhtotal hlf_ful />" scope='global' />

									<cms:set unttotal = "<cms:add unttotal no_unit />" scope='global' />
								</cms:pages>
								<tr>
									<td colspan="2"><strong>TOTAL</strong></td>
									<td style="display: none;"></td>
									<td class="text-center"><strong><cms:show fhtotal /></strong></td>
									<td class="text-center"><strong><cms:show unttotal /></strong></td>
									<td colspan="14"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- Body -->
				</div>
				<!-- Card -->
				<div class="gxcpl-ptop-50"></div>
			</div>
			<!-- Coal Table -->
		</cms:if>
	</cms:if>
	
</div>
<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>