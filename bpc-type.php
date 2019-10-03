<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="BPC Type" clonable='1' routable='1' parent='_bpcty_' order='1' >
<!-- BPC Type: Custom Routes -->
	<cms:route name='list_bpcty' path='' />
	<cms:route name='create_bpcty' path='create' />
    <cms:route name='edit_bpcty' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_bpcty' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
<!-- BPC Type: Custom Routes -->
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

			<!-- BPC Type -->
			<cms:match_route debug='0' />
			<cms:embed "bpc-type/<cms:show k_matched_route />.html" />
			<!-- BPC Type -->
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>