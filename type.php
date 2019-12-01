<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Type" clonable='1' routable='1' parent='_typ_' order='1' >
<!-- Type: Custom Routes -->
	<cms:route name='list_typ' path='' />
	<cms:route name='create_typ' path='create' />
    <cms:route name='edit_typ' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_typ' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Type: Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<!-- Type -->
			<cms:match_route debug='0' />
			<cms:embed "type/<cms:show k_matched_route />.html" />
			<!-- Type -->
		</div>
	</div>
	<!-- Content Here -->
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>