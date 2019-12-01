<?php require_once( '../couch/cms.php' ); ?>
<cms:template clonable='1' title='Users' hidden='1' parent='_users_' order="1">       
	<cms:editable name="ipt_fname" label="First Name" type="text" order="1" required='1' />
	<cms:editable name="ipt_lname" label="Last Name" type="text" order="2" required='1' />
	<cms:editable name="ipt_desig" label="Designation" type="text" order="3" required='1' />
	<cms:editable name="ipt_mobile_number" label="Mobile Number" type="text" order="4" validator='exact_len=10 | non_negative_integer' required='1' />
	<cms:editable name="ipt_role" label="Employee Role" type="relation" has="one" masterpage="role.php" order="5" />

	<cms:config_list_view>
	    <cms:field 'k_selector_checkbox' />
	    <cms:field 'k_page_title' />
	    <cms:field 'k_comments_count' />
	    <cms:field 'ipt_role' header='Role' />
	    <cms:field 'k_page_date' />
	    <cms:field 'k_actions' />
	</cms:config_list_view> 

</cms:template>
<?php COUCH::invoke(); ?>