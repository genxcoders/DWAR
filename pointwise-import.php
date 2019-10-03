<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Pointwise Interchange Import' order="3" parent='_ptic_' executable="0" >
    <cms:editable name='csv' required='0' allowed_ext='csv' max_size='2000000' type='securefile' label='CSV' has_header='0' />
</cms:template>
<cms:embed 'header.html' />
<cms:embed 'searchicp.html' />
<div class="gxcpl-ptop-50"></div>
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
    <cms:set mystart="<cms:gpc 'import' method='get' />" />
    <cms:if mystart >
        <cms:csv_reader
            file=securefile_fullpath
            limit='0'
            paginate='1'
            has_header='0'
            prefix='_'
        >
        <div class="col-md-2 gxcpl-card text-center" style="width: 80%; height: auto !important; margin-left: 11%;">
            <div class="gxcpl-ptop-5"></div>
                Total file imported: <strong><cms:show k_total_records /></strong>.<br>
            <div class="gxcpl-ptop-5"></div>
        </div>
        <cms:set my_template_name = "pointwise-interchange.php" />
        <cms:set my_page_title="<cms:pages masterpage='interchange.php' id="<cms:gpc 'interchange' />" limit='1'><cms:show k_page_title /></cms:pages>_<cms:show to_ho />_<cms:show _col_1 />_<cms:date _col_5 format='H:i' />" />
        <cms:php>
            global $CTX, $FUNCS;
            $name = $FUNCS->get_clean_url( "<cms:show my_page_title />" );
            $CTX->set( 'my_page_name', $name ); 
        </cms:php>
        <cms:set my_page_id='' 'global' />
        <cms:pages masterpage='pointwise-interchange.php' page_name=my_page_name limit='1' show_future_entries='1'>
            <cms:set my_page_id=k_page_id  'global' />
            <cms:set my_icp=frm_interchange scope='global' />
        </cms:pages>
            <cms:capture into='lcn'>  
                <cms:pages masterpage='location.php' page_title=_col_13 limit='1' >
                    <cms:show k_page_id />
                </cms:pages>
            </cms:capture >
            <cms:capture into='comdt'>  
                <cms:pages masterpage='commodity.php' page_title=_col_12 limit='1' >
                    <cms:show k_page_id />
                </cms:pages>
            </cms:capture >
            <cms:capture into='rk_ty'>  
                <cms:pages masterpage='type.php' page_title=_col_9 limit='1' >
                    <cms:show k_page_id />
                </cms:pages>
            </cms:capture >
            <cms:capture into='my_inter'>
                <cms:pages masterpage='interchange.php' id="<cms:gpc 'interchange' />" limit='1'><cms:show k_page_title /></cms:pages>
            </cms:capture>
            <cms:if my_page_id=''>
                <cms:db_persist
                    _auto_title                     = '0'
                    _invalidate_cache               = '0'
                    _masterpage                     = 'pointwise-interchange.php'
                    _mode                           = 'create'

                    k_page_title                    = "<cms:pages masterpage='interchange.php' id="<cms:gpc 'interchange' />" limit='1'><cms:show k_page_title /></cms:pages>_<cms:show to_ho />_<cms:show _col_1 />_<cms:date arrival_time format='Y-m-d' />"
                    k_page_name                     = "<cms:show k_page_title />"

                    interchange                     = "<cms:pages masterpage='interchange.php' id="<cms:gpc 'interchange' />" limit='1'><cms:show k_page_title /></cms:pages>"
                    to_ho                           = "<cms:gpc 'my_toho' />"
                    tr_name                         = "<cms:show _col_1 />"
                    loco                            = "<cms:show _col_2 />"
                    schedule_date                   = "<cms:date schedule_date format='Y-m-d' />"
                    schedule                        = "<cms:show _col_4 />"
                    arrival_time                    = "<cms:date arrival_time format='H:i' />"
                    departure_time                  = "<cms:date departure_time format='H:i' />"
                    signon_date                     = "<cms:date signon_date format='Y-m-d' />"
                    signon_time                     = "<cms:date signon_time format='1970-01-01 H:i:00' />"
                    raketype                        = "<cms:show rk_ty />"
                    load                            = "<cms:show _col_10 />"
                    load_unit                       = "<cms:show _col_11 />"
                    commodity                       = "<cms:show comdt />"
                    location                        = "<cms:show lcn />"
                    stn_to                          = "<cms:show _col_14 />"
                    stn_from                        = "<cms:show _col_15 />"
                    arrival_date                    = "<cms:date arrival_date format='Y-m-d' />"
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
            masterpage="pointwise-import.php"
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
                        <label for="csv_input" >Attach CSV file</label>::inter==<cms:show my_icp />::to_ho==<cms:show my_toho />
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