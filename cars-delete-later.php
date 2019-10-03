<?php require_once( 'couch/cms.php' ); ?>

<cms:template clonable='1' title='Cars'>
    <cms:editable label='Make' name='car_make' type='text'/>
    <cms:editable label='Model' name='car_model' type='text'/>
    <cms:editable label='Type' name='car_type' type='text'/>
    <cms:editable label='Origin' name='car_origin' type='text'/>
    <cms:editable label='Drivetrain' name='car_drivetrain' type='text'/>
    <cms:editable label='MSRP' name='car_msrp' type='text'/>
    <cms:editable label='Invoice' name='car_invoice' type='text'/>
    <cms:editable label='Engine Size' name='car_engine_size' type='text'/>
    <cms:editable label='Cylinders' name='car_cylinders' type='text'/>
    <cms:editable label='Horsepower' name='car_horsepower' type='text'/>
    <cms:editable label='MPG City' name='car_mpg_city' type='text'/>
    <cms:editable label='MPG Highway' name='car_mpg_highway' type='text'/>
    <cms:editable label='Weight' name='car_weight' type='text'/>
    <cms:editable label='Wheelbase' name='car_wheelbase' type='text'/>
    <cms:editable label='Length' name='car_length' type='text'/>
</cms:template>

<cms:if k_is_page>
    <cms:show k_page_title/>
<cms:else/>
    <cms:show k_template_title/>
</cms:if>

<?php COUCH::invoke(); ?>
