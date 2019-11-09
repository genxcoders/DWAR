<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Stable Trains Report" parent='_ptic_' order="4" />
<cms:embed 'header.html' />
	<div class="container-fluid"> 
		<div class="row">
			<!-- Section Title -->
			<div class="col-md-12">
				<h4 class="gxcpl-no-margin">
					STABLE TRAINS REPORT
					<div class="gxcpl-ptop-10"></div>
					<div class="gxcpl-divider-dark"></div>
					<div class="gxcpl-ptop-10"></div>
				</h4>
			</div>
			<div class="col-md-12">
				<div class="gxcpl-card">
					<div class="gxcpl-card-header">
						<div class="row">
							<div class="col-md-2 col-xs-5">
								<h5 class="gxcpl-no-margin">
									<strong>STABLE TRAINS</strong>
								</h5>
							</div>
							<div class="col-md-3 col-md-offset-7 col-xs-7 text-center" id="buttons"></div>
						</div>
					</div>
					<div class="gxcpl-card-body tableFixHead gxcpl-padding-15" style="overflow-x: auto;">
						<table class="display table table-bordered gxcpl-table-hover" id="example2" style="width: 100% !important;">
							<thead>
								<tr>
									<th style="padding-left: 40px;">
										Sr.No.
									</th>
									<th>
										Train
									</th>
									<th>
										Loco
									</th>
									<th>
										Arrival Date
									</th>
									<th>
										Arrival Time
									</th>
									<th>
										Location
									</th>
									<th width="150px;" style="z-index: 99;">
										Remark
									</th>
									<th>
										Action
									</th>
								</tr>
							</thead>
							<tbody>
								<cms:pages masterpage="pointwise-interchange.php" custom_field="is_stabled='1' | is_interchanged<>1" order='desc' orderby='arrival_date' >
								<cms:no_results>
								<tr>
									<cms:if k_user_access_level gt '7'>
										<td colspan="8" class="text-center">
											- No Result -
										</td>
									</cms:if>
								</tr>
								</cms:no_results>
								<tr>
									<td style="padding-left: 50px;">
										<cms:show k_absolute_count />
									</td>
									<td class="text-uppercase">
										<cms:if tr_name>
											<cms:show tr_name />
										<cms:else />
											- NA -
										</cms:if>
									</td>
									<td>
										<cms:if loco >
											<cms:each loco sep='+' >
												<cms:show item /><br>
											</cms:each>
										<cms:else />
											-NA-
										</cms:if>
									</td>
									<td>
										<cms:if arrival_date >
											<cms:date arrival_date format='d-m-Y' />
										<cms:else />
											- NA -
										</cms:if>
									</td>
									<td>
										<cms:if arrival_time >
											<cms:date arrival_time format="H:i" />
										<cms:else />
											- NA -
										</cms:if>
									</td>
									<td>
										<cms:set related_location="<cms:related_pages 'location'><cms:show k_page_title /></cms:related_pages>" />
										<cms:if related_location>
											<cms:show related_location />
										<cms:else />
											- NA -
										</cms:if>
									</td>
									<td width="150px;">
										<div id="remark" <cms:inline_edit 'remark' toolbar='custom' /> >
											<cms:if remark >
												<cms:set strip_text = "<cms:php>global $text;echo strip_tags('<cms:show remark />');</cms:php>" />
												<cms:show strip_text />
											<cms:else />
												-NA-
											</cms:if>
										</div>
									</td>
									<td style="padding-left: 30px;">
										<cms:popup_edit "interchange | today_yesterday |is_stabled | tr_name | loco | schedule | schedule_date | arrival_date | arrival_time | departure_time | signon_date | signon_time | raketype | load | load_unit | commodity | location | stn_to | stn_from |  to_ho | is_interchanged | today_interchange" link_text="<i class='fa fa-edit'></i>" />
										<a href="<cms:route_link 'delete_ptic' rt_id=k_page_id />&url=stable-train.php" class="gxcpl-fw-700" data-toggle="tooltip" data-placement="top" title="DELETE">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>
								</cms:pages>
							</tbody>
						</table>
					</div>
					<div class="gxcpl-card-body gxcpl-no-padding" style="line-height: 24px; text-align: left; margin-left: 10px;">
						<strong>Total Stable Train:</strong> <cms:pages masterpage='pointwise-interchange.php' custom_field="is_stabled='1' | is_interchanged<>1 " order='asc' orderby='arrival_time' count_only='1' />
					</div>
				</div>
				<div class="gxcpl-ptop-50"></div>
			</div>
		</div>
	</div>
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>