<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Stock" clonable='1' routable='1' parent='_stk_' order='1' >
<!-- Stock: Custom Routes -->
	<cms:route name='list_stk' path='' />
	<cms:route name='create_stk' path='create' />
    <cms:route name='edit_stk' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_stk' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
<!-- Stock: Custom Routes -->
</cms:template>
<cms:embed 'header.html' />

	<!-- Content Here -->
	<div class="container">
		<div class="row">
			<!-- Stock -->
			<cms:match_route debug='0' />
			<cms:embed "stock/<cms:show k_matched_route />.html" />
			<!-- Stock -->
		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>