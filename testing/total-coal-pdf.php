<?php require_once( '../couch/cms.php' ); ?>
	<cms:set total = "0" "global" />
	<h2>Value from 01/04/2019 to 22/10/2019</h2>
	<h4><small>These values were uploaded by CSV/Excel sheet (Named: Coal loading RAKES data 31-10-2019.xls) shared through email by Jalali Sir on Oct 23, 2019</small></h4>
	<cms:pages masterpage='coal.php' custom_field="loading_point='1823f917df6d790a1692ad552ff149a6' | tdate>='2019-04-01 00:00:00' | tdate<='2019-10-22 23:59:59'" orderby='tdate' order='asc'>
		<cms:date tdate format="d-m-Y" /> = <cms:show hlf_ful /><br>
		<cms:set total = "<cms:add total hlf_ful />" "global" />
	</cms:pages>
	<strong>TOTAL = <cms:show total /></strong>

	<hr>

	<cms:set total_two = "0" "global" />
	<h2>Value from 23/10/2019 to 26/11/2019</h2>
	<h4><small>These values were manually fed by data entry opertors between 23/10/2019 and 17/11/2019</small></h4>
	<cms:pages masterpage='coal.php' custom_field="loading_point='1823f917df6d790a1692ad552ff149a6' | tdate>='2019-10-23 00:00:00' | tdate<='2019-11-26 23:59:59'" orderby='tdate' order='asc'>
		<cms:date tdate format="d-m-Y" /> = <cms:show hlf_ful /><br>
		<cms:set total_two = "<cms:add total_two hlf_ful />" "global" />
	</cms:pages>
	<strong>TOTAL = <cms:show total_two /></strong>

	<hr>

	<h2>Total of all Loads between 01/04/2019 to 26/11/2019</h2>
	<h4><small>using the values stated above with their input method</small></h4>
	<strong><cms:add total total_two /></strong>
<?php COUCH::invoke( ); ?>