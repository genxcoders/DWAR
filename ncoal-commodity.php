<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Non-Coal Commodity" clonable='1' routable='1' parent='_ncoal_' order='2' >
<!-- Commodity: Custom Routes -->
	<cms:route name='list_ncomm' path='' />
	<cms:route name='create_ncomm' path='create' />
    <cms:route name='edit_ncomm' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_ncomm' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Commodity: Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<div class="gxcpl-ptop-30"></div>

			<!-- Section Divider -->
			<div class="gxcpl-ptop-10"></div>
			<!-- <div class="gxcpl-divider-dark"></div> -->
			<div class="gxcpl-ptop-10"></div>
			<!-- Section Divider -->

			<!-- Commodity -->
			<cms:match_route debug='0' />
			<cms:embed "ncommodity/<cms:show k_matched_route />.html" />
			<!-- Commodity -->

		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>