<?php require_once( 'couch/cms.php' ); ?>	
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<cms:embed 'searchavgpdd.html' />
		<br><cms:show my_search_str />

		<hr>
		<br>
		<cms:set total_pdd = "0" scope="global" />

		<!-- Final Code for PDD Display -->
		<cms:php>
            global $CTX;
            $ad = '2019-09-01';	
            $dd = '2019-09-10';
            $today = new DateTime(date($ad));
            $pday = new DateTime(date($dd));
            $dayz = $pday->diff($today)->days;
            $CTX->set( 'dayz', $dayz, 'global' );
        </cms:php>
		Dayz::<cms:show dayz /><br>
		<cms:set dayz_total = "<cms:add dayz '1' />" scope="global" />
		<cms:set pdd_total = "0" scope="global" />
		<table>
			<thead border='1'>
				<tr>
					<th>Date</th>
					<th>Train Count</th>
					<th>Avg. PDD</th>
				</tr>
			</thead>
			<tbody>
				<cms:repeat "<cms:show dayz />" startcount="0" >
				<tr>
					<td>
						<!-- Search Form: Display from date to To Date -->
						<cms:date "<cms:date format='Y-m-d' /> +<cms:show k_count /> days" format='Y-m-d' />
						<!-- Search Form: Display from date to To Date -->
					</td>
					<td>
						<!-- Count of trains on this date -->
						<cms:set pdd_rows = "<cms:pages masterpage='pointwise-interchange.php' count_only='1' custom_field="interchange=ET | to_ho=0 | arrival_date='<cms:date "<cms:date format='Y-m-d' /> +<cms:show k_count /> days" format="Y-m-d" />'" />" scope="global" />
						<cms:show pdd_rows />
						<!-- Count of trains on this date -->
					</td>
					<td>
						<cms:embed 'pdd.html' />
						<cms:show minutes />
					</td>
				</tr>
				</cms:repeat>

				<!-- Extra TR to display value of To Date -->
				<tr>
					<td><cms:date "<cms:date format='Y-m-d' /> +<cms:show dayz /> days" format='Y-m-d' /></td>
					<td><cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=ET | to_ho=0 | arrival_date=<cms:date "<cms:date format='Y-m-d' /> +<cms:show dayz /> days" format='Y-m-d' />" count_only='1' /></td>
				</tr>
				<!-- Extra TR to display value of To Date -->
			</tbody>
		</table>
		
		<!-- Final Code for PDD Display -->
		
		<cms:ignore><cms:date format='Y-m-d' />
		<cms:repeat "<cms:show dayz />" startcount="1" >
		   <br/><cms:date "<cms:date format='Y-m-d' /> +<cms:show k_count /> days" format='Y-m-d' />
		</cms:repeat>
		<table>
			<tbody>
				[<cms:show my_start_on />:<cms:show my_interchange />]
				(<cms:pages masterpage='pointwise-interchange.php' start_on='<cms:show my_start_on />' stop_before='<cms:show my_stop_on />' custom_field="interchange=<cms:show my_interchange /> | to_ho=0 " count_only='1' />)
				<tr>
					<td>
						
					</td>
				</tr>
			</tbody>
		</table>
		</cms:ignore>
	</body>
</html>
<?php COUCH::invoke( ); ?>