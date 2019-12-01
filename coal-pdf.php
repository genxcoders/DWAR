<?php require_once( 'couch/cms.php' ); ?>
<cms:embed "header.html" />
<a href="javascript:coalPDF()" class="btn btn-warning gxcpl-fw-700"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF</a>
	<cms:set my_coal_date_cy = "<cms:gpc 'tdate' method='get' />" scope="global" />
	<cms:set my_coal_date_ly = "<cms:date my_coal_date_cy return='-365 days' format='d-m-Y' />" scope="global" />
	<!-- Global Values -->
	<cms:set my_count_folder="<cms:pages masterpage='loading-pt.php' limit='1' count_only='1' />" scope="global" />
	<cms:set my_daily_target_total = '0' scope='global' />

	<cms:set cy_current_day = "<cms:date my_coal_date_cy format='d' />" scope="global" />
	<cms:set cy_first_day = "<cms:date return='first day of this month' format='d' />" scope="global" />
	<cms:set cy_day_range = "<cms:sub cy_current_day cy_first_day />" scope="global" />
	<cms:set add_cy_range = "<cms:add cy_day_range '1' />" scope="global" />

	<cms:set ly_current_day = "<cms:date my_coal_date_ly format='d' />" scope="global" />
	<cms:set ly_first_day = "<cms:date return='last day of last month last year' format='d' />" scope="global" />
	<cms:set ly_day_range = "<cms:sub ly_current_day ly_first_day />" scope="global" />
	<cms:set add_ly_range = "<cms:add ly_day_range '1' />" scope="global" />

	<cms:set apr_cy = "<cms:date 'last day of march this year' format='Y-m-d' />" />
	<cms:set cur_mtn_cy = "<cms:date my_coal_date_cy format='Y-m-d' />" />
	<cms:php>
		global $CTX;
		$from_date_cy = new DateTime(date($CTX->get('apr_cy')));
		$to_date_cy = new DateTime(date($CTX->get('cur_mtn_cy')));
		$dayz_cy = $to_date_cy->diff($from_date_cy)->days;
		$CTX->set( 'dayz_cy', $dayz_cy, 'global' );
	</cms:php>

	<cms:set apr_ly = "<cms:date 'last day of march last year' format='Y-m-d' />" />
	<cms:set cur_mtn_ly = "<cms:date my_coal_date_ly format='Y-m-d' />" />
	<cms:php>
		global $CTX;
		$from_date_ly = new DateTime(date($CTX->get('apr_ly')));
		$to_date_ly = new DateTime(date($CTX->get('cur_mtn_ly')));
		$dayz_ly = $to_date_ly->diff($from_date_ly)->days;
		$CTX->set( 'dayz_ly', $dayz_ly, 'global' );
	</cms:php>

	<!-- Global Values -->

	<script type="text/javascript">
		function coalPDF() {
			var dd = {
				pageSize:'A4',
				pageOrientation:'potrait',
				content: [
					{
						text: 'COAL LOADING PERFORMANCE ON DATE: <cms:date my_coal_date_cy format="d-m-Y" />', 
						bold: true,
						style: 'subheader'
					},
					{
						style: 'tableHeader',
						table: {
							body: [
								
								[
									{
										rowSpan: 4,
										style: 'textCenter',
										margin: [0, 18, 0, 0], 
										bold: true,
										text:'Head'
									}, 
									{
										rowSpan: 4, 
										style: 'textCenter',
										margin: [0, 18, 0, 0], 
										bold: true,
										text:'Area'
									},
									{
										rowSpan: 4, 
										style: 'textCenter',
										margin: [0, 18, 0, 0],
										bold: true, 
										text:'Colliery'
									}, 
									{
										rowSpan: 4, 
										style: 'textCenter',
										margin: [0, 18, 0, 0], 
										bold: true,
										text:'Daily Targets'
									},
									{
										colSpan: 3, 
										style: 'textCenter',
										bold: true,
										text:'Day'
									}, 
									{},
									{},
									{
										colSpan: 5, 
										style: 'textCenter',
										bold: true,
										text:'Month Upto'
									}, 
									{}, 
									{}, 
									{}, 
									{}, 
									{
										colSpan: 5, 
										style: 'textCenter',
										bold: true,
										text: [
											'1 ',
											{text: 'st ', style: 'sup'},
											'April Upto',
										],									    
									}, 
									{}, 
									{}, 
									{}, 
									{} 
								],
								[
									'', 
									'', 
									'', 
									'',
									{
										colSpan: 2, 
										style: 'textCenter',
										bold: true,
										text:'<cms:date my_coal_date_cy format="d-m-Y" />'
									}, 
									{}, 
									{
										style: 'textCenter',
										bold: true,
										text: 'Variation'
									}, 
									{
										colSpan: 4, 
										style: 'textCenter',
										bold: true,
										text:'<cms:date my_coal_date_cy format="d-m-Y" />'
									}, 
									{},
									{},
									{},
									{
										style: 'textCenter',
										bold: true,
										text: 'Variation'
									}, 
									{
										colSpan: 4, 
										style: 'textCenter',
										bold: true,
										text:'<cms:date my_coal_date_cy format="d-m-Y" />'
									}, 
									{},
									{},
									{},
									{
										style: 'textCenter',
										bold: true,
										text: 'Variation'
									}
								],
								[
									'', 
									'', 
									'',
									'', 
									{
										rowSpan: 2,
										style: 'textCenter',
										margin: [0, 7, 0, 0], 
										bold: true,
										text: 'CY'
									},  
									{
										rowSpan: 2,
										style: 'textCenter',
										margin: [0, 7, 0, 0], 
										bold: true,
										text: 'LY'
									},  
									{
										rowSpan: 2,
										style: 'textCenter',
										margin: [0, 7, 0, 0], 
										bold: true,
										text: '%'
									}, 
									{
										colSpan: 2,
										style: 'textCenter',
										bold: true,
										text: 'CY'
									},
									{},
									{
										colSpan: 2,
										style: 'textCenter',
										bold: true,
										text: 'LY'
									}, 
									{},
									{
										rowSpan: 2,
										style: 'textCenter',
										margin: [0, 7, 0, 0], 
										bold: true,
										text: '%'
									}, 
									{
										colSpan: 2,
										style: 'textCenter',
										bold: true,
										text: 'CY'
									},
									{},
									{
										colSpan: 2,
										style: 'textCenter',
										bold: true,
										text: 'LY'
									}, 
									{},
									{
										rowSpan: 2,
										style: 'textCenter',
										margin: [0, 7, 0, 0], 
										bold: true,
										text: '%'
									}
								],
								[
									'',
									'', 
									'',
									'', 
									'', 
									'', 
									'', 
									{
										style: 'textCenter',
										bold: true,
										text: 'Total'
									},  
									{
										style: 'textCenter',
										bold: true,
										text: 'Av/day'
									}, 
									{
										style: 'textCenter',
										bold: true,
										text: 'Total'
									}, 
									{
										style: 'textCenter',
										bold: true,
										text: 'Av/day'
									},
									{}, 
									{
										style: 'textCenter',
										bold: true,
										text: 'Total'
									},  
									{
										style: 'textCenter',
										bold: true,
										text: 'Av/day'
									}, 
									{
										style: 'textCenter',
										bold: true,
										text: 'Total'
									}, 
									{
										style: 'textCenter',
										bold: true,
										text: 'Av/day'
									}, 
									{}
								],
								<cms:folders masterpage='loading-pt.php' orderby='weight' >
								<cms:set my_count="<cms:show k_folder_totalpagecount />" scope="global" />
										
								<cms:set my_rowspan_folder="<cms:pages masterpage='loading-pt.php' limit='1' count_only='1' />" scope="global" />

								<cms:set my_rowspan="<cms:pages masterpage='loading-pt.php' folder=k_folder_name limit='1'><cms:show k_folder_totalpagecount /></cms:pages>" scope="global" />
								<cms:set my_rowspan_total="<cms:pages masterpage='loading-pt.php' folder=k_folder_name limit='1'><cms:show k_folder_totalpagecount /></cms:pages>" scope="global" />

								<cms:set difference= '0' scope='global' />
								<cms:set variation= '0' scope='global' />
								<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
								[
									{
										<cms:if my_count_folder eq my_rowspan_folder>
											rowSpan: 24,
											style: 'textCenter',
											margin: [0, 120, 0, 0],
											text: 'WCL (FSA) (Raw coal loading for Power houses, WCL\'s e.auction and other linked viz CPP, steel)'
											<cms:decr my_count_folder />
										</cms:if>
									},
									<cms:if my_count eq my_rowspan>
									{
										rowSpan: <cms:set rs="<cms:add my_rowspan '1' />" /><cms:show rs />,
										style: 'textCenter',
										margin: [0, 10, 0, 0],
										text: '<cms:show k_page_foldertitle />'
									},
									<cms:else_if my_count ne my_rowspan />
										'',
									</cms:if>
									{
										style: 'textCenter',
										text: "<cms:show k_page_title />"
									},
									{
										style: 'textCenter',
										text: '<cms:show daily_target />'
									},
									{
										<cms:set my_cy_load_total='0' scope='global' />
										<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date my_coal_date_cy format='Y-m-d' />">
										<cms:set my_cy_load_total = "<cms:add my_cy_load_total hlf_ful />" scope="global" />
										</cms:reverse_related_pages>
										<cms:set cy_load = "<cms:show my_cy_load_total />" scope="global" />
										style: 'textCenter',
										text: '<cms:show cy_load />'
									},
									{
										<cms:set my_ly_load_total='0' scope='global' />
										<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date my_coal_date_ly format='Y-m-d' />">
										<cms:set my_ly_load_total = "<cms:add my_ly_load_total hlf_ful />" scope="global" />
										</cms:reverse_related_pages>
										<cms:set ly_load = "<cms:show my_ly_load_total />" scope="global" />
										style: 'textCenter',
										text: '<cms:show ly_load />'
									},
									{
										<cms:set difference = "<cms:sub cy_load ly_load />" scope='global' />
										style: 'textCenter',
										text: '<cms:if ly_load eq "0">-<cms:else_if ly_load ne "0" /><cms:set var = "<cms:div difference ly_load />" scope='global' /><cms:set variation = "<cms:mul var '100' />" scope='global' /><cms:number_format variation decimal_precision="2" /></cms:if>'
									},
									{
										<cms:set my_cy_monthly_load = "0" scope="global" />
										<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='last day of last month' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_cy format='Y-m-d 23:59:59' />">
											<cms:set my_cy_monthly_load = "<cms:add my_cy_monthly_load hlf_ful />" scope="global" />
										</cms:reverse_related_pages>	
										style: 'textCenter',
										text: '<cms:show my_cy_monthly_load />'
									},
									{	

										<cms:set avg_cy_per_day_load = "0" scope="global" />
										<cms:set avg_cy_per_day_load = "<cms:div my_cy_monthly_load add_cy_range />" scope="global" />
										style: 'textCenter',
										text: '<cms:number_format avg_cy_per_day_load decimal_precision="2" />'
									},
									{	
										<cms:set my_ly_monthly_load = "0" scope="global" />
										<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='last day of last month last year' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_ly format='Y-m-d 23:59:59' />">
											<cms:set my_ly_monthly_load = "<cms:add my_ly_monthly_load hlf_ful />" scope="global" />
										</cms:reverse_related_pages>
												
										style: 'textCenter',
										text: '<cms:show my_ly_monthly_load />'
									},
									{
										<cms:set avg_ly_per_day_load = "0" scope="global" />
										<cms:set avg_ly_per_day_load = "<cms:div my_ly_monthly_load add_ly_range />" scope="global" />
												
										style: 'textCenter',
										text: '<cms:number_format avg_ly_per_day_load decimal_precision="2" />'
									},
									{
										<cms:set montly_difference = "<cms:sub my_cy_monthly_load my_ly_monthly_load />" scope="global" />
										style: 'textCenter',
										text: '<cms:if my_ly_monthly_load eq "0">-<cms:else /><cms:set montly_var = "<cms:div montly_difference my_ly_monthly_load />" scope="global" /><cms:set montly_variation= "<cms:mul montly_var '100' />" scope="global" /><cms:number_format montly_variation decimal_precision="2" /></cms:if>'
									},
									{
										<cms:set cy_april_year_load = "0" scope="global" />
										<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'last day of march' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_cy format='Y-m-d 23:59:59' />">
										<cms:set cy_april_year_load = "<cms:add cy_april_year_load hlf_ful />" scope="global" />
										</cms:reverse_related_pages>		
										style: 'textCenter',
										text: '<cms:show cy_april_year_load />'
									},
									{
										<cms:set avg_cy_april_year_per_day_load = "0" scope="global" /> 
										<cms:set avg_cy_april_year_per_day_load = "<cms:div cy_april_year_load dayz_cy />" scope="global" />
										style: 'textCenter',
										text: '<cms:number_format avg_cy_april_year_per_day_load decimal_precision="2" />'
									},
									{
										<cms:set ly_april_year_load = "0" scope="global" />
										<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'last day of march last year' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_ly format='Y-m-d 23:59:59' />">
											<cms:set ly_april_year_load = "<cms:add ly_april_year_load hlf_ful />" scope="global" />
										</cms:reverse_related_pages>
												
										style: 'textCenter',
										text: '<cms:show ly_april_year_load />'
									},
									{
										<cms:set avg_ly_april_year_per_day_load = "0" scope="global" />
										<cms:set avg_ly_april_year_per_day_load = "<cms:div ly_april_year_load dayz_ly />" scope="global" />
										style: 'textCenter',
										text: '<cms:number_format avg_ly_april_year_per_day_load decimal_precision="2" />'
									},
									{
										<cms:set april_difference = "<cms:sub cy_april_year_load ly_april_year_load />" scope="global" />
										style: 'textCenter',
										text: '<cms:if ly_april_year_load eq "0">-<cms:else_if ly_april_year_load ne "0" /><cms:set april_var = "<cms:div april_difference ly_april_year_load />" scope="global" /><cms:set april_variation = "<cms:mul april_var '100' />" scope="global" /><cms:number_format april_variation decimal_precision="2" /></cms:if>'
									}
								],
								<cms:decr my_count />
								<cms:decr my_rowspan_total />
								<cms:if my_rowspan_total eq '0'>
									<cms:set my_daily_target = '0' scope='global' />
									<cms:set my_hlf_ful= '0' scope='global' />
									<cms:set my_ly_hlf_ful= '0' scope='global' />
									<cms:set difference_total= '0' scope='global' />
									<cms:set variation_total= '0' scope='global' />
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
										<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
											<cms:set my_daily_target="<cms:add my_daily_target daily_target />" scope="global" />
										</cms:pages>
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:show my_daily_target />'
									},
									{
										<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
											<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date my_coal_date_cy format='Y-m-d' />">
												<cms:set my_hlf_ful="<cms:add my_hlf_ful hlf_ful />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										<cms:set cy_load_total="<cms:show my_hlf_ful />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:show cy_load_total />'
									},

									{
										<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
											<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date my_coal_date_ly format='Y-m-d' />">
												<cms:set my_ly_hlf_ful="<cms:add my_ly_hlf_ful hlf_ful />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										<cms:set ly_load_total="<cms:show my_ly_hlf_ful />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:show ly_load_total />'
									},
									{
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:if ly_load_total eq "0">-<cms:else_if ly_load_total ne "0" /><cms:set difference_total="<cms:sub cy_load_total ly_load_total />" /><cms:set vari_total="<cms:div difference_total ly_load_total />" scope='global' /><cms:set variation_total= "<cms:mul vari_total '100' />" scope='global' /><cms:number_format variation_total decimal_precision="2" /></cms:if>'
									},
									{
										<cms:set my_cy_monthly_load_total = '0' scope='global' />
										<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
											<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='last day of last month' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_cy format='Y-m-d 23:59:59' />">
												<cms:set my_cy_monthly_load_total = "<cms:add my_cy_monthly_load_total hlf_ful />" scope='global' />
											</cms:reverse_related_pages>
										</cms:pages>
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:show my_cy_monthly_load_total />'
									},
									{
										<cms:set avg_cy_per_day_load_total = "0" scope="global" />
			 							<cms:set avg_cy_per_day_load_total = "<cms:div my_cy_monthly_load_total add_cy_range />" scope='global' />
			 							style: 'textCenter',
			 							bold: true,
			 							fillColor: '#d9d9d9',
										text: '<cms:number_format avg_cy_per_day_load_total decimal_precision="2" />'
									},
									{
										<cms:set my_ly_monthly_load_total = '0' scope='global' />
										<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
											<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='last day of last month last year' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_ly format='Y-m-d 23:59:59' />">
												<cms:set my_ly_monthly_load_total = "<cms:add my_ly_monthly_load_total hlf_ful />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:show my_ly_monthly_load_total />'
									},
									{
										<cms:set avg_ly_per_day_load_total = "0" scope="global" />
						 				<cms:set avg_ly_per_day_load_total = "<cms:div my_ly_monthly_load_total add_ly_range />" scope='global' />
			 							style: 'textCenter',
			 							bold: true,
			 							fillColor: '#d9d9d9',
										text: '<cms:number_format avg_ly_per_day_load_total decimal_precision="2" />'
									},
									{
										<cms:set montly_difference_total = "<cms:sub my_cy_monthly_load_total my_ly_monthly_load_total /> " scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:if my_ly_monthly_load_total eq "0">-<cms:else_if my_ly_monthly_load_total ne "0" /><cms:set montly_var_total = "<cms:div montly_difference_total my_ly_monthly_load_total />" scope="global" /><cms:set montly_variation_total = "<cms:mul montly_var_total '100' />" scope='global' /><cms:number_format montly_variation_total decimal_precision="2" /></cms:if>'
									},
									{
										<cms:set cy_april_year_load_total = "0" scope="global" />
										<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
											<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'last day of march' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_cy format='Y-m-d 23:59:59' />">
											<cms:set cy_april_year_load_total = "<cms:add cy_april_year_load_total hlf_ful />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:show cy_april_year_load_total />'
									},
									{
										<cms:set avg_cy_april_year_per_day_load = "0" scope="global" />
										<cms:set avg_cy_april_year_per_day_load = "<cms:div cy_april_year_load_total dayz_cy />" scope="global" />		
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:number_format avg_cy_april_year_per_day_load decimal_precision="2" />'
									},
									{
										<cms:set ly_april_year_load_total = "0" scope="global" />
										<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
											<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'last day of march last year' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_ly format='Y-m-d 23:59:59' />">
											<cms:set ly_april_year_load_total = "<cms:add ly_april_year_load_total hlf_ful />" scope="global" />
											</cms:reverse_related_pages>
										</cms:pages>
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:show ly_april_year_load_total />'
									},
									{
										<cms:set avg_ly_april_year_per_day_load = "0" scope="global" />
										<cms:set avg_ly_april_year_per_day_load = "<cms:div ly_april_year_load_total dayz_ly />" scope="global" />	
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:number_format avg_ly_april_year_per_day_load decimal_precision="2" />'
									},
									{
										<cms:set april_difference_total = "<cms:sub cy_april_year_load_total ly_april_year_load_total />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#d9d9d9',
										text: '<cms:if ly_april_year_load_total eq "0">-<cms:else_if ly_april_year_load_total ne "0" /><cms:set april_var_total = "<cms:div april_difference_total ly_april_year_load_total />" scope="global" /><cms:set april_variation_total = "<cms:mul april_var_total '100' />" scope="global" /><cms:number_format april_variation_total decimal_precision="2" /></cms:if>'
									}

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
				                    	text: 'TOTAL'
				                    },
				                    {},
				                    {
				                    	<cms:set grand_total = '0' scope='global' />
				                    	<cms:folders masterpage='loading-pt.php'>
											<cms:pages masterpage='loading-pt.php' folder=k_folder_name>
												<cms:set grand_total="<cms:add grand_total daily_target />" scope="global" />
											</cms:pages>
										</cms:folders>
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: "<cms:show grand_total />"
									},
				                    {
				                    	<cms:set cy_load_grand_total = '0' scope='global' />
				                    	<cms:folders masterpage='loading-pt.php'>
											<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date my_coal_date_cy format='Y-m-d' />" >
													<cms:set cy_load_grand_total="<cms:add cy_load_grand_total hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
										</cms:folders>
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: "<cms:show cy_load_grand_total />"
				                    },
				                    {
				                    	<cms:set ly_load_grand_total = '0' scope='global' />
				                    	<cms:folders masterpage='loading-pt.php'>
											<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate=<cms:date my_coal_date_ly format='Y-m-d' />" >
													<cms:set ly_load_grand_total="<cms:add ly_load_grand_total hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
										</cms:folders>
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: "<cms:show ly_load_grand_total />"
									},
				                    {
				                    	style: 'textCenter',
				                    	bold: true,
				                    	fillColor: '#bababa',
				                    	margin: [0, 5, 0, 5],
				                    	text: '<cms:if ly_load_grand_total eq "0">-<cms:else_if ly_load_grand_total ne "0" /><cms:set difference_grand_total = "<cms:sub cy_load_grand_total ly_load_grand_total />" scope="global" /><cms:set division_grand_total = "<cms:div difference_grand_total ly_load_grand_total />" scope="global" /><cms:set percent_grand_total = "<cms:mul division_grand_total '100' />" scope="global" /><cms:number_format percent_grand_total decimal_precision="2" /></cms:if>'
				                    },
				                    {
				                    	<cms:set my_cy_monthly_load_grand_total = "0" scope="global" />
				                    	<cms:folders masterpage='loading-pt.php'>
				                    	<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
											<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='last day of last month' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_cy format='Y-m-d 23:59:59' />">
												<cms:set my_cy_monthly_load_grand_total = "<cms:add my_cy_monthly_load_grand_total hlf_ful />" scope='global' />
											</cms:reverse_related_pages>
										</cms:pages>
										</cms:folders>
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
				                    	text: "<cms:show my_cy_monthly_load_grand_total />"
				                    },
				                    {
										<cms:set avg_cy_per_day_load_grand_total = "0" scope="global" />
										<cms:set avg_cy_per_day_load_grand_total = "<cms:div my_cy_monthly_load_grand_total add_cy_range />" scope='global' />
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: '<cms:number_format avg_cy_per_day_load_grand_total decimal_precision="2" />'
									},
				                    {
										<cms:set my_ly_monthly_load_grand_total = "0" scope="global" />
										<cms:folders masterpage='loading-pt.php'>
											<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='last day of last month last year' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_ly format='Y-m-d 23:59:59' />">
													<cms:set my_ly_monthly_load_grand_total = "<cms:add my_ly_monthly_load_grand_total hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
										</cms:folders>
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: '<cms:show my_ly_monthly_load_grand_total />'
									},
									{
										<cms:set avg_ly_per_day_load_total = "0" scope="global" />
										<cms:set avg_ly_per_day_load_grand_total = "<cms:div my_ly_monthly_load_grand_total add_ly_range />" scope='global' />
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: '<cms:number_format avg_ly_per_day_load_grand_total decimal_precision="2" />'
									},
									{
										<cms:set montly_difference_grand_total = "<cms:sub my_cy_monthly_load_grand_total my_ly_monthly_load_grand_total /> " scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: '<cms:if my_ly_monthly_load_grand_total eq "0">-<cms:else_if my_ly_monthly_load_grand_total ne "0" /><cms:set montly_var_grand_total = "<cms:div montly_difference_grand_total my_ly_monthly_load_grand_total />" scope="global" /><cms:set montly_variation_grand_total= "<cms:mul montly_var_grand_total '100' />" scope='global' /><cms:number_format montly_variation_grand_total decimal_precision="2" /></cms:if>'
									},
									{
										<cms:set cy_april_year_load_grand_total = "0" scope="global" />
										<cms:folders masterpage='loading-pt.php'>
											<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'last day of march' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_cy format='Y-m-d 23:59:59' />">
													<cms:set cy_april_year_load_grand_total = "<cms:add cy_april_year_load_grand_total hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
										</cms:folders>
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: '<cms:show cy_april_year_load_grand_total />'
									},
									{
										<cms:set avg_cy_april_year_per_day_grand_load = "0" scope="global" />
										<cms:set avg_cy_april_year_per_day_grand_load = "<cms:div cy_april_year_load_grand_total dayz_cy />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: '<cms:number_format avg_cy_april_year_per_day_grand_load decimal_precision="2" />'
									},
									{
										<cms:set ly_april_year_load_grand_total = "0" scope="global" />
										<cms:folders masterpage='loading-pt.php'>
											<cms:pages masterpage='loading-pt.php' folder=k_folder_name >
												<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date 'last day of march last year' format='Y-m-d 23:59:59' /> | tdate < <cms:date my_coal_date_ly format='Y-m-d 23:59:59' />">
													<cms:set ly_april_year_load_grand_total = "<cms:add ly_april_year_load_grand_total hlf_ful />" scope="global" />
												</cms:reverse_related_pages>
											</cms:pages>
										</cms:folders>
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: '<cms:show ly_april_year_load_grand_total />'
									},
									{
										<cms:set avg_ly_april_year_per_day_grand_load = "0" scope="global" />
										<cms:set avg_ly_april_year_per_day_grand_load = "<cms:div ly_april_year_load_grand_total dayz_cy />" scope="global" />	
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: '<cms:number_format avg_ly_april_year_per_day_grand_load decimal_precision="2" />'
									},
									{
										<cms:set april_difference_grand_total = "<cms:sub cy_april_year_load_grand_total ly_april_year_load_grand_total />" scope="global" />
										style: 'textCenter',
										bold: true,
										fillColor: '#bababa',
										margin: [0, 5, 0, 5],
										text: '<cms:if ly_april_year_load_grand_total eq "0">-<cms:else_if ly_april_year_load_grand_total ne "0" /><cms:set april_var_grand_total = "<cms:div april_difference_grand_total ly_april_year_load_grand_total />" scope="global" /><cms:set april_variation_grand_total = "<cms:mul april_var_grand_total '100' />" scope="global" /><cms:number_format april_variation_grand_total decimal_precision="2" /></cms:if>'
									}
				                ]
							]
						}
					}
				],
				styles: {
					textCenter: {
						alignment: 'center'
					},
					header: {
						fontSize: 10,
						margin: [0, 0, 0, 10]
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
						color: 'black'
					},
					sup: {
						fontSize: 4
					}
				},
				defaultStyle: {
					// alignment: 'justify'
				}
			}
			pdfMake.createPdf(dd).open();
		}
	</script>

<cms:embed "footer.html" />
<?php COUCH::invoke( ); ?>

