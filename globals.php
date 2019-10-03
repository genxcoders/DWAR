<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Global Site Settings" executable="0" order="1" >

<!-- Site Logo & Copyright -->
	<cms:editable name="ss" label="Site Settings" type="group" order="1" />
		<cms:editable name="ss_logo" label="Site Logo" type="image" show_preview="1" preview_width="100" group="ss" order="1" />
		<cms:editable name="ss_stitle" label="Site Small Title" type="text" group="ss" order="2" />
		<cms:editable name="ss_ltitle" label="Site Large Title" type="text" group="ss" order="3" />
		<cms:editable name="copyright" label="Copyright" type="text" group="ss" order="4" />
		<cms:editable name='ss_favicon' label='Favicon' desc='png image only' allowed_ext='png' type='image' show_preview='1' preview_width='16' group='ss' order='5' />
		<cms:editable name='login_bckimg' label='Background Image in Login Page' type="image" show_preview="1" preview_width="100" group="ss" order="6"  />
<!-- Site Logo & Copyright -->

<!-- Page Title -->
	<cms:editable name="dwar" label="Page Title - Group" type="group" order="2" />
		<cms:editable name="dwar_dashboard" label="Dashboard - Page Title" type="text" group="dwar" order="1" />
		<cms:editable name="dwar_commodity" label="Commodity - Page Title" type="text" group="dwar" order="2" />
		<cms:editable name="dwar_lding_pt" label="Loading Point - Page Title" type="text" group="dwar" order="3" />
		<cms:editable name="dwar_stock" label="Stock - Page Title" type="text" group="dwar" order="4" />
		<cms:editable name="dwar_reason_rejection" label="Reason For Rejection - Page Title" type="text" group="dwar" order="5" />
		<cms:editable name="dwar_type" label="Type - Page Title" type="text" group="dwar" order="6" />
		<cms:editable name="dwar_bpc_type" label="BPC Type - Page Title" type="text" group="dwar" order="7" />
		<cms:editable name="dwar_ptinterchange" label="Pointwise Interchange - Page Title" type="text" group="dwar" order="8" />
		<cms:editable name="dwar_ptinterchange_report" label="Pointwise Interchange Report - Page Title" type="text" group="dwar" order="9" />
		<cms:editable name="dwar_coal" label="Coal - Page Title" type="text" group="dwar" order="10" />
		<cms:editable name="dwar_coal_report" label="Coal Report - Page Title" type="text" group="dwar" order="11" />
		<cms:editable name="dwar_transport_report" label="Transport Report - Page Title" type="text" group="dwar" order="12" />
		<cms:editable name="dwar_settings" label="Settings - Page Title" type="text" group="dwar" order="13" />
		<cms:editable name="dwar_interchange" label="Interchange - Page Title" type="text" group="dwar" order="14" />
		<cms:editable name="dwar_location" label="Location - Page Title" type="text" group="dwar" order="15" />
		<cms:editable name="dwar_coal_type" label="Coal Type - Page Title" type="text" group="dwar" order="16" />
		<cms:editable name="dwar_siding" label="Siding - Page Title" type="text" group="dwar" order="17" />
		<cms:editable name="dwar_daily_target" label="Daily Target - Page Title" type="text" group="dwar" order="18" />
		<cms:editable name="dwar_non_coal" label="Non Coal - Page Title" type="text" group="dwar" order="19" />
		<cms:editable name="dwar_ncoal_loading_pt" label="Non Coal Loading Point - Page Title" type="text" group="dwar" order="20" />
		<cms:editable name="dwar_ncoal_commodity" label="Non Coal Commodity - Page Title" type="text" group="dwar" order="21" />
		<cms:editable name="dwar_ncoal_stock" label="Non Coal Stock - Page Title" type="text" group="dwar" order="22" />
		<cms:editable name="dwar_ncoal_report" label="Non Coal Report - Page Title" type="text" group="dwar" order="23" />
		<cms:editable name="dwar_stable_train" label="Stable Train - Page Title" type="text" group="dwar" order="24" />
		<cms:editable name="dwar_coal_pdf_report" label="Coal PDF Report - Page Title" type="text" group="dwar" order="25" />
		<cms:editable name="dwar_transportation_pdf_report" label="Transportation PDF Report - Page Title" type="text" group="dwar" order="26" />
<!-- Page Title -->
</cms:template>


<?php COUCH::invoke( ); ?>