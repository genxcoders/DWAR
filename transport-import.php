<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Import Transport' order="5" parent='_coal_' executable="0" >
    <cms:editable name='csv' required='0' allowed_ext='csv' max_size='2000000' type='securefile' label='CSV' has_header='0' />
</cms:template>
<cms:embed 'header.html' />
<div class="gxcpl-ptop-20"></div>
    <cms:show_securefile 'csv' >
        <cms:query sql=
            "SELECT sf.file_disk_name AS `name`, sf.file_extension AS `extension`
            FROM <cms:php>echo K_TBL_ATTACHMENTS;</cms:php> sf
            WHERE sf.attach_id = <cms:show file_id />"
        >
            <cms:set securefile_handle = "<cms:concat name '.' extension />" scope='global' />
            <cms:set securefile_fullpath = "<cms:php>global $Config; echo $Config['UserFilesAbsolutePath'].'attachments'.'/';</cms:php><cms:concat name '.' extension />" scope='global' />
        </cms:query>
    </cms:show_securefile>
    
    <cms:show k_current_page /> / <cms:show k_total_pages /> pages (Total <cms:show k_total_records /> records. Showing <cms:show k_paginate_limit /> records per page)</hr>
    <cms:set mystart="<cms:gpc 'import' method='get' />" />
    <cms:if mystart >
        <cms:csv_reader
            file=securefile_fullpath
            use_cache='1'
            limit=''
            paginate='1'
            has_header='0'
            prefix='_'
        >
            <!-- Aashish Test for large CSV -->
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
            <!-- Aashish Test for large CSV -->
        <div class="col-md-2 gxcpl-card text-center" style="width: 80%; height: auto !important; margin-left: 11%;">
            <div class="gxcpl-ptop-5"></div>
                Total file imported: <strong><cms:show k_total_records /></strong>.<br>
            <div class="gxcpl-ptop-5"></div>
        </div>
        <cms:set my_template_name = "transport.php" />
        <cms:set my_page_title="<cms:show my_siding /> <cms:date _col_1 format='Y-m-d' />" />
        <cms:php>
            global $CTX, $FUNCS;
            $name = $FUNCS->get_clean_url( "<cms:show my_page_title />" );
            $CTX->set( 'my_page_name', $name ); 
        </cms:php>
        <cms:set my_page_id='' 'global' />
        <cms:pages masterpage='transport.php' page_name=my_page_name limit='1' show_future_entries='1'>
            <cms:set my_page_id=k_page_id  'global' />
        </cms:pages>
        <cms:capture into='my_siding'>
            <cms:pages masterpage='siding.php' page_title=_col_2 limit='1' >
                <cms:show k_page_id />
            </cms:pages>
        </cms:capture>
        <cms:if my_page_id=''>
            <cms:db_persist
                _auto_title         = '0'
                _invalidate_cache   = '0'
                _masterpage         = 'transport.php'
                _mode               = 'create'

                k_page_title        = "<cms:show my_siding /> <cms:show my_transdate />"
                k_page_name         = "<cms:show k_page_title />"

                transdate           = "<cms:set my_transdate = '<cms:date _col_1 format='Y-m-d' />' scope='global' /> <cms:show my_transdate />"
                siding              = "<cms:show my_siding />"
                tons                = _col_3   
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
        </cms:csv_reader> 
    <cms:else />
        <cms:form 
            masterpage="transport-import.php"
            mode='edit'
            page_id=k_page_id
            enctype="multipart/form-data"
            method='post'
            anchor='0'
            id='csv_file_form'
        >
            <cms:if k_success >        

                <cms:db_persist_form />

                <cms:if k_success >

                    <cms:pages show_future_entries='1' >
                        <cms:show_securefile 'csv' >
                            <cms:set uploaded_csv = file_id scope='global' />
                        </cms:show_securefile>
                    </cms:pages>

                    <cms:if uploaded_csv >
                        <cms:redirect url="<cms:link k_site_link />?import=1" /> 
                    <cms:else />
                        <cms:redirect url="<cms:link k_site_link />" /> 
                    </cms:if>

                </cms:if>

            </cms:if>

            <cms:if k_error >
                <div class="col-md-3">
                    <div class="alert alert-danger">
                        <cms:each k_error >
                            <cms:show item /><br>
                        </cms:each>
                    </div>
                </div>  
            </cms:if>
            <div class="col-md-5">
                <div class="gxcpl-card text-center" style="position: fixed; top: 100px; left: 0;">
                    <div class="gxcpl-ptop-20"></div>
                    <div class="gxcpl-card-body">
                        <cms:hide>
                            <cms:input name='csv' type="bound" />
                        </cms:hide>
                        <label for="csv_input" >Attach CSV file</label>
                        <div class="gxcpl-ptop-5"></div>
                        <input name='f_csv' id="csv_input" style="/*display:none;*/ position: relative; left: 42%; " type="file" class="file-styled text-center" />
                        <div class="gxcpl-ptop-20"></div>
                        <button class="btn btn-warning btn-md gxcpl-fc-21 gxcpl-fw-700" type="submit" form="csv_file_form" >
                            Upload <i class="fa fa-upload" aria-hidden="true"></i>
                        </button>

                         <div class="gxcpl-ptop-20"></div>
                    </div>
                </div>
            </div>
        </cms:form>
        <div class="gxcpl-ptop-50"></div>
    </cms:if>
<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>