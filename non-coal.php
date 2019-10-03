<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Non Coal" clonable='1' routable='1' parent='_ncoal_' order='1' >
	
	<cms:editable name="n_c_date" label="Non Coal Date" type="datetime" allow_time='0' format="Y-m-d" order="0" required="1" />

	<cms:editable name="ncoal_cmdt" label="Commodity" type="relation" masterpage='ncoal-commodity.php' has="one" order="1" required="1" />

	<cms:ignore>
	<cms:editable name="ncoal_ld_pt" label="Loading Points" type="dropdown" opt_values="Select Loading Point =- | <cms:pages masterpage='ncoal-loading-pt.php' order='asc' ><cms:show k_page_title /><cms:if '<cms:not k_paginated_bottom />'>|</cms:if></cms:pages>" order="2" />
	</cms:ignore>

	<cms:editable name="ncoal_ld_pt" label="Loading Points (Relation)" type="relation" masterpage='ncoal-loading-pt.php' has="one" order="2" required="1" />
	
	<cms:editable name='ncoal_h_f' label='Non Coal Full Half' type='radio' opt_values='1 | 0.5' required="1" order="3" />

	<cms:editable name="ncoal_units" label="No of Units" type="text" order="4" required="1" validator='integer' />

	<cms:ignore>
	<cms:editable name="ncoal_stock" label="Stock" type="dropdown" opt_values="Select Stock =- | <cms:pages masterpage='ncoal-stock.php' order='asc'><cms:show k_page_title /><cms:if '<cms:not k_paginated_bottom />'>|</cms:if></cms:pages>" order="5" />
	</cms:ignore>

	<cms:editable name="ncoal_stock" label="Stock (Relation)" type="relation" masterpage='ncoal-stock.php' has="one" order="5" required="1" />

	<cms:editable name="ncoal_dest" label="Destination" type="text" order="6" validator='alpha' required="1" />


	<!-- Non-Coal Route -->
	<cms:route name='list_ncoal' path='' />
	<cms:route name='create_ncoal' path='create' />
    <cms:route name='edit_ncoal' path='{:id}/edit' >
    	<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:route name='delete_ncoal' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
	<!-- Non-Coal Route -->
</cms:template>
<cms:embed 'header.html' />
	<!-- Content Here -->
	<div class="container-fluid">
		<div class="gxcpl-ptop-50"></div>
		<div class="row">
			<cms:match_route debug='0' />
			<cms:embed "non-coal/<cms:show k_matched_route />.html" />
		</div>
		<cms:if k_matched_route=="create_ncoal">
		<div class="gxcpl-ptop-50"></div>
		<div class="row">
			<cms:embed "non-coal/list_ncoal.html" />
		</div>
		</cms:if>
	</div>
	<div class="gxcpl-ptop-50"></div>
	<!-- Content Here -->
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>