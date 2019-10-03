<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Dashboard" order="2" />
	<cms:embed 'header.html' />
	<style type="text/css">
		.nav-tabs {
		    border-bottom: 1px solid transparent !important;
		    margin-left: 15px;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="gxcpl-ptop-30"></div>
			<cms:set current = "<cms:date format='Y-m-d' />" scope='global' />
			<cms:set yesterday = "<cms:date return='yesterday' format='Y-m-d'/>" scope='global' />
			<cms:set td_yd = "<cms:date my_today_yesterday format='Y-m-d' />" scope='global' />
			<!-- Section Title -->
			<div class="gxcpl-tab">
				<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=<cms:show my_icp /> | to_ho=<cms:show my_toho /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | is_interchanged='1' " show_future_entries='1' limit="1">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#today_yesterday0" aria-controls="today_yesterday0" role="tab" data-toggle="tab">TODAY</a>
					</li>
					<li role="presentation">
						<a href="#today_yesterday1" aria-controls="today_yesterday1" role="tab" data-toggle="tab">YESTERDAY</a>
					</li>
				</ul>
				</cms:pages>
				<div class="gxcpl-ptop-20"></div>
				<div class="tab-content">
					<!-- Today -->
					<div role="tabpanel" class="tab-pane active" id="today_yesterday0">
						<!-- ET -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date my_today_yesterday format='Y-m-d' />&interchange=ET&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21">
								<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
									<h6 class="text-center">
										<div class="text-center gxcpl-dashboard-box-card">
											<strong>ET</strong>
										</div>
										<div class="gxcpl-dashboard-box-card">
											<!-- ET SET TO COUNT -->
											<cms:set et_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=ET | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- ET SET TO COUNT -->
											<!-- ET SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set et_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=ET | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- ET SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- ET SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set et_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=ET | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- ET SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- ET SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set et_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=ET | is_interchanged<>'1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- ET SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- ET SET HO CARRY FORWARD COUNT -->
											<cms:set et_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=ET | is_interchanged<>'1' | arrival_date<=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- ET SET HO CARRY FORWARD COUNT -->
											<cms:set add_et_int_ho = "<cms:add et_ho et_int_ho />" scope='global' />

											<cms:set add_et_ho = "<cms:add et_ho "<cms:add et_cry_ho et_td_int_ho />" />"scope='global' />

											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr>
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr>
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:show et_to />
													</td>
													<td class="text-center gxcpl-table-padding"><cms:show add_et_int_ho />/<cms:show add_et_ho /></td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
										<div class="gxcpl-ptop-10"></div>
										<strong><center>Point-Wise</center></strong>
										<div class="gxcpl-ptop-10"></div>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr>
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													ET
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show et_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_et_int_ho />/<cms:show add_et_ho />
												</td>
											</tr>
										</table>
										<!-- INDIVIDUAL TO & HO -->
									</h6>
								</div>
							</a>
						</div>
						<!-- ET -->
						<!-- BD -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date my_today_yesterday format='Y-m-d' />&interchange=BD&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21">
								<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
									<h6 class="text-center">
										<div class="text-center gxcpl-dashboard-box-card">
											<strong>BD</strong>
										</div>
										<div class="gxcpl-dashboard-box-card">
											<!-- BD SET TO COUNT -->
											<cms:set bd_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BD | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BD SET TO COUNT -->
											<!-- BD SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set bd_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BD | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BD SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- BD SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set bd_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BD | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BD SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- BD SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set bd_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BD | is_interchanged<>'1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BD SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- BD SET HO CARRY FORWARD COUNT -->
											<cms:set bd_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BD | is_interchanged<>'1' | arrival_date<=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BD SET HO CARRY FORWARD COUNT -->
											<cms:set add_bd_int_ho = "<cms:add bd_ho bd_int_ho />" scope='global' />

											<cms:set add_bd_ho = "<cms:add bd_ho "<cms:add bd_cry_ho  bd_td_int_ho />" />"scope='global' />

											<!-- CNDB SET TO COUNT -->
											<cms:set cndb_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CNDB | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CNDB SET TO COUNT -->
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set cndb_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CNDB | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set cndb_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CNDB | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set cndb_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CNDB | is_interchanged<>'1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CNDB SET HO CARRY FORWARD COUNT -->
											<cms:set cndb_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CNDB | is_interchanged<>'1' | arrival_date<=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CNDB SET HO CARRY FORWARD COUNT -->
											<cms:set add_cndb_int_ho = "<cms:add cndb_ho cndb_int_ho />" scope='global' />

											<cms:set add_cndb_ho = "<cms:add cndb_ho "<cms:add cndb_cry_ho cndb_td_int_ho />" />"scope='global' />

											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr>
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr>
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add bd_to cndb_to />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add  add_bd_int_ho add_cndb_int_ho />/<cms:add add_bd_ho add_cndb_ho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
										<div class="gxcpl-ptop-10"></div>
										<strong><center>Point-Wise</center></strong>
										<div class="gxcpl-ptop-10"></div>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr>
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													BD
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bd_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_bd_int_ho />/<cms:show add_bd_ho />
												</td>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													CNDB
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cndb_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_cndb_int_ho />/<cms:show add_cndb_ho />
												</td>
											</tr>
										</table>
										<!-- INDIVIDUAL TO & HO -->
									</h6>
								</div>
							</a>
						</div>
						<!-- BD -->
						<!-- SECR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date my_today_yesterday format='Y-m-d' />&interchange=NGP&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21">
								<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
									<h6 class="text-center">
										<div class="text-center gxcpl-dashboard-box-card">
											<strong>NGP</strong>
										</div>
										<div class="gxcpl-dashboard-box-card">
											<!-- NGP SET TO COUNT -->
											<cms:set ngp_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=NGP | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- NGP SET TO COUNT -->
											<!-- NGP SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set ngp_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=NGP | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- NGP SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- NGP SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set ngp_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=NGP | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- NGP SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- NGP SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set ngp_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=NGP | is_interchanged<>'1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- NGP SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- NGP SET HO CARRY FORWARD COUNT -->
											<cms:set ngp_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=NGP | is_interchanged<>'1' | arrival_date<=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- NGP SET HO CARRY FORWARD COUNT -->
											<cms:set add_ngp_int_ho = "<cms:add ngp_ho ngp_int_ho />" scope='global' />

											<cms:set add_ngp_ho = "<cms:add ngp_ho "<cms:add ngp_cry_ho ngp_td_int_ho />" />"scope='global' />

											<!-- GCC SET TO COUNT -->
											<cms:set gcc_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=GCC | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- GCC SET TO COUNT -->
											<!-- GCC SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set gcc_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=GCC | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- GCC SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- GCC SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set gcc_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=GCC | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- GCC SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- GCC SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set gcc_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=GCC | is_interchanged<>'1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- GCC SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- GCC SET HO CARRY FORWARD COUNT -->
											<cms:set gcc_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=GCC | is_interchanged<>'1' | arrival_date<=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- GCC SET HO CARRY FORWARD COUNT -->
											<cms:set add_gcc_int_ho = "<cms:add gcc_ho gcc_int_ho />" scope='global' />

											<cms:set add_gcc_ho = "<cms:add gcc_ho "<cms:add gcc_cry_ho gcc_td_int_ho />" />"scope='global' />

											<!-- CWA SET TO COUNT -->
											<cms:set cwa_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CWA | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CWA SET TO COUNT -->
											<!-- CWA SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set cwa_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CWA | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CWA SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- CWA SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set cwa_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CWA | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CWA SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CWA SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set cwa_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CWA | is_interchanged<>'1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CWA SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CWA SET HO CARRY FORWARD COUNT -->
											<cms:set cwa_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CWA | is_interchanged<>'1' | arrival_date<=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CWA SET HO CARRY FORWARD COUNT -->
											<cms:set add_cwa_int_ho = "<cms:add cwa_ho cwa_int_ho />" scope='global' />

											<cms:set add_cwa_ho = "<cms:add cwa_ho "<cms:add cwa_cry_ho cwa_td_int_ho />" />"scope='global' />

											<!-- CAF SET TO COUNT -->
											<cms:set caf_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CAF | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CAF SET TO COUNT -->
											<!-- CAF SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set caf_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CAF | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CAF SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- CAF SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set caf_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CAF | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CAF SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CAF SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set caf_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CAF | is_interchanged<>'1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CAF SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CAF SET HO CARRY FORWARD COUNT -->
											<cms:set caf_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CAF | is_interchanged<>'1' | arrival_date<=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CAF SET HO CARRY FORWARD COUNT -->
											<cms:set add_caf_int_ho = "<cms:add caf_ho caf_int_ho />" scope='global' />

											<cms:set add_caf_ho = "<cms:add caf_ho "<cms:add caf_cry_ho caf_td_int_ho />" />"scope='global' />

											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr>
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr>
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add ngp_to "<cms:add gcc_to "<cms:add cwa_to caf_to />" />" />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add  add_ngp_int_ho "<cms:add add_gcc_int_ho "<cms:add add_cwa_int_ho add_caf_int_ho />" />" />/<cms:add  add_ngp_ho "<cms:add add_gcc_ho "<cms:add add_cwa_ho add_caf_ho />" />" />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
										<div class="gxcpl-ptop-10"></div>
										<strong><center>Point-Wise</center></strong>
										<div class="gxcpl-ptop-10"></div>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr>
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													NGP
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show ngp_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_ngp_int_ho />/<cms:show add_ngp_ho />
												</td>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													GCC
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show gcc_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_gcc_int_ho />/<cms:show add_gcc_ho />
												</td>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													CWA
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cwa_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_cwa_int_ho />/<cms:show add_cwa_ho />
												</td>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													CAF
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show caf_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_caf_int_ho />/<cms:show add_caf_ho />
												</td>
											</tr>
										</table>
										<!-- INDIVIDUAL TO & HO -->
									</h6>
								</div>
							</a>
						</div>
						<!-- SECR -->
						<!-- SCR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date my_today_yesterday format='Y-m-d' />&interchange=BPQ&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21">
								<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
									<h6 class="text-center">
										<div class="text-center gxcpl-dashboard-box-card">
											<strong>BPQ</strong>
										</div>
										<div class="gxcpl-dashboard-box-card">
											<!-- BPQ SET TO COUNT -->
											<cms:set bpq_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BPQ | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BPQ SET TO COUNT -->
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set bpq_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BPQ | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set bpq_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BPQ | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set bpq_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BPQ | is_interchanged<>'1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- BPQ SET HO CARRY FORWARD COUNT -->
											<cms:set bpq_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BPQ | is_interchanged<>'1' | arrival_date<=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BPQ SET HO CARRY FORWARD COUNT -->
											<cms:set add_bpq_int_ho = "<cms:add bpq_ho bpq_int_ho />" scope='global' />

											<cms:set add_bpq_ho = "<cms:add bpq_ho "<cms:add bpq_cry_ho bpq_td_int_ho />" />"scope='global' />

											<!-- PMKT SET TO COUNT -->
											<cms:set pmkt_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=PMKT | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- PMKT SET TO COUNT -->
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set pmkt_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=PMKT | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set pmkt_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=PMKT | is_interchanged='1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set pmkt_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=PMKT | is_interchanged<>'1' | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- PMKT SET HO CARRY FORWARD COUNT -->
											<cms:set pmkt_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=PMKT | is_interchanged<>'1' | arrival_date<=<cms:date my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- PMKT SET HO CARRY FORWARD COUNT -->
											<cms:set add_pmkt_int_ho = "<cms:add pmkt_ho pmkt_int_ho />" scope='global' />

											<cms:set add_pmkt_ho = "<cms:add pmkt_ho "<cms:add pmkt_cry_ho pmkt_td_int_ho />" />" scope='global' />

											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr>
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr>
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add bpq_to pmkt_to />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add  add_bpq_int_ho add_pmkt_int_ho />/<cms:add add_bpq_ho add_pmkt_ho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
										<div class="gxcpl-ptop-10"></div>
										<strong><center>Point-Wise</center></strong>
										<div class="gxcpl-ptop-10"></div>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr>
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													BPQ
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bpq_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_bpq_int_ho />/<cms:show add_bpq_ho />
												</td>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													PMKT
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show pmkt_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_pmkt_int_ho />/<cms:show add_pmkt_ho />
												</td>
											</tr>
										</table>
										<!-- INDIVIDUAL TO & HO -->
									</h6>
								</div>
							</a>
						</div>
						<!-- SCR -->
						<!-- STABLE -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<a href="<cms:show k_site_link />stable-train.php" class="gxcpl-fc-21">
								<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
									<h6 class="text-center">
										<div class="text-center gxcpl-dashboard-box-card">
											<strong>STABLE TRAIN</strong>
										</div>
								
											<div class="gxcpl-ptop-40"></div>
											<div style="font-size: 50px;">
											<cms:pages masterpage='pointwise-interchange.php' custom_field="is_stabled='1' | is_interchanged<>1 " order='asc' orderby='arrival_time' count_only='1' />
										</div>
									</h6>	
			                    </div>
			                </a>
		                    <div class="gxcpl-ptop-20"></div>
						</div>
						<!-- STABLE -->
					</div>
					<!-- Today -->
					<!-- Yesterday -->
					<div role="tabpanel" class="tab-pane" id="today_yesterday1">
						<!-- ET -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' />&interchange=ET&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21">
								<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
									<h6 class="text-center">
										<div class="text-center gxcpl-dashboard-box-card">
											<strong>ET</strong>
										</div>
										<div class="gxcpl-dashboard-box-card">
											<!-- ET SET TO COUNT -->
											<cms:set et_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=ET | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- ET SET TO COUNT -->
											<!-- ET SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set et_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=ET | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- ET SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- ET SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set et_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=ET | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- ET SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- ET SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set et_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=ET | is_interchanged<>'1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- ET SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- ET SET HO CARRY FORWARD COUNT -->
											<cms:set et_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=ET | is_interchanged<>'1' | arrival_date<=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- ET SET HO CARRY FORWARD COUNT -->
											<cms:set add_et_int_ho = "<cms:add et_ho et_int_ho />" scope='global' />

											<cms:set add_et_ho = "<cms:add et_ho "<cms:add et_cry_ho et_td_int_ho />" />"scope='global' />

											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr>
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr>
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:show et_to />
													</td>
													<td class="text-center gxcpl-table-padding"><cms:show add_et_int_ho />/<cms:show add_et_ho /></td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
										<div class="gxcpl-ptop-10"></div>
										<strong><center>Point-Wise</center></strong>
										<div class="gxcpl-ptop-10"></div>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr>
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													ET
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show et_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_et_int_ho />/<cms:show add_et_ho />
												</td>
											</tr>
										</table>
										<!-- INDIVIDUAL TO & HO -->
									</h6>
								</div>
							</a>
						</div>
						<!-- ET -->
						<!-- BD -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' />&interchange=BD&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21">
								<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
									<h6 class="text-center">
										<div class="text-center gxcpl-dashboard-box-card">
											<strong>BD</strong>
										</div>
										<div class="gxcpl-dashboard-box-card">
											<!-- BD SET TO COUNT -->
											<cms:set bd_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BD | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BD SET TO COUNT -->
											<!-- BD SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set bd_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BD | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BD SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- BD SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set bd_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BD | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BD SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- BD SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set bd_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BD | is_interchanged<>'1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BD SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- BD SET HO CARRY FORWARD COUNT -->
											<cms:set bd_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BD | is_interchanged<>'1' | arrival_date<=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BD SET HO CARRY FORWARD COUNT -->
											<cms:set add_bd_int_ho = "<cms:add bd_ho bd_int_ho />" scope='global' />

											<cms:set add_bd_ho = "<cms:add bd_ho "<cms:add bd_cry_ho  bd_td_int_ho />" />"scope='global' />

											<!-- CNDB SET TO COUNT -->
											<cms:set cndb_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CNDB | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CNDB SET TO COUNT -->
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set cndb_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CNDB | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set cndb_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CNDB | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set cndb_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CNDB | is_interchanged<>'1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CNDB SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CNDB SET HO CARRY FORWARD COUNT -->
											<cms:set cndb_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CNDB | is_interchanged<>'1' | arrival_date<=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CNDB SET HO CARRY FORWARD COUNT -->
											<cms:set add_cndb_int_ho = "<cms:add cndb_ho cndb_int_ho />" scope='global' />

											<cms:set add_cndb_ho = "<cms:add cndb_ho "<cms:add cndb_cry_ho cndb_td_int_ho />" />"scope='global' />

											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr>
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr>
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add bd_to cndb_to />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add  add_bd_int_ho add_cndb_int_ho />/<cms:add add_bd_ho add_cndb_ho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
										<div class="gxcpl-ptop-10"></div>
										<strong><center>Point-Wise</center></strong>
										<div class="gxcpl-ptop-10"></div>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr>
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													BD
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bd_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_bd_int_ho />/<cms:show add_bd_ho />
												</td>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													CNDB
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cndb_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_cndb_int_ho />/<cms:show add_cndb_ho />
												</td>
											</tr>
										</table>
										<!-- INDIVIDUAL TO & HO -->
									</h6>
								</div>
							</a>
						</div>
						<!-- BD -->
						<!-- SECR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' />&interchange=NGP&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21">
								<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
									<h6 class="text-center">
										<div class="text-center gxcpl-dashboard-box-card">
											<strong>NGP</strong>
										</div>
										<div class="gxcpl-dashboard-box-card">
											<!-- NGP SET TO COUNT -->
											<cms:set ngp_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=NGP | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- NGP SET TO COUNT -->
											<!-- NGP SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set ngp_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=NGP | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- NGP SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- NGP SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set ngp_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=NGP | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- NGP SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- NGP SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set ngp_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=NGP | is_interchanged<>'1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- NGP SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- NGP SET HO CARRY FORWARD COUNT -->
											<cms:set ngp_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=NGP | is_interchanged<>'1' | arrival_date<=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- NGP SET HO CARRY FORWARD COUNT -->
											<cms:set add_ngp_int_ho = "<cms:add ngp_ho ngp_int_ho />" scope='global' />

											<cms:set add_ngp_ho = "<cms:add ngp_ho "<cms:add ngp_cry_ho ngp_td_int_ho />" />" scope='global' />

											<!-- GCC SET TO COUNT -->
											<cms:set gcc_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=GCC | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- GCC SET TO COUNT -->
											<!-- GCC SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set gcc_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=GCC | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- GCC SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- GCC SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set gcc_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=GCC | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- GCC SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- GCC SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set gcc_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=GCC | is_interchanged<>'1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- GCC SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- GCC SET HO CARRY FORWARD COUNT -->
											<cms:set gcc_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=GCC | is_interchanged<>'1' | arrival_date<=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- GCC SET HO CARRY FORWARD COUNT -->
											<cms:set add_gcc_int_ho = "<cms:add gcc_ho gcc_int_ho />" scope='global' />

											<cms:set add_gcc_ho = "<cms:add gcc_ho "<cms:add gcc_cry_ho gcc_td_int_ho />" />" scope='global' />

											<!-- CWA SET TO COUNT -->
											<cms:set cwa_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CWA | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CWA SET TO COUNT -->
											<!-- CWA SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set cwa_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CWA | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CWA SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- CWA SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set cwa_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CWA | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CWA SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CWA SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set cwa_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CWA | is_interchanged<>'1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CWA SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CWA SET HO CARRY FORWARD COUNT -->
											<cms:set cwa_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CWA | is_interchanged<>'1' | arrival_date<=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CWA SET HO CARRY FORWARD COUNT -->
											<cms:set add_cwa_int_ho = "<cms:add cwa_ho cwa_int_ho />" scope='global' />

											<cms:set add_cwa_ho = "<cms:add cwa_ho "<cms:add cwa_cry_ho cwa_td_int_ho />" />"scope='global' />

											<!-- CAF SET TO COUNT -->
											<cms:set caf_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CAF | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CAF SET TO COUNT -->
											<!-- CAF SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set caf_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CAF | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CAF SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- CAF SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set caf_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CAF | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CAF SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CAF SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set caf_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CAF | is_interchanged<>'1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CAF SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- CAF SET HO CARRY FORWARD COUNT -->
											<cms:set caf_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=CAF | is_interchanged<>'1' | arrival_date<=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- CAF SET HO CARRY FORWARD COUNT -->
											<cms:set add_caf_int_ho = "<cms:add caf_ho caf_int_ho />" scope='global' />

											<cms:set add_caf_ho = "<cms:add caf_ho "<cms:add caf_cry_ho caf_td_int_ho />" />"scope='global' />

											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr>
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr>
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add ngp_to "<cms:add gcc_to "<cms:add cwa_to caf_to />" />" />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add  add_ngp_int_ho "<cms:add add_gcc_int_ho "<cms:add add_cwa_int_ho add_caf_int_ho />" />"/>/<cms:add  add_ngp_ho "<cms:add add_gcc_ho "<cms:add add_cwa_ho add_caf_ho />" />"/>
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
										<div class="gxcpl-ptop-10"></div>
										<strong><center>Point-Wise</center></strong>
										<div class="gxcpl-ptop-10"></div>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr>
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													NGP
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show ngp_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_ngp_int_ho />/<cms:show add_ngp_ho />
												</td>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													GCC
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show gcc_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_gcc_int_ho />/<cms:show add_gcc_ho />
												</td>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													CWA
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cwa_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_cwa_int_ho />/<cms:show add_cwa_ho />
												</td>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													CAF
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show caf_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_caf_int_ho />/<cms:show add_caf_ho />
												</td>
											</tr>
										</table>
										<!-- INDIVIDUAL TO & HO -->
									</h6>
								</div>
							</a>
						</div>
						<!-- SECR -->
						<!-- SCR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' />&interchange=BPQ&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21">
								<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
									<h6 class="text-center">
										<div class="text-center gxcpl-dashboard-box-card">
											<strong>BPQ</strong>
										</div>
										<div class="gxcpl-dashboard-box-card">
											<!-- BPQ SET TO COUNT -->
											<cms:set bpq_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BPQ | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BPQ SET TO COUNT -->
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set bpq_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BPQ | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set bpq_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BPQ | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set bpq_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BPQ | is_interchanged<>'1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BPQ SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- BPQ SET HO CARRY FORWARD COUNT -->
											<cms:set bpq_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=BPQ | is_interchanged<>'1' | arrival_date<=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- BPQ SET HO CARRY FORWARD COUNT -->
											<cms:set add_bpq_int_ho = "<cms:add bpq_ho bpq_int_ho />" scope='global' />

											<cms:set add_bpq_ho = "<cms:add bpq_ho "<cms:add bpq_cry_ho bpq_td_int_ho />" />"scope='global' />

											<!-- PMKT SET TO COUNT -->
											<cms:set pmkt_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=PMKT | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- PMKT SET TO COUNT -->
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<cms:set pmkt_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=PMKT | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & TODAY'S INTERCHANGE -->
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set pmkt_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=PMKT | is_interchanged='1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange<>'1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<cms:set pmkt_td_int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=PMKT | is_interchanged<>'1' | arrival_date=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- PMKT SET HO COUNT WITH INTERCHANGE & NOT TODAY'S INTERCHANGE -->
											<!-- PMKT SET HO CARRY FORWARD COUNT -->
											<cms:set pmkt_cry_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=PMKT | is_interchanged<>'1' | arrival_date<=<cms:date return='yesterday' my_today_yesterday format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
											<!-- PMKT SET HO CARRY FORWARD COUNT -->
											<cms:set add_pmkt_int_ho = "<cms:add pmkt_ho pmkt_int_ho />" scope='global' />

											<cms:set add_pmkt_ho = "<cms:add pmkt_ho "<cms:add pmkt_cry_ho pmkt_td_int_ho />" />" scope='global' />

											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr>
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr>
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add bpq_to pmkt_to />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add  add_bpq_int_ho add_pmkt_int_ho />/<cms:add add_bpq_ho add_pmkt_ho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
										<div class="gxcpl-ptop-10"></div>
										<strong><center>Point-Wise</center></strong>
										<div class="gxcpl-ptop-10"></div>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr>
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													BPQ
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bpq_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_bpq_int_ho />/<cms:show add_bpq_ho />
												</td>
											</tr>
											<tr>
												<td class="text-center gxcpl-table-padding">
													PMKT
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show pmkt_to />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show add_pmkt_int_ho />/<cms:show add_pmkt_ho />
												</td>
											</tr>
										</table>
										<!-- INDIVIDUAL TO & HO -->
									</h6>
								</div>
							</a>
						</div>
						<!-- SCR -->
						<!-- STABLE -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<a href="<cms:show k_site_link />stable-train.php" class="gxcpl-fc-21">
								<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
									<h6 class="text-center">
										<div class="text-center gxcpl-dashboard-box-card">
											<strong>STABLE TRAIN</strong>
										</div>
								
											<div class="gxcpl-ptop-40"></div>
											<div style="font-size: 50px;">
											<cms:pages masterpage='pointwise-interchange.php' custom_field="is_stabled='1' | is_interchanged<>1 " order='asc' orderby='arrival_time' count_only='1' />
										</div>
									</h6>	
			                    </div>
			                </a>
		                    <div class="gxcpl-ptop-20"></div>
						</div>
						<!-- STABLE -->
					</div>
					<!-- Yesterday -->
				</div>
			</div>
		</div>
	</div>
	<!-- Content Here -->
	<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>