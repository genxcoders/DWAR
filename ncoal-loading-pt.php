<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Non Coal Loading" clonable='1' routable='1' parent='_ncoal_' order='4' >
	<cms:editable name='commodity' type='relation' masterpage='ncoal-commodity.php' has='one' />
<!-- Loading Points: Custom Routes -->
	<cms:route name='list_nld' path='' />
	<cms:route name='create_nld' path='create' />
    <cms:route name='edit_nld' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_nld' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Loading Points: Custom Routes -->
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

			<!-- Loading Points -->
			<cms:match_route debug='0' />
			<cms:embed "nloading-pt/<cms:show k_matched_route />.html" />
			<!-- Loading Points -->

		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>