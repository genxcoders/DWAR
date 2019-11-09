<?php require_once( '../couch/cms.php' ); ?>
<cms:php>
 	global $minutes;
	$datetime1 = strtotime("2011-10-11 00:37:00"); // Departure Time
	$datetime2 = strtotime("2011-10-11 00:35:00"); // Signon time
	$interval  = abs($datetime2 - $datetime1);
	$minutes   = round($interval / 60);
	echo 'Diff. in minutes is: '.$minutes.'<br>';
</cms:php>
<cms:if my_dep_time eq '-NA-'>
	-NA-
<cms:else_if is_interchanged eq '1' />
	<cms:set minutes="<cms:php>global $minutes; echo $minutes;</cms:php>" scope="global" />
</cms:if>
Minutes:<cms:show minutes /><br>
Mod:<cms:mod minutes '60' /><br>
<cms:set mod_min_value="<cms:mod minutes '60' />" scope="global" />
mod_min_value:<cms:show mod_min_value /><br>
Div:<cms:number_format "<cms:div minutes '60' />" decimal_precision='0' /><br>
<cms:set div_hour_value="<cms:number_format "<cms:div minutes '60' />" decimal_precision='0' />" scope="global" />
div_hour_value:<cms:show div_hour_value /><br>
Value: <cms:if div_hour_value eq '0'><cms:else /><cms:number_format "<cms:div minutes '60' />" decimal_precision='0' /> hr</cms:if> <cms:if mod_min_value eq '0'><cms:else /><cms:mod minutes '60' /> m</cms:if>
<?php COUCH::invoke( ); ?>