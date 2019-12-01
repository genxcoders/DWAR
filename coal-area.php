<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Coal Area' clonable='1' routable='1' parent='_lpt_' order='3' >
	<!-- Custom Routes -->
	<cms:route name='list_carea' path='' />
	<cms:route name='create_carea' path='create' />
    <cms:route name='edit_carea' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_carea' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
	<!-- Custom Routes -->
</cms:template>
<cms:embed 'header.html' />
	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<!-- crud -->
			<cms:match_route debug='0' />
			<cms:embed "coal-area/<cms:show k_matched_route />.html" />
			<!-- crud -->
		</div>
	</div>
	<!-- Content Here -->
<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>