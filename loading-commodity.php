<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Loading Commodity" clonable='1' routable='1' parent='_lpt_' order='2' >
	<!-- Custom Routes -->
	<cms:route name='list_lptcmdt' path='' />
	<cms:route name='create_lptcmdt' path='create' />
    <cms:route name='edit_lptcmdt' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_lptcmdt' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<!-- Loading Commodity -->
			<cms:match_route debug='0' />
			<cms:embed "loading-commodity/<cms:show k_matched_route />.html" />
			<!-- Loading Commodity -->

		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>