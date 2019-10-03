<?php require_once( 'couch/cms.php' ); ?>
    <cms:template title='Import' ></cms:template>
<!DOCTYPE html>
<html>
	<head>
		<title>CSV Importer Module</title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
	</head>
	<body>
	    <cms:set mystart="<cms:gpc 'import' method='get' />" />
	    
	    <cms:if mystart >
	        <cms:csv_reader 
	            file="<cms:show k_admin_path />addons/csv/takenover.csv" 
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
	                
	                <cms:capture into='lcn'>  
                <cms:pages masterpage='location.php' page_title=LOAD LOCN limit='1' >
                    <cms:show k_page_id />
                </cms:pages>
            </cms:capture >
            <cms:capture into='comdt'>  
                <cms:pages masterpage='commodity.php' page_title=CMDT limit='1' >
                    <cms:show k_page_id />
                </cms:pages>
            </cms:capture >
            <cms:capture into='rk_ty'>  
                <cms:pages masterpage='type.php' page_title=LOAD TYPE limit='1' >
                    <cms:show k_page_id />
                </cms:pages>
            </cms:capture >
            <cms:capture into='my_inter'>
                <cms:pages masterpage='interchange.php' >
                    <cms:show k_page_title />
                </cms:pages>
            </cms:capture>
            <cms:if my_page_id=''>
                <cms:db_persist
                    _auto_title                     = '0'
                    _invalidate_cache               = '0'
                    _masterpage                     = 'pointwise-interchange.php'
                    _mode                           = 'create'

                    k_page_title                    = "<cms:show my_icp />_<cms:show to_ho />_<cms:show _col_1 />_<cms:date _col_5 format='H:i' />"
                    k_page_name                     = "<cms:show k_page_title />"

                    interchange                     = "<cms:show my_inter />"
                    to_ho                           = "<cms:gpc 'my_toho' />"
                    tr_name                         = "DRTN"
                    loco                            = "LOCO NO"
                    schedule_date                   = "<cms:date SCHEDULE DATE format='Y-m-d' />"
                    schedule                        = "SCHEDULE"
                    arrival_time                    = "ARRIVAL TIME"
                    departure_time                  = "DEPARTURE TIME"
                    signon_date                     = "<cms:date SIGON DATE format='Y-m-d' />"
                    signon_time                     = "SIGON TIME"
                    raketype                        = "<cms:show rk_ty />"
                    load                            = "LOAD L/E"
                    load_unit                       = "LOAD U"
                    commodity                       = "<cms:show comdt />"
                    location                        = "<cms:show lcn />"
                    stn_to                          = "STATION TO"
                    stn_from                        = "STATION FROM"
                    arrival_date                    = "<cms:date ARRIVAL DATE format='Y-m-d' />"
                >
                    <cms:if k_error >
                        <div class="col-md-3">
                            <div class="alert alert-danger">
                                <cms:each k_error >
                                    <cms:show item /><br>
                                </cms:each>
                            </div>
                        </div>  
                    </cms:if>
                </cms:db_persist>

            <cms:else />
                Data already exists!<br />
            </cms:if>
	                
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


	    <!-- Scripts -->
	    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
		<script type="text/javascript" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
		<!-- Scripts -->
	</body>
</html>

<?php COUCH::invoke(); ?>