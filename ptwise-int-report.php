<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Pointwise Interchange Report" clonable='1' parent='_ptic_' order="2" >
	<cms:ignore>
	<cms:editable name="my_date" label="Date" type="datetime" fields_separator="-"  default_time='@current' order="1" />
	<cms:editable name="my_interchange" label="Interchange" type="dropdown" opt_values="Select =- | <cms:pages masterpage='interchange.php' order="asc" ><cms:show k_page_title /><cms:if '<cms:not k_paginated_bottom />' >|</cms:if></cms:pages>" order="2" />
	</cms:ignore>
</cms:template>
<cms:embed 'header.html' />

<!-- AC & DSL Count -->
<!-- Content Here -->
	<div class="container-fluid">
		<div class="row">
			<div class="gxcpl-ptop-30"></div>
			<!-- Section Title -->
			<div class="col-md-12">
				<h4 class="gxcpl-no-margin">
					POINTWISE INTERCHANGE REPORT
					<div class="gxcpl-ptop-10"></div>
					<div class="gxcpl-divider-dark"></div>
					<div class="gxcpl-ptop-20"></div>
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
								<h5 class="gxcpl-fw-700"><cms:pages masterpage="pointwise-interchange.php" limit='1' custom_field="interchange=<cms:gpc 'interchange' method='get' /> ">
								<cms:show interchange /></cms:pages>- TAKEN OVER TABLE</h5>
							</div>
							<!-- Search -->
							<div class="col-md-3">
								<div class="gxcpl-ptop-10"></div>
								<label class="text-uppercase">Search Trains</label>
								<input type="text" class="typeahead" placeholder="Search using Train Name or Loco Number...">
								<div class="gxcpl-ptop-10"></div>
							</div>
							<!-- Search -->
							<div class="col-md-6">
								<div class="btn-group pull-right" role="group" style="margin-top: 2px;" >
									<a href="javascript:generatePDF()" class="btn btn-warning gxcpl-fw-700"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
									 <!-- <button onclick="exportTableToCSV(filename.csv)" class="btn btn-success gxcpl-fw-700"><i class="fa fa-file-excel-o" aria-hidden="true"></i> EXCEL EXPORT</button> -->
									<!-- CSV Export -->
									<cms:set mystart="<cms:gpc 'import' method='get' />" />
    
								    <cms:if mystart >
								    
								        <cms:pages masterpage='pointwise-interchange.php'  paginate='1' limit='100' custom_field="interchange=<cms:show my_icp /> | arrival_date=<cms:date today_yesterday format='d/m/Y' /> | to_ho=<cms:show my_toho /> | is_interchanged=1" order='asc' orderby='arrival_time'>
								        
								            <cms:if k_paginated_top >
								                <cms:if k_current_page='1'>
								                    <!-- Header. 'truncate' starts a new file -->
								                    <cms:write 'my.csv' add_newline='1' truncate='1'>SrNo,TrainName,Loco,Schedule,Arrival,Remark</cms:write>
								                </cms:if>
								            
								                <cms:if k_paginate_link_next >
								                    <script language="JavaScript" type="text/javascript">
								                        var myVar;
								                        myVar = window.setTimeout( 'location.href="<cms:show k_paginate_link_next />";', 100 );
								                    </script>
								                    <button onclick="clearTimeout(myVar);">Stop</button>
								                <cms:else />
								                    <cms:set write_footer='1' />
								                    Done!    
								                </cms:if>
								                
								                <h3><cms:show k_current_page /> / <cms:show k_total_pages /> pages (Total <cms:show k_total_records /> records. Showing <cms:show k_paginate_limit /> records per page)</hr>
								            </cms:if>
								            
								                <h3><cms:show k_current_record /></h3>
								                
								                <!-- CSV row -->
								                <cms:write 'my.csv' add_newline='1'><cms:format_csv k_absolute_count />,<cms:format_csv tr_name />,<cms:format_csv loco/>,<cms:format_csv schedule /><cms:date schedule_date format='d-m'/>,<cms:date arrival_time format='H:i' />,<cms:format_csv remark/></cms:write>

								            <cms:if k_paginated_bottom >
								                <hr>
								                
								                <!-- Footer -->
								                <cms:if write_footer>
								                    <!-- CSV does not require a footer so doing nothing here but for XML this could be used to output the document closing tags -->
								                <cms:else />
								                    <cms:paginator simple='1' />
								                </cms:if>    
								            </cms:if>
								            
								        </cms:pages>    
								    <cms:else/>
								    <cms:ignore>
								        <!-- <button class="btn btn-success gxcpl-fw-700" onclick="location.href='<cms:add_querystring k_page_link "arrival_date=<cms:date today_yesterday format='Y-m-d'/>&interchange=<cms:gpc 'interchange' method='get' />&submit=ENTER&k_hid_quicksearch=quicksearch&nc=1&import=1" />' "><i class="fa fa-file-excel-o" aria-hidden="true" ></i> EXCEL</button> -->
								    </cms:ignore>
								    </cms:if>
									<!-- CSV Export -->
									<button id="btnShow" class="btn btn-danger gxcpl-fw-700" type="button">
										<i class="fa fa-eye" aria-hidden="true"></i> SHOW
									</button>
									<button id="btnHide" class="btn btn-primary gxcpl-fw-700" type="button">
										<i class="fa fa-eye-slash" aria-hidden="true"></i> HIDE
									</button>
								</div>
							</div>
						</div>
					</div>
					<!-- TO Table -->
					<div class="gxcpl-card-body tableFixHead <cms:if size>gxcpl-scroll</cms:if>" style="overflow-x: auto;">
						<table class="gxcpl-table userTbl" id="to">
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

								<!-- For Interchanged -->
								<cms:pages masterpage='pointwise-interchange.php' custom_field=" is_interchanged=1 | to_ho=0 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' />" order='asc' orderby="arrival_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set to_depa_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table.html' />
							 	</cms:pages>
							 	<!-- For Interchanged -->

							 	<!-- Not Interchange arrival date-->
								<cms:pages masterpage='pointwise-interchange.php' order='asc' orderby='arrival_time' custom_field="is_interchanged<>1 | to_ho=0 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' />" show_future_entries='1' >
									<cms:embed 'overdue.html' />	
									<cms:set to_dep_nt_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table.html' />
								</cms:pages>
								<!-- Not Interchange arrival date-->

							 	<!-- For NOT Interchanged -->
							 	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | to_ho=0 | is_interchanged<>'1' | arrival_date!=<cms:gpc 'arrival_date' method='get' />" order='asc' orderby="arrival_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set to_no_inter ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table.html' />
							 	</cms:pages>
							 	<!-- For NOT Interchanged -->
							</tbody>
						</table>

					</div>
					<div class="gxcpl-card-footer" style="line-height: 24px; text-align: left;">
						<strong>Forecasted: </strong>
						<cms:set to_total_fc = "<cms:add to_depa_inter "<cms:add to_no_depa_inter "<cms:add to_no_inter "<cms:add to_dep_nt_inter to_no_depa_no_inter />" />" />" />" scope='global' /> 
						<cms:set to_tr_name_total="<cms:add my_to_ta_count my_to_la_count />" scope="global" />	
						<cms:sub to_total_fc to_tr_name_total />

						<br>
						
						<strong>Taken Over(TO): </strong><cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=0 | is_interchanged=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA" order='asc' orderby='arrival_time' count_only='1' />
						<br> 

						<cms:set to_abs_count_pdf="<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=0 | is_interchanged=1" order='asc' orderby='arrival_time' count_only='1' />" scope='global' />
					
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
							<!-- Search -->
							<div class="col-md-3">
								<div class="gxcpl-ptop-10"></div>
								<label class="text-uppercase">Search Trains</label>
								<input type="text" class="typeahead1" placeholder="Search using Train Name or Loco Number...">
								<div class="gxcpl-ptop-10"></div>
							</div>
							<!-- Search -->
						</div>
					</div>
					<!-- HO Table -->
					<div class="gxcpl-card-body tableFixHead <cms:if size>gxcpl-scroll</cms:if>">
						<table class="gxcpl-table rpttbl" id="ho">
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
									<th>
										Arr / Dep
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

								<!-- For Interchanged with today's interchange & Dep Time-->
								<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | to_ho=1 | is_interchanged='1' | today_interchange='1' " order='asc' orderby="departure_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set ho_dep_td_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
							 	</cms:pages>
							 	<!-- For Interchanged with today's interchange & Dep Time -->

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
								<cms:ignore>
								<!-- Carry forward data with today's interchange, not interchange -->
							 	<!-- <cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | to_ho=1 | is_interchanged<>'1' | arrival_date=<cms:gpc 'arrival_date' method='get' /> | today_interchange=1 " order='asc' orderby="departure_time">
								<cms:ignore>Setting Sign On time to calculate if the row is changing color</cms:ignore>
									<cms:embed 'overdue.html' />
									<cms:set ho_tdy_no_dep_not_int ="<cms:show k_total_records />" scope='global' />
									<cms:embed 'ptwise-int-report-table-ho.html' />
							 	</cms:pages> -->
							 	<!-- Carry forward data with today's interchange, not interchange -->
							 	</cms:ignore>
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
					<div class="gxcpl-card-footer" style="line-height: 24px; text-align: left;">
						<strong>Forecasted: </strong>
						<cms:set ho_total_fc = "<cms:add ho_dep_td_int "<cms:add ho_no_dep_td_int "<cms:add ho_tdy_dep_int "<cms:add ho_tdy_no_dep_not_int ho_tdy_no_dep_int />" />" />" />" scope='global' />
						
						<cms:set ho_tr_name_total="<cms:add my_ho_ta_count my_ho_la_count />" scope="global" />	
    					
						<cms:sub ho_total_fc ho_tr_name_total />
						
						<br>
						<strong>Handed Over(HO): </strong><cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=1 | is_interchanged=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA" order='asc' orderby='departure_time' count_only='1' />
						
						<cms:set ho_abs_count_pdf="<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=1 | is_interchanged=1" order='asc' orderby='departure_time' count_only='1' />" scope='global' />
						
						<cms:ignore>
						<!-- <cms:set ho_live_count_pdf="<cms:show ho_live_count />" scope='global' />
						<cms:set ho_death_count_pdf="<cms:show ho_death_count />" scope='global' />
						<cms:set ho_total_count_pdf="<cms:add ho_live_count ho_death_count />" scope='global' />
						<cms:set ho_ta_count_pdf="<cms:show ho_ta_count />" scope='global' />
						<cms:set ho_la_count_pdf="<cms:show ho_la_count />" scope='global' />
						<cms:set ho_ta_loco_count_pdf="<cms:show ho_ta_loco_count />" scope='global' />
						<cms:set ho_la_loco_count_pdf="<cms:show ho_la_loco_count />" scope='global' />
						/////////////
						<br>
							Total: <cms:show ho_abs_count_pdf />=<cms:show my_ho_live_count />+<cms:show my_ho_death_count />D
							<br>
							TA: <cms:show my_ho_ta_count /> = <cms:show my_ho_ta_loco_count />
							<br>
							LA: <cms:show my_ho_la_count /> = <cms:show my_ho_la_loco_count />
							<br>
							AC: <cms:show my_ho_ac_actual_count /> = <cms:show my_ho_ac_count />
							<br>
							DSL: <cms:show my_ho_dsl_actual_count /> = <cms:show my_ho_dsl_count />
							
						<br>
						/////////////
						<br> -->
						</cms:ignore>
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
	<cms:ignore>
	<!-- PDF FORECAST COUNT -->
	<!-- Forecasted: <cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=0 " order='asc' orderby='arrival_time' count_only='1' />\n
	Forecasted: <cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=1 " order='asc' orderby='departure_time' count_only='1' />\n -->
	<!-- PDF FORECAST COUNT -->
	</cms:ignore>
<cms:pages masterpage='pointwise-interchange.php' limit="1" >
<cms:set arri = "<cms:gpc 'arrival_date' method='get' />" scope='global'  />
	<script>
		function generatePDF() {
		var dd = {
			pageSize:'A4',
			pageOrientation:'potrait',
			content: 
			[	
				{ text: 'Interchange Point <cms:pages masterpage="pointwise-interchange.php" limit='1' custom_field="interchange=<cms:gpc 'interchange' method='get' /> "><cms:show interchange /></cms:pages>', style: 'subheader', alignment: 'center' },
					'\n',
				{ text: 'Date:- <cms:date arri format= "d/m/Y" />', style: 'subheader', alignment: 'center' },
					'\n',
				{
					style: 'tableExample', alignment: 'center', fontSize: 8.3, border:0, margin: [20, 2], 
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
											[{text: 'S.No.', style: 'tableHeader', bold: true, fontSize: 9,}, 
											 {text: 'Train', style: 'tableHeader', bold: true, fontSize: 9,}, 
											 {text: 'Loco', style: 'tableHeader', bold: true, fontSize: 9,},
											 {text: 'Schedule', style: 'tableHeader', bold: true, fontSize: 9,}, 
											 {text: 'Arr/Dep', style: 'tableHeader', bold: true, fontSize: 9,}, 
											 ],

											<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=0  | is_interchanged=1" order='asc' orderby='arrival_time'>
											<cms:set tr_name_caps="<cms:php>echo strtoupper('<cms:show tr_name />');</cms:php>" />
											<cms:set schedule_caps="<cms:php>echo strtoupper('<cms:show schedule />');</cms:php>" />
											 	
											['<cms:show k_absolute_count />', '<cms:show tr_name_caps />', '<cms:show loco />', 
											 '<cms:show schedule_caps /><cms:date schedule_date format='d-m' />', '<cms:date arrival_time format='H:i' />/<cms:date departure_time format='H:i' />'],
											 </cms:pages>
											 ['', '', '', '', '', ],
											 ['', '', '', '', '', ],
											 ['', 'Total', '<cms:show to_abs_count_pdf />=<cms:show my_to_live_count />+<cms:show my_to_death_count />D', '', '', ], 
											['', '', 'TA <cms:show my_to_ta_count />=<cms:show my_to_ta_loco_count />', '', '', ],
											 ['', '', 'LA <cms:show my_to_la_count />=<cms:show my_to_la_loco_count />', '', '', ],
											 ['', '', 'AC <cms:show my_to_ac_actual_count />=<cms:show my_to_ac_count />', '', '', ],
											 ['', '', 'DSL <cms:show my_to_dsl_actual_count />=<cms:show my_to_dsl_count />', '', '', ],
										]
									},
								},
								[
									{
									style: 'tableExample', 
									table: {
										headerRows: 1,
										body: [
											[{text: 'S.No.', style: 'tableHeader', bold: true, fontSize: 9, }, 
											 {text: 'Train', style: 'tableHeader', bold: true, fontSize: 9,}, 
											 {text: 'Loco', style: 'tableHeader', bold: true, fontSize: 9,},
											 {text: 'Schedule', style: 'tableHeader', bold: true, fontSize: 9,}, 
											 {text: 'Arr/Dep', style: 'tableHeader', bold: true, fontSize: 9,}, ],

											 <cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' /> | <cms:gpc 'to_ho' method='get'  /> | to_ho=1  | is_interchanged=1" order='asc' orderby='departure_time'>
											<cms:set tr_name_caps="<cms:php>echo strtoupper('<cms:show tr_name />');</cms:php>" />
											<cms:set schedule_caps="<cms:php>echo strtoupper('<cms:show schedule />');</cms:php>" />

											['<cms:show k_absolute_count />', '<cms:show tr_name_caps />', '<cms:show loco />', 
											 '<cms:show schedule_caps /><cms:date schedule_date format='d-m' />', '<cms:date arrival_time format='H:i' />/<cms:date departure_time format='H:i' />', ],
											 </cms:pages>
											 ['', '', '', '', '', ],
											 ['', '', '', '', '',  ],
											 ['', 'Total', '<cms:show ho_abs_count_pdf />=<cms:show my_ho_live_count />+<cms:show my_ho_death_count />D', '', '', ], 
											['', '', 'TA <cms:show my_ho_ta_count />=<cms:show my_ho_ta_loco_count />', '', '', ],
											 ['', '', 'LA <cms:show my_ho_la_count />=<cms:show my_ho_la_loco_count />', '', '', ],
											 ['', '', 'AC <cms:show my_ho_ac_actual_count />=<cms:show my_ho_ac_count />', '', '', ],
											 ['', '', 'DSL <cms:show my_ho_dsl_actual_count />=<cms:show my_ho_dsl_count />', '', '', ],
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
		}
	</script>
</cms:pages>
<div class="gxcpl-ptop-50"></div>
	<cms:embed "footer.html" />
<?php COUCH::invoke( ); ?>