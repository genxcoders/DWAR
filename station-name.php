<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Station Name" clonable='1' routable='1' parent='_blck_' order='9' >
	<cms:editable name="section_stname" type="relation" masterpage="section.php" has='one' />
<!-- Custom Routes -->
	<cms:route name='list_stname' path='' />
	<cms:route name='create_stname' path='create' />
    <cms:route name='edit_stname' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_stname' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
<!-- Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<cms:match_route debug='0' />
			<cms:embed "station-name/<cms:show k_matched_route />.html" />
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>