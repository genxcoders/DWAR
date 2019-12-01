<?php require_once( '../couch/cms.php' ); ?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<cms:php>
		set_time_limit(300);
	</cms:php>
	<cms:no_cache />
		<cms:set current_year="<cms:date format='Y' />" "global" />
		<cms:repeat '36' startcount='0' >
		   	<cms:set my_year_month="<cms:date "last day of april +<cms:show k_count /> months -2 years" format='Y-M' />" "global" />
		</cms:repeat>

	   <table border="1" style="margin: 1%;">
			<thead>
				<tr>
					<th class="text-center" rowspan="2">Month</th>
					<th class="text-center" rowspan="2"><cms:date "-2 year" format='Y' />-<cms:date "-1 year" format='Y' /> <br><small>(Total)</small></th>
					<th class="text-center" colspan="11"><cms:date "-1 year" format='Y' />-<cms:show current_year /></th>
					<th class="text-center" colspan="11"><cms:show current_year />-<cms:date "+1 year" format='Y' /></th>
					<th class="text-center" rowspan="2">Diff</th>
				</tr>
				<tr>
					<th class="text-center">WCL</th>
					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">	
						<cms:if k_page_foldername eq '' >
							<th class="text-center">
								<cms:show k_page_title />
							</th>
						</cms:if>
					</cms:pages>
					<th class="text-center">Total</th>
					<th class="text-center">WCL</th>
					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">	
						<cms:if k_page_foldername eq '' >
							<th class="text-center">
								<cms:show k_page_title />
							</th>
						</cms:if>
					</cms:pages>
					<th class="text-center">Total</th>
				</tr>
			</thead>
			<tbody>
				<cms:repeat '12' startcount='1' >
	   			<cms:set my_year_month_col_1="<cms:date "last day of march +<cms:show k_count /> months" format='Y-M' />" "global" />
				<tr>
					<td>
						<cms:date my_year_month_col_1 format='M' />
					</td>
					<td>
						<cms:set total_month = "0" scope="global" />
						<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months -2 year" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months -2 year" format="Y-m-d 23:59:59" />">
							<cms:set total_month = "<cms:add total_month hlf_ful />" scope="global" />
						</cms:pages>
						<cms:show total_month />
					</td>
					<td>
						<cms:set total_month_lst_yr = "0" scope="global" />
						<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
						<cms:if k_page_foldername ne '' >
						<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 /> last year " format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 /> last year" format="Y-m-d 23:59:59" />">
							<cms:set total_month_lst_yr = "<cms:add total_month_lst_yr hlf_ful />" scope="global" />
						</cms:reverse_related_pages>
						</cms:if>
						</cms:pages>
						
						<cms:show total_month_lst_yr />
					</td>

					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
					<cms:set my_total_month = "0" "global" />
					<cms:if k_page_foldername eq '' >
					<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 /> last year " format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 /> last year" format="Y-m-d 23:59:59" />">
						<cms:set my_total_month = "<cms:add my_total_month hlf_ful />" scope="global" />
					</cms:reverse_related_pages>
					<td class="text-center">
						<cms:show my_total_month />
					</td>
					</cms:if>
					</cms:pages>

					<td>
						<cms:set all_total_month = "0" scope="global" />
						<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 23:59:59" />">
							<cms:set all_total_month = "<cms:add all_total_month hlf_ful />" scope="global" />
						</cms:pages>
						<cms:show all_total_month />
					</td>

					<td>
						<cms:set total_month_curr_yr = "0" scope="global" />
						<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
						<cms:if k_page_foldername ne '' >
						<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 />" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 />" format="Y-m-d 23:59:59" />">
							<cms:set total_month_curr_yr = "<cms:add total_month_curr_yr hlf_ful />" scope="global" />
						</cms:reverse_related_pages>
						</cms:if>
						</cms:pages>
						
						<cms:show total_month_curr_yr />
					</td>

					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
					<cms:set my_total_curr_month = "0" "global" />
					<cms:if k_page_foldername eq '' >
					<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 />" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 />" format="Y-m-d 23:59:59" />">
						<cms:set my_total_curr_month = "<cms:add my_total_curr_month hlf_ful />" scope="global" />
					</cms:reverse_related_pages>
					<td class="text-center">
						<cms:show my_total_curr_month />
					</td>
					</cms:if>
					</cms:pages>

					<td>
						<cms:set all_total_curr_month = "0" scope="global" />
						<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months" format="Y-m-d 23:59:59" />">
							<cms:set all_total_curr_month = "<cms:add all_total_curr_month hlf_ful />" scope="global" />
						</cms:pages>
						<cms:show all_total_curr_month />
					</td>

				</tr>
				</cms:repeat>
				
				<cms:set grnd_total_month = "0" scope="global" />
				<cms:set grnd_total_month_lst_yr = "0" scope="global" />
				<cms:set all_grnd_total_month = "0" scope="global" />
				<cms:repeat '12' startcount='1' >
				<cms:set my_year_month_col_1="<cms:date "last day of march +<cms:show k_count /> months" format='Y-M' />" "global" />
					<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months -2 year" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months -2 year" format="Y-m-d 23:59:59" />">
						<cms:set grnd_total_month = "<cms:add grnd_total_month hlf_ful />" scope="global" />
					</cms:pages>

					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
						<cms:if k_page_foldername ne '' >
						<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 /> last year " format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 /> last year" format="Y-m-d 23:59:59" />">
							<cms:set grnd_total_month_lst_yr = "<cms:add grnd_total_month_lst_yr hlf_ful />" scope="global" />
						</cms:reverse_related_pages>
						</cms:if>
					</cms:pages>
					<cms:pages masterpage="coal.php" custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 23:59:59" />">
						<cms:set all_grnd_total_month = "<cms:add all_grnd_total_month hlf_ful />" scope="global" />
					</cms:pages>
				</cms:repeat>
				<tr>
					<td>
						Total Yearly
					</td>
					<td>
						<cms:show grnd_total_month />
					</td>
					<td>
						<cms:show grnd_total_month_lst_yr />
					</td>
					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
						<cms:if k_page_foldername eq '' >
						<cms:set my_grnd_total_month = "0" "global" />
						<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date "first day of april last year " format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march this year" format="Y-m-d 23:59:59" />">
							<cms:set my_grnd_total_month = "<cms:add my_grnd_total_month hlf_ful />" scope="global" />
						</cms:reverse_related_pages>
						<td><cms:show my_grnd_total_month /></td>
						</cms:if>
					</cms:pages>	
					<td>
						<cms:show all_grnd_total_month />
					</td>
					<cms:set grnd_total_month_curr_yr = "0" scope="global" />
					<cms:repeat '12' startcount='1' >

					<cms:set my_year_month_col_1="<cms:date "last day of march +<cms:show k_count /> months" format='Y-M' />" "global" />
					
					<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
					<cms:if k_page_foldername ne '' >
					<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_year_month_col_1 />" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_year_month_col_1 />" format="Y-m-d 23:59:59" />">
						<cms:set grnd_total_month_curr_yr = "<cms:add grnd_total_month_curr_yr hlf_ful />" scope="global" />
					</cms:reverse_related_pages>
					</cms:if>
					</cms:pages>
					
					
					</cms:repeat>
					<cms:show grnd_total_month_curr_yr />
				</tr>
				
					
			</tbody>
		</table>

		<!-- <cms:ignore>
		<table>
			<cms:repeat '12' startcount='1' >
			<tr>
				<cms:pages masterpage='loading-pt.php' folder=k_folder_name custom_field="ld_cmdt=Coal">
				
				   <cms:set my_month="<cms:date "first day of april +<cms:show k_count /> months" format='M' />" "global" />
				  
				
				<cms:set my_total_month = "0" "global" />
				<cms:if k_page_foldername eq '' >
				<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of <cms:show my_month /> last year " format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of <cms:show my_month /> last year" format="Y-m-d 23:59:59" />" orderby='tdate' order='asc'>
					<cms:show k_absolute_count />. FD::<cms:date "first day of <cms:show my_month /> last year " format="Y-m-d 00:00:00" /> | LD::<cms:date "last day of <cms:show my_month /> last year" format="Y-m-d 23:59:59" /><br><br>
				</cms:reverse_related_pages>
				</cms:if>
				
				</cms:pages>
			</tr>
			</cms:repeat>

		</table>
		</cms:ignore> -->
	</body>
</html>
<?php COUCH::invoke( ); ?>