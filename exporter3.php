<?php require_once( 'couch/cms.php' ); ?>

    <cms:template title='CSV Exporter 3' parent="_csvexporter_"/>
    <cms:set file_name="<cms:date format='d-m-Y' />" scope='global' />

    <cms:set mystart="<cms:gpc 'import' method='get' />" />
    
    <cms:if mystart >
   
        <cms:pages 
            masterpage='stable-train.php' 
            paginate='1' 
            limit='100' 
            order='asc'
        >
        
            <cms:if k_paginated_top >
                <cms:if k_current_page='1'>
                    <!-- Header. 'truncate' starts a new file -->
                    <cms:write "<cms:show file_name/>.csv" add_newline="1" truncate="1">Sr.No.,Train,Loco,Arrival Date,Arrival Time,Location,Remark</cms:write>
                </cms:if>
            
                <cms:if k_paginate_link_next >
                    <script language="JavaScript" type="text/javascript">
                        var myVar;
                        myVar = window.setTimeout( 'location.href="<cms:show k_paginate_link_next />";', 100 );
                    </script>
                    <button onclick="clearTimeout(myVar);">Stop</button>
                <cms:else />
                    <cms:set write_footer='1' />
                    Done!                        
                </cms:if>
                
                <h3><cms:show k_current_page /> / <cms:show k_total_pages /> pages (Total <cms:show k_total_records /> records. Showing <cms:show k_paginate_limit /> records per page)</hr>
            </cms:if>
            
                <h3><cms:show k_current_record /></h3>
                
                <!-- CSV row -->
                
                <cms:write "<cms:show file_name/>.csv" add_newline="1"><cms:format_csv k_absolute_count/>,<cms:format_csv tr_name/>,<cms:format_csv loco/>,<cms:format_csv arrival_date/>,<cms:format_csv arrival_time/>,<cms:format_csv related_location/>,<cms:format_csv remark/></cms:write>

            <cms:if k_paginated_bottom >
                <hr>
                
                <!-- Footer -->
                <cms:if write_footer>
                    <!-- CSV does not require a footer so doing nothing here but for XML this could be used to output the document closing tags -->
                <cms:else />
                    <cms:paginator simple='1' />
                </cms:if>    
            </cms:if>
            
        </cms:pages>    
        
    <cms:else/>
        <button onclick='location.href="<cms:add_querystring k_page_link 'import=1' />"'>Start!</button>
    </cms:if>

<?php COUCH::invoke(); ?>