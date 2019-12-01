<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Reason For Rejection" clonable='1' routable='1' parent='_rfr_' order='1' >
<!-- Reason For Rejection: Custom Routes -->
	<cms:route name='list_rfr' path='' />
	<cms:route name='create_rfr' path='create' />
    <cms:route name='edit_rfr' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_rfr' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Reason For Rejection: Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<!-- Reason For Rejection -->
			<cms:match_route debug='0' />
			<cms:embed "reason-rejection/<cms:show k_matched_route />.html" />
			<!-- Reason For Rejection -->
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>