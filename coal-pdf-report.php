<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Coal PDF Report" parent='_coal_' order='6' />
	<cms:embed 'header.html' />
		<div class="container-fluid">
			<div class="row">
				<div class="gxcpl-ptop-50"></div>
				<div class="col-md-12">
					<div class="gxcpl-card">
						<div class="gxcpl-card-header">
							<h4>COAL LOADING PERFORMANCE ON DATE 
								<strong><cms:date return='yesterday' format="d/m/Y" /></strong>
							</h4>

						</div>
						<div class="gxcpl-card-body" id="template_invoice">
							<div id="customers" style="padding: 2%;">
							
							    <table width="100%" border="1">
							    	<thead>
									  	<tr>
										    <th rowspan="4" class="text-center">Head</th>
										    <th rowspan="4" class="text-center">Area</th>
										    <th rowspan="4" class="text-center">Colliery</th>
										    <th rowspan="4" class="text-center">Daily Target</th>
										    <th colspan="3" class="text-center">Day</th>
										    <th colspan="5" class="text-center">Month Upto</th>
										    <th colspan="5" class="text-center">1 April Upto</th>
									  	</tr>
									  	<cms:set sum_total='0' scope='global' />
									  	
									  	<tr>
										    <th colspan="2" class="text-center">
										    	<cms:date return='yesterday' format="d/m/Y" />
										    </th>
										    <th class="text-center">Variation</th>
										    <th colspan="4" class="text-center">
										    	<cms:date return='yesterday' format="d/m/Y" />
										    </th>
										    <th class="text-center">Variation</th>
										    <th colspan="4" class="text-center">
										    	<cms:date return='yesterday' format="d/m/Y" />
										    </th>
										    <th class="text-center">Variation</th>
									  	</tr>
									  	<tr>
										    <th rowspan="2" class="text-center">CY</th>
										    <th rowspan="2" class="text-center">LY</th>
										    <th rowspan="2" class="text-center">%</th>
										    <th colspan="2" class="text-center">CY</th>
										    <th colspan="2" class="text-center">LY</th>
										    <th rowspan="2" class="text-center">%</th>
										    <th colspan="2" class="text-center">CY</th>
										    <th colspan="2" class="text-center">LY</th>
										    <th rowspan="2" class="text-center">%</th>
									  	</tr>

									  	<tr>
										    <th class="text-center">Total</th>
										    <th class="text-center">Av/day</th>
										    <th class="text-center">Total</th>
										    <th class="text-center">Av/day</th>
										    <th class="text-center">Total</th>
										    <th class="text-center">Av/day</th>
										    <th class="text-center">Total</th>
										    <th class="text-center">Av/day</th>
									  	</tr>
									</thead>

									<tbody>
										<cms:set my_count_folder="<cms:pages masterpage='loading-pt.php' limit='1' count_only='1' />" scope="global" />
										<cms:set my_daily_target_total = '0' scope='global' />

										<!-- This month Range -->
										<cms:set cy_current_day = "<cms:date format='d' />" scope="global" />
										<cms:set cy_first_day = "<cms:date return='first day of this month' format='d' />" scope="global" />
										<cms:set cy_day_range = "<cms:sub cy_current_day cy_first_day />" scope="global" />
										<!-- This month Range -->

										<!-- Last year month Range -->
										<cms:set ly_current_day = "<cms:date return='-365 days' format='d' />" scope="global" />
										<cms:set ly_first_day = "<cms:date return='first day of this month last year' format='d' />" scope="global" />
										<cms:set ly_day_range = "<cms:sub ly_current_day ly_first_day />" scope="global" />
										<!-- This month Range -->	

										<!-- This year Range from april to current month -->
										<cms:set apr_cy = "<cms:date 'first day of april this year' format='Y-m-d' />" />
										<cms:set cur_mtn_cy = "<cms:date format='Y-m-d' />" />
										<cms:php>
											global $CTX;
											$from_date_cy = new DateTime(date($CTX->get('apr_cy')));
											$to_date_cy = new DateTime(date($CTX->get('cur_mtn_cy')));
											$dayz_cy = $to_date_cy->diff($from_date_cy)->days;
											$CTX->set( 'dayz_cy', $dayz_cy, 'global' );
										</cms:php>
										<!-- This year Range from april to current month -->

										<!-- Last year Range from april to current month of last year -->
										<cms:set apr_ly = "<cms:date 'first day of april last year' format='Y-m-d' />" />
										<cms:set cur_mtn_ly = "<cms:date '-365 days' format='Y-m-d' />" />
										<cms:php>
											global $CTX;
											$from_date_ly = new DateTime(date($CTX->get('apr_ly')));
											$to_date_ly = new DateTime(date($CTX->get('cur_mtn_ly')));
											$dayz_ly = $to_date_ly->diff($from_date_ly)->days;
											$CTX->set( 'dayz_ly', $dayz_ly, 'global' );
										</cms:php>

										<!-- Last year Range from april to current month of last year -->

										<cms:folders masterpage='loading-pt.php' orderby="weight">
										
										<cms:set my_count="<cms:show k_folder_totalpagecount />" scope="global" />
										
										<cms:set my_rowspan_folder="<cms:pages masterpage='loading-pt.php' limit='1' count_only='1' />" scope="global" />

										<cms:set my_rowspan="<cms:pages masterpage='loading-pt.php' folder=k_folder_name limit='1'><cms:show k_folder_totalpagecount /></cms:pages>" scope="global" />
										<cms:set my_rowspan_total="<cms:pages masterpage='loading-pt.php' folder=k_folder_name limit='1'><cms:show k_folder_totalpagecount /></cms:pages>" scope="global" />

										<cms:set difference= '0' scope='global' />
										<cms:set variation= '0' scope='global' />

										<cms:pages masterpage='loading-pt.php' folder=k_folder_name>

										<tr>
											<!-- Head -->
											<cms:if my_count_folder eq my_rowspan_folder>
											<td width="10%" class="text-center" rowspan="<cms:add my_rowspan_folder '1' />">
												WCL (FSA) (Raw coal loading for Power houses, WCL's e.auction and other linked viz CPP, steel)
											</td>
											<cms:decr my_count_folder />
											</cms:if>
											<!-- Head -->

											<!-- Area -->
											<cms:if my_count eq my_rowspan>	
											<td class="text-center" rowspan="<cms:add my_rowspan '1' />">
												<cms:show k_folder_title />
											</td>
											</cms:if>
											<!-- Area -->

											<!-- Colliery -->
											<td class="text-center">
												<cms:show k_page_title />
											</td>
											<!-- Colliery -->

											<!-- Daily Target -->
											<td class="text-center">
												<cms:show daily_target />
											</td>
											<!-- Daily Target -->

											<!-- Day CY -->
											<cms:set my_cy_load_total='0' scope='global' />
											<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date return='yesterday' format='Y-m-d' />">
											<cms:set my_cy_load_total = "<cms:add my_cy_load_total hlf_ful />" scope="global" />
											</cms:reverse_related_pages>
											<td class="text-center">
												<cms:set cy_load = "<cms:show my_cy_load_total />" scope="global" />
												<cms:show cy_load />
											</td>
											<!-- Day CY -->

											<!-- Day LY -->
											<cms:set my_ly_load_total='0' scope='global' />
											<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date return='-366 days' format='Y-m-d' />">
											<cms:set my_ly_load_total = "<cms:add my_ly_load_total hlf_ful />" scope="global" />
											</cms:reverse_related_pages>
											<td class="text-center">
												<cms:set ly_load = "<cms:show my_ly_load_total />" scope="global" />
												<cms:show ly_load />
											</td>
											<!-- Day LY -->

											<!-- Day Variation -->
											<cms:set difference = "<cms:sub cy_load ly_load />" scope='global' />
											<td class="text-center">
												<cms:if ly_load eq '0'>
													-
												<cms:else_if ly_load ne '0' />
													<cms:set var = "<cms:div difference ly_load />" scope='global' />
													<cms:set variation = "<cms:mul var '100' />" scope='global' />
													<cms:number_format variation decimal_precision='2' />
												</cms:if>
											</td>
											<!-- Day Variation -->

											<!-- monthly this year CY -->
											<td class="text-center">
												<cms:set my_cy_monthly_load = "0" scope="global" />
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='first day of this month' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' />">
													<cms:set my_cy_monthly_load = "<cms:add my_cy_monthly_load hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
												<cms:show my_cy_monthly_load />
											</td>
											<!-- monthly this year CY -->

											<!-- monthly this year CY average -->
											<td class="text-center">
												<cms:set avg_cy_per_day_load = "0" scope="global" />
												<cms:set avg_cy_per_day_load = "<cms:div my_cy_monthly_load cy_day_range />" scope="global" />
												<cms:number_format avg_cy_per_day_load decimal_precision='2' />
											</td>
											<!-- monthly this year CY average -->

											<!-- monthly last year (LY) -->
											<td class="text-center">
												<cms:set my_ly_monthly_load = "0" scope="global" />
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | tdate < <cms:date return='-365 days' format='Y-m-d' />">
													<cms:set my_ly_monthly_load = "<cms:add my_ly_monthly_load hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
												<cms:show my_ly_monthly_load />
											</td>
											<!-- monthly last year (LY) -->

											<!-- monthly this year average (LY) -->
											<td class="text-center">
												<cms:set avg_ly_per_day_load = "0" scope="global" />
												<cms:set avg_ly_per_day_load = "<cms:div my_ly_monthly_load ly_day_range />" scope="global" />
												<cms:number_format avg_ly_per_day_load decimal_precision='2' />
											</td>
											<!-- monthly this year average (LY) -->

											<!-- monthly variation -->
											<cms:set montly_difference = "<cms:sub my_cy_monthly_load my_ly_monthly_load />" scope="global" />
											<td class="text-center">
												<cms:if my_ly_monthly_load eq '0'>
													-
												<cms:else />
													<cms:set montly_var = "<cms:div montly_difference my_ly_monthly_load />" scope="global" />
													<cms:set montly_variation= "<cms:mul montly_var '100' />" scope='global' />
														<cms:number_format montly_variation decimal_precision='2' />
												</cms:if>
											</td>
											<!-- monthly variation -->
												
											<!-- 1 April to this year CY -->
											<td class="text-center">
												<cms:set cy_april_year_load = "0" scope="global" />
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'first day of april' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' />">
												<cms:set cy_april_year_load = "<cms:add cy_april_year_load hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
												<cms:show cy_april_year_load />
											</td>
											<!-- 1 April to this year CY -->

											<!-- 1 April to this year CY average-->
											<td class="text-center">
												<cms:set avg_cy_april_year_per_day_load = "0" scope="global" /> 
												<cms:set avg_cy_april_year_per_day_load = "<cms:div cy_april_year_load dayz_cy />" scope="global" />
												<cms:number_format avg_cy_april_year_per_day_load decimal_precision='2' />
											</td>
											<!-- 1 April to this year CY average-->

											<!-- 1 April to this year LY -->
											<td class="text-center">
												<cms:set ly_april_year_load = "0" scope="global" />
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'first day of april last year' format='Y-m-d' /> | tdate < <cms:date '-365 days' format='Y-m-d' />">
													<cms:set ly_april_year_load = "<cms:add ly_april_year_load hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
												<cms:show ly_april_year_load />
											</td>
											<!-- 1 April to this year LY -->

											<!-- 1 April to this year LY average-->
											<td class="text-center">
												<cms:set avg_ly_april_year_per_day_load = "0" scope="global" />
												<cms:set avg_ly_april_year_per_day_load = "<cms:div ly_april_year_load dayz_ly />" scope="global" />
												<cms:number_format avg_ly_april_year_per_day_load decimal_precision='2' />
											</td>
											<!-- 1 April to this year LY average-->

											<!-- 1 April to this year Variation-->
											<td class="text-center">
												<cms:set april_difference = "<cms:sub cy_april_year_load ly_april_year_load />" scope="global" />
												<cms:if ly_april_year_load eq '0'>
													-
												<cms:else_if ly_april_year_load ne '0' />
													<cms:set april_var = "<cms:div april_difference ly_april_year_load />" scope="global" />
													<cms:set april_variation = "<cms:mul april_var '100' />" scope="global" />
													<cms:number_format april_variation decimal_precision='2' />
												</cms:if>
											</td>
											<!-- 1 April to this year Variation-->
											
										</tr>		
										<cms:decr my_count />
										<cms:decr my_rowspan_total />
										<cms:if my_rowspan_total eq '0'>
											<cms:set my_daily_target = '0' scope='global' />
											<cms:set my_hlf_ful= '0' scope='global' />
											<cms:set my_ly_hlf_ful= '0' scope='global' />
											<cms:set difference_total= '0' scope='global' />
											<cms:set variation_total= '0' scope='global' />

											<!-- TOTAL -->
											<tr class="highlight">
												<td class="text-center"><strong>TOTAL</strong></td>
												<!-- TOTAL Daily Target -->
												<td class="text-center">
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
														<cms:set my_daily_target="<cms:add my_daily_target daily_target />" scope="global" />
													</cms:pages>
													<strong><cms:show my_daily_target /></strong>
												</td>
												<!-- TOTAL Daily Target -->

												<!-- TOTAL Day CY -->
												<td class="text-center">
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
														<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date return='yesterday' format='Y-m-d' />">
															<cms:set my_hlf_ful="<cms:add my_hlf_ful hlf_ful />" scope="global" />
														</cms:reverse_related_pages>
													</cms:pages>
													<cms:set cy_load_total="<cms:show my_hlf_ful />" scope="global" />
													<strong><cms:show cy_load_total /></strong>
												</td>
												<!-- TOTAL Day CY -->

												<!-- TOTAL Day LY -->
												<td class="text-center">
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
														<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date return='-366 days' format='Y-m-d' />">
															<cms:set my_ly_hlf_ful="<cms:add my_ly_hlf_ful hlf_ful />" scope="global" />
														</cms:reverse_related_pages>
													</cms:pages>
													<cms:set ly_load_total="<cms:show my_ly_hlf_ful />" scope="global" />
													<strong><cms:show ly_load_total /></strong>
												</td>
												<!-- TOTAL Day LY -->

												<!-- TOTAL Day Variation -->
												<td class="text-center">
													<cms:if ly_load_total eq '0'>
														-
													<cms:else_if ly_load_total eq '0' />
														<cms:set difference_total="<cms:sub cy_load_total ly_load_total />" />
														<cms:set vari_total="<cms:div difference_total ly_load />" scope='global' />
														<cms:set variation_total= "<cms:mul vari_total '100' />" scope='global' />
														<strong>
															<cms:number_format variation_total decimal_precision='2' />
														</strong>
													</cms:if>
												</td>
												<!-- TOTAL Day Variation -->

												<!-- TOTAL: monthly this year CY -->
												<td class="text-center">
													<cms:set my_cy_monthly_load_total = '0' scope='global' />
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
														<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='first day of this month' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' />">
															<cms:set my_cy_monthly_load_total = "<cms:add my_cy_monthly_load_total hlf_ful />" scope='global' />
														</cms:reverse_related_pages>
													</cms:pages>
													<strong><cms:show my_cy_monthly_load_total /></strong>
												</td>
												<!-- TOTAL: monthly this year CY -->

												<!-- TOTAL: monthly this year average CY -->
												<td class="text-center">
													<cms:set avg_cy_per_day_load_total = "0" scope="global" />
						 							<cms:set avg_cy_per_day_load_total = "<cms:div my_cy_monthly_load_total cy_day_range />" scope='global' />
						 							<strong>
						 								<cms:number_format avg_cy_per_day_load_total decimal_precision='2' />
						 							</strong>
												</td>
												<!-- TOTAL: monthly this year average CY -->

												<!-- TOTAL: monthly last year (LY) -->
												<td class="text-center">
													<cms:set my_ly_monthly_load_total = '0' scope='global' />
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
													<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | tdate < <cms:date return='-365 days' format='Y-m-d' />">
														<cms:set my_ly_monthly_load_total = "<cms:add my_ly_monthly_load_total hlf_ful />" scope="global" />
													</cms:reverse_related_pages>
													</cms:pages>
													<strong>
														<cms:show my_ly_monthly_load_total />
													</strong>
												</td>
												<!-- TOTAL: monthly last year (LY) -->

												<!-- TOTAL: monthly last year average (LY) -->
												<td class="text-center">
													<cms:set avg_ly_per_day_load_total = "0" scope="global" />
						 							<cms:set avg_ly_per_day_load_total = "<cms:div my_ly_monthly_load_total ly_day_range />" scope='global' />
						 							<strong>
						 								<cms:number_format avg_ly_per_day_load_total decimal_precision='2' />
						 							</strong>
												</td>
												<!-- TOTAL: monthly last year average (LY) -->

												<!-- TOTAL monthly variation -->
												<td class="text-center">
													<cms:set montly_difference_total = "<cms:sub my_cy_monthly_load_total my_ly_monthly_load_total /> " scope="global" />
													<cms:if my_ly_monthly_load_total eq '0'>
														-
													<cms:else_if my_ly_monthly_load_total ne '0' />
														<cms:set montly_var_total = "<cms:div montly_difference_total my_ly_monthly_load_total />" scope="global" />
														<cms:set montly_variation_total = "<cms:mul montly_var_total '100' />" scope='global' />
														<strong>
															<cms:number_format montly_variation_total decimal_precision='2' />
														</strong>
													</cms:if>
												</td>
												<!-- TOTAL monthly variation -->

												<!-- TOTAL 1 April to this year CY -->
												<td class="text-center">
													<cms:set cy_april_year_load_total = "0" scope="global" />
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
													<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'first day of april' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' />">
													<cms:set cy_april_year_load_total = "<cms:add cy_april_year_load_total hlf_ful />" scope="global" />
													</cms:reverse_related_pages>
													</cms:pages>
													<strong><cms:show cy_april_year_load_total /></strong>
												</td>
												<!-- TOTAL 1 April to this year CY -->
												<!-- TOTAL 1 April to this year CY average-->
												<td class="text-center">
													<cms:set avg_cy_april_year_per_day_load = "0" scope="global" />
													<cms:set avg_cy_april_year_per_day_load = "<cms:div cy_april_year_load_total dayz_cy />" scope="global" />
													<strong>
														<cms:number_format avg_cy_april_year_per_day_load decimal_precision='2' />
													</strong>
												</td>
												<!-- TOTAL 1 April to this year CY average-->

												<!-- TOTAL 1 April to this year LY -->
												<td class="text-center">
													<cms:set ly_april_year_load_total = "0" scope="global" />
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
													<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'first day of april last year' format='Y-m-d' /> | tdate < <cms:date '-365 days' format='Y-m-d' />">
													<cms:set ly_april_year_load_total = "<cms:add ly_april_year_load_total hlf_ful />" scope="global" />
													</cms:reverse_related_pages>
													</cms:pages>
													<strong><cms:show ly_april_year_load_total /></strong>
												</td>
												<!-- TOTAL 1 April to this year LY -->
												<!-- TOTAL 1 April to this year LY average-->
												<td class="text-center">
													<cms:set avg_ly_april_year_per_day_load = "0" scope="global" />
													<cms:set avg_ly_april_year_per_day_load = "<cms:div ly_april_year_load_total dayz_ly />" scope="global" />
													<strong>
														<cms:number_format avg_ly_april_year_per_day_load decimal_precision='2' />
													</strong>
												</td>
												<!-- TOTAL 1 April to this year LY average-->
												<!-- TOTAL 1 April to this year Variation-->
												<td class="text-center">
													<cms:set april_difference_total = "<cms:sub cy_april_year_load_total ly_april_year_load_total />" scope="global" />
													<cms:if ly_april_year_load_total eq '0'>
														-
													<cms:else_if ly_april_year_load_total ne '0' />
														<cms:set april_var_total = "<cms:div april_difference_total ly_april_year_load_total />" scope="global" />
														<cms:set april_variation_total = "<cms:mul april_var_total '100' />" scope="global" />
														<strong>
															<cms:number_format april_variation_total decimal_precision='2' />
														</strong>
													</cms:if>
												</td>
												<!-- TOTAL 1 April to this year Variation-->
											</tr>
											<!-- TOTAL -->
										</cms:if>
										</cms:pages>
										</cms:folders>

										<!-- Grand Total -->
										
										<tr class="highlight-total">
						                    <td colspan="2" class="text-center" style="padding: 5px 10px;">
						                    	<strong>TOTAL</strong>
						                    </td>

						                    <!-- Grand Total Daily Target -->
						                    <td class="text-center" style="padding: 5px 10px;">
						                    	<cms:set grand_total = '0' scope='global' />
						                    	<cms:folders masterpage='loading-pt.php'>
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name>
														<cms:set grand_total="<cms:add grand_total daily_target />" scope="global" />
													</cms:pages>
												</cms:folders>
												<strong><cms:show grand_total /></strong>
						                    </td>
						                    <!-- Grand Total Daily Target -->

						                    <!-- Grand Total Day CY -->
						                    <td class="text-center" style="padding: 5px 10px;">
						                    	<cms:set cy_load_grand_total = '0' scope='global' />
						                    	<cms:folders masterpage='loading-pt.php'>
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
														<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date return='yesterday' format='Y-m-d' />" >
															<cms:set cy_load_grand_total="<cms:add cy_load_grand_total hlf_ful />" scope="global" />
														</cms:reverse_related_pages>
													</cms:pages>
												</cms:folders>
												<strong><cms:show cy_load_grand_total /></strong>
						                    </td>
						                    <!-- Grand Total Day CY -->

						                    <!-- Grand Total Day LY -->
						                    <td class="text-center" style="padding: 5px 10px;">
						                    	<cms:set ly_load_grand_total = '0' scope='global' />
						                    	<cms:folders masterpage='loading-pt.php'>
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
														<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date return='-366 days' format='Y-m-d' />" >
															<cms:set ly_load_grand_total="<cms:add ly_load_grand_total hlf_ful />" scope="global" />
														</cms:reverse_related_pages>
													</cms:pages>
												</cms:folders>
												<strong><cms:show ly_load_grand_total /></strong>
						                    </td>
						                    <!-- Grand Total Day LY -->

						                    <!-- Grand Total day Variation -->
						                    <td class="text-center" style="padding: 5px 10px;">
						                    	<cms:if ly_load_grand_total eq '0'>
						                    		-
						                    	<cms:else />
						                    		<cms:set difference_grand_total = "<cms:sub cy_load_grand_total ly_load_grand_total />" scope="global" />
						                    		<cms:set division_grand_total = "<cms:div difference_grand_total ly_load_grand_total />" scope="global" />
						                    		<cms:set percent_grand_total = "<cms:mul division_grand_total '100' />" scope="global" />
						                    		<strong><cms:number_format percent_grand_total decimal_precision='2' /></strong>
						                    	</cms:if>
						                    </td>
						                    <!-- Grand Total day Variation -->

						                    <!-- Grand Total monthly this year CY -->
						                    <td class="text-center" style="padding: 5px 10px;">
						                    	<cms:set my_cy_monthly_load_grand_total = "0" scope="global" />
						                    	<cms:folders masterpage='loading-pt.php'>
						                    	<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
													<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='first day of this month' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' />">
														<cms:set my_cy_monthly_load_grand_total = "<cms:add my_cy_monthly_load_grand_total hlf_ful />" scope='global' />
													</cms:reverse_related_pages>
												</cms:pages>
												</cms:folders>
						                    	<strong><cms:show my_cy_monthly_load_grand_total /></strong>
						                    </td>
						                    <!-- Grand Total monthly this year CY -->

						                    <!-- Grand Total monthly this year average CY -->
						                    <td class="text-center" style="padding: 5px 10px;">
												<cms:set avg_cy_per_day_load_grand_total = "0" scope="global" />
												<cms:set avg_cy_per_day_load_grand_total = "<cms:div my_cy_monthly_load_grand_total cy_day_range />" scope='global' />
												<strong>
													<cms:number_format avg_cy_per_day_load_grand_total decimal_precision='2' />
												</strong>
						                    </td>
						                    <!-- Grand Total monthly this year average CY -->

						                    <!-- Grand TOTAL: monthly last year (LY) -->
											<td class="text-center" style="padding: 5px 10px;">
												<cms:set my_ly_monthly_load_grand_total = "0" scope="global" />
												<cms:folders masterpage='loading-pt.php'>
												<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | tdate < <cms:date return='-365 days' format='Y-m-d' />">
													<cms:set my_ly_monthly_load_grand_total = "<cms:add my_ly_monthly_load_grand_total hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
												</cms:pages>
												</cms:folders>
												<strong><cms:show my_ly_monthly_load_grand_total /></strong>
											</td>
											<!-- Grand TOTAL: monthly last year (LY) -->

											<!-- Grand TOTAL: monthly last year average (LY) -->
											<td class="text-center" style="padding: 5px 10px;">
												<cms:set avg_ly_per_day_load_total = "0" scope="global" />
												<cms:set avg_ly_per_day_load_grand_total = "<cms:div my_ly_monthly_load_grand_total ly_day_range />" scope='global' />
												<strong>
													<cms:number_format avg_ly_per_day_load_grand_total decimal_precision='2' />
												</strong>
											</td>
											<!-- Grand TOTAL: monthly last year average (LY) -->

											<!-- Grand TOTAL monthly variation -->
											<td class="text-center" style="padding: 5px 10px;">
												<cms:set montly_difference_grand_total = "<cms:sub my_cy_monthly_load_grand_total my_ly_monthly_load_grand_total /> " scope="global" />
												<cms:if my_ly_monthly_load_grand_total eq '0'>
													-
												<cms:else_if my_ly_monthly_load_grand_total ne '0' />
													<cms:set montly_var_grand_total = "<cms:div montly_difference_grand_total my_ly_monthly_load_grand_total />" scope="global" />
													<cms:set montly_variation_grand_total= "<cms:mul montly_var_grand_total '100' />" scope='global' />
													<strong>
														<cms:number_format montly_variation_grand_total decimal_precision='2' />
													</strong>
												</cms:if>
											</td>
											<!-- Grand TOTAL monthly variation -->
											<!-- Grand TOTAL 1 April to this year CY -->
											<td class="text-center" style="padding: 5px 10px;">
												<cms:set cy_april_year_load_grand_total = "0" scope="global" />
												<cms:folders masterpage='loading-pt.php'>
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
														<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'first day of april' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' />">
															<cms:set cy_april_year_load_grand_total = "<cms:add cy_april_year_load_grand_total hlf_ful />" scope="global" />
														</cms:reverse_related_pages>
													</cms:pages>
												</cms:folders>
												<strong><cms:show cy_april_year_load_grand_total /></strong>
											</td>
											<!-- Grand TOTAL 1 April to this year CY -->
											<!-- Grand TOTAL 1 April to this year CY average-->
											<td class="text-center" style="padding: 5px 10px;">
												<cms:set avg_cy_april_year_per_day_grand_load = "0" scope="global" />
												<cms:set avg_cy_april_year_per_day_grand_load = "<cms:div cy_april_year_load_grand_total dayz_cy />" scope="global" />
												<strong>
													<cms:number_format avg_cy_april_year_per_day_grand_load decimal_precision='2' />
												</strong>
											</td>
											<!-- Grand TOTAL 1 April to this year CY average-->

											<!-- Grand TOTAL 1 April to this year LY -->
											<td class="text-center" style="padding: 5px 10px;">
												<cms:set ly_april_year_load_grand_total = "0" scope="global" />
												<cms:folders masterpage='loading-pt.php'>
													<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
														<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'first day of april last year' format='Y-m-d' /> | tdate < <cms:date '-365 days' format='Y-m-d' />">
															<cms:set ly_april_year_load_grand_total = "<cms:add ly_april_year_load_grand_total hlf_ful />" scope="global" />
														</cms:reverse_related_pages>
													</cms:pages>
												</cms:folders>
												<strong><cms:show ly_april_year_load_grand_total /></strong>
											</td>
											<!-- Grand TOTAL 1 April to this year LY -->
											<!-- Grand TOTAL 1 April to this year LY average-->
											<td class="text-center" style="padding: 5px 10px;">
												<cms:set avg_ly_april_year_per_day_grand_load = "0" scope="global" />
												<cms:set avg_ly_april_year_per_day_grand_load = "<cms:div ly_april_year_load_grand_total dayz_cy />" scope="global" />
												<strong>
													<cms:number_format avg_ly_april_year_per_day_grand_load decimal_precision='2' />
												</strong>
											</td>
											<!-- Grand TOTAL 1 April to this year LY average-->

											<!-- Grand TOTAL 1 April to this year Variation-->
											<td class="text-center" style="padding: 5px 10px;">
												<cms:set april_difference_grand_total = "<cms:sub cy_april_year_load_grand_total ly_april_year_load_grand_total />" scope="global" />
												<cms:if ly_april_year_load_grand_total eq '0'>
													-
												<cms:else_if ly_april_year_load_grand_total ne '0' />
													<cms:set april_var_grand_total = "<cms:div april_difference_grand_total ly_april_year_load_grand_total />" scope="global" />
													<cms:set april_variation_grand_total = "<cms:mul april_var_grand_total '100' />" scope="global" />
													<strong>
														<cms:number_format april_variation_grand_total decimal_precision='2' />
													</strong>
												</cms:if>
											</td>
											<!-- Grand TOTAL 1 April to this year Variation-->
						                </tr>
										<!-- Grand Total -->
										
						                <!-- Re-booking -->
						                <tr>
						                	<td class="text-center">
						                		<strong>Re-Bkg.</strong>
						                	</td>
						                	<td class="text-center"></td>
						                	<td class="text-center"></td>
						                	<td class="text-center"></td>
						                	<!-- Current Year Re-booking for Day -->
						                	<td class="text-center">
						                		<cms:set cy_re_booking = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate = <cms:date return='yesterday' format='Y-m-d' /> | coal_type='Re-booking'" >
						                			<cms:set cy_re_booking = "<cms:add cy_re_booking hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_re_booking />
						                	</td>
						                	<!-- Current Year Re-booking for Day -->

						                	<!-- Last Year Re-booking for Day -->
						                	<td class="text-center">
						                		<cms:set ly_re_booking = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate = <cms:date return='-366 days' format='Y-m-d' /> | coal_type='Re-booking'" >
						                			<cms:set ly_re_booking = "<cms:add ly_re_booking hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_re_booking />
						                	</td>
						                	<!-- Last Year Re-booking for Day -->

						                	<!-- Variation Re-booking for Day -->
						                	<td class="text-center">
						                		<cms:set re_booking_diff = "<cms:sub cy_re_booking ly_re_booking />" scope="global" />
						                		<cms:if ly_re_booking eq '0'>
													-
												<cms:else_if ly_re_booking ne '0' />
													<cms:set re_booking_var = "<cms:div re_booking_diff ly_re_booking />" scope="global" />
													<cms:set re_booking_variation = "<cms:mul re_booking_var '100' />" scope="global" /> <cms:number_format re_booking_variation decimal_precision='2' />
												</cms:if>
						                	</td>
						                	<!-- Variation Re-booking for Day -->

						                	<!-- Current Year Re-booking for Month -->
						                	<td class="text-center">
						                		<cms:set cy_re_booking_month = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date return='first day of this month' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' /> | coal_type='Re-booking'" >
						                			<cms:set cy_re_booking_month = "<cms:add cy_re_booking_month hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_re_booking_month />
						                	</td>
						                	<!-- Current Year Re-booking for Month -->

						                	<!-- Current Year Average Re-booking for Month -->
						                	<td class="text-center">
						                		<cms:set avg_cy_re_booking_month = "0" scope="global" />
						                		<cms:set avg_cy_re_booking_month = "<cms:div cy_re_booking_month cy_day_range />" scope="global" />
						                		<cms:number_format avg_cy_re_booking_month decimal_precision='2' />
						                	</td>
						                	<!-- Current Year Average Re-booking for Month -->

						                	<!-- Last Year Re-booking for Month -->
						                	<td class="text-center">
						                		<cms:set ly_re_booking_month = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | tdate < <cms:date return='last year' format='Y-m-d' /> | coal_type='Re-booking'" >
						                			<cms:set ly_re_booking_month = "<cms:add ly_re_booking_month hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_re_booking_month />
						                	</td>
						                	<!-- Last Year Re-booking for Month -->

						                	<!-- Last Year Average Re-booking for Month -->
						                	<td class="text-center">
						                		<cms:set avg_ly_re_booking_month = "0" scope="global" />
						                		<cms:set avg_ly_re_booking_month = "<cms:div ly_re_booking_month ly_day_range />" scope="global" />
						                		<cms:number_format avg_ly_re_booking_month decimal_precision='2' />
						                	</td>
						                	<!-- Last Year Average Re-booking for Month -->

						                	<!-- Variation Re-booking for Month -->
						                	<td class="text-center">
						                		<cms:set re_booking_monthly_difference = "<cms:sub cy_re_booking_month ly_re_booking_month />" scope="global" />
						                		<cms:if ly_re_booking_month eq '0'>
						                			-
						                		<cms:else_if ly_re_booking_month ne '0' />
						                			<cms:set re_booking_monthly_var = "<cms:div re_booking_monthly_difference ly_re_booking_month />" scope="global" />
						                			<cms:set re_booking_monthly_variation = "<cms:mul re_booking_monthly_var '100' />" scope="global" />
						                			<cms:number_format re_booking_monthly_variation decimal_precision='2' />
						                		</cms:if>
						                	</td>
						                	<!-- Variation Re-booking for Month -->

						                	<!-- 1 April to this year CY Re-booking -->
						                	<td class="text-center">
						                		<cms:set cy_april_re_booking = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date 'first day of april this year' format='Y-m-d' /> |  tdate < <cms:date format='Y-m-d' /> | coal_type='Re-booking'" >
						                			<cms:set cy_april_re_booking = "<cms:add cy_april_re_booking hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_april_re_booking />
						                	</td>
						                	<!-- 1 April to this year CY Re-booking -->

						                	<!-- 1 April to this year Average CY Re-booking -->
						                	<td class="text-center">
						                		<cms:set avg_cy_april_re_booking = "0" scope="global" />
						                		<cms:set avg_cy_april_re_booking = "<cms:div cy_april_re_booking dayz_cy />" scope="global" />
						                		<cms:number_format avg_cy_april_re_booking decimal_precision='2' />
						                	</td>
						                	<!-- 1 April to this year Average CY Re-booking -->

						                	<!-- 1 April to this year LY Re-booking -->
						                	<td class="text-center">
						                		<cms:set ly_april_re_booking = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date 'first day of april last year' format='Y-m-d' /> |  tdate < <cms:date return='-365 days' format='Y-m-d' /> | coal_type='Re-booking'" >
						                			<cms:set ly_april_re_booking = "<cms:add ly_april_re_booking hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_april_re_booking />
						                	</td>
						                	<!-- 1 April to this year LY Re-booking -->

						                	<!-- 1 April to this year Average LY Re-booking -->
						                	<td class="text-center">
						                		<cms:set avg_ly_april_re_booking = "0" scope="global" />
						                		<cms:set avg_ly_april_re_booking = "<cms:div ly_april_re_booking dayz_ly />" scope="global" />
						                		<cms:number_format avg_ly_april_re_booking decimal_precision='2' />
						                	</td>
						                	<!-- 1 April to this year Average LY Re-booking -->

						                	<!-- 1 April to this year Variation Re-booking -->
						                	<td class="text-center">
						                		<cms:set april_re_booking_difference = "<cms:sub cy_april_re_booking ly_april_re_booking />" scope="global" />
						                		<cms:if ly_april_re_booking eq '0' >
						                			-
						                		<cms:else_if ly_april_re_booking ne '0' />
						                			<cms:set april_re_booking_var = "<cms:div april_re_booking_difference ly_april_re_booking />" scope="global" />
						                			<cms:set april_re_booking_variation = "<cms:mul april_re_booking_var '100' />" scope="global" />
						                			<cms:number_format april_re_booking_variation decimal_precision='2' />
						                		</cms:if>
						                	</td>
						                	<!-- 1 April to this year Variation Re-booking -->
						                </tr>   
						                <!-- Re-booking --> 
						                <!-- e.Auction -->
						                <tr>
						                	<td class="text-center">
						                		e.Auction
						                	</td>
						                	<td class="text-center"></td>
						                	<td class="text-center"></td>
						                	<td class="text-center"></td>
						                	<!-- e.Auction Day CY -->
						                	<td class="text-center">
						                		<cms:set cy_e_auction = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate = <cms:date return='yesterday' format='Y-m-d' /> | coal_type='Pvt e.A'" >
						                			<cms:set cy_e_auction = "<cms:add cy_e_auction hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_e_auction />
						                	</td>
						                	<!-- e.Auction Day CY -->

						                	<!-- e.Auction Day LY -->
						                	<td class="text-center">
						                		<cms:set ly_e_auction = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate = <cms:date return='-366 days' format='Y-m-d' /> | coal_type='Pvt e.A'" >
						                			<cms:set ly_e_auction = "<cms:add ly_e_auction hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_e_auction />
						                	</td>
						                	<!-- e.Auction Day LY -->

						                	<!-- e.Auction Day Variation -->
						                	<td class="text-center">
						                		<cms:set e_auction_difference = "<cms:sub cy_e_auction ly_e_auction />" scope="global" />
						                		<cms:if ly_e_auction eq '0'>
						                			-
						                		<cms:else_if ly_e_auction ne '0' />
						                			<cms:set e_auction_var = "<cms:div e_auction_difference ly_e_auction />" scope="global" />
						                			<cms:set e_auction_variation = "<cms:mul e_auction_var '100' />" scope="global" />
						                			<cms:number_format e_auction_variation decimal_precision = "2" />
						                		</cms:if>
						                	</td>
						                	<!-- e.Auction Day Variation -->

						                	<!-- e.Auction this month CY -->
						                	<td class="text-center">
						                		<cms:set cy_e_auction_month = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date return='first day of this month' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' /> | coal_type='Pvt e.A'" >
						                			<cms:set cy_e_auction_month = "<cms:add cy_e_auction_month hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_e_auction_month />
						                	</td>
						                	<!-- e.Auction this month CY -->

						                	<!-- e.Auction this month CY Average -->
						                	<td class="text-center">
						                		<cms:set my_cy_e_auction_month = "0" scope="global" />
												<cms:set avg_cy_e_auction_month = "<cms:div cy_e_auction_month cy_day_range />" scope="global" />
												<cms:number_format avg_cy_e_auction_month decimal_precision='2' />
						                	</td>
						                	<!-- e.Auction this month CY Average -->

						                	<!-- e.Auction this month LY -->
						                	<td class="text-center">
						                		<cms:set ly_e_auction_month = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | tdate < <cms:date return='-365 days' format='Y-m-d' /> | coal_type='Pvt e.A'" >
						                			<cms:set ly_e_auction_month = "<cms:add ly_e_auction_month hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_e_auction_month />
						                	</td>
						                	<!-- e.Auction this month LY -->

						                	<!-- e.Auction this month LY Average -->
						                	<td class="text-center">
						                		<cms:set avg_ly_e_auction_month = "0" scope="global" />
												<cms:set avg_ly_e_auction_month = "<cms:div ly_e_auction_month ly_day_range />" scope="global" />
												<cms:number_format avg_ly_e_auction_month decimal_precision='2' />
						                	</td>
						                	<!-- e.Auction this month LY Average -->
						                	
						                	<!-- e.Auction this month Variation -->
						                	<td class="text-center">
						                		<cms:set e_auction_month_difference = "<cms:sub cy_e_auction_month ly_e_auction_month />" scope="global" />
						                		<cms:if ly_e_auction_month eq '0'>
						                			-
						                		<cms:else_if ly_e_auction_month ne '0' />
						                			<cms:set e_auction_month_var = "<cms:div e_auction_month_difference ly_e_auction_month />" scope="global" />
						                			<cms:set e_auction_month_variation = "<cms:mul e_auction_month_var '100' />" scope="global" />
						                			<cms:number_format e_auction_month_variation decimal_precision = "2" />
						                		</cms:if>
						                	</td>
						                	<!-- e.Auction this month Variation -->

						                	<!-- 1 April to this year CY e.Auction -->
							                	<td class="text-center">
							                		<cms:set cy_april_e_auction = "0" scope="global" />
							                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date 'first day of april this year' format='Y-m-d' /> |  tdate < <cms:date format='Y-m-d' /> |  coal_type='Pvt e.A'" >
							                			<cms:set cy_april_e_auction = "<cms:add cy_april_e_auction hlf_ful />" scope="global" />
							                		</cms:pages>
							                		<cms:show cy_april_e_auction />
							                	</td>
							               	<!-- 1 April to this year CY e.Auction -->

							               	<!-- 1 April to this year CY Average e.Auction -->
						                	<td class="text-center">
						                		<cms:set avg_cy_april_e_auction = "0" scope="global" />
						                		<cms:set avg_cy_april_e_auction = "<cms:div cy_april_e_auction dayz_cy />" scope="global" />
						                		<cms:number_format avg_cy_april_e_auction decimal_precision='2' />
						                	</td>
						                	<!-- 1 April to this year CY Average e.Auction -->

						                	<!-- 1 April to this year LY e.Auction -->
							                	<td class="text-center">
							                		<cms:set ly_april_e_auction = "0" scope="global" />
							                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date 'first day of april last year' format='Y-m-d' /> |  tdate < <cms:date return='-365 days' format='Y-m-d' /> |  coal_type='Pvt e.A'" >
							                			<cms:set ly_april_e_auction = "<cms:add ly_april_e_auction hlf_ful />" scope="global" />
							                		</cms:pages>
							                		<cms:show ly_april_e_auction />
							                	</td>
							               	<!-- 1 April to this year LY e.Auction -->
						                	<!-- 1 April to this year LY Average e.Auction -->
						                	<td class="text-center">
						                		<cms:set avg_ly_april_e_auction = "0" scope="global" />
						                		<cms:set avg_ly_april_e_auction = "<cms:div ly_april_e_auction dayz_cy />" scope="global" />
						                		<cms:number_format avg_ly_april_e_auction decimal_precision='2' />
						                	</td>
						                	<!-- 1 April to this year LY Average e.Auction -->

						                	<!-- 1 April to this year Variation e.Auction -->
							            	<td class="text-center">
							            		<cms:set april_e_auction_difference = "<cms:sub cy_april_e_auction ly_april_e_auction />" scope="global" />
							            		<cms:if ly_april_e_auction eq '0' >
							            			-
							            		<cms:else_if ly_april_e_auction ne '0' />
							            			<cms:set april_e_auction_var = "<cms:div april_e_auction_difference ly_april_re_booking />" scope="global" />
							            			<cms:set april_e_auction_variation = "<cms:mul april_e_auction_var '100' />" scope="global" />
							            			<cms:number_format april_e_auction_variation decimal_precision='2' />
							            		</cms:if>
							            	</td>
							            	<!-- 1 April to this year Variation e.Auction -->
						                </tr> 
						                <!-- e.Auction -->
						                <!-- CKNI -->
						                <tr>
						                	<td class="text-center">
						                		CKNI
						                	</td>
						                	<td class="text-center"></td>
						                	<td class="text-center"></td>
						                	<td class="text-center"></td>
						                	<!-- CKNI Day CY -->
						                	<td class="text-center">
						                		<cms:set cy_ckni = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate = <cms:date return='yesterday' format='Y-m-d' /> | coal_type='CKNI'" >
						                			<cms:set cy_ckni = "<cms:add cy_ckni hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_ckni />
						                	</td>
						                	<!-- CKNI Day CY -->

						                	<!-- CKNI Day LY -->
						                	<td class="text-center">
						                		<cms:set ly_ckni = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate = <cms:date return='-366 days' format='Y-m-d' /> | coal_type='CKNI'" >
						                			<cms:set ly_ckni = "<cms:add ly_ckni hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_ckni />
						                	</td>
						                	<!-- CKNI Day LY -->

						                	<!-- CKNI Day Variation -->
						                	<td class="text-center">
						                		<cms:set ckni_diff = "<cms:sub cy_ckni ly_ckni />" scope="global" />
						                		<cms:if ly_ckni eq '0'>
													-
												<cms:else_if ly_ckni ne '0' />
													<cms:set ckni_var = "<cms:div ckni_diff ly_ckni />" scope="global" />
													<cms:set ckni_variation = "<cms:mul ckni_var '100' />" scope="global" /> 
													<cms:number_format ckni_variation decimal_precision='2' />
												</cms:if>
						                	</td>
						                	<!-- CKNI Day Variation -->

						                	<!-- CKNI this Month CY -->
						                	<td class="text-center">
						                		<cms:set cy_ckni_month = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date return='first day of this month' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' /> | coal_type='CKNI'" >
						                			<cms:set cy_ckni_month = "<cms:add cy_ckni_month hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_ckni_month />
						                	</td>
						                	<!-- CKNI this Month CY -->

						                	<!-- CKNI this Month CY Average -->
						                	<td class="text-center">
						                		<cms:set avg_cy_ckni_month = "0" scope="global" />
						                		<cms:set avg_cy_ckni_month = "<cms:div cy_ckni_month cy_day_range />" scope="global" />
						                		<cms:number_format avg_cy_ckni_month decimal_precision='2' />
						                	</td>
						                	<!-- CKNI this Month CY Average -->

											<!-- CKNI this Month LY -->
						                	<td class="text-center">
						                		<cms:set ly_ckni_month = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | tdate < <cms:date return='-365 days' format='Y-m-d' /> | coal_type='CKNI'" >
						                			<cms:set ly_ckni_month = "<cms:add ly_ckni_month hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_ckni_month />
						                	</td>
						                	<!-- CKNI this Month LY -->

						                	<!-- CKNI this Month LY Average -->
						                	<td class="text-center">
						                		<cms:set avg_ly_ckni_month = "0" scope="global" />
						                		<cms:set avg_ly_ckni_month = "<cms:div ly_ckni_month ly_day_range />" scope="global" />
						                		<cms:number_format avg_ly_ckni_month decimal_precision='2' />
						                	</td>
						                	<!-- CKNI this Month LY Average -->

						                	<!-- CKNI this Month Variation -->
						                	<td class="text-center">
						                		<cms:set ckni_difference_month = "<cms:sub cy_ckni_month ly_ckni_month />" scope="global" />
						                		<cms:if ly_ckni_month eq '0'>
						                			-
						                		<cms:else_if ly_ckni_month ne '0' />
						                			<cms:set ckni_month_var = "<cms:div ckni_difference_month ly_ckni_month />" scope="global" />
						                			<cms:set ckni_month_variation = "<cms:mul ckni_month_var '100' />" scope="global" />
						                			<cms:number_format ckni_month_variation decimal_precision='2' />
						                		</cms:if>
						                	</td>
						                	<!-- CKNI this Month Variation -->

						                	<!-- 1 April to this year CY CKNI -->
						                	<td class="text-center">
						                		<cms:set cy_april_ckni = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date 'first day of april this year' format='Y-m-d' /> |  tdate < <cms:date format='Y-m-d' /> | coal_type='CKNI'" >
						                			<cms:set cy_april_ckni = "<cms:add cy_april_ckni hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_april_ckni />
						                	</td>
						                	<!-- 1 April to this year CY CKNI -->
						                	
						                	<!-- 1 April to this year CY CKNI Average -->
						                	<td class="text-center">
						                		<cms:set avg_cy_april_ckni = "0" scope="global" />
						                		<cms:set avg_cy_april_ckni = "<cms:div cy_april_ckni dayz_cy />" scope="global" />
						                		<cms:number_format avg_cy_april_ckni decimal_precision='2' />
						                	</td>
						                	<!-- 1 April to this year CY CKNI Average -->
						                	
						                	<!-- 1 April to this year LY CKNI -->
						                	<td class="text-center">
						                		<cms:set ly_april_ckni = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date 'first day of april last year' format='Y-m-d' /> |  tdate < <cms:date return='-365 days' format='Y-m-d' /> | coal_type='CKNI'" >
						                			<cms:set ly_april_ckni = "<cms:add ly_april_ckni hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_april_ckni />
						                	</td>
						                	<!-- 1 April to this year LY CKNI -->
						                	
						                	<!-- 1 April to this year LY CKNI Average -->
						                	<td class="text-center">
						                		<cms:set avg_ly_april_ckni = "0" scope="global" />
						                		<cms:set avg_ly_april_ckni = "<cms:div ly_april_ckni dayz_ly />" scope="global" />
						                		<cms:number_format avg_ly_april_ckni decimal_precision='2' />
						                	</td>
						                	<!-- 1 April to this year LY CKNI Average -->

						                	<!-- 1 April to this year CKNI Variation -->
						                	<td class="text-center">
						                		<cms:set april_ckni_difference = "<cms:sub cy_april_ckni ly_april_ckni />" scope="global" />
						                		<cms:if ly_april_ckni eq '0' >
						                			-
						                		<cms:else_if ly_april_ckni ne '0' />
						                			<cms:set april_ckni_var = "<cms:div april_ckni_difference ly_april_ckni />" scope="global" />
						                			<cms:set april_ckni_variation = "<cms:mul april_ckni_var '100' />" scope="global" />
						                			<cms:number_format april_ckni_variation decimal_precision='2' />
						                		</cms:if>
						                	</td>
						                	<!-- 1 April to this year CKNI Variation -->
						                </tr>
						                <!-- CKNI -->
						                <!-- MLSW -->
						                <tr>
						                	<td class="text-center">
						                		MLSW
						                	</td>
						                	<td class="text-center"></td>
						                	<td class="text-center"></td>
						                	<td class="text-center"></td>
						                	
						                	<!-- MLSW Day CY -->
						                	<td class="text-center">
						                		<cms:set cy_mlsw = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate = <cms:date return='yesterday' format='Y-m-d' /> | coal_type='MLSW'">
							                			<cms:set cy_mlsw = "<cms:add cy_mlsw hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_mlsw />
						                	</td>
						                	<!-- MLSW Day CY -->

						                	<!-- MLSW Day LY -->
						                	<td class="text-center">
						                		<cms:set ly_mlsw = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate = <cms:date return='-366 days' format='Y-m-d' /> | coal_type='MLSW'" >
						                			<cms:set ly_mlsw = "<cms:add ly_mlsw hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_mlsw />
						                	</td>
						                	<!-- MLSW Day LY -->

						                	<!-- MLSW Day Variation LY -->
						                	<td class="text-center">
						                		<cms:set mlsw_difference = "<cms:sub cy_mlsw ly_mlsw />" scope="global" />
						                		<cms:if ly_mlsw eq '0'>
						                			-
						                		<cms:else_if ly_mlsw ne '0' />
						                			<cms:set mlsw_var = "<cms:div mlsw_difference ly_mlsw />" scope="global" />
						                			<cms:set mlsw_variation = "<cms:mul mlsw_var '100' />" scope="global" />
						                			<cms:number_format mlsw_variation decimal_precision='2' />
						                		</cms:if>
						                	</td>
						                	<!-- MLSW Day Variation LY -->

						                	<!-- MLSW this month CY -->
						                	<td class="text-center">
						                		<cms:set cy_mlsw_month = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date return='first day of this month' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' /> | coal_type='MLSW'">
							                		<cms:set cy_mlsw_month = "<cms:add cy_mlsw_month hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_mlsw_month />
						                	</td>
						                	<!-- MLSW this month CY -->

						                	<!-- MLSW this month CY average -->
						                	<td class="text-center">
						                		<cms:set avg_cy_mlsw_month = "0" scope="global" />
						                		<cms:set avg_cy_mlsw_month = "<cms:div cy_mlsw_month cy_day_range />" scope="global" />
						                		<cms:number_format avg_cy_mlsw_month decimal_precision='2' />
						                	</td>
						                	<!-- MLSW this month CY average -->

						                	<!-- MLSW this month LY -->
						                	<td class="text-center">
						                		<cms:set ly_mlsw_month = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | tdate < <cms:date return='-365 days' format='Y-m-d' /> | coal_type='MLSW'">
						                			<cms:set ly_mlsw_month = "<cms:add ly_mlsw_month hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_mlsw_month />
						                	</td>
						                	<!-- MLSW this month LY -->

						                	<!-- MLSW this month LY average -->
						                	<td class="text-center">
						                		<cms:set avg_ly_mlsw_month = "0" scope="global" />
						                		<cms:set avg_ly_mlsw_month = "<cms:div ly_mlsw_month ly_day_range />" scope="global" />
						                		<cms:number_format avg_ly_mlsw_month decimal_precision='2' />
						                	</td>
						                	<!-- MLSW this month LY average -->

						                	<!-- MLSW this month Variation -->
						                	<td class="text-center">
						                		<cms:set mlsw_difference_month = "<cms:sub cy_mlsw_month ly_mlsw_month />" scope="global" />
						                		<cms:if ly_mlsw_month eq "0">
						                			-
						                		<cms:else_if ly_mlsw_month ne "0" />
						                			<cms:set mlsw_month_var = "<cms:div mlsw_difference_month ly_mlsw_month />" scope="global" />
						                			<cms:set mlsw_month_variation = "<cms:mul mlsw_month_var '100' />" scope="global" />
						                			<cms:number_format mlsw_month_variation decimal_precision />
						                		</cms:if>
						                	</td>
						                	<!-- MLSW this month Variation -->

						                	<!-- 1 April to this year CY MLSW -->
						                	<td class="text-center">
						                		<cms:set cy_april_mlsw = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date 'first day of april this year' format='Y-m-d' /> |  tdate < <cms:date format='Y-m-d' /> | coal_type='MLSW'" >
						                			<cms:set cy_april_mlsw = "<cms:add cy_april_mlsw hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_april_mlsw />
						                	</td>
						                	<!-- 1 April to this year CY MLSW -->

						                	<!-- 1 April to this year CY MLSW Average -->
						                	<td class="text-center">
						                		<cms:set avg_cy_april_mlsw = "0" scope="global" />
						                		<cms:set avg_cy_april_mlsw = "<cms:div cy_april_mlsw dayz_cy />" scope="global" />
						                		<cms:number_format avg_cy_april_mlsw decimal_precision="2" />
						                	</td>
						                	<!-- 1 April to this year CY MLSW Average -->

						                	<!-- 1 April to this year LY MLSW -->
						                	<td class="text-center">
						                		<cms:set ly_april_mlsw = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date 'first day of april last year' format='Y-m-d' /> |  tdate < <cms:date return='-365 days' format='Y-m-d' /> | coal_type='MLSW'" >
						                			<cms:set ly_april_mlsw = "<cms:add ly_april_mlsw hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_april_mlsw />
						                	</td>
						                	<!-- 1 April to this year LY MLSW -->

						                	<!-- 1 April to this year CY MLSW Average -->
						                	<td class="text-center">
						                		<cms:set avg_ly_april_mlsw = "0" scope="global" />
						                		<cms:set avg_ly_april_mlsw = "<cms:div ly_april_mlsw dayz_ly />" scope="global" />
						                		<cms:number_format avg_ly_april_mlsw decimal_precision="2" />
						                	</td>
						                	<!-- 1 April to this year CY MLSW Average -->

						                	<!-- 1 April to this year MLSW Variation -->
						                	<td class="text-center">
						                		<cms:set mlsw_difference_april = "<cms:sub cy_april_mlsw ly_april_mlsw />" scope="global" />
						                		<cms:if ly_april_mlsw eq '0'>
						                			-
						                		<cms:else_if ly_april_mlsw ne '0' />
						                			<cms:set mlsw_april_var = "<cms:div mlsw_difference_april ly_april_mlsw />" scope="global" />
						                			<cms:set mlsw_april_variation = "<cms:mul mlsw_april_var '100' />" scope="global" />
						                			<cms:number_format mlsw_april_variation decimal_precision = "2" />
						                		</cms:if>
						                	</td>
						                </tr>
						                <!-- MLSW -->
						                <!-- MELG -->
						                <tr>
						                	<td class="text-center">
						                		MELG
						                	</td>
						                	<td class="text-center"></td>
						                	<td class="text-center"></td>
						                	<td class="text-center"></td>
						                	<!-- MELG Day CY -->
						                	<td class="text-center">
						                		<cms:set cy_melg = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate = <cms:date return='yesterday' format='Y-m-d' /> | coal_type='MELG'">
						                			<cms:set cy_melg = "<cms:add cy_melg hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_melg />
						                	</td>
						                	<!-- MELG Day CY -->

						                	<!-- MELG Day LY -->
						                	<td class="text-center">
						                		<cms:set ly_melg = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate = <cms:date return='-366 days' format='Y-m-d' /> | coal_type='MELG'" >
						                			<cms:set ly_melg = "<cms:add ly_melg hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_melg />
						                	</td>
						                	<!-- MELG Day LY -->

						                	<!-- MELG Day Variation -->
						                	<td class="text-center">
						                		<cms:set melg_difference = "<cms:sub cy_melg ly_melg />" scope="global" />
						                		<cms:if ly_melg eq '0'>
						                			-
						                		<cms:else_if ly_melg ne '0' />
						                			<cms:set melg_var = "<cms:div melg_difference ly_melg />" scope="global" />
						                			<cms:set melg_variation = "<cms:mul melg_var '100' />" scope="global" />
						                			<cms:number_format melg_variation decimal_precision="2" />
						                		</cms:if>
						                	</td>
						                	<!-- MELG Day Variation -->

						                	<!-- MELG This Month CY -->
						                	<td class="text-center">
						                		<cms:set cy_month_melg = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date return='first day of this month' format='Y-m-d' /> | tdate < <cms:date format='Y-m-d' /> | coal_type='MELG'">
						                			<cms:set cy_month_melg = "<cms:add cy_month_melg hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_month_melg />
						                	</td>
						                	<!-- MELG This Month CY -->

						                	<!-- MELG This Month CY Average -->
						                	<td class="text-center">
						                		<cms:set avg_cy_month_melg = "0" scope="global" />
						                		<cms:set avg_cy_month_melg = "<cms:div cy_month_melg cy_day_range />" scope="global" />
						                		<cms:number_format avg_cy_month_melg decimal_precision="2" />
						                	</td>
						                	<!-- MELG This Month CY Average -->

						                	<!-- MELG This Month LY -->
						                	<td class="text-center">
						                		<cms:set ly_month_melg = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date return='first day of this month last year' format='Y-m-d' /> | tdate < <cms:date return='-365 days' format='Y-m-d' /> | coal_type='MELG'">
						                			<cms:set ly_month_melg = "<cms:add ly_month_melg hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_month_melg />
						                	</td>
						                	<!-- MELG This Month LY -->

						                	<!-- MELG This Month LY Average -->
						                	<td class="text-center">
						                		<cms:set avg_ly_month_melg = "0" scope="global" />
						                		<cms:set avg_ly_month_melg = "<cms:div ly_month_melg ly_day_range />" scope="global" />
						                		<cms:number_format avg_ly_month_melg decimal_precision="2" />
						                	</td>
						                	<!-- MELG This Month LY Average -->

						                	<!-- MELG This Month Variation -->
						                	<td class="text-center">
						                		<cms:set melg_difference_month = "<cms:sub cy_month_melg ly_month_melg />" scope="global" />
						                		<cms:if ly_month_melg eq '0'>
						                			-
						                		<cms:else_if ly_month_melg ne '0' />
						                			<cms:set melg_month_var = "<cms:div melg_difference_month ly_month_melg />" scope="global" />
						                			<cms:set melg_month_variation = "<cms:mul melg_month_var '100' />" scope="global" />
						                			<cms:number_format melg_month_variation decimal_precision="2" />
						                		</cms:if>
						                	</td>
						                	<!-- MELG This Month Variation -->

						                	<!-- 1 April to this year CY MELG -->
						                	<td class="text-center">
						                		<cms:set cy_april_melg = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date 'first day of april this year' format='Y-m-d' /> |  tdate < <cms:date format='Y-m-d' /> | coal_type='MELG'" >
						                			<cms:set cy_april_melg = "<cms:add cy_april_melg hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show cy_april_melg />
						                	</td>
						                	<!-- 1 April to this year CY MELG -->

						                	<!-- 1 April to this year CY MELG Average -->
						                	<td class="text-center">
						                		<cms:set avg_cy_april_melg = "0" scope="global" />
						                		<cms:set avg_cy_april_melg = "<cms:div cy_april_melg dayz_cy />" scope="global" />
						                		<cms:number_format avg_cy_april_melg decimal_precision="2" />
						                	</td>
						                	<!-- 1 April to this year CY MELG Average -->

						                	<!-- 1 April to this year LY MELG -->
						                	<td class="text-center">
						                		<cms:set ly_april_melg = "0" scope="global" />
						                		<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date 'first day of april last year' format='Y-m-d' /> |  tdate < <cms:date return='-365 days' format='Y-m-d' /> | coal_type='MELG'" >
						                			<cms:set ly_april_melg = "<cms:add ly_april_melg hlf_ful />" scope="global" />
						                		</cms:pages>
						                		<cms:show ly_april_melg />
						                	</td>
						                	<!-- 1 April to this year LY MELG -->

						                	<!-- 1 April to this year LY MELG Average -->
						                	<td class="text-center">
						                		<cms:set avg_ly_april_melg = "0" scope="global" />
						                		<cms:set avg_ly_april_melg = "<cms:div ly_april_melg dayz_ly />" scope="global" />
						                		<cms:number_format avg_ly_april_melg decimal_precision="2" />
						                	</td>
						                	<!-- 1 April to this year LY MELG Average -->

						                	<!-- 1 April to this year MELG Variation -->
						                	<td class="text-center">
						                		<cms:set melg_april_difference = "<cms:sub cy_april_melg ly_april_melg />" scope="global" />
						                		<cms:if ly_april_melg eq '0'> 
						                			-
						                		<cms:else_if ly_april_melg ne '0' />
						                			<cms:set melg_april_var = "<cms:div melg_april_difference ly_april_melg />" scope="global" />
						                			<cms:set melg_april_variation = "<cms:mul melg_april_var '100' />" scope="global" />
						                			<cms:number_format melg_april_variation decimal_precision="2" />
						                		</cms:if>
						                 	</td>
						                	<!-- 1 April to this year MELG Variation -->
						                </tr>
						                <!-- MELG -->
						                <!-- Grand Total -->
						                <tr class="highlight-total">
						                	<td class="text-center" style="padding: 5px 10px;"></td>
						                	<td class="text-center" style="padding: 5px 10px;"></td>
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<strong>G. Total</strong>
						                	</td>
						                	<td class="text-center" style="padding: 5px 10px;"></td>
						                	<!-- Current Year Day Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_cy_days = "<cms:add cy_load_grand_total cy_re_booking cy_e_auction cy_ckni cy_mlsw cy_melg />" scope="global" />
						                		<strong><cms:show add_cy_days /></strong>
						                	</td>
						                	<!-- Current Year Day Total -->

						                	<!-- Last Year Day Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_ly_days = "<cms:add ly_load_grand_total ly_re_booking ly_e_auction ly_ckni ly_mlsw ly_melg />" scope="global" />
						                		<strong><cms:show add_ly_days /></strong>
						                	</td>
						                	<!-- Last Year Day Total -->

						                	<!-- Variation Day Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_days_variation = "<cms:add percent_grand_total re_booking_variation e_auction_variation ckni_variation mlsw_variation melg_variation />" scope="global" />
						                		<strong><cms:show add_days_variation /></strong>
						                	</td>
						                	<!-- Variation Day Total -->

						                	<!-- Current Year Month Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_month_cy = "<cms:add my_cy_monthly_load_grand_total cy_re_booking_month cy_e_auction_month cy_ckni_month cy_mlsw_month cy_month_melg />" scope="global" />
						                		<strong><cms:show add_month_cy /></strong>
						                	</td>
						                	<!-- Current Year Month Total -->

						                	<!-- Current Year Month Average Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_month_cy_avg = "<cms:add avg_cy_per_day_load_grand_total avg_cy_re_booking_month avg_cy_e_auction_month avg_cy_ckni_month avg_cy_mlsw_month avg_cy_month_melg  />" scope="global" /> 
						                		<strong><cms:number_format add_month_cy_avg decimal_precision="2" /></strong>
						                	</td>
						                	<!-- Current Year Month Average Total -->

						                	<!-- Last Year Month Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_month_ly = "<cms:add my_ly_monthly_load_grand_total ly_re_booking_month ly_e_auction_month ly_ckni_month ly_mlsw_month ly_month_melg />" scope="global" />
						                		<strong><cms:show add_month_ly /></strong>
						                	</td>
						                	<!-- Last Year Month Total -->

						                	<!-- Last Year Month Average Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_month_ly_avg = "<cms:add avg_ly_per_day_load_grand_total avg_ly_re_booking_month avg_ly_e_auction_month avg_ly_ckni_month avg_ly_mlsw_month avg_ly_month_melg />" scope="global" />
						                		<strong><cms:number_format add_month_ly_avg decimal_precision="2" /></strong>
						                	</td>
						                	<!-- Last Year Month Average Total -->

						                	<!-- Variation Month Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_month_variation = "<cms:add montly_variation_grand_total re_booking_monthly_variation e_auction_month_variation ckni_month_variation mlsw_month_variation melg_month_variation />" scope="global" />
						                		<strong><cms:number_format add_month_variation decimal_precision="2" /></strong>
						                	</td>
						                	<!-- Variation Month Total -->

						                	<!-- 1 April to this year CY Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_april_cy = "<cms:add cy_april_year_load_grand_total cy_april_re_booking cy_april_e_auction cy_april_ckni cy_april_mlsw cy_april_melg />" scope="global" />
						                		<strong><cms:show add_april_cy /></strong>
						                	</td>
						                	<!-- 1 April to this year CY Total -->

						                	<!-- 1 April to this year CY Average Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_april_cy_avg = "<cms:add avg_cy_april_year_per_day_grand_load avg_cy_april_re_booking avg_cy_april_e_auction avg_cy_april_ckni avg_cy_april_mlsw avg_cy_april_melg />" scope="global" />
						                		<strong><cms:number_format add_april_cy_avg decimal_precision="2" /></strong>
						                	</td>
						                	<!-- 1 April to this year CY Average Total -->

						                	<!-- 1 April to this year LY Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_april_ly = "<cms:add ly_april_year_load_grand_total ly_april_re_booking ly_april_e_auction ly_april_ckni ly_april_mlsw ly_april_melg />" scope="global" />
						                		<strong><cms:show add_april_ly /></strong>
						                	</td>
						                	<!-- 1 April to this year LY Total -->

						                	<!-- 1 April to this year LY Average Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_april_ly_avg = "<cms:add avg_ly_april_year_per_day_grand_load avg_ly_april_re_booking avg_ly_april_e_auction avg_ly_april_ckni avg_ly_april_mlsw avg_ly_april_melg />" scope="global" />
						                		<strong><cms:number_format add_april_ly_avg decimal_precision="2" /></strong>
						                	</td>
						                	<!-- 1 April to this year LY Average Total -->

						                	<!-- 1 April to this year Variation Total -->
						                	<td class="text-center" style="padding: 5px 10px;">
						                		<cms:set add_april_variation = "<cms:add april_variation_grand_total april_re_booking_variation april_e_auction_variation april_ckni_variation mlsw_april_variation melg_april_variation />" scope="global" />
						                		<strong><cms:number_format add_april_variation decimal_precision="2" /></strong>
						                	</td>
						                	<!-- 1 April to this year Variation Total -->
						                </tr>
						                <!-- Grand Total -->
						                <!-- Difference (Total Rakes) -->
						                <tr>
						                	<td class="text-center" style="padding: 5px 10px;">
						                		Diff (Total rakes)
						                	</td>
						                	<td colspan="3" class="text-center" style="padding: 5px 10px;"></td>
						                	<td colspan="3" class="text-center" style="padding: 5px 10px;"></td>
						                	<td colspan="5" class="text-center" style="padding: 5px 10px;">
						                		<cms:set diff_month = "<cms:sub add_month_cy add_month_ly />" scope="global" />
						                		<strong><cms:show diff_month /></strong>
						                	</td>
						                	<td colspan="5" class="text-center" style="padding: 5px 10px;">
						                		<cms:set diff_april = "<cms:sub add_april_cy add_april_ly />" scope="global" />
						                		<strong><cms:show diff_april /></strong>
						                	</td>
						                </tr>
						                <!-- Difference (Total Rakes) -->
									</tbody>

								  	<cms:ignore>
								  	<!-- <cms:set my_count_folder="<cms:pages masterpage='loading-pt.php' limit='1' count_only='1' />" scope="global" />

									<cms:folders masterpage='loading-pt.php' orderby="weight">
									
									<cms:set my_count="<cms:show k_folder_totalpagecount />" scope="global" />
									
									<cms:set my_rowspan_folder="<cms:pages masterpage='loading-pt.php' limit='1' count_only='1' />" scope="global" />

									<cms:set my_rowspan="<cms:pages masterpage='loading-pt.php' folder=k_folder_name limit='1'><cms:show k_folder_totalpagecount /></cms:pages>" scope="global" />

									<cms:set my_rowspan_total="<cms:pages masterpage='loading-pt.php' folder=k_folder_name limit='1'><cms:show k_folder_totalpagecount /></cms:pages>" scope="global" />

									<cms:set difference= '0' scope='global' />
									<cms:set variation= '0' scope='global' />

									<cms:pages masterpage='loading-pt.php' folder=k_folder_name>

									<tr>
										
										<cms:if my_count_folder eq my_rowspan_folder>
										<td rowspan="<cms:show my_rowspan_folder />" class="text-center">
											WCL
										</td>
											<cms:decr my_count_folder />
										</cms:if>

										<cms:if my_count eq my_rowspan>	
										<td class="text-center" rowspan="<cms:add my_rowspan '1' />">
											<cms:show k_folder_title />
										</td>
										</cms:if>

										<td class="text-center">
											<cms:show k_page_title />
										</td>

										<td class="text-center">
											<cms:show daily_target />
										</td>
										
										<cms:set my_load_total='0' scope='global' />
										<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date return='yesterday' format='Y-m-d' />">
											<cms:set my_load_total = "<cms:add my_load_total hlf_ful />" scope="global" />
										</cms:reverse_related_pages>
										<td class="text-center">
											<cms:set cy_load = "<cms:show my_load_total />" scope="global" />
											<cms:show cy_load />
										</td>
										
										<cms:set my_ly_load_total='0' scope='global' />
										<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date return='-366 days' format='Y-m-d' />">
											<cms:set my_ly_load_total = "<cms:add my_ly_load_total hlf_ful />" scope="global" />
										</cms:reverse_related_pages>
										<td class="text-center">
											<cms:set ly_load = "<cms:show my_ly_load_total />" scope="global" />
											<cms:show ly_load />
										</td>

										<td class="text-center">
											<cms:set difference="<cms:sub cy_load ly_load />" />
											<cms:if ly_load ne '0'>
												<cms:set vari="<cms:div difference ly_load />" scope='global' />
												<cms:set variation= "<cms:mul vari '100' />" scope='global' />
												<cms:number_format variation decimal_precision='2' />
											<cms:else ly_load eq '0' />
											</cms:if>
										</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>	

									<cms:decr my_count />
									<cms:decr my_rowspan_total />
									<cms:if my_rowspan_total eq '0'>
									<cms:set my_daily_target = '0' scope='global' />
									<cms:set my_hlf_ful= '0' scope='global' />
									<cms:set my_ly_hlf_ful= '0' scope='global' />
									<cms:set difference= '0' scope='global' />
									<cms:set variation= '0' scope='global' />

									<tr>
										<td class="text-center">
											<strong>TOTAL</strong>
										</td>
										<td class="text-center">
											<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
												<cms:set my_daily_target="<cms:add my_daily_target daily_target />" scope="global" />
											</cms:pages>
											<strong><cms:show my_daily_target /></strong>
										</td>
										<td class="text-center">
											<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date return='yesterday' format='Y-m-d' />">
													<cms:set my_hlf_ful="<cms:add my_hlf_ful hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
											<cms:set cy_load_total="<cms:show my_hlf_ful />" scope="global" />
											<strong><cms:show cy_load_total /></strong>
										</td>
										<td class="text-center">
											<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date return='-366 days' format='Y-m-d' />">
													<cms:set my_ly_hlf_ful="<cms:add my_ly_hlf_ful hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
											<cms:set ly_load_total="<cms:show my_ly_hlf_ful />" scope="global" />
											<strong><cms:show ly_load_total /></strong>
										</td>
										<td class="text-center">
											<cms:set difference="<cms:sub cy_load_total ly_load_total />" />
											<cms:if ly_load_total ne '0'>
												<cms:set vari="<cms:div difference ly_load />" scope='global' />
												<cms:set variation= "<cms:mul vari '100' />" scope='global' />
												<strong>
													<cms:number_format variation decimal_precision='2' />
												</strong>
											<cms:else ly_load_total eq '0' />
												-
											</cms:if>
										</td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
									</cms:if>
									</cms:pages>
									</cms:folders> -->
								</cms:ignore>
								</table>
							</div>
						</div>
						<cms:ignore>
						<!-- <div class="gxcpl-card-footer">
							<center>
								<button class="btn btn-warning btn-sm report gxcpl-no-drop" style="font-weight: bold; color: #212121;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> GENERATE REPORT</button>
							</center>
						</div> -->
						</cms:ignore>
					</div>
				</div>
			</div>
		</div>
		<cms:ignore>
		<!-- <script type="text/javascript">

			$(document).ready(function() {
			  $(".report").click(function() {
			    var doc = new jsPDF("l", "pt", "a3"),
			    source = $("#template_invoice")[0],
			    margins = {
			      top: 20,
			      bottom: 20,
			      left: 20,
			      width: 10
			    };
			    doc.fromHTML(
			      source, // HTML string or DOM elem ref.
			      margins.left, // x coord
			      margins.top, {
			        // y coord
			        width: margins.width // max width of content on PDF
			      },
			      function(dispose) {
			        // dispose: object with X, Y of the last line add to the PDF
			        //          this allow the insertion of new lines after html
			        doc.save("Test.pdf");
			      },
			      margins
			    );
			  });
			});
		</script> -->
		</cms:ignore>
		<div class="gxcpl-ptop-50"></div>
		<div class="gxcpl-ptop-50"></div>
	<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>