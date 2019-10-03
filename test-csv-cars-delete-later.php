<?php require_once( 'couch/cms.php' ); ?>
    <cms:template title='Import' ></cms:template>

    <cms:set mystart="<cms:gpc 'import' method='get' />" />
    
    <cms:if mystart >
        <cms:csv_reader 
            file="<cms:show k_admin_path />addons/csv/cars.csv" 
            paginate='1'
            limit='100'
            prefix='_'
            use_cache='0'
        >
            <cms:if k_paginated_top >
            
                <cms:if k_paginate_link_next >
                    <script language="JavaScript" type="text/javascript">
                        var myVar;
                        myVar = window.setTimeout( 'location.href="<cms:show k_paginate_link_next />";', 1000 );
                    </script>
                    <button onclick="clearTimeout(myVar);">Stop</button>
                <cms:else />
                    Done!    
                </cms:if>
                
                <h3><cms:show k_current_page /> / <cms:show k_total_pages /> pages (Total <cms:show k_total_records /> records. Showing <cms:show k_paginate_limit /> records per page)</hr>
                
                
                <table border='0'>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <cms:csv_headers>
                                <th><cms:show value /></th>
                            </cms:csv_headers>    
                        </tr>
                    </thead>
                    <tbody>
            </cms:if>
            
            <tr>
                <td><cms:show k_current_record /></td>
                <cms:csv_columns>
                    <td><cms:show value /></td>
                </cms:csv_columns>    
                
                <!-- database operation here -->
                
                    <cms:db_persist
                        _auto_title       = '0'
                        _invalidate_cache = '0'
                        _masterpage       = 'cars-delete-later.php'
                        _mode             = 'create'

                        k_page_title      = "<cms:show _car_make/> <cms:show _car_model/>"
                        k_page_name       = "<cms:random_name />"

                        car_make          = _car_make
                        car_model         = _car_model
                        car_type          = _car_type
                        car_origin        = _car_origin
                        car_drivetrain    = _car_drivetrain
                        car_msrp          = _car_msrp
                        car_invoice       = _car_invoice
                        car_engine_size   = _car_engine_size
                        car_cylinders     = _car_cylinders
                        car_horsepower    = _car_horsepower
                        car_mpg_city      = _car_mpg_city
                        car_mpg_highway   = _car_mpg_highway
                        car_weight        = _car_weight
                        car_wheelbase     = _car_wheelbase
                        car_length        = _car_length
                    >
                        <cms:if k_error>
                            <strong style="color:red;">ERROR:</strong> <cms:show k_error/>
                        </cms:if>
                    </cms:db_persist>
                
                <!-- end database operation -->
                
            </tr>
                
            <cms:if k_paginated_bottom >    
                        <tr>
                            <td></td>
                            <td colspan='<cms:show k_csv_header_count />'>
                                <cms:paginator simple='1' />
                            </td>
                        </tr>
                    </tbody>
                </table>   
            </cms:if>
            
        </cms:csv_reader>    
    <cms:else/>
        <button onclick='location.href="<cms:add_querystring k_page_link 'import=1' />"'>Start!</button>
    </cms:if>


<?php COUCH::invoke(); ?>