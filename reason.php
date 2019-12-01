<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Reason" clonable='1' routable='1' parent='_blck_' order='1' >
	<cms:editable name="category" label="Reason Category" type="text" order='1' />
<!-- Custom Routes -->
	<cms:route name='list_reas' path='' />
	<cms:route name='create_reas' path='create' />
    <cms:route name='edit_reas' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_reas' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
<!-- Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<cms:match_route debug='0' />
			<cms:embed "reason/<cms:show k_matched_route />.html" />
		
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>