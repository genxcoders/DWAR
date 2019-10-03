<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Daily Target" clonable='1' routable='1' parent='_coal_' order='5' >
    <cms:editable name="dt_date" type="datetime" label="Daily Target Month and Year" allow_time='0' default_time="@current" format="Y-m-d" order="1" required='1' />
    <cms:ignore>
   <!--  <cms:editable name="mnsg" label="MNSG" type="text" order="2" />
    <cms:editable name="mjsg" label="MJSG" type="text" order="3" />
    <cms:editable name="cgm" label="CGM" type="text" order="4" />
    <cms:editable name="wani" label="Wani" type="text" order="5" />
    <cms:editable name="gsg" label="GSG" type="text" order="6" />
    <cms:editable name="ggs" label="GGS" type="text" order="7" />
    <cms:editable name="hlsg" label="HLSG" type="text" order="8" />
    <cms:editable name="ryxg" label="RYXG" type="text" order="9" />
    <cms:editable name="mbcb" label="MBCB" type="text" order="10" />
    <cms:editable name="umsg" label="UMSG" type="text" order="11" />
    <cms:editable name="rksg" label="RKSG" type="text" order="12" />
    <cms:editable name="dcsg" label="DCSG" type="text" order="13" />
    <cms:editable name="csid" label="CSID" type="text" order="14" />
    <cms:editable name="hrg" label="HRG" type="text" order="15" />
    <cms:editable name="hnwg" label="HNWG" type="text" order="16" /> -->
    </cms:ignore>
    <cms:repeatable name="daily_target_repeatable" label="Rejection" class="col-md-12" order="10" >
        <cms:editable name="daily_target" label="Daily Target" type="text" col_width="200" input_width="75" order="2" />
        <cms:ignore>
        <cms:editable type='relation' name='daily_target_ldingpt' label="Loading Point" masterpage='loading-pt.php' has="one" required="1" order="3" />
        </cms:ignore>
        <cms:editable name="daily_target_ldingpt" label="Daily Target Loading Point" type="dropdown" col_width="200" input_width="75" opt_values="Select =- | <cms:pages masterpage='loading-pt.php' order='asc' ><cms:show k_page_title /><cms:if '<cms:not k_paginate_bottom />' >|</cms:if></cms:pages>" order="3" />
        
    </cms:repeatable>
    <!-- daily target: Custom Routes -->
    <cms:route name='list_dtrgt' path='' />
    <cms:route name='create_dtrgt' path='create' />
    <cms:route name='edit_dtrgt' path='{:id}/edit' >
        <cms:route_validators id='non_zero_integer' />
    </cms:route>
    <cms:route name='delete_dtrgt' path='{:id}/delete' >
        <cms:route_validators id='non_zero_integer' />
    </cms:route>
    <!-- daily target: Custom Routes -->
</cms:template>
    <cms:embed 'header.html' />
        <div class="container">
            <div class="row">
                <div class="gxcpl-ptop-30"></div>
                <!-- Section Divider -->
                <div class="gxcpl-ptop-10"></div>
                <!-- <div class="gxcpl-divider-dark"></div> -->
                <div class="gxcpl-ptop-10"></div>
                <!-- Section Divider -->

                <!-- Daily Target -->
                <cms:match_route debug='0' />
                <cms:embed "daily-target/<cms:show k_matched_route />.html" />
                <!-- Daily Target -->
            </div>
            <div class="gxcpl-ptop-50"></div>
        </div>
        <div class="gxcpl-ptop-50"></div>
    <cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>