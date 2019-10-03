<?php require_once( 'couch/cms.php' ); ?>
<cms:content_type 'application/json'/>
[
	<cms:pages masterpage='pointwise-interchange.php' custom_field="tr_name=<cms:gpc 's' />" >
		<cms:escape_json><cms:show tr_name /></cms:escape_json><cms:if "<cms:not k_paginated_bottom />">,</cms:if>
	</cms:pages>
]
<?php COUCH::invoke(); ?>