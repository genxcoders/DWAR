<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Coal Report" clonable='1' parent='__mdpt__' order="2" />
<cms:embed "header.html" />
<div class="container-fluid">
	<div class="gxcpl-ptop-50"></div>
	<h4 class="gxcpl-no-margin">
		MID NIGHT POSITION REPORT
	</h4>
	<!-- List View -->
	<div class="gxcpl-ptop-10"></div>
	<div class="gxcpl-divider-dark"></div>
	<div class="gxcpl-ptop-20"></div>
	
	<cms:embed 'searchmnp.html' />
	<cms:if mdp_date!="<cms:show my_search_str />">

	<!-- Coal Table -->
	<div class="col-md-12">	
		<!-- Body -->		
		<cms:pages masterpage='mid-position.php' show_future_entries="1" custom_field="<cms:show my_search_str />" >
			<cms:no_results>
				<cms:embed "mid-posi/create_mnp.html" />
			</cms:no_results>
				<cms:embed "mid-posi/edit_mnp.html" />

		</cms:pages>
		<!-- Body -->
		<div class="gxcpl-ptop-20"></div>
	</div>

	<!-- Coal Table -->
	<cms:else />
		<cms:embed "mid-posi/<cms:show k_matched_route />.html" />
	</cms:if>
</div>
<div class="gxcpl-ptop-50"></div>
<cms:embed "footer.html" />
<?php COUCH::invoke( ); ?>