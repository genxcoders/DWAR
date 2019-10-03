<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Siding" clonable='1' routable='1' parent='_sid_' order='1' dynamic_folders='1' folder_masterpage='coal-area.php' >
<!-- Siding: Custom Routes -->
	<cms:route name='list_sid' path='' />
	<cms:route name='create_sid' path='create' />
    <cms:route name='edit_sid' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_sid' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
    <!-- Siding: Custom Routes -->
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

			<!-- Siding -->
			<cms:match_route debug='0' />
			<cms:embed "siding/<cms:show k_matched_route />.html" />
			<!-- Siding -->

		</div>
		<div class="row">
			<cms:pages folder=k_folder_name >
				<div class="col-md-3">
					<cms:show k_count />. <cms:show k_page_title /> (<cms:show k_page_foldertitle />)
				</div>
			</cms:pages>
		</div>
		<div class="gxcpl-ptop-50"></div>
	</div>
	<!-- Content Here -->
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>