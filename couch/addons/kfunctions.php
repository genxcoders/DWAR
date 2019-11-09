<?php
if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

//require_once( K_COUCH_DIR.'addons/cart/cart.php' );
require_once( K_COUCH_DIR.'addons/inline/inline.php' );
require_once( K_COUCH_DIR.'addons/extended/extended-folders.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-comments.php' );
//require_once( K_COUCH_DIR.'addons/extended/extended-users.php' );
//require_once( K_COUCH_DIR.'addons/routes/routes.php' );
//require_once( K_COUCH_DIR.'addons/jcropthumb/jcropthumb.php' );

// Extended Users
require_once( K_COUCH_DIR.'addons/csv/csv.php' );
require_once( K_COUCH_DIR.'addons/extended/extended-users.php' );
require_once( K_COUCH_DIR.'addons/cart/session.php' );
require_once( K_COUCH_DIR.'addons/data-bound-form/data-bound-form.php' );
//Extended Users
require_once( K_COUCH_DIR.'addons/html5-input-types/html5-input-types.php' );
require_once( K_COUCH_DIR.'addons/routes/routes.php' );
require_once( K_COUCH_DIR.'addons/access-control/access-control.php' );

$FUNCS->add_event_listener( 'alter_tag_date_execute', array('CustomTags', 'date_from_custom') );


class CustomTags{
    
    function date_from_custom( $tag_name, $params, $node, &$val ){
        
            global $CTX, $FUNCS, $PAGE;
            if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}

            extract( $FUNCS->get_named_vars(
                        array(
                              'date'=>'',
                              'format'=>'F d, Y',
                              'from_custom'=>'',
                              'return'=>'',
                              'gmt'=>'0',
                              'locale'=>'',
                              'charset'=>'' /*charset to be converted to utf8 */
                              ),
                        $params)
                   );

            if( trim($date)=='' ){
                $date = $FUNCS->get_current_desktop_time();
            }elseif( $from_custom ){
                    $date = DateTime::createFromFormat( $from_custom, $date ); 
                    if( $date === false ) die("ERROR: Tag \"".$node->name."\": format of date in parameter 'from_custom' doesn't match the source date format."); 
                    $date = $date->format('Y-m-d H:i:s');
            }
            
            $gmt = ( $gmt==1 ) ? 1 : 0;
            $locale = trim( $locale );
            $charset = trim( $charset );
            $return = trim( $return );

         
            if( $return && (($timestamp = strtotime( $return )) !== false) ){
                      $date = date( 'Y-m-d H:i:s', strtotime( $date . ' ' . $return ) );
            }elseif( $return ){
                      die("ERROR: Tag \"".$node->name."\": parameter \"return\" contains invalid value \"" . $return . "\"."); 
            } 
         
            //TODO: localization
            $ts = ( $gmt ) ? @strtotime($date) - (K_GMT_OFFSET * 60 * 60) :  @strtotime($date);

            if( strpos($format, "%")===FALSE ){
                $val =  @date( $format, $ts );
            }
            else{// use strftime
                if( $locale ){
                    $orig_locale = setlocale(LC_ALL, "0");
                    @setlocale(LC_ALL, $locale);
                }

                $val = @strftime( $format, $ts );

                if( $locale ){
                    @setlocale(LC_ALL, $orig_locale);
                }
                if( $charset ){
                    if( function_exists('iconv') ){
                        $val = @iconv( $charset, 'UTF-8', $val );
                    }
                }

            }        
        
        return 1; // prevent the original tag from executing as we have set the output above

    }

}


// Grouping in sidebar
if( defined('K_ADMIN') ){
    $FUNCS->add_event_listener( 'register_admin_menuitems', 'my_register_admin_menuitems' );

    function my_register_admin_menuitems(){
        global $FUNCS;
        
        $FUNCS->register_admin_menuitem( array('name'=>'_ptic_', 'title'=>'Pointwise Interchange', 'is_header'=>'1', 'weight'=>'1')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_coal_', 'title'=>'Coal', 'is_header'=>'1', 'weight'=>'2')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_mdpt_', 'title'=>'Mid Night Position', 'is_header'=>'1', 'weight'=>'3')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_users_', 'title'=>'Login Users', 'is_header'=>'1', 'weight'=>'4')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_itc_', 'title'=>'Interchange', 'is_header'=>'1', 'weight'=>'5')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_comm_', 'title'=>'Commodity', 'is_header'=>'1', 'weight'=>'6')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_typ_', 'title'=>'Type', 'is_header'=>'1', 'weight'=>'7')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_lctn_', 'title'=>'Location', 'is_header'=>'1', 'weight'=>'8')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_role_', 'title'=>'Role', 'is_header'=>'1', 'weight'=>'9')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_lpt_', 'title'=>'Loading Point', 'is_header'=>'1', 'weight'=>'10')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_stk_', 'title'=>'Stock', 'is_header'=>'1', 'weight'=>'11')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_ctyp_', 'title'=>'Coal Type', 'is_header'=>'1', 'weight'=>'12')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_rfr_', 'title'=>'Reason For Rejection', 'is_header'=>'1', 'weight'=>'13')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_bpcty_', 'title'=>'BPC Type', 'is_header'=>'1', 'weight'=>'14')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_sid_', 'title'=>'Siding', 'is_header'=>'1', 'weight'=>'15')  );

        $FUNCS->register_admin_menuitem( array('name'=>'_ncoal_', 'title'=>'Non Coal', 'is_header'=>'1', 'weight'=>'16') );
        
        $FUNCS->register_admin_menuitem( array('name'=>'_blck_', 'title'=>'Block II', 'is_header'=>'1', 'weight'=>'17') );

        $FUNCS->register_admin_menuitem( array('name'=>'_test_', 'title'=>'Testing Templates (Delete Later)', 'is_header'=>'1', 'weight'=>'18') );        
    }
}
// Grouping in sidebar

// CSV Exporter
// Tag <cms:format_csv />
// formats enclosed contents to make them RFC 4180 valid for a csv file
$FUNCS->register_tag( 'format_csv', 'my_format_csv_handler' );
function my_format_csv_handler( $params, $node ){
    $enclosure = '"';
    $delimiter = ',';

    $content = '';
    if( count($node->children) ){ // if used as a tag-pair, get the enclosed contents ..
        foreach( $node->children as $child ){
            $content .= $child->get_HTML();
        }
    }
    else{ // the first parameter is the content
        $content = $params[0]['rhs'];
    }

    // format contents
    if(
        strchr($content, $delimiter) !== false ||
        strchr($content, $enclosure) !== false ||
        strchr($content, "\n") !== false ||
        strchr($content, "\r") !== false ){

        $content = str_replace( $enclosure, $enclosure.$enclosure, $content ); // escape double-quotes within contents
        $content = $enclosure . $content . $enclosure; // enclose contents in double-quotes
    }

    return $content;
}
// CSV Exporter

// Write to File
// Tag <cms:write />(CSV Exporter)
// writes the enclosed contents into file
$FUNCS->register_tag( 'write', 'my_write_handler' );
function my_write_handler( $params, $node ){
    global $FUNCS;

    extract( $FUNCS->get_named_vars(
                array(
                      'file'=>'',       /* file name if provided needs to be relative to the site directory */
                      'truncate'=>'0',  /* will begin afresh */
                      'add_newline'=>'0',   /* appends newline character to the content */
                    ),
                $params)
           );

    // sanitize params
    $file = trim( $file );
    if( !$file ){
        $file = 'my_log.txt';
    }
    $file = K_SITE_DIR . $file;
    $truncate = ( $truncate==1 ) ? 1 : 0;
    $add_newline = ( $add_newline==1 ) ? 1 : 0;

    $content='';
    foreach( $node->children as $child ){
        $content .= $child->get_HTML();
    }
    if( $add_newline ){
        $content .= "\r\n";
    }

    $fp = @fopen( $file,'a' );
    if( $fp ){
        @flock( $fp, LOCK_EX );
        if( $truncate ){
            ftruncate( $fp, 0 );
            rewind( $fp );
        }
        @fwrite( $fp, $content );
        @flock( $fp, LOCK_UN );
        @fclose( $fp );
    }

    return;
}
// Write to File

// Add Multiple Numbers
    $FUNCS->add_event_listener( 'alter_tag_add_execute', array('CustomTags_add', 'add_unlimited') );
    class CustomTags_add{

       function add_unlimited( $tag_name, $params, $node, &$res ){
          if( count($params)<2 ) die( "ERROR: Tag \"".$node->name."\": requires two or more parameters" );
          $arr = array();
          for( $i = 0, $size = count($params); $i < $size; $i++ ){
             
             $arr[] = $params[$i]['rhs'];
          }
          $res = array_sum( $arr );
          return 1;
       }
          
    }  
// Add Multiple Numbers

// decimal precision for minutes
// Make number_format actually format and not round.
$FUNCS->add_event_listener( 'alter_tag_number_format_execute', 'precise_format');
function precise_format( $tag_name, $params, $node, &$html ){
    global $FUNCS;

    if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}

    extract( $FUNCS->get_named_vars(
                array(
                      'number'=>'',
                      'decimal_precision'=>'2', /* default 2 digit after decimal point */
                      'decimal_character'=>'.', /* char used to denote decimal */
                      'thousands_separator'=>','
                      ),
                $params)
           );
    $number = trim( $number );
    $decimal_precision = trim( $decimal_precision );
    if( !is_numeric($decimal_precision) ) $decimal_precision = 2;
    $decimal_character = trim( $decimal_character );

    // perform trimming
    $number = floor( (float)$number ).substr( $number - floor($number), 1, $decimal_precision + 1);
    // perform formatting
    $html = number_format( (float)$number, $decimal_precision, $decimal_character, $thousands_separator );

    return 1;
}