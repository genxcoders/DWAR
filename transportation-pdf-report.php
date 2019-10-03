<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Transportation PDF Report" parent='_coal_' order='7' />
<cms:embed 'header.html' />
	<div class="container-fluid">
		<div class="row">
			<div class="gxcpl-ptop-50"></div>
			<div class="col-md-12">
                <div class="gxcpl-card">
                	<div class="gxcpl-card-header">
                		<div class="row">
                			<div class="col-md-7">
                				<h4>WCL TRANSPORTATION ON DATE
                				<strong><cms:date return='yesterday -1 days' format="d/m/Y" /></strong>
                				</h4>
                			</div>
                			<div class="col-md-3 col-md-offset-1">
                				<div class="gxcpl-ptop-5"></div>
                				<a href="javascript:transportPDF()" class="btn btn-warning gxcpl-fw-700 pull-right">
                					<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                					Generate PDF
                				</a>
                			</div>
                		</div>
                	</div>
                	<div class="gxcpl-card-body">
                		<div style="padding: 2%;">
                			<table width="100%" border="1">
								<thead>
									<tr>
										<th class="text-center" colspan="2" rowspan="3">Head</th>
										<th class="text-center" rowspan="3">&nbsp;</th>
										<th class="text-center" colspan="3">DAY</th>
										<th class="text-center" colspan="3">Month Upto</th>
										<th class="text-center" colspan="3">1 April to</th>
									</tr>
									<tr>
										<th class="text-center" colspan="2"><cms:date return='yesterday -1 days' format="d/m/Y" /></th>
										<th class="text-center">Variation</th>
										<th class="text-center" colspan="2"><cms:date return='yesterday -1 days' format="d/m/Y" /></th>
										<th class="text-center">Variation</th>
										<th class="text-center" colspan="2"><cms:date return='yesterday -1 days' format="d/m/Y" /></th>
										<th class="text-center">Variation</th>
									</tr>
									<tr>
										<th class="text-center">CY</th>
										<th class="text-center">LY</th>
										<th class="text-center">(%)</th>
										<th class="text-center">CY</th>
										<th class="text-center">LY</th>
										<th class="text-center">(%)</th>
										<th class="text-center">CY</th>
										<th class="text-center">LY</th>
										<th class="text-center">(%)</th>
									</tr>
								</thead>
								<tbody>
									<!-- This month Range -->
									<cms:set wcl_cy_current_day = "<cms:date return='yesterday' format='d' />" scope="global" />
									<cms:set wcl_cy_first_day = "<cms:date return='first day of this month' format='d' />" scope="global" />
									<cms:set wcl_cy_day_range = "<cms:sub wcl_cy_current_day wcl_cy_first_day />" scope="global" />
									<!-- This month Range -->
									<!-- Last year month Range -->
									<cms:set wcl_ly_current_day = "<cms:date return='-366 days' format='d' />" scope="global" />
									<cms:set wcl_ly_first_day = "<cms:date return='first day of this month last year' format='d' />" scope="global" />
									<cms:set wcl_ly_day_range = "<cms:sub  wcl_ly_current_day  wcl_ly_first_day />" scope="global" />
									<!-- This month Range -->	
									<!-- This year Range from april to current month -->
									<cms:set wcl_apr_cy = "<cms:date 'first day of april this year' format='Y-m-d' />" />
									<cms:set wcl_cur_mtn_cy = "<cms:date return='yesterday' format='Y-m-d' />" />
									<cms:php>
										global $CTX;
										$from_date_cy = new DateTime(date($CTX->get('wcl_apr_cy')));
										$to_date_cy = new DateTime(date($CTX->get('wcl_cur_mtn_cy')));
										$wcl_dayz_cy = $to_date_cy->diff($from_date_cy)->days;
										$CTX->set( 'wcl_dayz_cy', $wcl_dayz_cy, 'global' );
									</cms:php>
									<!-- This year Range from april to current month -->

									<!-- Last year Range from april to current month of last year -->
									<cms:set wcl_apr_ly = "<cms:date 'first day of april last year' format='Y-m-d' />" />
									<cms:set wcl_cur_mtn_ly = "<cms:date  return='-366 days' format='Y-m-d' />" />
									<cms:php>
										global $CTX;
										$from_date_ly = new DateTime(date($CTX->get('wcl_apr_ly')));
										$to_date_ly = new DateTime(date($CTX->get('wcl_cur_mtn_ly')));
										$wcl_dayz_ly = $to_date_ly->diff($from_date_ly)->days;
										$CTX->set( 'wcl_dayz_ly', $wcl_dayz_ly, 'global' );
									</cms:php>
									<!-- Last year Range from april to current month of last year -->

									<cms:set my_trans_count_folder="<cms:pages masterpage='siding.php' limit='1' count_only='1' />" scope="global" />

									<cms:set my_trans_rowspan_folder="<cms:pages masterpage='siding.php' limit='1' count_only='1' />" scope="global" />

									<cms:folders masterpage='siding.php' orderby="weight">

									<cms:set my_trans_count="<cms:show k_folder_totalpagecount />" scope="global" />
									<cms:set my_trans_rowspan="<cms:pages masterpage='siding.php' folder=k_folder_name limit='1'><cms:show k_folder_totalpagecount /></cms:pages>" scope="global" /> 
									<cms:set my_trans_rowspan_total="<cms:pages masterpage='siding.php' folder=k_folder_name limit='1'><cms:show k_folder_totalpagecount /></cms:pages>" scope="global" />
									<cms:pages masterpage='siding.php' folder=k_folder_name>
								
										<tr>
											<cms:if my_trans_count_folder eq my_trans_rowspan_folder>
											<td width="12%" rowspan="<cms:add my_trans_rowspan_folder '1' />" class="text-center">
												WCL Transportation
											</td>
											<cms:decr my_trans_count_folder />
											</cms:if>

											<cms:if my_trans_count eq my_trans_rowspan>	
											<td rowspan="<cms:add my_trans_rowspan '1' />" class="text-center">
												<cms:show k_folder_title /> 
											</td>
											</cms:if>

											<td class="text-center">
												<cms:show k_page_title />
											</td>

											<!-- DAY CY -->
											<td class="text-center">
												<cms:set wcl_cy_load = "0" scope="global" />
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='yesterday -1 days' format='Y-m-d' />">
													<cms:set wcl_cy_load = "<cms:add wcl_cy_load tons />" scope="global" />
												</cms:reverse_related_pages>
												<cms:show wcl_cy_load />
											</td>
											<!-- DAY CY -->

											<!-- DAY LY -->
											<td class="text-center">
												<cms:set wcl_ly_load = "0" scope="global" />
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='-367 days' format='Y-m-d' />">
													<cms:set wcl_ly_load = "<cms:add wcl_ly_load tons />" scope="global" />
												</cms:reverse_related_pages>
												<cms:show wcl_ly_load />
											</td>
											<!-- DAY LY -->

											<!-- DAY Variation -->
											<td class="text-center">
												<cms:set wcl_difference = "<cms:sub wcl_cy_load wcl_ly_load />" scope="global" />
												<cms:if (wcl_ly_load eq '0') && (wcl_ly_load eq '') >
													-
												<cms:else_if (wcl_ly_load ne '0') && (wcl_ly_load ne '') />
													<cms:set wcl_var = "<cms:div wcl_difference wcl_ly_load />" scope="global" />
													<cms:set wcl_variation = "<cms:mul wcl_var '100' />" scope="global" />
													<cms:number_format wcl_variation decimal_precision = "2" />
												</cms:if>
											</td>
											<!-- DAY Variation -->

											<!-- Month CY -->
											<td class="text-center">
												<cms:set wcl_cy_month_load = "0" scope="global" />
												<cms:set wcl_avg_cy_month_load = "0" scope="global" />
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
													<cms:set wcl_cy_month_load = "<cms:add wcl_cy_month_load tons />" scope="global" />
												</cms:reverse_related_pages>
												<cms:set wcl_avg_cy_month_load = "<cms:div wcl_cy_month_load wcl_ly_day_range />" scope="global" />
												<cms:number_format wcl_avg_cy_month_load decimal_precision="0" />
											</td>
											<!-- Month CY -->

											<!-- Month LY -->
											<td class="text-center">
												<cms:set wcl_ly_month_load = "0" scope="global" />
												<cms:set wcl_avg_ly_month_load = "0" scope="global" />
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | transdate < <cms:date return='-366 days' format='Y-m-d' /> ">
													<cms:set wcl_ly_month_load = "<cms:add wcl_ly_month_load tons />" scope="global" />
												</cms:reverse_related_pages>
												<cms:set wcl_avg_ly_month_load = "<cms:div wcl_ly_month_load wcl_ly_day_range />" scope="global" />
												<cms:number_format wcl_avg_ly_month_load decimal_precision="0" />
											</td>
											<!-- Month LY -->

											<!-- Month Variation -->
											<td class="text-center">
												<cms:set wcl_month_difference = "<cms:sub wcl_cy_month_load wcl_ly_month_load />" scope="global" />
												<cms:if (wcl_ly_month_load eq '0') && (wcl_ly_month_load eq '') >
													-
												<cms:else_if (wcl_ly_month_load ne '0') && (wcl_ly_month_load ne '') />
													<cms:set wcl_month_var = "<cms:div wcl_month_difference wcl_ly_month_load />" scope="global" />
													<cms:set wcl_month_variation = "<cms:mul wcl_month_var '100' />" scope="global" />
													<cms:number_format wcl_month_variation decimal_precision="2" />
												</cms:if>
											</td>
											<!-- Month Variation -->

											<!-- 1 April to this year CY -->
											<td class="text-center">
												<cms:set wcl_cy_april_load = "0" scope="global" />
												<cms:set wcl_avg_cy_april_load = "0" scope="global" />
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april this year' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
													<cms:set wcl_cy_april_load = "<cms:add wcl_cy_april_load tons />" scope="global" />
												</cms:reverse_related_pages>
												<cms:set wcl_avg_cy_april_load = "<cms:div wcl_cy_april_load wcl_dayz_cy />" scope="global" />
												<cms:number_format wcl_avg_cy_april_load decimal_precision="0" />
											</td>
											<!-- 1 April to this year CY -->

											<!-- 1 April to this year LY -->
											<td class="text-center">
												<cms:set wcl_ly_april_load = "0" scope="global" />
												<cms:set wcl_avg_ly_april_load = "0" scope="global" />
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april last year' format='Y-m-d' /> | transdate < <cms:date  return='-366 days' format='Y-m-d' /> ">
													<cms:set wcl_ly_april_load = "<cms:add wcl_ly_april_load tons />" scope="global" />
												</cms:reverse_related_pages>
												<cms:set wcl_avg_ly_april_load = "<cms:div wcl_ly_april_load wcl_dayz_ly />" scope="global" />
												<cms:number_format wcl_avg_ly_april_load decimal_precision="0" />
											</td>
											<!-- 1 April to this year LY -->

											<!-- 1 April to this year Variation -->
											<td class="text-center">
												<cms:set wcl_april_difference = "<cms:sub wcl_cy_april_load wcl_ly_april_load />" scope="global" />
												<cms:if (wcl_ly_april_load eq '0') && (wcl_ly_april_load eq '')>
													-
												<cms:else_if (wcl_ly_april_load ne '0') && (wcl_ly_april_load ne '') />
													<cms:set wcl_april_var = "<cms:div wcl_april_difference wcl_ly_april_load />" scope="global" />
													<cms:set wcl_april_variation = "<cms:mul wcl_april_var '100' />" scope="global" />
													<cms:number_format wcl_april_variation decimal_precision="2" />
												</cms:if>
											</td>
											<!-- 1 April to this year Variation -->
										</tr>
										<cms:decr my_trans_count />
										<cms:decr my_trans_rowspan_total />
										<cms:if my_trans_rowspan_total eq '0'>
										<!-- TOTAL -->
										<tr class="highlight">
											<td class="text-center">
												<strong>TOTAL</strong>
											</td>

											<!-- Total Day CY -->
											<td class="text-center">
												<cms:set wcl_cy_load_total = "0" scope="global" />
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='yesterday -1 days' format='Y-m-d' />">
														<cms:set wcl_cy_load_total = "<cms:add wcl_cy_load_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
												<strong><cms:show wcl_cy_load_total /></strong>
											</td>
											<!-- Total Day CY -->

											<!-- Total Day LY -->
											<td class="text-center">
												<cms:set wcl_ly_load_total = "0" scope="global" />
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='-367 days' format='Y-m-d' />">
														<cms:set wcl_ly_load_total = "<cms:add wcl_ly_load_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
												<strong><cms:show wcl_ly_load_total /></strong>
											</td>
											<!-- Total Day LY -->

											<!-- Total Day Variation -->
											<td class="text-center">
												<cms:set wcl_difference_total = "<cms:sub wcl_cy_load_total wcl_ly_load_total />" scope="global" />
												<cms:if (wcl_ly_load_total eq '0') && (wcl_ly_load_total eq '')>
													-
												<cms:else_if (wcl_ly_load_total ne '0') && (wcl_ly_load_total ne '') />
													<cms:set wcl_var_total = "<cms:div wcl_difference_total wcl_ly_load_total />" scope="global" />
													<cms:set wcl_variation_total = "<cms:mul wcl_var_total '100' />" scope="global" />
													<strong><cms:number_format wcl_variation_total decimal_precision="2" /></strong>
												</cms:if>
											</td>
											<!-- Total Day Variation -->

											<!-- Total Month CY -->
											<td class="text-center">
												<cms:set wcl_cy_month_load_total = "0" scope="global" />
												<cms:set wcl_avg_cy_month_load_total = "0" scope="global" />
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
														<cms:set wcl_cy_month_load_total = "<cms:add wcl_cy_month_load_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
												<cms:set wcl_avg_cy_month_load_total = "<cms:div wcl_cy_month_load_total wcl_cy_day_range />" scope="global" />
												<strong><cms:number_format wcl_avg_cy_month_load_total decimal_precision="0" /></strong>
											</td>
											<!-- Total Month CY -->

											<!-- Total Month LY -->
											<td class="text-center">
												<cms:set wcl_ly_month_load_total = "0" scope="global" />
												<cms:set wcl_avg_ly_month_load_total = "0" scope="global" />
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | transdate < <cms:date return='-366 days' format='Y-m-d' /> ">
														<cms:set wcl_ly_month_load_total = "<cms:add wcl_ly_month_load_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
												<cms:set wcl_avg_ly_month_load_total = "<cms:div wcl_ly_month_load_total wcl_ly_day_range />" scope="global" />
												<strong><cms:number_format wcl_avg_ly_month_load_total decimal_precision="0" /></strong>
											</td>
											<!-- Total Month LY -->

											<!-- Total Month Variation -->
											<td class="text-center">
												<cms:set wcl_month_difference_total = "<cms:sub wcl_cy_month_load_total wcl_ly_month_load_total />" scope="global" />
												<cms:if (wcl_ly_month_load_total eq '0') && (wcl_ly_month_load_total eq '') >
													-
												<cms:else_if (wcl_ly_month_load_total ne '0') && (wcl_ly_month_load_total ne '') />
													<cms:set wcl_month_var_total = "<cms:div wcl_month_difference_total wcl_ly_month_load_total />" scope="global" />
													<cms:set wcl_month_variation_total = "<cms:mul wcl_month_var_total '100' />" scope="global" />
													<strong><cms:number_format wcl_month_variation_total decimal_precision="2" />	</strong>
												</cms:if>
											</td>
											<!-- Total Month Variation -->

											<!-- 1 April to this year CY Total -->
											<td class="text-center">
												<cms:set wcl_cy_april_load_total = "0" scope="global" />
												<cms:set wcl_avg_cy_april_load_total = "0" scope="global" />
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april this year' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
														<cms:set wcl_cy_april_load_total = "<cms:add wcl_cy_april_load_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
												<cms:set wcl_avg_cy_april_load_total = "<cms:div wcl_cy_april_load_total wcl_dayz_cy />" scope="global" />
												<strong><cms:number_format wcl_avg_cy_april_load_total decimal_precision="0" /></strong>
											</td>
											<!-- 1 April to this year CY Total -->

											<!-- 1 April to this year LY Total -->
											<td class="text-center">
												<cms:set wcl_ly_april_load_total = "0" scope="global" />
												<cms:set wcl_avg_ly_april_load_total = "0" scope="global" />
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april last year' format='Y-m-d' /> | transdate < <cms:date  return='-366 days' format='Y-m-d' /> ">
														<cms:set wcl_ly_april_load_total = "<cms:add wcl_ly_april_load_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
												<cms:set wcl_avg_ly_april_load_total = "<cms:div wcl_ly_april_load_total wcl_dayz_ly />" scope="global" />
												<strong><cms:number_format wcl_avg_ly_april_load_total decimal_precision="0" /></strong>
											</td>
											<!-- 1 April to this year LY Total -->

											<!-- 1 April to this year Variation Total -->
											<td class="text-center">
												<cms:set wcl_april_difference_total = "<cms:sub wcl_cy_april_load_total wcl_ly_april_load_total />" scope="global" />
												<cms:if (wcl_ly_april_load_total eq '0') && (wcl_ly_april_load_total eq '')>
													-
												<cms:else_if (wcl_ly_april_load_total ne '0') && (wcl_ly_april_load_total ne '') />
													<cms:set wcl_april_var_total = "<cms:div wcl_april_difference_total wcl_ly_april_load_total />" scope="global" />
													<cms:set wcl_april_variation_total = "<cms:mul wcl_april_var_total '100' />" scope="global" />
													<strong><cms:number_format wcl_april_variation_total decimal_precision="2" /></strong>
												</cms:if>
											</td>
											<!-- 1 April to this year Variation Total -->
										</tr>
										<!-- TOTAL -->
										</cms:if>
										</cms:pages>
									</cms:folders>

									<!-- Grand Total -->
									<tr class="highlight-total">
										<td colspan="2" class="text-center" style="padding: 5px 10px;">
					                    	<strong>G. TOTAL</strong>
					                    </td>
					                    <!-- Grand Total Day CY -->
					                    <td class="text-center">
					                    	<cms:set wcl_cy_load_grand_total = "0" scope="global" />
					                    	<cms:folders masterpage='siding.php' orderby="weight">
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='yesterday -1 days' format='Y-m-d' />">
														<cms:set wcl_cy_load_grand_total = "<cms:add wcl_cy_load_grand_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
					                    	</cms:folders>
					                    	<strong><cms:show wcl_cy_load_grand_total /></strong>
					                    </td>
					                    <!-- Grand Total Day CY -->

					                    <!-- Grand Total Day LY -->
					                    <td class="text-center">
					                    	<cms:set wcl_ly_load_grand_total = "0" scope="global" />
					                    	<cms:folders masterpage='siding.php' orderby="weight">
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='-367 days' format='Y-m-d' />">
														<cms:set wcl_ly_load_grand_total = "<cms:add wcl_ly_load_grand_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
					                    	</cms:folders>
					                    	<strong><cms:show wcl_ly_load_grand_total /></strong>
					                    </td>
					                    <!-- Grand Total Day LY -->

					                    <!-- Grand Total Day Variation -->
					                    <td class="text-center">
					                    	<cms:set wcl_difference_grand_total = "<cms:sub wcl_cy_load_grand_total wcl_ly_load_grand_total />" scope="global" />
											<cms:if (wcl_ly_load_grand_total eq '0') && (wcl_ly_load_grand_total eq '')>
												-
											<cms:else_if (wcl_ly_load_grand_total ne '0') && (wcl_ly_load_grand_total ne '') />
												<cms:set wcl_var_grand_total = "<cms:div wcl_difference_grand_total wcl_ly_load_grand_total />" scope="global" />
												<cms:set wcl_variation_grand_total = "<cms:mul wcl_var_grand_total '100' />" scope="global" />
												<strong><cms:number_format wcl_variation_grand_total decimal_precision="2" /></strong>
											</cms:if>
					                    </td>
					                    <!-- Grand Total Day Variation -->

					                    <!-- Grand Total Month CY -->
					                    <td class="text-center">
					                    	<cms:set wcl_cy_month_load_grand_total = "0" scope="global" />
											<cms:set wcl_avg_cy_month_load_grand_total = "0" scope="global" />
					                    	<cms:folders masterpage='siding.php' orderby="weight">
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
														<cms:set wcl_cy_month_load_grand_total = "<cms:add wcl_cy_month_load_grand_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
												<cms:set wcl_avg_cy_month_load_grand_total = "<cms:div wcl_cy_month_load_grand_total wcl_cy_day_range />" scope="global" />
					                    	</cms:folders>
					                    	<strong>
												<cms:number_format wcl_avg_cy_month_load_grand_total decimal_precision="0" />
											</strong>
					                    </td>
					                    <!-- Grand Total Month CY -->

					                    <!-- Grand Total Month LY -->
					                    <td class="text-center">
											<cms:set wcl_ly_month_load_grand_total = "0" scope="global" />
											<cms:set wcl_avg_ly_month_load_grand_total = "0" scope="global" />
					                    	<cms:folders masterpage='siding.php' orderby="weight">
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | transdate < <cms:date return='-366 days' format='Y-m-d' /> ">
														<cms:set wcl_ly_month_load_grand_total = "<cms:add wcl_ly_month_load_grand_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
												<cms:set wcl_avg_ly_month_load_grand_total = "<cms:div wcl_ly_month_load_grand_total wcl_ly_day_range />" scope="global" />
					                    	</cms:folders>
					                    	<strong>
												<cms:number_format wcl_avg_ly_month_load_grand_total decimal_precision="2" />
											</strong>
					                    </td>
					                    <!-- Grand Total Month LY -->

					                    <!-- Grand Total Month Variation -->
					                    <td  class="text-center">
					                		<cms:set wcl_month_difference_grand_total = "<cms:sub wcl_cy_month_load_grand_total wcl_ly_month_load_grand_total />" scope="global" />
											<cms:if (wcl_ly_month_load_grand_total eq '0') && (wcl_ly_month_load_grand_total eq '') >
												-
											<cms:else_if (wcl_ly_month_load_grand_total ne '0') && (wcl_ly_month_load_grand_total ne '') />
												<cms:set wcl_month_var_grand_total = "<cms:div wcl_month_difference_grand_total wcl_ly_month_load_grand_total />" scope="global" />
												<cms:set wcl_month_variation_grand_total = "<cms:mul wcl_month_var_grand_total '100' />" scope="global" />
												<strong>
													<cms:number_format wcl_month_variation_grand_total decimal_precision="2" />
												</strong>
											</cms:if>
					                    </td>
					                    <!-- Grand Total Month Variation -->

					                    <!-- 1 April to this year CY Grand Total -->
					                    <td class="text-center">
											<cms:set wcl_cy_april_load_grand_total = "0" scope="global" />
											<cms:set wcl_avg_cy_april_load_grand_total = "0" scope="global" />
											<cms:folders masterpage='siding.php' orderby="weight">
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april this year' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
														<cms:set wcl_cy_april_load_grand_total = "<cms:add wcl_cy_april_load_grand_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
												<cms:set wcl_avg_cy_april_load_grand_total = "<cms:div wcl_cy_april_load_grand_total wcl_dayz_cy />" scope="global" />
											</cms:folders>
											<strong>
												<cms:number_format wcl_avg_cy_april_load_grand_total decimal_precision="0" />
											</strong>
										</td>
					                    <!-- 1 April to this year CY Grand Total -->

					                    <!-- 1 April to this year LY Grand Total -->
					                    <td class="text-center">
					                    	<cms:set wcl_ly_april_load_grand_total = "0" scope="global" />
											<cms:set wcl_avg_ly_april_load_grand_total = "0" scope="global" />
					                    	<cms:folders masterpage='siding.php' orderby="weight">
												<cms:pages masterpage='siding.php' folder=k_folder_name >
													<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april last year' format='Y-m-d' /> | transdate < <cms:date  return='-366 days' format='Y-m-d' /> ">
														<cms:set wcl_ly_april_load_grand_total = "<cms:add wcl_ly_april_load_grand_total tons />" scope="global" />
													</cms:reverse_related_pages>
												</cms:pages>
												<cms:set wcl_avg_ly_april_load_grand_total = "<cms:div wcl_ly_april_load_grand_total wcl_dayz_ly />" scope="global" />
					                		</cms:folders>
					                		<strong>
					                			<cms:number_format wcl_avg_ly_april_load_grand_total decimal_precision="0" />
					                		</strong>
					                    </td>
					                    <!-- 1 April to this year LY Grand Total -->

					                    <!-- 1 April to this year Variation Grand Total -->
					                    <td class="text-center">
					                    	<cms:set wcl_april_difference_grand_total = "<cms:sub wcl_cy_april_load_grand_total wcl_ly_april_load_grand_total />" scope="global" />
											<cms:if (wcl_ly_april_load_grand_total eq '0') && (wcl_ly_april_load_grand_total eq '')>
												-
											<cms:else_if (wcl_ly_april_load_grand_total ne '0') && (wcl_ly_april_load_grand_total ne '') />
												<cms:set wcl_april_var_grand_total = "<cms:div wcl_april_difference_grand_total wcl_ly_april_load_grand_total />" scope="global" />
												<cms:set wcl_april_variation_grand_total = "<cms:mul wcl_april_var_grand_total '100' />" scope="global" />
												<strong>
													<cms:number_format wcl_april_variation_grand_total decimal_precision="2" />
												</strong>
											</cms:if>
					                    </td>
					                    <!-- 1 April to this year Variation Grand Total -->
									</tr>
									<!-- Grand Total -->
								</tbody>
							</table>
                		</div>
                	</div>
                </div>
			</div>
		</div>
	</div>
	<cms:ignore>
	<cms:set wcl_cy_current_day = "<cms:date return='yesterday' format='d' />" scope="global" />
	<cms:set wcl_cy_first_day = "<cms:date return='first day of this month' format='d' />" scope="global" />
	<cms:set wcl_cy_day_range = "<cms:sub wcl_cy_current_day wcl_cy_first_day />" scope="global" />
	<!-- This month Range -->
	<!-- Last year month Range -->
	<cms:set wcl_ly_current_day = "<cms:date return='-366 days' format='d' />" scope="global" />
	<cms:set wcl_ly_first_day = "<cms:date return='first day of this month last year' format='d' />" scope="global" />
	<cms:set wcl_ly_day_range = "<cms:sub  wcl_ly_current_day  wcl_ly_first_day />" scope="global" />
	<!-- This month Range -->	
	<!-- This year Range from april to current month -->
	<cms:set wcl_apr_cy = "<cms:date 'first day of april this year' format='Y-m-d' />" />
	<cms:set wcl_cur_mtn_cy = "<cms:date return='yesterday' format='Y-m-d' />" />
	<cms:php>
	global $CTX;
	$from_date_cy = new DateTime(date($CTX->get('wcl_apr_cy')));
	$to_date_cy = new DateTime(date($CTX->get('wcl_cur_mtn_cy')));
	$wcl_dayz_cy = $to_date_cy->diff($from_date_cy)->days;
	$CTX->set( 'wcl_dayz_cy', $wcl_dayz_cy, 'global' );
	</cms:php>
	<!-- This year Range from april to current month -->

	<!-- Last year Range from april to current month of last year -->
	<cms:set wcl_apr_ly = "<cms:date 'first day of april last year' format='Y-m-d' />" />
	<cms:set wcl_cur_mtn_ly = "<cms:date  return='-366 days' format='Y-m-d' />" />
	<cms:php>
	global $CTX;
	$from_date_ly = new DateTime(date($CTX->get('wcl_apr_ly')));
	$to_date_ly = new DateTime(date($CTX->get('wcl_cur_mtn_ly')));
	$wcl_dayz_ly = $to_date_ly->diff($from_date_ly)->days;
	$CTX->set( 'wcl_dayz_ly', $wcl_dayz_ly, 'global' );
	</cms:php>
	<!-- Last year Range from april to current month of last year -->

	<cms:set my_trans_count_folder="<cms:pages masterpage='siding.php' limit='1' count_only='1' />" scope="global" />

	<cms:set my_trans_rowspan_folder="<cms:pages masterpage='siding.php' limit='1' count_only='1' />" scope="global" />
	<script type="text/javascript">
		function transportPDF() {
			var dd = {
				pageSize:'A4',
				pageOrientation:'potrait',
				content: [
					{
						text: 'WCL TRANSPORTATION ON DATE: <cms:date return="yesterday -1 days" format="d/m/Y" />',
						bold: true,
						style: 'header'
					},

					{
						style: 'tableHeader',
						table: {
							body: [
								
								[
									{
										rowSpan: 3,
										colSpan: 2,
										style: 'textCenter',
										margin: [0, 13, 0, 0], 
										bold: true,
										text: 'Head',
									},
									{},
									{
										rowSpan: 3,
										style: 'textCenter',
										bold: true,
										text: '',
									},
									{
										colSpan: 3,
										style: 'textCenter',
										bold: true,
										text: 'Day',
									},
									{},
									{},
									{
										colSpan: 3,
										style: 'textCenter',
										bold: true,
										text: 'Month Upto',
									},
									{},
									{},
									{
										colSpan: 3,
										style: 'textCenter',
										bold: true,
										text: '1 April to',
									},
									{},
									{}
								],
								[
									'',
									'',
									'',
									{
										colSpan: 2,
										style: 'textCenter',
										bold: true,
										text: '28/09/2019',
									},
									{},
									{
										style: 'textCenter',
										bold: true,
										text: 'Variation',
									},
									{
										colSpan: 2,
										style: 'textCenter',
										bold: true,
										text: '<cms:date return="yesterday -1 days" format="d/m/Y" />',
									},
									{},
									{
										style: 'textCenter',
										bold: true,
										text: 'Variation',
									},
									{
										colSpan: 2,
										style: 'textCenter',
										bold: true,
										text: '<cms:date return="yesterday -1 days" format="d/m/Y" />',
									},
									{},
									{
										style: 'textCenter',
										bold: true,
										text: 'Variation',
									}
								],
								[
									'',
									'',
									'',
									{
										style: 'textCenter',
										bold: true,
										text: 'CY',
									},
									{
										style: 'textCenter',
										bold: true,
										text: 'LY',
									},
									{
										style: 'textCenter',
										bold: true,
										text: '(%)',
									},
									{
										style: 'textCenter',
										bold: true,
										text: 'CY',
									},
									{
										style: 'textCenter',
										bold: true,
										text: 'LY',
									},
									{
										style: 'textCenter',
										bold: true,
										text: '(%)',
									},
									{
										style: 'textCenter',
										bold: true,
										text: 'CY',
									},
									{
										style: 'textCenter',
										bold: true,
										text: 'LY',
									},
									{
										style: 'textCenter',
										bold: true,
										text: '(%)',
									}
								],
								<cms:folders masterpage='siding.php' orderby="weight">

								<cms:set my_trans_count="<cms:show k_folder_totalpagecount />" scope="global" />
								<cms:set my_trans_rowspan="<cms:pages masterpage='siding.php' folder=k_folder_name limit='1'><cms:show k_folder_totalpagecount /></cms:pages>" scope="global" /> 
								<cms:set my_trans_rowspan_total="<cms:pages masterpage='siding.php' folder=k_folder_name limit='1'><cms:show k_folder_totalpagecount /></cms:pages>" scope="global" />
								<cms:pages masterpage='siding.php' folder=k_folder_name>
								[
									{
										<cms:if my_trans_count_folder eq my_trans_rowspan_folder>
											rowSpan: <cms:set trans_rsf="<cms:add my_trans_rowspan_folder '1' />" /><cms:show trans_rsf />,
										style: 'textCenter',
										margin: [0, 150, 0, 0],
										text: 'WCL Transportation'
										<cms:decr my_trans_count_folder />
										</cms:if>
									},
									<cms:if my_trans_count eq my_trans_rowspan>
									{
										rowSpan: <cms:set trans_rs="<cms:add my_trans_rowspan '1' />" /><cms:show trans_rs />,
										style: 'textCenter',
										margin: [0, 10, 0, 0],
										text: '<cms:show k_folder_title />'
									},
									<cms:else_if my_trans_count ne my_trans_rowspan />
										'',
									</cms:if>
									{
										style: 'textCenter',
										text: '<cms:show k_page_title />'
									},
									{
										<cms:set wcl_cy_load = "0" scope="global" />
										<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='yesterday -1 days' format='Y-m-d' />">
											<cms:set wcl_cy_load = "<cms:add wcl_cy_load tons />" scope="global" />
										</cms:reverse_related_pages>
										style: 'textCenter',
										text: '<cms:show wcl_cy_load />'
									},
									{
										<cms:set wcl_ly_load = "0" scope="global" />
										<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='-367 days' format='Y-m-d' />">
											<cms:set wcl_ly_load = "<cms:add wcl_ly_load tons />" scope="global" />
										</cms:reverse_related_pages>
										style: 'textCenter',
										text: '<cms:show wcl_ly_load />'
									},
									{
										<cms:set wcl_difference = "<cms:sub wcl_cy_load wcl_ly_load />" scope="global" />
										style: 'textCenter',
										text: '<cms:if wcl_ly_load eq "0" >-<cms:else_if wcl_ly_load ne "0" /><cms:set wcl_var = "<cms:div wcl_difference wcl_ly_load />" scope="global" /><cms:set wcl_variation = "<cms:mul wcl_var '100' />" scope="global" /><cms:number_format wcl_variation decimal_precision = "2" /></cms:if>'
									},
									{
										<cms:set wcl_cy_month_load = "0" scope="global" />
										<cms:set wcl_avg_cy_month_load = "0" scope="global" />
										<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
											<cms:set wcl_cy_month_load = "<cms:add wcl_cy_month_load tons />" scope="global" />
										</cms:reverse_related_pages>
										<cms:set wcl_avg_cy_month_load = "<cms:div wcl_cy_month_load wcl_ly_day_range />" scope="global" />
										style: 'textCenter',
										text: '<cms:number_format wcl_avg_cy_month_load decimal_precision="0" />'
									},
									{
										<cms:set wcl_ly_month_load = "0" scope="global" />
										<cms:set wcl_avg_ly_month_load = "0" scope="global" />
										<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | transdate < <cms:date return='-366 days' format='Y-m-d' /> ">
											<cms:set wcl_ly_month_load = "<cms:add wcl_ly_month_load tons />" scope="global" />
										</cms:reverse_related_pages>
										<cms:set wcl_avg_ly_month_load = "<cms:div wcl_ly_month_load wcl_ly_day_range />" scope="global" />
										style: 'textCenter',
										text: '<cms:number_format wcl_avg_ly_month_load decimal_precision="0" />'
									},
									{
										<cms:set wcl_month_difference = "<cms:sub wcl_cy_month_load wcl_ly_month_load />" scope="global" />
										style: 'textCenter',
										text: '<cms:if wcl_ly_month_load eq "0" >-<cms:else_if wcl_ly_month_load ne "0" /><cms:set wcl_month_var = "<cms:div wcl_month_difference wcl_ly_month_load />" scope="global" /><cms:set wcl_month_variation = "<cms:mul wcl_month_var '100' />" scope="global" /><cms:number_format wcl_month_variation decimal_precision="2" /></cms:if>'
									},
									{
										<cms:set wcl_cy_april_load = "0" scope="global" />
										<cms:set wcl_avg_cy_april_load = "0" scope="global" />
										<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april this year' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
											<cms:set wcl_cy_april_load = "<cms:add wcl_cy_april_load tons />" scope="global" />
										</cms:reverse_related_pages>
										<cms:set wcl_avg_cy_april_load = "<cms:div wcl_cy_april_load wcl_dayz_cy />" scope="global" />
										style: 'textCenter',
										text: '<cms:number_format wcl_avg_cy_april_load decimal_precision="0" />'
									},
									{
										<cms:set wcl_ly_april_load = "0" scope="global" />
										<cms:set wcl_avg_ly_april_load = "0" scope="global" />
										<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april last year' format='Y-m-d' /> | transdate < <cms:date  return='-366 days' format='Y-m-d' /> ">
											<cms:set wcl_ly_april_load = "<cms:add wcl_ly_april_load tons />" scope="global" />
										</cms:reverse_related_pages>
										<cms:set wcl_avg_ly_april_load = "<cms:div wcl_ly_april_load wcl_dayz_ly />" scope="global" />
										style: 'textCenter',
										text: '<cms:number_format wcl_avg_ly_april_load decimal_precision="0" />'
									},
									{
										<cms:set wcl_april_difference = "<cms:sub wcl_cy_april_load wcl_ly_april_load />" scope="global" />
										style: 'textCenter',
										text: '<cms:if wcl_ly_april_load eq "0">-<cms:else_if wcl_ly_april_load ne "0" /><cms:set wcl_april_var = "<cms:div wcl_april_difference wcl_ly_april_load />" scope="global" /><cms:set wcl_april_variation = "<cms:mul wcl_april_var '100' />" scope="global" /><cms:number_format wcl_april_variation decimal_precision="2" /></cms:if>'
									}
								],
								<cms:decr my_trans_count />
								<cms:decr my_trans_rowspan_total />
								<cms:if my_trans_rowspan_total eq '0'>
								[

									'',
									'',
									{
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: 'TOTAL'
									},
									{
										<cms:set wcl_cy_load_total = "0" scope="global" />
										<cms:pages masterpage='siding.php' folder=k_folder_name >
											<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='yesterday -1 days' format='Y-m-d' />">
												<cms:set wcl_cy_load_total = "<cms:add wcl_cy_load_total tons />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:show wcl_cy_load_total />'
									},
									{
										<cms:set wcl_ly_load_total = "0" scope="global" />
										<cms:pages masterpage='siding.php' folder=k_folder_name >
											<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='-367 days' format='Y-m-d' />">
												<cms:set wcl_ly_load_total = "<cms:add wcl_ly_load_total tons />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:show wcl_ly_load_total />'
									},
									{
										<cms:set wcl_difference_total = "<cms:sub wcl_cy_load_total wcl_ly_load_total />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:if wcl_ly_load_total eq "0">-<cms:else_if wcl_ly_load_total ne "0" /><cms:set wcl_var_total = "<cms:div wcl_difference_total wcl_ly_load_total />" scope="global" /><cms:set wcl_variation_total = "<cms:mul wcl_var_total '100' />" scope="global" /><cms:number_format wcl_variation_total decimal_precision="2" /></cms:if>'
									},
									{
										<cms:set wcl_cy_month_load_total = "0" scope="global" />
										<cms:set wcl_avg_cy_month_load_total = "0" scope="global" />
										<cms:pages masterpage='siding.php' folder=k_folder_name >
											<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
												<cms:set wcl_cy_month_load_total = "<cms:add wcl_cy_month_load_total tons />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										<cms:set wcl_avg_cy_month_load_total = "<cms:div wcl_cy_month_load_total wcl_cy_day_range />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:number_format wcl_avg_cy_month_load_total decimal_precision="0" />'
									},
									{
										<cms:set wcl_ly_month_load_total = "0" scope="global" />
										<cms:set wcl_avg_ly_month_load_total = "0" scope="global" />
										<cms:pages masterpage='siding.php' folder=k_folder_name >
											<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | transdate < <cms:date return='-366 days' format='Y-m-d' /> ">
												<cms:set wcl_ly_month_load_total = "<cms:add wcl_ly_month_load_total tons />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										<cms:set wcl_avg_ly_month_load_total = "<cms:div wcl_ly_month_load_total wcl_ly_day_range />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:number_format wcl_avg_ly_month_load_total decimal_precision="0" />'
									},
									{
										<cms:set wcl_month_difference_total = "<cms:sub wcl_cy_month_load_total wcl_ly_month_load_total />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text:'<cms:if wcl_ly_month_load_total eq "0" >-<cms:else_if wcl_ly_month_load_total ne "0" /><cms:set wcl_month_var_total = "<cms:div wcl_month_difference_total wcl_ly_month_load_total />" scope="global" /><cms:set wcl_month_variation_total = "<cms:mul wcl_month_var_total '100' />" scope="global" /><cms:number_format wcl_month_variation_total decimal_precision="2" /></cms:if>'
									},
									{
										<cms:set wcl_cy_april_load_total = "0" scope="global" />
										<cms:set wcl_avg_cy_april_load_total = "0" scope="global" />
										<cms:pages masterpage='siding.php' folder=k_folder_name >
											<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april this year' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
												<cms:set wcl_cy_april_load_total = "<cms:add wcl_cy_april_load_total tons />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										<cms:set wcl_avg_cy_april_load_total = "<cms:div wcl_cy_april_load_total wcl_dayz_cy />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:number_format wcl_avg_cy_april_load_total decimal_precision="0" />'
									},
									{
										<cms:set wcl_ly_april_load_total = "0" scope="global" />
										<cms:set wcl_avg_ly_april_load_total = "0" scope="global" />
										<cms:pages masterpage='siding.php' folder=k_folder_name >
											<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april last year' format='Y-m-d' /> | transdate < <cms:date  return='-366 days' format='Y-m-d' /> ">
												<cms:set wcl_ly_april_load_total = "<cms:add wcl_ly_april_load_total tons />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										<cms:set wcl_avg_ly_april_load_total = "<cms:div wcl_ly_april_load_total wcl_dayz_ly />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:number_format wcl_avg_ly_april_load_total decimal_precision="0" />'
									},
									{
										<cms:set wcl_april_difference_total = "<cms:sub wcl_cy_april_load_total wcl_ly_april_load_total />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:if wcl_ly_april_load_total eq "0">-<cms:else_if wcl_ly_april_load_total ne "0" /><cms:set wcl_april_var_total = "<cms:div wcl_april_difference_total wcl_ly_april_load_total />" scope="global" /><cms:set wcl_april_variation_total = "<cms:mul wcl_april_var_total '100' />" scope="global" /><strong><cms:number_format wcl_april_variation_total decimal_precision="2" /></strong></cms:if>'
									},
								],
								</cms:if>
								</cms:pages>
								</cms:folders>

								[
									'',
									{
										colSpan: 2,
										style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
										text: 'G. TOTAL'
									},
									{},
									{
										<cms:set wcl_cy_load_grand_total = "0" scope="global" />
				                    	<cms:folders masterpage='siding.php' orderby="weight">
											<cms:pages masterpage='siding.php' folder=k_folder_name >
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='yesterday -1 days' format='Y-m-d' />">
													<cms:set wcl_cy_load_grand_total = "<cms:add wcl_cy_load_grand_total tons />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
				                    	</cms:folders>
				                    	style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
				                    	text: '<cms:show wcl_cy_load_grand_total />'
									},
									{
										<cms:set wcl_ly_load_grand_total = "0" scope="global" />
				                    	<cms:folders masterpage='siding.php' orderby="weight">
											<cms:pages masterpage='siding.php' folder=k_folder_name >
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate=<cms:date return='-367 days' format='Y-m-d' />">
													<cms:set wcl_ly_load_grand_total = "<cms:add wcl_ly_load_grand_total tons />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
				                    	</cms:folders>
				                    	style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
				                    	text: '<cms:show wcl_ly_load_grand_total />'
									},
									{
										<cms:set wcl_difference_grand_total = "<cms:sub wcl_cy_load_grand_total wcl_ly_load_grand_total />" scope="global" />
										style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
										text: '<cms:if wcl_ly_load_grand_total eq "0">-<cms:else_if wcl_ly_load_grand_total ne "0" /><cms:set wcl_var_grand_total = "<cms:div wcl_difference_grand_total wcl_ly_load_grand_total />" scope="global" /><cms:set wcl_variation_grand_total = "<cms:mul wcl_var_grand_total '100' />" scope="global" /><cms:number_format wcl_variation_grand_total decimal_precision="2" /></cms:if>'
									},
									{
										<cms:set wcl_cy_month_load_grand_total = "0" scope="global" />
										<cms:set wcl_avg_cy_month_load_grand_total = "0" scope="global" />
				                    	<cms:folders masterpage='siding.php' orderby="weight">
											<cms:pages masterpage='siding.php' folder=k_folder_name >
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
													<cms:set wcl_cy_month_load_grand_total = "<cms:add wcl_cy_month_load_grand_total tons />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
											<cms:set wcl_avg_cy_month_load_grand_total = "<cms:div wcl_cy_month_load_grand_total wcl_cy_day_range />" scope="global" />
				                    	</cms:folders>
				                    	style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
				                    	text: '<cms:number_format wcl_avg_cy_month_load_grand_total decimal_precision="0" />'	
									},
									{
										<cms:set wcl_ly_month_load_grand_total = "0" scope="global" />
										<cms:set wcl_avg_ly_month_load_grand_total = "0" scope="global" />
				                    	<cms:folders masterpage='siding.php' orderby="weight">
											<cms:pages masterpage='siding.php' folder=k_folder_name >
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | transdate < <cms:date return='-366 days' format='Y-m-d' /> ">
													<cms:set wcl_ly_month_load_grand_total = "<cms:add wcl_ly_month_load_grand_total tons />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
											<cms:set wcl_avg_ly_month_load_grand_total = "<cms:div wcl_ly_month_load_grand_total wcl_ly_day_range />" scope="global" />
				                    	</cms:folders>
				                    	style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
				                		text: '<cms:number_format wcl_avg_ly_month_load_grand_total decimal_precision="2" />'
									},
									{
										<cms:set wcl_month_difference_grand_total = "<cms:sub wcl_cy_month_load_grand_total wcl_ly_month_load_grand_total />" scope="global" />
										style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
										text: '<cms:if wcl_ly_month_load_grand_total eq "0" >-<cms:else_if wcl_ly_month_load_grand_total ne "0" /><cms:set wcl_month_var_grand_total = "<cms:div wcl_month_difference_grand_total wcl_ly_month_load_grand_total />" scope="global" /><cms:set wcl_month_variation_grand_total = "<cms:mul wcl_month_var_grand_total '100' />" scope="global" /><cms:number_format wcl_month_variation_grand_total decimal_precision="2" /></cms:if>'	
									},
									{
										<cms:set wcl_cy_april_load_grand_total = "0" scope="global" />
										<cms:set wcl_avg_cy_april_load_grand_total = "0" scope="global" />
										<cms:folders masterpage='siding.php' orderby="weight">
											<cms:pages masterpage='siding.php' folder=k_folder_name >
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april this year' format='Y-m-d' /> | transdate < <cms:date return='yesterday' format='Y-m-d' /> ">
													<cms:set wcl_cy_april_load_grand_total = "<cms:add wcl_cy_april_load_grand_total tons />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
											<cms:set wcl_avg_cy_april_load_grand_total = "<cms:div wcl_cy_april_load_grand_total wcl_dayz_cy />" scope="global" />
										</cms:folders>
										style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
										text: '<cms:number_format wcl_avg_cy_april_load_grand_total decimal_precision="0" />'
									},
									{
										<cms:set wcl_ly_april_load_grand_total = "0" scope="global" />
										<cms:set wcl_avg_ly_april_load_grand_total = "0" scope="global" />
				                    	<cms:folders masterpage='siding.php' orderby="weight">
											<cms:pages masterpage='siding.php' folder=k_folder_name >
												<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:date 'first day of april last year' format='Y-m-d' /> | transdate < <cms:date  return='-366 days' format='Y-m-d' /> ">
													<cms:set wcl_ly_april_load_grand_total = "<cms:add wcl_ly_april_load_grand_total tons />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
											<cms:set wcl_avg_ly_april_load_grand_total = "<cms:div wcl_ly_april_load_grand_total wcl_dayz_ly />" scope="global" />
				                		</cms:folders>
				                		style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
				                		text: '<cms:number_format wcl_avg_ly_april_load_grand_total decimal_precision="0" />'
									},
									{
										<cms:set wcl_april_difference_grand_total = "<cms:sub wcl_cy_april_load_grand_total wcl_ly_april_load_grand_total />" scope="global" />
										style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
										text: '<cms:if wcl_ly_april_load_grand_total eq "0">-<cms:else_if wcl_ly_april_load_grand_total ne "0" /><cms:set wcl_april_var_grand_total = "<cms:div wcl_april_difference_grand_total wcl_ly_april_load_grand_total />" scope="global" /><cms:set wcl_april_variation_grand_total = "<cms:mul wcl_april_var_grand_total '100' />" scope="global" /><cms:number_format wcl_april_variation_grand_total decimal_precision="2" /></cms:if>'
									}
								],
							]
						}
					}
				],
				styles: {
					textCenter: {
						alignment: 'center'
					},
					header: {
						fontSize: 8,
						margin: [50, 0, 0, 5],
					},
					subheader: {
						fontSize: 8,
						margin: [0, 10, 0, 5]
					},
					tableExample: {
						fontSize: 6,
						margin: [0, 5, 0, 15]
					},
					tableHeader: {
						fontSize: 7,
						margin: [50, 0, 0, 50],
						color: 'black'
					}
				},
				defaultStyle: {
					// alignment: 'justify'
				}
			}
			pdfMake.createPdf(dd).open();
		}
	</script>
</cms:ignore>
	<div class="gxcpl-ptop-50"></div>
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>