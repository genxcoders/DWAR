<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="PDD Report" parent='_ptic_' order="6" />
<cms:no_cache />
<cms:embed 'header.html' />
<cms:set total_pdd='0' scope='global' />
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h4 class="gxcpl-no-margin">
				PRE-DEPARTURE DETENTION REPORT
				<div class="gxcpl-ptop-10"></div>
				<div class="gxcpl-divider-dark"></div>
				<div class="gxcpl-ptop-10"></div>
			</h4>
		</div>
		<cms:embed 'searchpdd.html' />
		<cms:if interchange!="<cms:show my_search_str />">
		<cms:pages masterpage="pointwise-interchange.php" limit='1' custom_field="interchange=<cms:gpc 'interchange' method='get' /> "><cms:set pdf_name="<cms:show interchange />" scope="global" />
			<cms:set pdd_interchange = "<cms:show interchange />" scope="global" /> 
		</cms:pages>
			<div class="col-md-12">
				<div class="gxcpl-card">
					<div class="gxcpl-card-header">
						<div class="row"> 
							<div class="col-md-4 col-xs-12">
								<h5 class="gxcpl-padding-5">
									<strong><cms:show pdd_interchange /> <cms:date my_date format="d-m-Y" /> DAILY PDD REPORT</strong>
								</h5>	
								 <div class="gxcpl-ptop-5"></div>		
							</div>
							<div class="col-md-3 col-md-offset-3 col-xs-7 text-center" id="buttons"></div>
							<!-- Legend -->
							<div class="col-md-2 col-xs-5">
								<span class="col-md-1 pull-right" data-toggle="tooltip" data-placement="top" title="Table Legend">
								    <cms:embed 'legend.html' /> 
								</span> 
							</div>
							<!-- Legend -->
						</div>
						<div class="gxcpl-ptop-10"></div>
					</div>
					
					<div class="gxcpl-card-body tableFixHead gxcpl-padding-15">
						<table class="display table table-bordered gxcpl-table-hover" id="example0" style="width: 100% !important;">
							<thead>
								<tr>
									<th>Sr. No.</th>
									<th>Train</th>
									<th>Loco</th>
									<cms:if my_icp eq 'NGP'>
									<th>NGP Arrival</th>
									<th>NGP Departure</th>
									<th>AQ Arrival</th>
									<th>AQ Departure</th>
									<cms:else_if my_icp eq 'GCC' />
									<th>GCC Arrival</th>
									<th>GCC Departure</th>
									<th>GNQ Arrival</th>
									<th>GNQ Departure</th>
									<cms:else />
									<th>Arrival</th>
									<th>Departure</th>
									</cms:if>
									<th>Sign on</th>
									<th>PDD</th>
									<th width="150px;" style="z-index: 99;">Remark</th>
								</tr>
							</thead>
							<tbody>
								<cms:pages masterpage='pointwise-interchange.php' custom_field="to_ho=0 | interchange=<cms:gpc 'interchange' method='get' /> | is_interchanged='1' | arrival_date=<cms:gpc 'arrival_date' method='get' />" order='asc' orderby="arrival_time" skip_custom_field='1'>
								<cms:no_results>
								<tr>
									<cms:if k_user_access_level gt '7'>
										<td colspan="4" class="text-center">
											- No Result -
										</td>
									</cms:if>
								</tr>
								</cms:no_results>
								<tr>
									<td style="padding-left: 30px;">
										<cms:show k_absolute_count />
									</td>
									<td class="text-uppercase">
										<cms:show tr_name />
									</td>
									<td class="text-uppercase">
										<cms:show loco />
									</td>
									<cms:if my_icp eq 'NGP'>
									<td>
										<cms:if arrival_time>
											<cms:date arrival_time format='H:i' />
										<cms:else />
											-NA-
										</cms:if> 
									</td>
									<td>
										<cms:if departure_time>
											<cms:date departure_time format='H:i' />
										<cms:else />
											-NA-
										</cms:if> 
									</td>
									<td>
										<cms:if aq_arrival_time>
											<cms:date aq_arrival_time format='H:i' />
										<cms:else />
											-NA-
										</cms:if> 
									</td>
									<td>
										<cms:if aq_departure_time>
											<cms:date aq_departure_time format='H:i' />
										<cms:else />
											-NA-
										</cms:if> 
									</td>
									<cms:else_if my_icp eq 'GCC' />
									<td>
										<cms:if arrival_time>
											<cms:date arrival_time format='H:i' />
										<cms:else />
											-NA-
										</cms:if> 
									</td>
									<td>
										<cms:if departure_time>
											<cms:date departure_time format='H:i' />
										<cms:else />
											-NA-
										</cms:if> 
									</td>
									<td>
										<cms:if gnq_arrival_time>
											<cms:date gnq_arrival_time format='H:i' />
										<cms:else />
											-NA-
										</cms:if> 
									</td>
									<td>
										<cms:if gnq_departure_time>
											<cms:date gnq_departure_time format='H:i' />
										<cms:else />
											-NA-
										</cms:if> 
									</td>
									<cms:else />
									<td>
										<cms:if arrival_time>
											<cms:date arrival_time format='H:i' />
										<cms:else />
											-NA-
										</cms:if> 
									</td>
									<td>
										<cms:if departure_time>
											<cms:date departure_time format='H:i' /> <small><cms:date departure_date format="Y-m-d" /></small>
										<cms:else />
											-NA-
										</cms:if> 
									</td>
									</cms:if>
									<td>
										<cms:if signon_time>
											<cms:date signon_time format='H:i' /> <small><cms:date signon_date format="Y-m-d" /></small>
										<cms:else />
											-NA-
										</cms:if>
									</td>
									<cms:embed 'pdd.html' />
									<td width="10%" class="<cms:if (minutes ge '60') && (is_interchanged eq '1') ><cms:if (minutes ge '120') && (is_interchanged eq '1') >	gxcpl-over120<cms:else_if is_interchanged eq '1' />gxcpl-over60</cms:if><cms:else_if (minutes lt '60') && (is_interchanged eq '1') />gxcpl-less-60</cms:if>">
										<cms:if is_interchanged eq '1'>
											<cms:if div_hour_value eq '0'><cms:else /><cms:number_format "<cms:div minutes '60' />" decimal_precision='0' /> hr</cms:if> <cms:if mod_min_value eq '0'><cms:else /><cms:mod minutes '60' /> m</cms:if> [<cms:show minutes />]
										<cms:else />
											-NA-
										</cms:if>
									</td>
									<td width="150px;" style="z-index: 99;">
										<div <cms:inline_edit 'remark' toolbar='custom'  /> >
											<cms:if remark >
												<cms:show remark />
											<cms:else />
												-NA-
											</cms:if>
										</div>
									</td>
								</tr>
								<cms:set div_factor_pdd = "<cms:show k_count />" scope="global" />
								</cms:pages>
								<cms:if my_icp eq 'NGP' || my_icp eq 'GCC'>
								<tr>
									<cms:set avg_pdd = "<cms:div total_pdd div_factor_pdd />" scope="global" />
									<td colspan="8" class="text-right">
										<strong>Avg PDD:</strong>
									</td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td colspan="2">
										<strong>
											<cms:number_format avg_pdd decimal_precision="2" />
										</strong>
									</td>
									<td style="display: none;"></td>
								</tr>	
								<cms:else />
								<tr>
									<td colspan="6" class="text-right">
										<strong>Avg PDD:</strong>
									</td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td style="display: none;"></td>
									<td colspan="2">
										<strong>
											(<cms:show div_factor_pdd />)
											<cms:set my_final_avg_pdd_final="<cms:div total_pdd div_factor_pdd />" scope="global" /> 
											<cms:set agv_pdd_hours="<cms:number_format "<cms:div my_final_avg_pdd_final '60' />" decimal_precision='0' />" /><cms:set avg_pdd_minutes="<cms:mod my_final_avg_pdd_final '60' />" />

											<cms:if agv_pdd_hours eq '0'><cms:else /><cms:show agv_pdd_hours /> hr</cms:if> <cms:if avg_pdd_minutes eq '0'><cms:else /><cms:show avg_pdd_minutes /> m</cms:if>
										</strong>
									</td>
									<td style="display: none;"></td>
								</tr>	
								</cms:if>
							</tbody>
						</table>
					</div>
				</div>
				<div class="gxcpl-ptop-30"></div>
			</div>
		<cms:else />
		</cms:if>
	</div>
</div>
<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>