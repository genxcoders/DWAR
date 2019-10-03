<?php require_once( '../couch/cms.php' ); ?>

<cms:template clonable='1' title='Import Testing - Data Display'>
    <cms:editable label='Trans Date' name='transdate' type='datetime' required='1' format='Y/m/d' fields_separator='/' />
    <cms:editable label='Trans Siding' name='siding' type='relation' masterpage='siding.php' has='one' />
    <cms:editable label='Tons' name='tons' type='text'/>
</cms:template>

<cms:if k_is_page>
    <cms:show k_page_title/>
<cms:else/>
    <cms:show k_template_title/>
</cms:if>

<?php COUCH::invoke(); ?>
