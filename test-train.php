<?php require_once( 'couch/cms.php' ); ?>
<!-- http://webnetkit.com/php-count-days-in-current-year/ -->
<cms:php >
	function cal_days_in_year($year){
	$days=0; 
	for($month=1;$month<=12;$month++){ 
	    $days = $days + cal_days_in_month(CAL_GREGORIAN,$month,$year);
	 }
	return $days;
	}
</cms:php>
<cms:set number_days = "<cms:php >echo cal_days_in_year(<cms:date format="Y" />);</cms:php>" "global" />
<cms:show number_days />
<?php COUCH::invoke(); ?>

	
