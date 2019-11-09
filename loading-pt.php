<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Loading Points" clonable='1' routable='1' parent='_lpt_' order='1' dynamic_folders='1' folder_masterpage='coal-area.php'>
	<cms:editable name="daily_target" label="Daily Target" type="text" />
	<!-- Loading Point: Custom Routes -->
	<cms:route name='list_lpt' path='' />
	<cms:route name='create_lpt' path='create' />
    <cms:route name='edit_lpt' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_lpt' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Loading Point: Custom Routes -->
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

			<!-- Loading Point -->
			<cms:match_route debug='0' />
			<cms:embed "loading-pt/<cms:show k_matched_route />.html" />
			<!-- Loading Point -->

		</div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>