<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Non Coal Stock" clonable='1' routable='1' parent='_ncoal_' order='3' >
	<cms:editable name='commodity_stock' type='relation' masterpage='ncoal-commodity.php' has='one' />
<!-- Stock: Custom Routes -->
	<cms:route name='list_nstk' path='' />
	<cms:route name='create_nstk' path='create' />
    <cms:route name='edit_nstk' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_nstk' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Stock: Custom Routes -->
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

			<!-- Stock -->
			<cms:match_route debug='0' />
			<cms:embed "nstock/<cms:show k_matched_route />.html" />
			<!-- Stock -->
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>