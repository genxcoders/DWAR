<?php

	if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

	$FUNCS->add_event_listener( 'alter_tag_add_execute', array('CustomTagsAdd', 'add_unlimited') );

		class CustomTagsAdd{

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

?>