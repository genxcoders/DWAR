<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Section" clonable='1' routable='1' parent='_blck_' order='3' >
<!-- Custom Routes -->
	<cms:route name='list_sec' path='' />
	<cms:route name='create_sec' path='create' />
    <cms:route name='edit_sec' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_sec' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
<!-- Custom Routes -->
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

			<cms:match_route debug='0' />
			<cms:embed "section/<cms:show k_matched_route />.html" />
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>