<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Role" clonable='1' routable='1' parent="_role_" order='3' >
	<!-- Role: Custom Routes -->
	<cms:route name='list_role' path='' />
	<cms:route name='create_role' path='create' />
    <cms:route name='edit_role' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_role' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Role: Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<!-- Role -->
			<cms:match_route debug='0' />
			<cms:embed "role/<cms:show k_matched_route />.html" />
			<!-- Role -->
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>