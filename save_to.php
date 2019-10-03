 <?php require_once('couch/cms.php'); ?>

<cms:content_type 'application/json'/>
<cms:if k_success >
    <cms:db_persist_form
        _invalidate_cache='0'
        _auto_title='1'
        to_ho_relation="<cms:show saved_id />"
        locos='<cms:show frm_locos />'
    />

    <cms:if k_success >
        <cms:pages masterpage=k_template_name id=k_last_insert_id >
            <cms:set check='<cms:show select_type />' scope='global' />
        </cms:pages>
            <cms:db_persist
                _auto_title             =   '1'
                _invalidate_cache       =   '0'
                _masterpage             =   'test-train.php'
                _mode                   =   'create'
                
                schedule                =   "0"
                k_page_id               =   "<cms:add '<cms:show k_last_insert_id />' '1' />"
            >

                <cms:if k_error >
                    <cms:abort>
                        <cms:each k_error >
                            <br>asd<cms:show item />
                        </cms:each>
                    </cms:abort>
                <cms:else_if k_success />
                    <cms:abort>
                        <cms:show k_last_insert_id />
                    </cms:abort>
                </cms:if>
            </cms:db_persist >
        <cms:set_flash name='submit_success' value='1' />
        <cms:redirect url="<cms:show k_page_link />" />
    </cms:if>
</cms:if>

<?php COUCH::invoke(); ?>