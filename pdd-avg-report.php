<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="PDD Avg Report" parent='_ptic_' order="7" />
<cms:no_cache />
<cms:embed 'header.html' />
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="gxcpl-no-margin">
                    PRE-DEPARTURE DETENTION REPORT
                    <div class="gxcpl-ptop-10"></div>
                    <div class="gxcpl-divider-dark"></div>
                    <div class="gxcpl-ptop-10"></div>
                </h4>
            </div>
            <cms:embed 'searchavgpdd.html' />
            <cms:php>
                global $CTX;
                $ad = '<cms:show my_start_on />';   
                $dd = '<cms:show my_stop_on />';    
                $today = new DateTime(date($ad));
                $pday = new DateTime(date($dd));
                $dayz = $pday->diff($today)->days;
                $CTX->set( 'dayz', $dayz, 'global' );
            </cms:php>
            <cms:set dayz_total = "<cms:add dayz '1' />" scope="global" />
            <cms:if my_search_str eq '' >

            <cms:else />
            <div class="col-md-12">
                <div class="gxcpl-card">
                    <div class="gxcpl-card-header">
                        <div class="row">
                            <div class="col-md-8 col-xs-12 col-sm-12">
                                <h5 class="gxcpl-no-margin">
                                    <strong>
                                        PDD AVERAGE REPORT- <cms:show my_interchange /> FROM <cms:date my_start_on format="d-m-Y" /> TO <cms:date my_stop_on format="d-m-Y" />
                                    </strong>
                                </h5>
                                 <div class="gxcpl-ptop-5"></div>
                            </div>
                            <div class="col-md-4 col-xs-12 text-center" id="buttons"></div>
                        </div>
                    </div>
                    <div class="gxcpl-card-body tableFixHead gxcpl-padding-15" style="overflow-x: auto;">
                        <table class="display table table-bordered gxcpl-table-hover" id="example1" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">No. of trains</th>
                                    <th class="text-center">Average PDD</th>
                                </tr>
                            </thead>
                            <tbody>

                                <cms:set avg_pdd_total1="0" />
                                <cms:repeat "<cms:show dayz />" startcount="0" >
                                <tr>
                                    <cms:set total_pdd='0' scope='global' />
                                    <td class="text-center">
                                        <cms:date "<cms:date my_start_on format='Y-m-d' /> +<cms:show k_count /> days" format='d/m/Y' />
                                    </td>
                                    <td class="text-center">
                                        <cms:set pdd_rows = "<cms:pages masterpage='pointwise-interchange.php' count_only='1' custom_field="interchange=<cms:show my_interchange /> | is_interchanged='1' | to_ho=0 | arrival_date='<cms:date "<cms:date my_start_on format='Y-m-d' /> +<cms:show k_count /> days" format="Y-m-d" />'" />" scope="global" />
                                        <cms:show pdd_rows />
                                    </td>
                                    <td class="text-center">
                                        <cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:show my_interchange /> | to_ho=0 | arrival_date=<cms:date "<cms:date my_start_on format='Y-m-d' /> +<cms:show k_count /> days" format='Y-m-d' />" order='asc' orderby="arrival_time" >
                                            <cms:embed 'pdd.html' />
                                        </cms:pages>
                                        <cms:set avg_pdd_decimal="<cms:div total_pdd pdd_rows />" scope="global" /><cms:set avg_pdd_decimal_val="<cms:number_format avg_pdd_decimal decimal_precision='2' />" scope="global" />
                                        <cms:set avg_pdd_total1="<cms:add avg_pdd_total1 avg_pdd_decimal_val />" scope="global" />
                                        <cms:show avg_pdd_decimal_val />
                                    </td>
                                </tr>
                                </cms:repeat>   
                                <tr>
                                    <cms:set total_pdd='0' scope='global' />
                                    <td class="text-center">
                                        <cms:date "<cms:date my_start_on format='Y-m-d' /> +<cms:show dayz /> days" format='d/m/Y' />
                                    </td>
                                    <td class="text-center">
                                        <cms:set pdd_rows_to_date = "<cms:pages masterpage='pointwise-interchange.php' count_only='1' custom_field="interchange=<cms:show my_interchange /> | to_ho=0 | is_interchanged='1' | arrival_date='<cms:date "<cms:date my_stop_on format='Y-m-d' />" format="Y-m-d" />'" />" scope="global" />
                                        <cms:show pdd_rows_to_date />
                                    </td>
                                    <td class="text-center">
                                        <cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=<cms:show my_interchange /> | to_ho=0 | arrival_date=<cms:date "<cms:date my_start_on format='Y-m-d' /> +<cms:show dayz /> days" format='Y-m-d' />" >
                                            <cms:embed 'pdd.html' />
                                        </cms:pages>

                                        <cms:set avg_pdd = "<cms:div total_pdd pdd_rows_to_date />" scope="global" />
                                        <cms:set no_rep_avg_pdd = "<cms:number_format avg_pdd decimal_precision='2' />" scope="global" />
                                        <cms:show no_rep_avg_pdd />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right"><strong>Total Avg. PDD: </strong></td>
                                    <td style="display: none;"></td>
                                    <td class="text-center">
                                        <cms:set avg_pdd_sum="<cms:add avg_pdd_total1 no_rep_avg_pdd />" scope="global" /><cms:set total_avg_pdd="<cms:div avg_pdd_sum dayz_total />" scope="global" />
                                        <strong><cms:number_format total_avg_pdd decimal_precision="2" /></strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="gxcpl-ptop-30"></div>
            </div>
            </cms:if>
        </div>
    </div>
	<div class="gxcpl-ptop-50"></div>

<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>