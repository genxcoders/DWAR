<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Coal Type" clonable='1' routable='1' parent='_ctyp_' order='1' >
<!-- Coal Type: Custom Routes -->
	<cms:route name='list_ctyp' path='' />
	<cms:route name='create_ctyp' path='create' />
    <cms:route name='edit_ctyp' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_ctyp' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Coal Type: Custom Routes -->
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
			<cms:embed "coal-type/<cms:show k_matched_route />.html" />
			<!-- Commodity -->

		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>