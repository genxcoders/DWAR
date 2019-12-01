<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Interchange" clonable='1' routable='1' parent='_itc_' order='1' >
<!-- interchange: Custom Routes -->
	<cms:route name='list_itc' path='' />
	<cms:route name='create_itc' path='create' />
    <cms:route name='edit_itc' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_itc' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- interchange: Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<cms:match_route debug='0' />
			<cms:embed "interchange/<cms:show k_matched_route />.html" />
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>