<?php require_once( '../couch/cms.php' ); ?>
<cms:folders masterpage='siding.php' orderby="weight">
	<cms:pages masterpage='siding.php' folder=k_folder_name custom_field="<cms:show my_search_str />" >
		<cms:set from_date="<cms:gpc 'from_date' method='get' />" scope="global" />
		<cms:set to_date="<cms:gpc 'to_date' method='get' />" scope="global" />
		<cms:set my_tons_total = "0" scope="global" />
		<strong><cms:show k_page_title /></strong>:<br>
		<cms:reverse_related_pages 'siding' masterpage='transport.php' custom_field="transdate >= <cms:show from_date /> | transdate < <cms:show to_date />">
			asd<cms:add my_tons_total tons />
		</cms:reverse_related_pages>
	</cms:pages>
</cms:folders>

<?php COUCH::invoke( ); ?>