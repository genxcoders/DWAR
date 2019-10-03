<?php require_once( 'couch/cms.php' ); ?>

  <cms:template title='CSV Users' access_level='10' executable='1' order='2050'>



    <cms:editable name='csv_file' label='CSV File' desc='Upload file here. No spaces in filename!' type='file' order='10' />
    
    <cms:editable name='delay' label='Pause' desc='X seconds delay between loads' type='text' validator='non_negative_integer | non_zero_integer' order='20' >5</cms:editable>
    
    <cms:editable name='limit' label='Limit' desc='XX rows per load' type='text' validator='non_negative_integer | non_zero_integer'  order='30' >10</cms:editable>
    
    

  </cms:template>

<cms:no_cache />

  <cms:hide>

    <cms:ignore>LIST OF TEMPLATES</cms:ignore>
    <cms:capture into='templates'>
      -Select template-=- |
      <cms:templates>
		<cms:if k_template_is_clonable >
        <cms:show k_template_title />=
        <cms:show k_template_name /> |
		</cms:if>
      </cms:templates>

    </cms:capture>

    <cms:if "<cms:get_flash name='success_msg' />">
      <cms:set success='Pages successfully deleted!' scope='global' />
    </cms:if>


    <cms:if "<cms:get_flash name='success_msg_time' />">
      <cms:set success_msg_time="<cms:get_flash name='success_msg_time' />" scope='global' />
    </cms:if>




  </cms:hide>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      <cms:show k_template_title />
    </title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<cms:show k_site_link />assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<cms:show k_site_link />assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<cms:show k_site_link />assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="<cms:show k_site_link />assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="<cms:show k_site_link />assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

  </head>

  <body data-spy="scroll" data-target=".sidebar-fixed" class="navbar-bottom sidebar-opposite-visible">

    <div class="page-header page-header-inverse">

      <!-- Main navbar -->
      <cms:if "<cms:exists 'main_navbar.html' />">
        <cms:embed 'main_navbar.html' /></cms:if>
      <!-- /main navbar -->


    </div>


    <!-- Page container -->
    <div class="page-container">

      <!-- Page content -->
      <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

          <div class="row">
            <div class="col-md-12">
              <cms:form name='delete' method='post'>

                <cms:if k_success>
                  
                  
                  <cms:if "<cms:not_empty frm_template />" && frm_template ne '-' >
                    
                  <cms:php>ini_set( 'max_execution_time', 12000 );</cms:php>
                    
                  <cms:pages masterpage=frm_template skip_custom_fields='1' >
                    <cms:db_delete masterpage=k_template_name page_id=k_page_id />
                  </cms:pages>

                  <cms:php>ini_set( 'max_execution_time', 120 );</cms:php>
                  
                  <cms:set_flash name='success_msg' value='1' />
                  <cms-:redirect k_page_link />
                  <cms:else />
                    <p>Please select template first!</p>
                  </cms:if>
                </cms:if>

                <div class="col-md-4">
                  <cms:input type='dropdown' name='template' opt_values=templates tabindex="1" />
                </div>

                <div class="col-md-3">
                  <button type="submit" name="submit" tabindex="2" class="btn bg-teal-400 btn-labeled btn-labeled-right">
                    <b><i class="icon-circle-right2"></i></b>Delete All Pages</button>
                  <br>
                  <cms:if success>
                    <cms:show success />
                  </cms:if>
                  <cms:if success_msg_time>
                    <cms:show success_msg_time />
                  </cms:if>
                </div>

              </cms:form>
            </div>
          </div>
          
          
          
          
          <br>
          
          
          
          
          <div class="row">
            <div class="col-md-12">

              <cms:embed 'csv/importer.html' />

            </div>
          </div>


        </div>
        <!-- /main content -->

      </div>
      <!-- /page content -->

    </div>
    <!-- /page container -->


    <!-- Footer -->

   
    <!-- /footer -->

  </body>

  </html>


  <?php COUCH::invoke(); ?>