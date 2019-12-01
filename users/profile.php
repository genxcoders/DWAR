<?php require_once( '../couch/cms.php' ); ?>
<cms:template title='User Profile' hidden='1' parent='_users_' />
    <cms:embed 'header.html' />
    <!-- this is secured page. login first to access it -->

    <div class="container">
        <div class="row">
            <!-- Section Title -->
            <div class="col-md-12">
                <h4 class="gxcpl-no-margin">
                    EDIT USER PROFILE
                    <div class="gxcpl-ptop-10"></div>
                    <div class="gxcpl-divider-dark"></div>
                    <div class="gxcpl-ptop-20"></div>
                </h4>
            </div>
            <!-- Section Title -->
            <!-- someone who manages to reach here is certainly a logged-in user -->

            <!-- are there any success messages to show from previous save? -->
            <cms:set success_msg="<cms:get_flash 'success_msg' />" />
            <cms:if success_msg >
                <div class="col-md-12">
                    <div class="alert alert-success gxcpl-shadow-1">
                        <strong>Success!</strong> Profile has been updated successfully.
                    </div>
                <div class="gxcpl-ptop-20"></div>
                </div>
            </cms:if>

            <!-- show the edit form -->

            <!-- this is regular databound-form -->
            <cms:if k_logged_in>
                <cms:pages masterpage=k_user_template >
                    <cms:set my_user_id = "<cms:show k_user_id />" scope='global' />
                    
                </cms:pages>
            </cms:if> 
            <cms:form 
            masterpage=k_user_template 
            mode='edit'
            page_id="<cms:show my_user_id />"
            enctype="multipart/form-data"
            method='post'
            anchor='0'
            >

                <cms:if k_success >
                    <cms:db_persist_form />
                    <cms:if k_success >
                        <cms:set_flash name='success_msg' value='1' />
                        <cms:redirect k_page_link /> 
                    </cms:if>
                </cms:if>  

                <cms:if k_error >
                   <font color='red'>
                        <cms:each k_error >
                            <cms:show item /><br />
                        </cms:each>
                    </font>
                </cms:if>
                
                <div class="col-md-12">
                    <div class="gxcpl-card">
                        <div class="gxcpl-card-body gxcpl-padding-15">
                            <div class="row">
                                <!-- First Name -->
                                <div class="col-md-6">
                                    <label>First Name*</label>
                                    <cms:input class="gxcpl-no-drop gxcpl-input-text gxcpl-padding gxcpl-disabled" type="bound" name="ipt_fname" readonly="1" />
                                    <div class="gxcpl-ptop-10"></div>
                                </div>
                                <!-- First Name -->
                                <!-- Last Name -->
                                <div class="col-md-6">
                                    <label>Last Name*</label>
                                    <cms:input class="gxcpl-no-drop gxcpl-input-text gxcpl-padding gxcpl-disabled" type="bound" name="ipt_lname" readonly="1" />
                                    <div class="gxcpl-ptop-10"></div>
                                </div>
                                <!-- Last Name -->

                                <!-- Email -->
                                <div class="col-md-3">
                                    <label>Email*</label>
                                    <cms:input class="gxcpl-no-drop gxcpl-input-text gxcpl-padding gxcpl-disabled" name='extended_user_email' type='bound' readonly="readonly" />
                                    <div class="gxcpl-ptop-10"></div>
                                </div>
                                <!-- Email -->
                                <!-- Designation -->
                                <div class="col-md-3">
                                    <label>Designation*</label>
                                    <cms:input class="gxcpl-no-drop gxcpl-input-text gxcpl-padding gxcpl-disabled" name='ipt_desig' type='bound' readonly="readonly" />
                                    <div class="gxcpl-ptop-10"></div>
                                </div>
                                <!-- Designation -->

                                <!-- Role -->
                                <div class="col-md-3">
                                    <label>Role*</label>
                                    <cms:hide>
                                        <cms:input name="ipt_role" type="bound" class="gxcpl-disabled" />
                                        <cms:set is_role="<cms:pages masterpage=k_user_template><cms:related_pages 'ipt_role'><cms:show k_page_id /></cms:related_pages></cms:pages>" scope="global" />
                                    </cms:hide>

                                    <input type="text" class="gxcpl-input-text gxcpl-padding gxcpl-disabled" name="f_ipt_role" value="<cms:pages masterpage=k_user_template limit='1'><cms:related_pages 'ipt_role'><cms:show k_page_title /></cms:related_pages></cms:pages>" readonly="readonly" />

                                    <div class="gxcpl-ptop-10"></div>
                                </div>
                                <!-- Role -->

                                <!-- Mobile No -->
                                <div class="col-md-3">
                                    <label>Mobile No*</label>
                                    <cms:input class="gxcpl-no-drop gxcpl-input-text gxcpl-padding gxcpl-disabled" type="bound" name="ipt_mobile_number" readonly="1" />
                                    <div class="gxcpl-ptop-10"></div>
                                </div>
                                <!-- Mobile No -->
                                <div class="gxcpl-ptop-20"></div>
                                <div class="gxcpl-fc-light-red text-center">
                                    <!-- Message for editing password -->
                                    <small><strong>Enter values in <em>Password</em> and <em>Repeat Password</em> fields only is you want to change the password.</strong></small>
                                    <!-- Message for editing password -->
                                </div>
                                <div class="gxcpl-ptop-20"></div>
                                <!-- Password -->
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <cms:input class="gxcpl-input-text" name='extended_user_password' type='bound' />
                                    <div class="gxcpl-ptop-10"></div>
                                </div>
                                <!-- Password -->

                                <!-- Repeat Password -->
                                <div class="col-md-6">
                                    <label>Repeat Password</label>
                                    <cms:input class="gxcpl-input-text" name='extended_user_password_repeat' type='bound' />
                                    <div class="gxcpl-ptop-10"></div>
                                </div>
                                <!-- Repeat Password -->
                            </div>
                        </div>
                        <!-- Footer -->
                        <div class="gxcpl-card-footer gxcpl-no-padding">         
                            <button type="submit" class="btn btn-danger btn-sm gxcpl-fw-700">
                                <i class="fa fa-save fa-lg"></i> SAVE
                            </button>
                        </div>
                        <!-- Footer -->
                    </div>
                </div>
            </cms:form>
        </div>
    </div>
    <div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>