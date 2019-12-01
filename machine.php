<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Machine" clonable='1' routable='1' parent='_blck_' order='2' >
<!-- Custom Routes -->
	<cms:route name='list_mac' path='' />
	<cms:route name='create_mac' path='create' />
    <cms:route name='edit_mac' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_mac' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
<!-- Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<cms:match_route debug='0' />
			<cms:embed "machine/<cms:show k_matched_route />.html" />
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>