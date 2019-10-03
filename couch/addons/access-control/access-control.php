<?php

    if ( !defined('K_COUCH_DIR') ) die();


    class KTemplateList extends KUserDefinedField {
    
        var $fields = array();

        function __construct( $row, &$page, &$siblings )
        {
            parent::__construct( $row, $page, $siblings );
        }

        function _render( $input_name, $input_id, $extra='', $dynamic_insertion=0 )
        {
            global $FUNCS, $DB, $CTX;
            $rsT = $DB->select( K_TBL_TEMPLATES, array('*'));

            $templates = array();

            foreach ($rsT as $template) $templates[] = $template['title']."=".$template['name'];
                
            $templates[] = 'Users=users';
            $templates[] = 'Drafts=drafts';
            $templates[] = 'Comments=comments';

            $arrg = implode(" | ", $templates);
        
            $field_info = array(
                'k_type' => 'checkbox',
                'opt_values' => $arrg,
                'data' => $this->data,
            );
            
            $this->fields[] = new KField( $field_info, $this, $this->fields );

            $html = $this->fields[0]->_render( $input_name, $input_id, '', false );

            return $html;
        }

        function store_posted_changes( $post_val )
        {
            global $FUNCS;

            $separator = ( $this->k_separator ) ? $this->k_separator : '|';
            $sep = '';
            $str_val = '';
            foreach( $post_val as $v ){
                $str_val .= $sep . $v;
                $sep = $separator;
            }
            $post_val = $str_val;
            
            $this->data = $post_val;
            $this->modified = 1;
        }

        static function tag_handler( $params, $node ){
            global $CTX, $FUNCS, $TAGS, $PAGE, $AUTH;
            $attr = $FUNCS->get_named_vars(
                    array(  'name'=>'',
                ),
                $params
            );
            $name = trim( $attr['name'] );
            if( !$name ) {die("ERROR: Tag \"".$node->name."\" needs a 'name' attribute");}

            
            $params[] = array( 'lhs'=>'type', 'op'=>'=', 'rhs'=>'__templatelist' );
            $_node = clone $node;
            $_node->children = array();
            $TAGS->editable( $params, $_node );
        }
    }
    

    
        class AccessControl {
            
            var $EXTENDED_USR_DIR = null;

            function __construct()
            {
                global $FUNCS, $KUSER;

                if( file_exists(K_ADDONS_DIR.'access-control/config.php'))
                {
                    require_once( K_ADDONS_DIR.'access-control/config.php' );
                    
                    $this->EXTENDED_USR_DIR = $EXTENDED_USERS_TEMPLATE;
                    unset($EXTENDED_USERS_TEMPLATE);
                }

                if(!is_null($this->EXTENDED_USR_DIR) && !is_null($KUSER))
                {
                    $FUNCS->add_event_listener( 'add_template_params', array($this, 'add_hidden_fields'));
                    $FUNCS->add_event_listener( 'alter_admin_menuitems', array($this, 'alter_admin_menuitems'));
                    $FUNCS->add_event_listener( 'alter_admin_routes', array($this, 'alter_admin_routes'));
                }
            }
            
            function alter_admin_menuitems( &$menu_items )
            {
                foreach ($menu_items as &$menu_item) 
                {
                    $menu_item['access_callback'] = array( $this, 'check_menu' );
                }
            }

            function alter_admin_routes( &$routes ){ 

                foreach( $routes as &$route )
                {
                    foreach($route as &$rt)
                    {
                        $rt->access_callback = array( $this, 'check_route' );
                    }
                }
            }

            function add_hidden_fields( &$attr_custom, $params, $node )
            {
                global $FUNCS, $PAGE;

                if( $PAGE->tpl_name==$this->EXTENDED_USR_DIR){
                    $html="<cms:templatelist label='Permissions' name='admin_only_permissions' />";
                    $parser = new KParser( $html, $node->line_num, 0, '', $node->ID );
                    $dom = $parser->get_DOM();
    
                    foreach( $dom->children as $child_node ){
                        if( $child_node->type==K_NODE_TYPE_CODE ){
                        $node->children[] = $child_node;
                        }
                    }
                }
            }

            function willBeEmpty($parent, $permissions)
            {
                $childrens = $parent->children;

                foreach ($childrens as $children)
                {
                    if(in_array($children->name, $permissions)){
                        return false;
                    }
                }
                return true;
            }
        
            function check_route($item)
            {
                global $AUTH, $KUSER;

                if($AUTH->user->access_level >= K_ACCESS_LEVEL_SUPER_ADMIN) return true;

                $pg = $KUSER->_get_associated_page( $AUTH->user);

                $raw_perm = $pg->_fields['admin_only_permissions'];

                if(is_null($raw_perm)) return true;

                $permissions = explode("|", $raw_perm->get_data());

                if(!in_array($item->masterpage, $permissions)){
                    return false;
                }

                return true;
            }

            function check_menu($item)
            {
                global $AUTH, $KUSER;

                if($AUTH->user->access_level >= K_ACCESS_LEVEL_SUPER_ADMIN) return true;

                $pg = $KUSER->_get_associated_page( $AUTH->user);

                $raw_perm = $pg->_fields['admin_only_permissions'];

                if(is_null($raw_perm)) return true;

                $permissions = explode("|", $raw_perm->get_data());


                if($item->is_header)
                {
                    if($this->willBeEmpty($item, $permissions)) return false;
                    return true;
                }

                if(!in_array($item->name, $permissions)){
                    return false;
                }
                
                return true;
            }
        }
        $AC = new AccessControl();
    

    $FUNCS->register_tag( 'templatelist', array('KTemplateList', 'tag_handler') );
    $FUNCS->register_udf( '__templatelist', 'KTemplateList' );