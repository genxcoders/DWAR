<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Coal Report" clonable='1' parent='_coal_' order="3" />
<cms:embed 'header.html' />
<div class="container-fluid">
	<div class="gxcpl-ptop-50"></div>
	<h4 class="gxcpl-no-margin">
		GENERATE COAL REPORT
	</h4>
	<!-- List View -->
	<div class="gxcpl-ptop-10"></div>
	<div class="gxcpl-divider-dark"></div>
	<div class="gxcpl-ptop-20"></div>
	
	<cms:embed 'searchcoal.html' />
	
	<cms:if my_search_str eq '' >

	<cms:else />

	<!-- Coal Table -->
	<div class="col-md-12">		
		<!-- Card -->
		<div class="gxcpl-card">
			
			<!-- Body -->
			<div class="gxcpl-card-header">
				<h4>COAL REPORT FROM <cms:date "<cms:gpc 'from_date' method='get' />" format='d/m/Y' /> TO <cms:date "<cms:gpc 'to_date' method='get' />" format='d/m/Y' /></h4>
			</div>
			
			<div class="gxcpl-card-body	scroll" style="overflow-x: auto;">
				<table class="gxcpl-table" width="100%">
					<thead>
						<tr>
							<th class="text-center" rowspan="2">Sr No</th>
							<th class="text-center" rowspan="2">Dt</th>
							<th class="text-center" rowspan="2">Ld Pt</th>
							<th class="text-center" rowspan="2">F/H</th>
							<th class="text-center" rowspan="2">Units</th>
							<th class="text-center" rowspan="2">Stock</th>
							<th class="text-center" rowspan="2">Desti</th>
							<th class="text-center" rowspan="2">Type</th>
							<th class="text-center" colspan="3">Rejection</th>
							<th class="text-center" colspan="4">BPC Particulars</th>
							<th class="text-center" colspan="2">Last Unldg. Pt.</th>
							<th class="text-center" rowspan="2">Remark</th>
							<!-- <th class="text-center" rowspan="2">Action</th> -->
						</tr>
						
						<tr>	
							<th class="text-center">No. Wgn</th>
							<th class="text-center">Sr No.</th>
							<th class="text-center">Reason</th>
							<th class="text-center">Type</th>
							<th class="text-center">Stn</th>
							<th class="text-center">Dt</th>
							<th class="text-center">%age</th>
							<th class="text-center">Stn</th>
							<th class="text-center">Wgns</th>
						</tr>
					</thead>
					<cms:set fhtotal='0' scope='global' />
					<cms:set unttotal='0' scope='global' />
					<tbody>
						<cms:pages masterpage='coal.php' show_future_entries="1" custom_field="<cms:show my_search_str />" >
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
									<td class="text-center">
										<cms:show k_absolute_count />
									</td>
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
											<cms:show hlf_ful />
										<cms:else />
											-NA-
										</cms:if>
									</td>
									<td class="text-center">
										<cms:if no_unit >
											<cms:show no_unit />
										<cms:else />
											-NA-
										</cms:if>
									</td>
									<td class="text-center">
										<cms:if stock = '-' >
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
										<cms:if coal_type = '-'>
											-NA-
										<cms:else />
											<cms:show coal_type />
										</cms:if>
									</td>
									<td class="text-center">
										<cms:if no_wgn_rjct >
											<cms:show no_wgn_rjct />
										<cms:else />
											-NA-
										</cms:if>
									</td>
									<td class="text-center">
										<cms:show_repeatable 'my_repeatable'>
											<cms:if sr_no_rjct_wgn >
												<cms:show sr_no_rjct_wgn />
											<cms:else />
												-NA-
											</cms:if><br>
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
										<cms:if bpc_type = '-' >
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
											-NA-
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
											-NA-
										</cms:if>
									</td>
									<td class="text-center">
										<cms:if colremrk >
											<cms:show colremrk />
										<cms:else />
											-NA-
										</cms:if>
									</td>
								</tr>
								
								<cms:set fhtotal = "<cms:add fhtotal hlf_ful />" scope='global' />

								<cms:set unttotal = "<cms:add unttotal no_unit />" scope='global' />
						</cms:pages>
					</tbody>
				</table>
			</div>

			<div class="gxcpl-card-footer" style="line-height: 24px; text-align: left;">
				<div class="row">
					<div class="col-md-1">
					&nbsp;
					</div>
					<div class="col-md-2 text-right" style="margin-left: -30px;">
						<strong>Total</strong>
						<strong>F/H:</strong> <cms:show fhtotal />
						<strong>U:</strong> <cms:show unttotal />
					</div>
				</div>
			</div>
			<!-- Body -->
		</div>
		<!-- Card -->
		<div class="gxcpl-ptop-50"></div>
	</div>

	<!-- Coal Table -->
	</cms:if>
	
</div>
<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>