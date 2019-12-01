<?php require_once( '../couch/cms.php' ); ?>
<cms:embed 'searchavgpdd.html' />
<table width="50%" border="1" style="margin-left:25%;">
	<thead>
		<tr>
			<th>PDD AVG REPORT</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<cms:pages masterpage='pointwise-interchange.php' custom_field="to_ho=0 | interchange=NGP | arrival_date=2019-11-03" order='asc' orderby="arrival_time" >

				<cms:embed 'pdd.html' />
				<cms:if minutes eq '' || minutes eq '0' || minutes eq '-NA-' >
				-NA-
				<cms:else_if is_interchanged eq '1' />
				<cms:php>echo strtoupper('<cms:show tr_name />');</cms:php> ==> 
				<cms:if div_hour_value eq '0'><cms:else /><cms:number_format "<cms:div minutes '60' />" decimal_precision='0' /> hr</cms:if> <cms:if mod_min_value eq '0'><cms:else /><cms:mod minutes '60' /> m</cms:if>
				[<br>dep_date:<cms:show my_aq_dep_date /> <cms:show my_aq_dep_time /><br>
				signon_date:<cms:show my_signon_date /> <cms:show my_signon_time /><br>minutes:<cms:show minutes /><br>
				total_pdd:<cms:show total_pdd /><br>
				div_min:<cms:show div_min /><br>
				div_hour_value:<cms:show div_hour_value /><br>
				mod_min_value:<cms:show mod_min_value />]<br><br>
				<cms:else />
				-NA-
				</cms:if> 
				</cms:pages>
			</td>
		</tr>
	</tbody>
</table>
<?php COUCH::invoke(); ?>
