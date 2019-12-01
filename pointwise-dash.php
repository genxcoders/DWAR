<?php require_once( 'couch/cms.php' ); ?>
<cms:php>
set_time_limit(300);
</cms:php>
<cms:no_cache />
<cms:embed 'header.html' />
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h4 class="gxcpl-no-margin">
					SEARCH TRAIN ACROSS BOARD
					<div class="gxcpl-ptop-10"></div>
					<div class="gxcpl-divider-dark"></div>
					<div class="gxcpl-ptop-10"></div>
				</h4>
			</div>
			<div class="gxcpl-ptop-50"></div>
			<div class="col-md-12">
				<div class="gxcpl-card box">
					<div class="gxcpl-card-header">
						<div class="row">	
							<!-- Legend -->
							<div class="col-md-6 col-xs-6">
								<h5>SEARCH TRAIN</h5>
							</div>
							<div class="col-md-6 col-xs-6">
								<span class="col-md-1 pull-right" data-toggle="tooltip" data-placement="top" title="Table Legend">
								    <cms:embed 'legend.html' />
								</span>
								<div class="gxcpl-ptop-40"></div>
							</div>
							<!-- Legend -->
						</div>
						<div class="gxcpl-ptop-10"></div>
					</div>
					<div class="gxcpl-card-body tableFixHead gxcpl-padding-15" style="overflow-x: auto;">
						<table class="display table table-bordered gxcpl-table-hover" id="pt-icp" style="width: 100% !important;">
							<thead>
								<tr>
									<th class="text-center">
										S. No	
									</th>
									<th>
										Interchange
									</th>
									<th>
										Train
									</th>
									<th>
										Loco
									</th>
									<th>
										Sch
									</th>
									<th>
										Arr/Dep
									</th>
									<th>
										Sign On
									</th>
									<th>
										Location
									</th>
									<th>
										Type
									</th>
									<th style="z-index: 99;">
										Remark
									</th>
									<th>
										Action
									</th>
								</tr>
							</thead>	
							<tbody>
								<!-- Interchange with arrival date-->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged='1' | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' />" show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set arr_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'index-ptwise.html' />	
								</cms:pages>
								<!-- Interchange with arrival date-->

								<!-- Not Interchange(today interchange) with arrival date-->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged<>1 | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | today_interchange=1" show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set arr_nt_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'index-ptwise.html' />	
								</cms:pages>
								<!-- Not Interchange(today interchange) with arrival date-->
								<!-- Not Interchange(today interchange) -->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged<>1 | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date!=<cms:date my_today_yesterday format='Y-m-d' /> | today_interchange=1" show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set nt_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'index-ptwise.html' />	
								</cms:pages>
								<!-- Not Interchange(today interchange) -->

								<!-- Not Interchange with arrival date-->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged<>1 | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | today_interchange<>1" show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set arr_nt_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'index-ptwise.html' />	
								</cms:pages>
								<!-- Not Interchange with arrival date-->
								<!-- Not Interchange -->
								<cms:pages masterpage="pointwise-interchange.php" order='asc' orderby='arrival_date' custom_field="is_interchanged<>1 | to_ho=<cms:show my_toho /> | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date!=<cms:date my_today_yesterday format='Y-m-d' /> | today_interchange<>1" show_future_entries='1'>
									<cms:embed 'overdue.html' />	
									<cms:set nt_inter ="<cms:show k_total_records />" scope='global' />	
									<cms:embed 'index-ptwise.html' />	
								</cms:pages>
								<!-- Not Interchange -->
							</tbody>
						</table>
					</div>
					<cms:if my_toho eq '0'>
					<div class="gxcpl-card-footer" style="line-height: 24px; text-align: left;">
						<strong>Forecasted:</strong><cms:add arr_inter "<cms:add arr_nt_inter "<cms:add nt_inter arr_ho_inter />" />" />
						<br>

						<strong>Already Interchanged: </strong><cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | <cms:gpc 'to_ho' method='get'  /> | is_interchanged=1 | to_ho=0 " order='asc' orderby='arrival_time' count_only='1' />
						<br>				
					</div>
					<cms:else_if my_toho eq '1' />
					<div class="gxcpl-card-footer" style="line-height: 24px; text-align: left;">
						<strong>Forecasted:</strong><cms:add arr_inter "<cms:add arr_nt_inter "<cms:add nt_inter arr_ho_inter />" />" />
						<br>

						<strong>Already Interchanged: </strong><cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:date my_today_yesterday format='Y-m-d' /> | <cms:gpc 'to_ho' method='get'  /> | is_interchanged=1 | to_ho=1 | today_interchange=1 " order='asc' orderby='departure_time' count_only='1' />
						<br>				
					</div>
					</cms:if>
				</div>
			</div>
		</div>
		<div class="gxcpl-ptop-30"></div>
	</div>
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>