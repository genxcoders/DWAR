<?php require_once( '../couch/cms.php' ); ?>
    <cms:template title='Import Testing For Transportation' clonable='1' parent='_coal_' >
        <cms:editable name='csv' required='0' allowed_ext='csv' max_size='2000000' type='securefile' label='CSV' />
    </cms:template>
<cms:embed 'header.html' />
    <cms:set my_csv_file="<cms:pages limit='1'><cms:show_securefile 'csv'><cms:securefile_link file_id physical_path='1' /></cms:show_securefile></cms:pages>" scope='global' /> 
    <cms:set mystart="<cms:gpc 'import' method='get' />" />
    
    <cms:if mystart >
        

        <cms:csv_reader 
            file=my_csv_file
            paginate='1'
            limit='100'
            prefix='_'
            use_cache='1'
            has_header='0'
        >
            <cms:set my_template_name = "transport.php" />
            <cms:set my_page_title="<cms:date _col_1 format='Y-m-d' /> <cms:pages masterpage='siding.php' page_title=_col_2 limit='1' ><cms:show k_page_title /></cms:pages> <cms:if _col_3 eq ''>NA<cms:else /><cms:show _col_3 /></cms:if>" />
            <cms:php>
                global $CTX, $FUNCS;
                $name = $FUNCS->get_clean_url( "<cms:show my_page_title />" );
                $CTX->set( 'my_page_name', $name ); 
            </cms:php>
            <cms:set my_page_id='' 'global' />

            <cms:if k_paginated_top >
            
                <cms:if k_paginate_link_next >
                    <script language="JavaScript" type="text/javascript">
                        var myVar;
                        myVar = window.setTimeout( 'location.href="<cms:show k_paginate_link_next />";', 1000 );
                    </script>
                    <center>
                        <button class="btn btn-danger gxcpl-fw-700" onclick="clearTimeout(myVar);">
                            <i class="fa fa-ban" aria-hidden="true"></i> Stop Uploading CSV
                        </button>
                    </center>
                <cms:else />
                    <h4 class="text-center">Uploaded <strong><cms:show k_total_records /></strong> records.</h4>    
                </cms:if>
                
                <h3 class="text-center"><cms:show k_current_page /> / <cms:show k_total_pages /> pages (Total <cms:show k_total_records /> records. Showing <cms:show k_paginate_limit /> records per page)</hr>
                
                <div class="gxcpl-ptop-20"></div>
                <table style="margin-left: 25%; width: 50%;" border='1'>
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <cms:csv_headers>
                                <th class="text-center"><cms:show value /></th>
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

                <cms:capture into='my_siding'>
                    <cms:pages masterpage='siding.php' page_title=_col_2 limit='1' >
                        <cms:show k_page_id />
                    </cms:pages>
                </cms:capture>   
                
                <!-- database operation here -->
                <cms:if my_page_id=''>
                    <cms:db_persist
                        _auto_title       = '0'
                        _invalidate_cache = '0'
                        _masterpage       = 'transport.php'
                        _mode             = 'create'

                        k_page_title      = "<cms:date _col_1 format='Y-m-d' /> <cms:pages masterpage='siding.php' page_title=_col_2 limit='1' ><cms:show k_page_title /></cms:pages> <cms:if _col_3 eq ''>NA<cms:else /><cms:show _col_3 /></cms:if>"
                        k_page_name       = "<cms:show k_page_title />"

                        transdate         = "<cms:date _col_1 format='Y-m-d' />"
                        siding            = "<cms:show my_siding />"
                        tons              = "<cms:if _col_3 eq ''>NA<cms:else /><cms:show _col_3 /></cms:if>"
                    >
                        <cms:if k_error>
                            <strong style="color:red;">ERROR:</strong> <cms:show k_error/>
                        </cms:if>
                    </cms:db_persist>
                <cms:else />
                    Data Exists!
                </cms:if>
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
        <cms:form masterpage=k_template_name 
            mode='create'
            enctype="multipart/form-data"
            method='post'
            anchor='0'
            id='csv_file_form'
            >
            <cms:if k_success >        

                <cms:db_persist_form
                    _invalidate_cache='0'
                    _auto_title='1'
                />

                <cms:if k_success >
                    
                    <cms:pages show_future_entries='1' >
                        <cms:show_securefile 'csv' >
                            <cms:set my_csv_to_import="<cms:securefile_link file_id />" scope="global" />
                        </cms:show_securefile>
                    </cms:pages>
                    
                    <cms:if my_csv_to_import >
                        <cms:redirect "<cms:add_querystring k_template_link 'import=1' />" /> 
                    <cms:else />
                        <cms:redirect "<cms:show k_template_link />" /> 
                    </cms:if>
                    
                </cms:if>
                
            </cms:if>

            <cms:if k_error >
                <font color='red'><cms:each k_error ><cms:show item /><br /></cms:each></font>
            </cms:if>

            <cms:hide>
                <cms:input name='csv' type="bound" />
            </cms:hide>
            
            <label for="csv_input" class="text-center" >Attach CSV file</label>
            <input name='f_csv' id="csv_input" style="/*display:none;*/" type="file" class="file-styled" placeholder="" />    
            
        </cms:form>
        
        <button class="btn btn-primary" type="submit" form="csv_file_form" >Start Uploading CSV<i class="icon-arrow-right14 position-right"></i></button>
    </cms:if>
<div class="gxcpl-ptop-50"></div>
<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>