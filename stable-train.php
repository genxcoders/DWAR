<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Stable Trains Report" parent='_ptic_' order="4" />
<cms:embed 'header.html' />
	<div class="container-fluid"> 
		<div class="row">
			<div class="gxcpl-ptop-30"></div>
			<!-- Section Title -->
			<div class="col-md-12">
				<h4 class="gxcpl-no-margin">
					STABLE TRAINS REPORT
					<div class="gxcpl-ptop-10"></div>
					<div class="gxcpl-divider-dark"></div>
					<div class="gxcpl-ptop-20"></div>
				</h4>
			</div>
			<div class="col-md-12">
				<div class="gxcpl-card">
					<div class="gxcpl-card-header">
						<div class="row">
							<div class="col-md-2">
								<h4>STABLE TRAINS</h4>
							</div>
							<!-- Search -->
							<div class="col-md-4">
								<div class="gxcpl-ptop-10"></div>
								<input type="text" class="typeahead" placeholder="Search using Train Name or Loco Number...">
								<div class="gxcpl-ptop-10"></div>
							</div>
							<!-- Search -->
							<div class="col-md-2 col-md-offset-4" style="padding-top: 3px;">
								<a onClick="reloadP()" href="" class="btn btn-warning gxcpl-fw-700"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
								<!-- javascript:stablePDF() -->
							</div>
						</div>
					</div>
					<div class="gxcpl-card-body tableFixHead" style="overflow-x: auto;">
						<table class="gxcpl-table userTbl">
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
									<th style="z-index: 99;">
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
									<td>
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
										<a href="<cms:add_querystring "<cms:route_link 'delete_ptic' rt_id=k_page_id />" "url=stable-train.php" />" class="gxcpl-fw-700" data-toggle="tooltip" data-placement="top" title="DELETE">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>
								</cms:pages>
							</tbody>
						</table>
					</div>
					<div class="gxcpl-card-footer" style="line-height: 24px; text-align: left;">
						<strong>Total Stable Train:</strong> <cms:pages masterpage='pointwise-interchange.php' custom_field="is_stabled='1' | is_interchanged<>1 " order='asc' orderby='arrival_time' count_only='1' />
					</div>
				</div>
				<div class="gxcpl-ptop-50"></div>
			</div>
		</div>
	</div>
	<cms:pages masterpage="pointwise-interchange.php" custom_field="is_stabled='1' | is_interchanged<>1" order='desc' orderby='arrival_date' >
	<cms:set arri = "<cms:gpc 'arrival_date' method='get' />" scope='global'  />
	<script type="text/javascript">
		function stablePDF(){
			var dd = {
				pageSize:'A4',
				pageOrientation:'potrait',
				content: 
				[
					{text: 'Stable Trains', style: 'subheader' , alignment: 'center'},
					'\n',
					{ text: 'Date:- <cms:date arri format= "d/m/Y" />', style: 'subheader', alignment: 'center' },
					'\n',
					{
					style: 'tableExample', fontSize: 8.3, border:0, margin: [75, 2],   
					table: {
						headerRows: 1,
						widths: [25 , 70 , 50 , 50 , 40 , 40, '*' ],
						// dontBreakRows: true,
						// keepWithHeaderRows: 1,
						body: [
							[{text: 'Sr.No.', style: 'tableHeader', bold: true, fontSize: 9,}, 
							 {text: 'Train', style: 'tableHeader', bold: true, fontSize: 9,},
							 {text: 'Loco', style: 'tableHeader', bold: true, fontSize: 9,}, 
							 {text: 'Arr Date', style: 'tableHeader', bold: true, fontSize: 9,},
							 {text: 'Arr Time', style: 'tableHeader', bold: true, fontSize: 9,}, 
							 {text: 'Location', style: 'tableHeader', bold: true, fontSize: 9,},
							 {text: 'Remark', style: 'tableHeader', bold: true, fontSize: 9,}
							 ],
							
							<cms:pages masterpage="pointwise-interchange.php" custom_field="is_stabled='1' | is_interchanged<>1" order='desc' orderby='arrival_date' show_future_entries='1' >
								<cms:set tr_name_caps="<cms:php>echo strtoupper('<cms:show tr_name />');</cms:php>" />
								<cms:set schedule_caps="<cms:php>echo strtoupper('<cms:show schedule />');</cms:php>" />
							[
								'<cms:show k_absolute_count />',
								'<cms:show tr_name_caps />',
								'<cms:show loco />',
								'<cms:date arrival_date format='d-m-Y' />',
								'<cms:date arrival_time format="H:i" />',
								'<cms:related_pages 'location'><cms:show k_page_title /></cms:related_pages>',
								'<cms:show remark />',
							],
							</cms:pages>				
						]
					}
					},
					{text: 'Total Stable Train: <cms:pages masterpage='pointwise-interchange.php' custom_field="is_stabled='1' | is_interchanged<>1 " order='asc' orderby='arrival_time' count_only='1' />', style: 'subheader' , bold: true, fontSize: 8.3, alignment: 'left', margin: [75, 2]},
				]
			}
			pdfMake.createPdf(dd).open();
		}
	</script>
</cms:pages>
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>