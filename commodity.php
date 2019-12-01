<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Commodity" clonable='1' routable='1' parent='_comm_' order='1' >
<!-- Commodity: Custom Routes -->
	<cms:route name='list_comm' path='' />
	<cms:route name='create_comm' path='create' />
    <cms:route name='edit_comm' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_comm' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Commodity: Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<!-- Commodity -->
			<cms:match_route debug='0' />
			<cms:embed "commodity/<cms:show k_matched_route />.html" />
			<!-- Commodity -->
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>