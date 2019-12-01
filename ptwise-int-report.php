<?php require_once( 'couch/cms.php' ); ?>
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
<cms:embed 'decimal_precision.html' />
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
							<div class="col-md-3 col-xs-10">
								<h5 class="gxcpl-fw-700 text-left"><cms:pages masterpage="pointwise-interchange.php" limit='1' custom_field="interchange=<cms:gpc 'interchange' method='get' /> "><cms:set pdf_name="<cms:show interchange />" scope="global" />
								<cms:show interchange /></cms:pages>- TAKEN OVER TABLE</h5>
							</div>
							<!-- Button For pdf hide and show -->
							<div class="col-md-1 col-xs-3 col-md-offset-4" id="excel_to" style="padding-top: 9.5px;"></div>
							<div class="col-md-3 col-xs-9">
								<div class="gxcpl-ptop-10"></div>
								<!-- <div class="btn-group" role="group" style="margin-top: 2px;" > -->
									<a href="javascript:generatePDF()" class="btn btn-warning gxcpl-fw-700 btn-sm"><i class="fa fa-file-pdf-o" ></i> PDF</a>
									<button id="btnShow_to" class="btn btn-danger gxcpl-fw-700 btn-sm" type="button">
										<i class="fa fa-eye" aria-hidden="true"></i> SHOW
									</button>
									<button id="btnHide_to" class="btn btn-primary gxcpl-fw-700 btn-sm" type="button">
										<i class="fa fa-eye-slash" aria-hidden="true"></i> HIDE
									</button>
								<!-- </div> -->
								<div class="gxcpl-ptop-20"></div>
							</div>
							<!-- Button For pdf hide and show -->
							<!-- Legend -->
							<div class="col-md-1 col-xs-1">
								<div class="gxcpl-ptop-10"></div>
								<span class="col-md-1 pull-left gxcpl-legend-int" data-toggle="tooltip" data-placement="top" title="Table Legend">
								    <cms:embed 'legend.html' />
								</span>
								<!-- <div class="gxcpl-ptop-10"></div> -->
							</div>
							<!-- Legend -->
						</div>
					</div>
					<!-- TO Table -->
					<div class="gxcpl-card-body tableFixHead gxcpl-padding-15" style="margin: 3px;">
						<table class="display table table-bordered gxcpl-table-hover" id="to" style="width: 100% !important;">
							<thead>
							    <tr>
									<th class="text-center">
										S.No.
									</th>
									<th>
										Train
									</th>
									<th>
										Loco
									</th>
									<th>
										Schedule
									</th>
									<th>
										Location
									</th>
									<!-- NGP & GCC TO Condition -->
									<cms:if my_icp eq 'NGP'>
									<th>
										NGP Arr/Dep
									</th>
									<th>
										AQ Arr/Dep
									</th>
									<th>
										Sign-on
									</th>
									<th>
										PDD
									</th>
									<th style="z-index: 99; width: 200px;">
										Remarks
									</th>
									<th style="display: none;">
										From
									</th>
									<th style="display: none;">
										To
									</th>
									<th style="display: none;">
										CMDT
									</th>
									<th style="display: none;">
										Type
									</th>
									<th style="display: none;">
										L/E
									</th>
									<th style="display: none;">
										Units
									</th>
									<th class="text-center">
										Action
									</th>
									<cms:else_if my_icp eq 'GCC' />
									<th>
										GCC Arr/Dep
									</th>
									<th>
										GNQ Arr/Dep
									</th>
									<th>
										Sign-on
									</th>
									<th>
										PDD
									</th>
									<th style="z-index: 99; width: 200px;">
										Remarks
									</th>
									<th style="display: none;">
										From
									</th>
									<th style="display: none;">
										To
									</th>
									<th style="display: none;">
										CMDT
									</th>
									<th style="display: none;">
										Type
									</th>
									<th style="display: none;">
										L/E
									</th>
									<th style="display: none;">
										Units
									</th>
									<th class="text-center">
										Action
									</th>
									<cms:else />
									<th>
										Arr/Dep
									</th>
									<th>
										Sign-on
									</th>
									<th>
										PDD
									</th>
									<th style="z-index: 99; width: 200px;">
										Remarks
									</th>
									<th style="display: none;">
										From
									</th>
									<th style="display: none;">
										To
									</th>
									<th style="display: none;">
										CMDT
									</th>
									<th style="display: none;">
										Type
									</th>
									<th style="display: none;">
										L/E
									</th>
									<th style="display: none;">
										Units
									</th>
									<th class="text-center">
										Action
									</th>
									</cms:if>
									<!-- NGP & GCC TO Condition -->
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
								<cms:pages masterpage='pointwise-interchange.php' custom_field=" is_interchanged=1 | to_ho=0 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=0 | is_interchanged=1 | tr_name=='TA','ta','Ta','tA','LA','la','La','lA'" order='asc' orderby="arrival_time" skip_custom_field='1'>
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set to_depa_inter_ta ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'pdd.html' />
									<cms:if tr_name eq 'TA' || tr_name eq 'ta' || tr_name eq 'Ta' || tr_name eq 'tA' || tr_name eq 'LA' || tr_name eq 'la' || tr_name eq 'La' || tr_name eq 'lA'>
									<cms:embed 'ptwise-int-report-table.html' />
									</cms:if>
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
								<cms:set to_total_fc = "<cms:add to_depa_inter "<cms:add to_depa_inter_ta "<cms:add to_no_inter to_dep_nt_inter  />" />" />" scope='global' /> 
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
												<cms:set int_to = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=<cms:gpc 'interchange' method='get' /> | is_interchanged='1' | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=0 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " count_only='1' />" scope='global' />
												<cms:show int_to />
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
												<cms:show int_to /> = <cms:show my_to_ac_count />
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
							<div class="col-md-2 col-md-offset-5 col-xs-6 col-sm-6 text-right">
								<cms:set avg_pdd = "<cms:div total_pdd int_to />" scope="global" />
								<strong>Avg PDD:</strong>
								<cms:set my_final_avg_pdd_final="<cms:div total_pdd int_to />" scope="global" /> 
								<cms:set agv_pdd_hours="<cms:number_format "<cms:div my_final_avg_pdd_final '60' />" decimal_precision='0' />" /><cms:set avg_pdd_minutes="<cms:mod my_final_avg_pdd_final '60' />" />

								<cms:if agv_pdd_hours eq '0'><cms:else /><cms:show agv_pdd_hours /> hr</cms:if> <cms:if avg_pdd_minutes eq '0'><cms:else /><cms:show avg_pdd_minutes /> m</cms:if>
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
							<div class="col-md-1 col-xs-3 col-md-offset-6" id="excel_ho"></div>
							<div class="col-md-2 col-xs-8">
								<button id="btnShow_ho" class="btn btn-danger gxcpl-fw-700 btn-sm" type="button">
									<i class="fa fa-eye" aria-hidden="true"></i> Show
								</button>
								<button id="btnHide_ho" class="btn btn-primary gxcpl-fw-700 btn-sm" type="button">
									<i class="fa fa-eye-slash" aria-hidden="true"></i> Hide
								</button>
							</div>
						</div>
					</div>
					<!-- HO Table -->
					<div class="gxcpl-card-body tableFixHead gxcpl-padding-15">
						<table class="display table table-bordered gxcpl-table-hover" id="ho" style="width: 100% !important;">
							<thead>
							    <tr>
									<th class="text-center">
										S.No.
									</th>
									<th>
										Train
									</th>
									<th>
										Loco
									</th>
									<th>
										Schedule
									</th>
									<th>
										Location
									</th>
									<cms:if my_icp eq 'NGP' >
									<th>
										AQ Arr/Dep
									</th>
									<th>
										NGP Arr/Dep
									</th>
									<th>
										Sign-on
									</th>
									<th style="z-index: 99; width: 200px;">
										Remarks
									</th>
									<th style="display: none;">
										From
									</th>
									<th style="display: none;">
										To
									</th>
									<th style="display: none;">
										CMDT
									</th>
									<th style="display: none;">
										Type
									</th>
									<th style="display: none;">
										L/E
									</th>
									<th style="display: none;">
										Units
									</th>
									<th class="text-center">
										Action
									</th>
									<cms:else_if my_icp eq 'GCC' />
									<th>
										GNQ Arr/Dep
									</th>
									<th>
										GCC Arr/Dep
									</th>
									<th>
										Sign-on
									</th>
									<th style="z-index: 99;">
										Remarks
									</th>
									<th style="display: none;">
										From
									</th>
									<th style="display: none;">
										To
									</th>
									<th style="display: none;">
										CMDT
									</th>
									<th style="display: none;">
										Type
									</th>
									<th style="display: none;">
										L/E
									</th>
									<th style="display: none;">
										Units
									</th>
									<th class="text-center">
										Action
									</th>
									<cms:else />
									<th>
										Arr/Dep
									</th>
									<th>
										Sign-on
									</th>
									<th style="z-index: 99;">
										Remarks
									</th>
									<th style="display: none;">
										From
									</th>
									<th style="display: none;">
										To
									</th>
									<th style="display: none;">
										CMDT
									</th>
									<th style="display: none;">
										Type
									</th>
									<th style="display: none;">
										L/E
									</th>
									<th style="display: none;">
										Units
									</th>
									<th class="text-center">
										Action
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

								<!-- For Interchanged Dep Time Without TA, LA-->
								<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=1 | is_interchanged='1' | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " order='asc' orderby="departure_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set ho_dep_td_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
							 	</cms:pages>
							 	<!-- For Interchanged Dep Time Without TA, LA-->
							 	<!-- For Interchanged with not today's interchange but with Dep Time Without TA, LA -->
								<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=1 | is_interchanged='1' | today_interchange<>'1'| tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " order='asc' orderby="departure_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set ho_dep_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
							 	</cms:pages>
							 	<!-- For Interchanged with not today's interchange but with Dep Time Without TA, LA -->
							 	<!-- For Interchanged with Dep Time With TA, LA-->
								<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=1 | is_interchanged='1' | tr_name=='TA','ta','Ta','tA','LA','la','La','lA'" order='asc' orderby="departure_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set ho_dep_td_la_ta_int ="<cms:show k_total_records />" scope='global' />
									<cms:if tr_name eq 'TA' || tr_name eq 'ta' || tr_name eq 'Ta' || tr_name eq 'tA' || tr_name eq 'LA' || tr_name eq 'la' || tr_name eq 'La' || tr_name eq 'lA'>
									<cms:embed 'ptwise-int-report-table-ho.html' />
									</cms:if>
							 	</cms:pages>
							 	<!-- For Interchanged with Dep Time With TA, LA -->
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
							 	<!-- Carry forward data with eq to arrival date but not interchange & not today's interchange -->
								<cms:pages masterpage='pointwise-interchange.php' order='asc' orderby='departure_time' custom_field="is_interchanged<>1 | to_ho=1 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | today_interchange<>1 " show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set ho_dep_nt_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
								</cms:pages>
								<!-- Carry forward data with eq to arrival date but not interchange & not today's interchange -->
								<!-- Carry forward data with not interchange & not today's interchange -->
								<cms:pages masterpage='pointwise-interchange.php' order='asc' orderby='departure_time' custom_field="is_interchanged<>1 | to_ho=1 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date<=<cms:gpc 'arrival_date' method='get' /> | today_interchange<>1 " show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set ho_dep_nt_cr_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
								</cms:pages>
								<!-- Carry forward data with not interchange & not today's interchange -->

							</tbody>
						</table>
					</div>
					<div class="gxcpl-card-body gxcpl-padding-10" style="line-height: 24px; text-align: left;">
						<cms:set ho_total_fc = "<cms:add ho_dep_td_int "<cms:add ho_dep_td_la_ta_int "<cms:add ho_tdy_dep_int ho_tdy_no_dep_not_int  />" />" />" scope='global' />
						
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
										<cms:set int_ho = "<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=1 | is_interchanged=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA" order='asc' orderby='departure_time' count_only='1' />" scope='global' />
										<cms:show int_ho />
									</td>
								</tr>
								<tr>
									<td width="100px;">
										<strong>Total</strong>
									</td>
									<td width="100px;">
										<cms:show int_ho />=<cms:show my_ho_live_count />+<cms:show my_ho_death_count />D
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
										<cms:show int_ho /> = <cms:show my_ho_ac_count />
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
	<!-- Content Here -->
<cms:pages masterpage='pointwise-interchange.php' limit="1" >
	<cms:set arri = "<cms:gpc 'arrival_date' method='get' />" scope='global'  />
	<script>
		function generatePDF() {
		var dd = {
			pageSize:'A4',
			pageOrientation:'potrait',
			info : 
			{
				title :"<cms:show pdf_name /> - <cms:date arri format= 'd/m/Y' />"
			},
			content: 
			[	
				{ text: 'Interchange Point <cms:pages masterpage="pointwise-interchange.php" limit='1' custom_field="interchange=<cms:gpc 'interchange' method='get' /> "><cms:show interchange /></cms:pages>', style: 'subheader', alignment: 'center' },
					'\n',
				{ text: 'Date:- <cms:date arri format= "d/m/Y" />', style: 'subheader', alignment: 'center' },
					'\n',
				{
					style: 'tableExample', alignment: 'center', fontSize: 7, border:0, margin: [22, 0], 
					table: {
						body: 
						[	

							[
								{ 
									text:'Taken Over(HO): <cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=0 | is_interchanged=1" order='asc' orderby='arrival_time' count_only='1' />', style: 'subheader', alignment: 'center', margin:5
								},
								{ 
									text:'Handed Over(HO): <cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=1 | is_interchanged=1" order='asc' orderby='departure_time' count_only='1' />', style: 'subheader', alignment: 'center', margin:5
								},
							],
							[
								[{text: '<cms:pages masterpage="pointwise-interchange.php" limit='1' custom_field="interchange=<cms:gpc 'interchange' method='get' /> "><cms:show interchange /></cms:pages>- TAKEN OVER TABLE', style: 'subheader', bold: true,fontSize: 10,
								}],

								[{text: '<cms:pages masterpage="pointwise-interchange.php" limit='1' custom_field="interchange=<cms:gpc 'interchange' method='get' /> "><cms:show interchange /></cms:pages>- HANDED OVER TABLE', style: 'subheader', bold: true,fontSize: 10,
								}]
							],
							[
								{
									style: 'tableExample', alignment: 'center',  
									table: {
										headerRows: 1,
										body: [
											[{text: 'S.No.', style: 'tableHeader', bold: true, fontSize: 8, }, 
											 {text: 'Train', style: 'tableHeader', bold: true, fontSize: 8, }, 
											 {text: 'Loco', style: 'tableHeader', bold: true, fontSize: 8,},
											 {text: 'Schedule', style: 'tableHeader', bold: true, fontSize: 8,}, 
											 <cms:if my_icp eq 'NGP'>
											 {text: 'NGP Arr/Dep', style: 'tableHeader', bold: true, fontSize: 8,},
											 {text: 'AQ Arr/Dep', style: 'tableHeader', bold: true, fontSize: 8,},
											 <cms:else_if my_icp eq 'GCC' />
											 {text: 'GCC Arr/Dep', style: 'tableHeader', bold: true, fontSize: 8,},
											 {text: 'GNQ Arr/Dep', style: 'tableHeader', bold: true, fontSize: 8,},
											 <cms:else />
											 {text: 'Arr/Dep', style: 'tableHeader', bold: true, fontSize: 8,}, 
											 </cms:if>
											 ],

											<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=0  | is_interchanged=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA" order='asc' orderby='arrival_time'>
											<cms:set tr_name_caps="<cms:php>echo strtoupper('<cms:show tr_name />');</cms:php>" />
											<cms:set schedule_caps="<cms:php>echo strtoupper('<cms:show schedule />');</cms:php>" />
											 	
											['<cms:show k_absolute_count />', '<cms:show tr_name_caps />', '<cms:show loco />', 
											 '<cms:show schedule_caps /><cms:date schedule_date format='d-m' />', 
											 <cms:if my_icp eq 'NGP'>
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 '<cms:if aq_arrival_time><cms:date aq_arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if aq_departure_time><cms:date aq_departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 <cms:else_if my_icp eq 'GCC' />
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 '<cms:if gnq_arrival_time><cms:date gnq_arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if gnq_departure_time><cms:date gnq_departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 <cms:else />
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 </cms:if>
											 ],
											 </cms:pages>

											<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get' /> | to_ho=0 | is_interchanged=1 | tr_name=='TA','ta','Ta','tA','LA','la','La','lA'" order='asc' orderby='arrival_time'>
											<cms:set tr_name_caps="<cms:php>echo strtoupper('<cms:show tr_name />');</cms:php>" />
											<cms:set schedule_caps="<cms:php>echo strtoupper('<cms:show schedule />');</cms:php>" />
											<cms:if tr_name eq 'TA' || tr_name eq 'ta' || tr_name eq 'Ta' || tr_name eq 'tA' || tr_name eq 'LA' || tr_name eq 'la' || tr_name eq 'La' || tr_name eq 'lA'>	
											['', '<cms:show tr_name_caps />', '<cms:show loco />', 
											 '<cms:show schedule_caps /><cms:date schedule_date format='d-m' />', 
											<cms:if my_icp eq 'NGP'>
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 '<cms:if aq_arrival_time><cms:date aq_arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if aq_departure_time><cms:date aq_departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 <cms:else_if my_icp eq 'GCC' />
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 '<cms:if gnq_arrival_time><cms:date gnq_arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if gnq_departure_time><cms:date gnq_departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 <cms:else />
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 </cms:if>
											 ],</cms:if>
											 </cms:pages>
											 ['', '', '', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],
											 ['', '', '', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],

											 ['', 'Total', '<cms:show int_to />=<cms:show my_to_live_count />+<cms:show my_to_death_count />D', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ], 
											['', '', 'TA <cms:show my_to_ta_count />=<cms:show my_to_ta_loco_count />', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],
											 ['', '', 'LA <cms:show my_to_la_count />=<cms:show my_to_la_loco_count />', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],
											 ['', '', 'AC <cms:show int_to />=<cms:show my_to_ac_count />', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],
											 ['', '', 'DSL <cms:show my_to_dsl_actual_count />=<cms:show my_to_dsl_count />', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],

											
										]
									},
								},
								[
									{
									style: 'tableExample', 
									table: {
										headerRows: 1,
										body: [
											[{text: 'S.No.', style: 'tableHeader', bold: true, fontSize: 8, }, 
											 {text: 'Train', style: 'tableHeader', bold: true, fontSize: 8,}, 
											 {text: 'Loco', style: 'tableHeader', bold: true, fontSize: 8,},
											 {text: 'Schedule', style: 'tableHeader', bold: true, fontSize: 8,}, 
											 <cms:if my_icp eq 'NGP'>
											 {text: 'AQ Arr/Dep', style: 'tableHeader', bold: true, fontSize: 8,},
											 {text: 'NGP Arr/Dep', style: 'tableHeader', bold: true, fontSize: 8,},
											 <cms:else_if my_icp eq 'GCC' />
											 {text: 'GNQ Arr/Dep', style: 'tableHeader', bold: true, fontSize: 8,},
											 {text: 'GCC Arr/Dep', style: 'tableHeader', bold: true, fontSize: 8,},
											 <cms:else />
											 {text: 'Arr/Dep', style: 'tableHeader', bold: true, fontSize: 8,}, 
											 </cms:if> ],

											 <cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=1  | is_interchanged=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA" order='asc' orderby='departure_time'>
											<cms:set tr_name_caps="<cms:php>echo strtoupper('<cms:show tr_name />');</cms:php>" />
											<cms:set schedule_caps="<cms:php>echo strtoupper('<cms:show schedule />');</cms:php>" />

											['<cms:show k_absolute_count />', '<cms:show tr_name_caps />', '<cms:show loco />', 
											 '<cms:show schedule_caps /><cms:date schedule_date format='d-m' />', 
											 <cms:if my_icp eq 'NGP'>
											 '<cms:if aq_arrival_time><cms:date aq_arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if aq_departure_time><cms:date aq_departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 <cms:else_if my_icp eq 'GCC' />
											 '<cms:if gnq_arrival_time><cms:date gnq_arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if gnq_departure_time><cms:date gnq_departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 <cms:else />
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 </cms:if>
											 ],
											 </cms:pages>

											 <cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get' /> | to_ho=1 | is_interchanged=1 | tr_name=='TA','ta','Ta','tA','LA','la','La','lA'" order='asc' orderby='arrival_time'>
											<cms:set tr_name_caps="<cms:php>echo strtoupper('<cms:show tr_name />');</cms:php>" />
											<cms:set schedule_caps="<cms:php>echo strtoupper('<cms:show schedule />');</cms:php>" />
											<cms:if tr_name eq 'TA' || tr_name eq 'ta' || tr_name eq 'Ta' || tr_name eq 'tA' || tr_name eq 'LA' || tr_name eq 'la' || tr_name eq 'La' || tr_name eq 'lA'> 	
											['', '<cms:show tr_name_caps />', '<cms:show loco />', 
											 '<cms:show schedule_caps /><cms:date schedule_date format='d-m' />', 
											 <cms:if my_icp eq 'NGP'>
											 '<cms:if aq_arrival_time><cms:date aq_arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if aq_departure_time><cms:date aq_departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 <cms:else_if my_icp eq 'GCC' />
											 '<cms:if gnq_arrival_time><cms:date gnq_arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if gnq_departure_time><cms:date gnq_departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 <cms:else />
											 '<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>/<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>',
											 </cms:if>
											 ],
											 </cms:if>
											 </cms:pages>

											 ['', '', '', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],
											 ['', '', '', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if>  ],
											 ['', 'Total', '<cms:show int_ho />=<cms:show my_ho_live_count />+<cms:show my_ho_death_count />D', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ], 
											['', '', 'TA <cms:show my_ho_ta_count />=<cms:show my_ho_ta_loco_count />', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],
											 ['', '', 'LA <cms:show my_ho_la_count />=<cms:show my_ho_la_loco_count />', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],
											 ['', '', 'AC <cms:show int_ho />=<cms:show my_ho_ac_count />', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],
											 ['', '', 'DSL <cms:show my_ho_dsl_actual_count />=<cms:show my_ho_dsl_count />', '', <cms:if my_icp eq 'NGP'>'','',<cms:else_if my_icp eq 'GCC' />'','',<cms:else />'',</cms:if> ],
										]
									},
								},
								],
							]
						]
					},
					layout: 'noBorders'
				},
			],
		}

		pdfMake.createPdf(dd).open();
		pdfMake.createPdf(dd).download("<cms:show pdf_name />_<cms:date arri format='d-m-Y' />.pdf");

		}
	</script>
</cms:pages>

<div class="gxcpl-ptop-50"></div>
	<cms:embed "footer.html" />
<?php COUCH::invoke( ); ?>