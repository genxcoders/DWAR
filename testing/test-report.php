<?php require_once( '../couch/cms.php' ); ?>
<cms:template title="Pointwise Interchange Report" clonable='1' parent='_ptic_' order="2" >
	<cms:ignore>
	<cms:editable name="my_date" label="Date" type="datetime" fields_separator="-"  default_time='@current' order="1" />
	<cms:editable name="my_interchange" label="Interchange" type="dropdown" opt_values="Select =- | <cms:pages masterpage='interchange.php' order="asc" ><cms:show k_page_title /><cms:if '<cms:not k_paginated_bottom />' >|</cms:if></cms:pages>" order="2" />
	</cms:ignore>
</cms:template>
<cms:php>
set_time_limit(300);
</cms:php>
<cms:no_cache />
<cms:embed 'header.html' />
<cms:set arrival_date = "<cms:gpc 'del_arrival_date' method='get' />" scope="global" />
<cms:set interchange = "<cms:gpc 'del_interchange' method='get' />" scope="global" />

<cms:set total_pdd='0' scope='global' />
<!-- Content Here -->
	<div class="container-fluid">
		<div class="row">
			<!-- Section Title -->
			<div class="col-md-12">
				<h4 class="gxcpl-no-margin">
					POINTWISE INTERCHANGE REPORT
					<div class="gxcpl-ptop-10"></div>
					<div class="gxcpl-divider-dark"></div>
					<div class="gxcpl-ptop-10"></div>
				</h4>
			</div>
			<!-- Section Title -->
			<cms:embed 'search.htm' />
			<cms:if interchange!="<cms:show my_search_str />">
			<cms:set size="<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'/> | to_ho=0" count_only='1' />" scope="global" />
			<div class="col-md-12">
				<div class="gxcpl-card">
					<div class="gxcpl-card-header">
						<div class="row">
							<div class="col-md-3">
								<h5 class="gxcpl-fw-700"><cms:pages masterpage="pointwise-interchange.php" limit='1' custom_field="interchange=<cms:gpc 'interchange' method='get' /> "><cms:set pdf_name="<cms:show interchange />" scope="global" />
								<cms:show interchange /></cms:pages>- TAKEN OVER TABLE</h5>
							</div>
							<!-- Legend -->
							<div class="col-md-1 col-xs-1">
								<div class="gxcpl-ptop-10"></div>
								<span class="col-md-1 pull-left" data-toggle="tooltip" data-placement="top" title="Table Legend">
								    <cms:embed 'legend.html' />
								</span>
								<div class="gxcpl-ptop-10"></div>
							</div>
							<!-- Legend -->
						</div>
					</div>
					<!-- TO Table -->
					<div class="gxcpl-card-body tableFixHead gxcpl-padding-15" style="overflow-x: auto;">
						<table class="display table table-bordered" id="to">
							<thead>
							    <tr>
									<th class="text-center">
										S.No.(1)
									</th>
									<th>
										Train(2)
									</th>
									<th>
										Loco(3)
									</th>
									<th>
										Schedule(4)
									</th>
									<th>
										Location(5)
									</th>
									<cms:if my_icp eq 'NGP' >
									<th>
										NGP Arr/Dep(6)
									</th>
									<th>
										AQ Arr/Dep(7)
									</th>
									<th>
										Sign-on(8)
									</th>
									<th>
										PDD(m)(9)
									</th>
									<th style="z-index: 99;">
										Remarks(10)
									</th>
									<th style="display: none;">
										From(11)
									</th>
									<th style="display: none;">
										To(12)
									</th>
									<th style="display: none;">
										CMDT(13)
									</th>
									<th style="display: none;">
										Type(14)
									</th>
									<th style="display: none;">
										L/E(15)
									</th>
									<th style="display: none;">
										Units(16)
									</th>
									<th class="text-center">
										Action(17)
									</th>
									<cms:else_if my_icp eq 'GCC' />
									<th>
										GCC Arr/Dep(6)
									</th>
									<th>
										GNQ Arr/Dep(7)
									</th>
									<th>
										Sign-on(8)
									</th>
									<th>
										PDD(m)(9)
									</th>
									<th style="z-index: 99;">
										Remarks(10)
									</th>
									<th style="display: none;">
										From(11)
									</th>
									<th style="display: none;">
										To(12)
									</th>
									<th style="display: none;">
										CMDT(13)
									</th>
									<th style="display: none;">
										Type(14)
									</th>
									<th style="display: none;">
										L/E(15)
									</th>
									<th style="display: none;">
										Units(16)
									</th>
									<th class="text-center">
										Action(17)
									</th>
									<cms:else />
									<th>
										Arr/Dep(6)
									</th>
									<th>
										Sign-on(7)
									</th>
									<th>
										PDD(m)(8)
									</th>
									<th style="z-index: 99;">
										Remarks(9)
									</th>
									<th style="display: none;">
										From(10)
									</th>
									<th style="display: none;">
										To(11)
									</th>
									<th style="display: none;">
										CMDT(12)
									</th>
									<th style="display: none;">
										Type(13)
									</th>
									<th style="display: none;">
										L/E(14)
									</th>
									<th style="display: none;">
										Units(15)
									</th>
									<th class="text-center">
										Action(16)
									</th>
									</cms:if>
								</tr>
							</thead>
							<tbody>
								<cms:set my_to_death_count = '0' scope='global' />
								<cms:set my_to_live_count = '0' scope='global' />
								<cms:set my_to_ac_count = '0' scope='global' />
								<cms:set my_to_ac_actual_count = '0' scope='global' />
								<cms:set my_to_dsl_count = '0' scope='global' />
								<cms:set my_to_dsl_actual_count = '0' scope='global' />
								<cms:set my_to_ta_count = '0' scope='global' />
								<cms:set my_to_ta_loco_count = '0' scope='global' />
								<cms:set my_to_la_count = '0' scope='global' />
								<cms:set my_to_la_loco_count = '0' scope='global' />

								<!-- For Interchanged Without TA, LA -->
								<cms:pages masterpage='pointwise-interchange.php' custom_field=" is_interchanged=1 | to_ho=0 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=0 | is_interchanged=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA" order='asc' orderby="arrival_time" skip_custom_field='1'>
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set to_depa_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'pdd.html' />
									<cms:embed 'ptwise-int-report-table.html' />
							 	</cms:pages>
							 	<!-- For Interchanged Without TA, LA -->

							 	<!-- For Interchanged With TA, LA -->
								<cms:pages masterpage='pointwise-interchange.php' custom_field=" is_interchanged=1 | to_ho=0 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=0 | is_interchanged=1 | tr_name=TA,ta,Ta,tA,LA,la,La,lA" order='asc' orderby="arrival_time" skip_custom_field='1'>
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set to_depa_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'pdd.html' />
									<cms:embed 'ptwise-int-report-table.html' />
							 	</cms:pages>
							 	<!-- For Interchanged With TA, LA -->

							 	<!-- Not Interchange arrival date-->
								<cms:pages masterpage='pointwise-interchange.php' order='asc' orderby='arrival_time' custom_field="is_interchanged<>1 | to_ho=0 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' />" show_future_entries='1' >
									<cms:embed 'overdue.html' />	
									<cms:set to_dep_nt_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'pdd.html' />
									<cms:embed 'ptwise-int-report-table.html' />
								</cms:pages>
								<!-- Not Interchange arrival date-->

							 	<!-- For NOT Interchanged -->
							 	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | to_ho=0 | is_interchanged<>'1' | arrival_date!=<cms:gpc 'arrival_date' method='get' />" order='asc' orderby="arrival_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set to_no_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'pdd.html' />
									<cms:embed 'ptwise-int-report-table.html' />
							 	</cms:pages>
							 	<!-- For NOT Interchanged -->
							</tbody>
						</table>

					</div>
					<div class="gxcpl-card-body gxcpl-padding-10" style="line-height: 24px; text-align: left;">
						<div class="row">
							<div class="col-md-2 col-xs-6 col-sm-6">
								<cms:set to_total_fc = "<cms:add to_depa_inter "<cms:add to_no_depa_inter "<cms:add to_no_inter "<cms:add to_dep_nt_inter to_no_depa_no_inter />" />" />" />" scope='global' /> 
								<cms:set to_tr_name_total="<cms:add my_to_ta_count my_to_la_count />" scope="global" />	

								<cms:set to_abs_count_pdf="<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=0 | is_interchanged=1" order='asc' orderby='arrival_time' count_only='1' />" scope='global' />
								<table>
									<tbody>
										<tr>
											<td width="200px;">
												<strong>Forecasted</strong>
											</td>
											<td>
												<cms:sub to_total_fc to_tr_name_total />
											</td>
										</tr>
										<tr>
											<td width="200px;">
												<strong>Taken Over(TO)</strong>
											</td>
											<td>
												<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=0 | is_interchanged=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA" order='asc' orderby='arrival_time' count_only='1' />
											</td>
										</tr>
										<tr>
											<td width="200px;">
												<strong>Total</strong>
											</td>
											<td>
												<cms:show to_abs_count_pdf />=<cms:show my_to_live_count />+<cms:show my_to_death_count />D
											</td>
										</tr>
										<tr>
											<td width="200px;">
												<strong>TA</strong>
											</td>
											<td>
												<cms:show my_to_ta_count /> = <cms:show my_to_ta_loco_count />
											</td>
										</tr>
										<tr>
											<td width="200px;">
												<strong>LA</strong>
											</td>
											<td>
												<cms:show my_to_la_count /> = <cms:show my_to_la_loco_count />
											</td>
										</tr>
										<tr>
											<td width="200px;">
												<strong>AC</strong>
											</td>
											<td>
												<cms:show my_to_ac_actual_count /> = <cms:show my_to_ac_count />
											</td>
										</tr>
										<tr>
											<td width="200px;">
												<strong>DSL</strong>
											</td>
											<td>
												<cms:show my_to_dsl_actual_count /> = <cms:show my_to_dsl_count />
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-2 col-md-offset-6 col-xs-6 col-sm-6">
								<cms:set div_factor_pdd = "<cms:add to_depa_inter to_dep_nt_inter to_no_inter />" scope="global" />
								<cms:set avg_pdd = "<cms:div total_pdd div_factor_pdd />" scope="global" />
								<strong>Avg PDD:</strong><cms:number_format avg_pdd decimal_precision="2" />
							</div>
						</div>
					</div>
					<!-- TO Table -->
				</div>
				<div class="gxcpl-ptop-30"></div>
			</div>
			<div class="col-md-12">
				<div class="gxcpl-card">
					<div class="gxcpl-card-header">
						<div class="row">
							<div class="col-md-3">
								<h5 class="gxcpl-fw-700"><cms:pages masterpage="pointwise-interchange.php" limit="1" custom_field="interchange=<cms:gpc 'interchange' />"><cms:show interchange /></cms:pages>- HANDED OVER TABLE</h5>
							</div>
							<div class="col-md-2 col-md-offset-7">
								<button id="btnShow_ho" class="btn btn-danger gxcpl-fw-700" type="button">
									<i class="fa fa-eye" aria-hidden="true"></i> SHOW
								</button>
								<button id="btnHide_ho" class="btn btn-primary gxcpl-fw-700" type="button">
									<i class="fa fa-eye-slash" aria-hidden="true"></i> HIDE
								</button>
							</div>
						</div>
					</div>
					<!-- HO Table -->
					<div class="gxcpl-card-body tableFixHead gxcpl-padding-15">
						<table class="display table table-bordered" id="ho">
							<thead>
							    <tr>
									<th class="text-center">
										S.No.(1)
									</th>
									<th>
										Train(2)
									</th>
									<th>
										Loco(3)
									</th>
									<th>
										Schedule(4)
									</th>
									<th>
										Location(5)
									</th>
									<cms:if my_icp eq 'NGP' >
									<th>
										NGP Arr/Dep(6)
									</th>
									<th>
										AQ Arr/Dep(7)
									</th>
									<th>
										Sign-on(8)
									</th>
									<th style="z-index: 99;">
										Remarks(9)
									</th>
									<th style="display: none;">
										From(10)
									</th>
									<th style="display: none;">
										To(11)
									</th>
									<th style="display: none;">
										CMDT(12)
									</th>
									<th style="display: none;">
										Type(13)
									</th>
									<th style="display: none;">
										L/E(14)
									</th>
									<th style="display: none;">
										Units(15)
									</th>
									<th class="text-center">
										Action(16)
									</th>
									<cms:else_if my_icp eq 'GCC' />
									<th>
										GCC Arr/Dep(6)
									</th>
									<th>
										GNQ Arr/Dep(7)
									</th>
									<th>
										Sign-on(8)
									</th>
									<th style="z-index: 99;">
										Remarks(9)
									</th>
									<th style="display: none;">
										From(10)
									</th>
									<th style="display: none;">
										To(11)
									</th>
									<th style="display: none;">
										CMDT(12)
									</th>
									<th style="display: none;">
										Type(13)
									</th>
									<th style="display: none;">
										L/E(14)
									</th>
									<th style="display: none;">
										Units(15)
									</th>
									<th class="text-center">
										Action(16)
									</th>
									<cms:else />
									<th>
										Arr/Dep(6)
									</th>
									<th>
										Sign-on(7)
									</th>
									<th style="z-index: 99;">
										Remarks(8)
									</th>
									<th style="display: none;">
										From(9)
									</th>
									<th style="display: none;">
										To(10)
									</th>
									<th style="display: none;">
										CMDT(11)
									</th>
									<th style="display: none;">
										Type(12)
									</th>
									<th style="display: none;">
										L/E(13)
									</th>
									<th style="display: none;">
										Units(14)
									</th>
									<th class="text-center">
										Action(15)
									</th>
									</cms:if>
								</tr>
							</thead>
							<tbody>

								<cms:set my_ho_death_count = '0' scope='global' />
								<cms:set my_ho_live_count = '0' scope='global' />
								<cms:set my_ho_ac_count = '0' scope='global' />
								<cms:set my_ho_ac_actual_count = '0' scope='global' />
								<cms:set my_ho_dsl_count = '0' scope='global' />
								<cms:set my_ho_dsl_actual_count = '0' scope='global' />
								<cms:set my_ho_ta_count = '0' scope='global' />
								<cms:set my_ho_ta_loco_count = '0' scope='global' />
								<cms:set my_ho_la_count = '0' scope='global' />
								<cms:set my_ho_la_loco_count = '0' scope='global' />

								<!-- For Interchanged with today's interchange & Dep Time Without TA, LA-->
								<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=1 | is_interchanged='1' | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " order='asc' orderby="departure_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set ho_dep_td_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
							 	</cms:pages>
							 	<!-- For Interchanged with today's interchange & Dep Time Without TA, LA -->

							 	<!-- For Interchanged with today's interchange & Dep Time With TA, LA-->
								<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=1 | is_interchanged='1' | today_interchange='1' | tr_name=TA,ta,Ta,tA,LA,la,La,lA " order='asc' orderby="departure_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set ho_dep_td_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
							 	</cms:pages>
							 	<!-- For Interchanged with today's interchange & Dep Time With TA, LA -->

							 	<!-- For Interchanged with not today's interchange but with Dep Time-->
								<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=1 | is_interchanged='1' | today_interchange<>'1' " order='asc' orderby="departure_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set ho_dep_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
							 	</cms:pages>
							 	<!-- For Interchanged with not today's interchange but with Dep Time -->

							 	<!-- Not Interchange with today's interchange & dep time-->
								<cms:pages masterpage='pointwise-interchange.php' order='asc' orderby='departure_time' custom_field="is_interchanged<>1 | to_ho=1 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | today_interchange=1 " show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set ho_tdy_dep_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
								</cms:pages>
								<!-- Not Interchange with today's interchange & dep time-->
							 	<!-- Carry forward data with today's interchange, not interchange -->
							 	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | to_ho=1 | is_interchanged<>'1' | arrival_date<=<cms:gpc 'arrival_date' method='get' /> | today_interchange=1 " order='asc' orderby="departure_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set ho_tdy_no_dep_not_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
							 	</cms:pages>
							 	<!-- Carry forward data with today's interchange, not interchange -->

								<!-- Carry forward data with not interchange & not today's interchange -->
								<cms:pages masterpage='pointwise-interchange.php' order='asc' orderby='departure_time' custom_field="is_interchanged<>1 | to_ho=1 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | today_interchange<>1 " show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set ho_dep_nt_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
								</cms:pages>
								<!-- Carry forward data with not interchange & not today's interchange -->

								<!-- Carry forward data with not interchange & not today's interchange -->
								<cms:pages masterpage='pointwise-interchange.php' order='asc' orderby='departure_time' custom_field="is_interchanged<>1 | to_ho=1 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date<=<cms:gpc 'arrival_date' method='get' /> | today_interchange<>1 " show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set ho_dep_nt_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
								</cms:pages>
								<!-- Carry forward data with not interchange & not today's interchange -->
							</tbody>
						</table>
					</div>
					<div class="gxcpl-card-body gxcpl-padding-10" style="line-height: 24px; text-align: left;">
						<cms:set ho_total_fc = "<cms:add ho_dep_td_int "<cms:add ho_no_dep_td_int "<cms:add ho_tdy_dep_int "<cms:add ho_tdy_no_dep_not_int ho_tdy_no_dep_int />" />" />" />" scope='global' />
						
						<cms:set ho_tr_name_total="<cms:add my_ho_ta_count my_ho_la_count />" scope="global" />	

						<cms:set ho_abs_count_pdf="<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=1 | is_interchanged=1" order='asc' orderby='departure_time' count_only='1' />" scope='global' />
						<table>
							<tbody>
								<tr>
									<td width="200px;">
										<strong>Forecasted</strong>
									</td>
									<td width="200px;">
										<cms:sub ho_total_fc ho_tr_name_total />
									</td>
								</tr>
								<tr>
									<td width="200px;">
										<strong>Handed Over(HO)</strong>
									</td>
									<td width="200px;">
										<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=1 | is_interchanged=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA" order='asc' orderby='departure_time' count_only='1' />
									</td>
								</tr>
								<tr>
									<td width="100px;">
										<strong>Total</strong>
									</td>
									<td width="100px;">
										<cms:show ho_abs_count_pdf />=<cms:show my_ho_live_count />+<cms:show my_ho_death_count />D
									</td>
								</tr>
								<tr>
									<td width="100px;">
										<strong>TA</strong>
									</td>
									<td width="100px;">
										<cms:show my_ho_ta_count /> = <cms:show my_ho_ta_loco_count />
									</td>
								</tr>
								<tr>
									<td width="100px;">
										<strong>LA</strong>
									</td>
									<td width="100px;">
										<cms:show my_ho_la_count /> = <cms:show my_ho_la_loco_count />
									</td>
								</tr>
								<tr>
									<td width="100px;">
										<strong>AC</strong>
									</td>
									<td width="100px;">
										<cms:show my_ho_ac_actual_count /> = <cms:show my_ho_ac_count />
									</td>
								</tr>
								<tr>
									<td width="100px;">
										<strong>DSL</strong>
									</td>
									<td width="100px;">
										<cms:show my_ho_dsl_actual_count /> = <cms:show my_ho_dsl_count />
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- HO Table -->
				</div>
				<div class="gxcpl-ptop-50"></div>
			</div>
			<!-- HO Table -->
			<cms:else />
			
			</cms:if> 
			
		</div>
	</div>

<div class="gxcpl-ptop-50"></div>
	<cms:embed "footer.html" />
<?php COUCH::invoke( ); ?>