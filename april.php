<?php require_once( 'couch/cms.php' ); ?>
Last Year Range:<br>
April to September => <cms:date 'first day of april last year' format='Y-m-d' /> to <cms:date '-365 days' format='Y-m-d' />
<br>
<br>
This Year Range:<br>
April to September => <cms:date 'first day of april this year' format='Y-m-d' /> to <cms:date format='Y-m-d' />
<br>
<br>
Days Calculation (Last Year):<br>
<cms:set apr_ly = "<cms:date 'first day of april last year' format='Y-m-d' />" />
<cms:set cur_mtn_ly = "<cms:date '-365 days' format='Y-m-d' />" />
<cms:php>
	global $CTX;
	$from_date_ly = new DateTime(date($CTX->get('apr_ly')));
	$to_date_ly = new DateTime(date($CTX->get('cur_mtn_ly')));
	$dayz_ly = $to_date_ly->diff($from_date_ly)->days;
	$CTX->set( 'dayz_ly', $dayz_ly, 'global' );
</cms:php>
<cms:show dayz_ly />
<br>
<br>
Days Calculation (This Year):<br>
<cms:set apr_cy = "<cms:date 'first day of april this year' format='Y-m-d' />" />
<cms:set cur_mtn_cy = "<cms:date format='Y-m-d' />" />
<cms:php>
	global $CTX;
	$from_date_cy = new DateTime(date($CTX->get('apr_cy')));
	$to_date_cy = new DateTime(date($CTX->get('cur_mtn_cy')));
	$dayz_cy = $to_date_cy->diff($from_date_cy)->days;
	$CTX->set( 'dayz_cy', $dayz_cy, 'global' );
</cms:php>
<cms:show dayz_cy />
<br>
<br>
<cms:php>
	$now = strtotime("<cms:show apr_cy />");
	$your_date = strtotime("<cms:show cur_mtn_cy />");
	$datediff = $your_date - $now;

	echo round($datediff / (60 * 60 * 24));
</cms:php>


	<cms:ignore>
		<!-- April::<cms:date 'first day of april' format='Y-m-d' />
		Today::<cms:date return='yesterday' format='Y-m-d' /><br><br> -->
		<!-- <cms:set cur_date="<cms:date format='Y-m-d'/>" 'global'/> 
		<cms:show cur_date />::<cms:reverse_related_pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date return='first day of april last year' format='Y-m-d' /> | tdate < <cms:date return='last year' format='Y-m-d' />"><cms:show tdate /></cms:reverse_related_pages>
		APR18::<cms:date return='first day of april last year' format='Y-m-d' /> -->
	</cms:ignore>
<?php COUCH::invoke( ); ?>