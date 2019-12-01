<?php require_once( '../couch/cms.php' ); ?>
<cms:set all_total_month = "0" scope="global" />
<cms:pages masterpage='loading-pt.php'>	
	<cms:set my_folder_name="<cms:show k_page_foldertitle />" "global" />
	<cms:pages 'loading_point' masterpage='coal.php' custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 23:59:59" />" >
		<cms:if my_folder_name eq ''>
			IF::<cms:set all_total_month = "<cms:add all_total_month hlf_ful />" "global" /><br>
		</cms:if>
	</cms:pages>
	<cms:show all_total_month />	
</cms:pages>


<cms:ignore>
<cms:set all_total_month = "0" scope="global" />
<cms:pages masterpage='loading-pt.php'>
<cms:if k_page_foldertitle eq ''>
	<strong><cms:set mytitle="<cms:show k_page_title />" "global" /><cms:show mytitle /></strong>
	
	<cms:reverse_related_pages masterpage='coal.php' custom_field="tdate >= <cms:date "first day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 00:00:00" /> | tdate <= <cms:date "last day of march +<cms:show k_count /> months " return="-1 year" format="Y-m-d 23:59:59" />">
		<cms:set all_total_month = "<cms:add all_total_month hlf_ful />" scope="global" />
	</cms:reverse_related_pages>
</cms:if>
<em><cms:show all_total_month /></em><br>
</cms:pages>
</cms:ignore>
<?php COUCH::invoke( ); ?>