<?php require_once( 'couch/cms.php' ); ?>
Month:<strong><cms:repeat '12' startcount='0' >
	   <br/><cms:date "last day of april +<cms:show k_count /> months" format='M' />
	</cms:repeat>
</strong><br><br>
Current date: <cms:date format='Y-m-d H:i:s' /><br/><br/>
Current -365 days: <cms:date '-365 days' format='Y-m-d' /><br/><br/>
Current +1 day: <cms:date '+1 day' /><br/><br/>
Current +1 week: <cms:date '+1 week' /><br/><br/>
Current +1 month: <cms:date '+1 month' /><br/><br/>
Current +1 day 4 hours 2 seconds: <cms:date '+1 day 4 hours 2 seconds' /><br/><br/>
Current +1 week 2 days 4 hours 2 seconds with another format: <cms:date '+1 week 2 days 4 hours 2 seconds' format='Y-m-d H:i:s' /><br/><br/>
First day of current week: <cms:date 'Monday this week' /><br/><br/>
Last day of previous week: <cms:date 'Sunday last week' /><br/><br/>
Next Thursday: <cms:date 'next Thursday' /><br/><br/>
Last Monday: <cms:date 'last Monday' /><br/><br/>
<strong>First day of next month: <cms:date 'first day of this month' /><br/><br/></strong>
First day of next month: <cms:date 'first day of next month' format='l' /><br/><br/>
Last day of march 2009: <cms:date '2009-03 last day of this month' format='l, j/n/Y' /><br/><br/>
<strong>First day of April: <cms:date 'last day of march' format='Y-m-d' /><br/><br/></strong>
Christmas Day next year: <cms:date '25 december next year' format='l, j/n/Y' /><br/><br/>
Yesterday 14:00: <cms:date 'yesterday 14:00' format='j F, Y H:i'/><br/><br/>
Tomorrow: <cms:date 'tomorrow' format='Y-m-d' /><br/><br/>
Tomorrow noon: <cms:date 'tomorrow noon' format='j F, Y H:i' /><br/><br/>
A minute before midnight: <cms:date 'midnight -1 minute' format='H:i' /><br/><br/>
All days of my birthday:
<cms:repeat '5' startcount='0' >
   <br/><cms:date "2016-11-19 +<cms:show k_count /> month" format='l, j/n/Y' />
</cms:repeat><br><br>
Last year: <cms:date last year format='Y-m-d' /><br><br>
Current Year Days <cms:date "count days in this year" /><br>
<strong>Day Before Yesterday date :: <cms:date return='yesterday -1 days' format="Y-m-d" /></strong><br><br>
<strong>Last Year Day Before Yesterday date :: <cms:date return='-367 days' format="Y-m-d" /></strong><br><br>
<strong><cms:date return='last day of last month' format='d' /></strong>
<?php COUCH::invoke(); ?>