<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="TEST TRAIN" clonable='1' order='1' >
	<cms:editable name="tr_name" label="Train Name" type="text" required="1" order="1" />
	<cms:editable name="loco" label="Loco" type="text" required="1" order="2" />
	<cms:editable name='is_interchanged' label='Interchange Status' type='checkbox' opt_values='YES=1' order='3' /> 
</cms:template>
	<cms:set submit_success="<cms:get_flash 'submit_success' />" />
    <cms:if submit_success >
        <h4>Success: Your application has been submitted.</h4>
    </cms:if>

    <cms:form
        masterpage=k_template_name
        mode='create'
        enctype='multipart/form-data'
        method='post'
        anchor='0'
    >

        <cms:if k_success >

            <cms:db_persist_form
                _invalidate_cache='0'
                _auto_title='1'
            />
            <cms:if k_success >
            <cms:set_flash name='submit_success' value='1' />
            <cms:redirect k_page_link />
        	</cms:if>
        </cms:if>

        <cms:if k_error >
            <div class="error">
                <cms:each k_error >
                    <br><cms:show item />
                </cms:each>
            </div>
        </cms:if>
        <div class="col-md-1">
			<label>Train *</label>
			<div class="gxcpl-ptop-5"></div>
			<cms:input class="gxcpl-input-text text-uppercase" name="tr_name" type="bound" />
			<div class="gxcpl-ptop-10"></div>
		</div>
		<div class="col-md-2">
			<label>Loco *</label>
			<div class="gxcpl-ptop-5"></div>
			<cms:input class="gxcpl-input-text" name="loco" type="bound" />
			<div class="gxcpl-ptop-10"></div>
		</div>	
		<div class="col-md-2">
			<label>Already Interchange</label>
			<div class="gxcpl-ptop-5"></div>
			<cms:input type="bound" name="is_interchanged" />
			<div class="gxcpl-ptop-10"></div>
		</div>
		<div class="gxcpl-card-footer">
			<button class="btn btn-danger btn-sm gxcpl-fw-500">
				<i class="fa fa-save"></i> SAVE
			</button>
		</div>
    </cms:form>
    <cms:set to_live_count='0' scope='global' />
	<cms:set to_death_count='0' scope='global' />
	<cms:set to_locoacc_count='0' scope='global' />	
	<cms:set to_traffic_count='0' scope='global' />
	<cms:set ho_live_count='0' scope='global' />
	<cms:set ho_death_count='0' scope='global' />
	<cms:set ho_locoacc_count='0' scope='global' />	
	<cms:set ho_traffic_count='0' scope='global' />

    <cms:set to_ta_count= '0' scope='global' />
    <cms:set to_ta_loco_count= '0' scope='global' />
    <cms:set to_la_count= '0' scope='global' />
    <cms:set to_la_loco_count= '0' scope='global' />
    <cms:set ho_ta_count= '0' scope='global' />
    <cms:set ho_ta_loco_count= '0' scope='global' />
    <cms:set ho_la_count= '0' scope='global' />
    <cms:set ho_la_loco_count= '0' scope='global' />
	<cms:search_form />

	<cms:search limit='10' >
	    <cms:if k_paginated_top >
	        <div>
	            <cms:if k_paginator_required >
	                Page <cms:show k_current_page /> of <cms:show k_total_pages /><br>
	            </cms:if>
	            <cms:show k_total_records /> Pages Found -
	            displaying: <cms:show k_record_from />-<cms:show k_record_to />
	        </div>
	    </cms:if>

	    <h3><a href="<cms:show k_page_link />"><cms:show k_search_title /></a></h3>
	    <cms:show k_search_excerpt />
	    <hr>

	    <cms:paginator />

	</cms:search>
    <table border="1">
    	<thead>
    		<tr>
    			<th>
    				Sr No
    			</th>
    			<th>
    				Train
    			</th>
    			<th>
    				Loco
    			</th>
    		</tr>
    	</thead>
    	<tbody>
    		<cms:pages masterpage=k_template_name show_future_entries='1'>
    		<tr>
    			<td>
    				<cms:show k_absolute_count />
    			</td>
    			<td>
					<cms:ignore>
    				<!-- <cms:php>
						$string = '<cms:show item />';
						global $new_string;
						$new_string = preg_replace("/[^A-Za-z?!\s]/","", $string);
					</cms:php>
					<cms:set char_alpha="<cms:php>global $new_string; echo $new_string;</cms:php>" scope='global' />
					<cms:if k_count eq '0'>
						<cms:if (char_alpha eq 'TA') || (char_alpha eq 'ta') || ((char_alpha eq 'LA') || (char_alpha eq 'la')) >
		    				<cms:if is_interchanged eq '1' >
		    					<cms:incr to_tr_name_count '1' />
		    					<cms:show item />
		    				</cms:if>
		    			</cms:if>
		    		<cms:else_if k_count eq '1'/>	
			    		<cms:if (char_alpha eq 'TA') || (char_alpha eq 'ta') || ((char_alpha eq 'LA') || (char_alpha eq 'la')) >
			    			<cms:if is_interchanged eq '1' >
		    					<cms:incr to_tr_name_count '1' />
		    					<cms:show item />
		    				</cms:if>
			    		</cms:if>
	    			</cms:if> -->
					<!-- <cms:each loco sep='+'>
						<cms:if (tr_name eq 'TA') || (tr_name eq 'ta') || (tr_name eq 'Ta') || (tr_name eq 'tA') >
							<cms:if is_interchanged eq '1'>
								<cms:incr ta_loco_count '1' />
							</cms:if>
							<cms:else_if (tr_name eq 'LA') || (tr_name eq 'la') || (tr_name eq 'La') || (tr_name eq 'lA') />
							<cms:if is_interchanged eq '1'>
								<cms:incr la_loco_count '1' />
							</cms:if>
						</cms:if>
						<cms:show item />
					</cms:each> -->
					</cms:ignore>

			    	<cms:if (tr_name eq 'TA') || (tr_name eq 'ta') || (tr_name eq 'Ta') || (tr_name eq 'tA') >
			    		<cms:if is_interchanged eq '1'>
			    			<cms:incr to_ta_count '1' />
			    		</cms:if>
			    		<cms:show tr_name />
			    	<cms:else_if (tr_name eq 'LA') || (tr_name eq 'la') || (tr_name eq 'La') || (tr_name eq 'lA') />
			    		<cms:if is_interchanged eq '1'>
			    			<cms:incr to_la_count '1' />
			    		</cms:if>
			    		<cms:show tr_name />
	    			<cms:else_if tr_name />
	    				<cms:show tr_name />
	    			<cms:else />
						- NA -
					</cms:if>
    			</td>
    			<td class="text-uppercase">
					<cms:if loco >
						<cms:each loco sep='+'>
							<cms:php>
								$string = '<cms:show item />';
								global $new_string;
								$new_string = preg_replace("/[^A-Za-z?!\s]/","", $string);
							</cms:php>
							<cms:set char_alpha="<cms:php>global $new_string; echo $new_string;</cms:php>" scope='global' />
							<cms:if k_count eq '0'>
								<cms:if (char_alpha eq 'D') || (char_alpha eq 'd') || ((char_alpha eq '(D)') || (char_alpha eq '(d)')) >
									<cms:if is_interchanged eq '1'>
										<cms:incr death_count '1' />
									</cms:if>
									<cms:show item />
								<cms:else_if (tr_name eq 'TA') || (tr_name eq 'ta') || (tr_name eq 'Ta') || (tr_name eq 'tA') />
									<cms:if is_interchanged eq '1'>
										<cms:incr to_ta_loco_count '1' />
									</cms:if>
									<cms:show item />
								<cms:else_if (tr_name eq 'LA') || (tr_name eq 'la') || (tr_name eq 'La') || (tr_name eq 'lA') />
									<cms:if is_interchanged eq '1'>
										<cms:incr to_la_loco_count '1' />
									</cms:if>
									<cms:show item />
								<cms:else />
									<cms:if is_interchanged eq '1' >
										<cms:incr to_live_count '1' />
									</cms:if>
									<cms:show item />
								</cms:if>
							<cms:else_if k_count eq '1'/>
								<cms:if (char_alpha eq 'D') || (char_alpha eq 'd') || ((char_alpha eq '(D)') || (char_alpha eq '(d)')) >
									<cms:if is_interchanged eq '1'>
										<cms:incr death_count '1' />
									</cms:if>
									<cms:show item />
								<cms:else_if (tr_name eq 'TA') || (tr_name eq 'ta') || (tr_name eq 'Ta') || (tr_name eq 'tA') />
									<cms:if is_interchanged eq '1'>
										<cms:incr to_ta_loco_count '1' />
									</cms:if>
									<cms:show item />
								<cms:else_if (tr_name eq 'LA') || (tr_name eq 'la') || (tr_name eq 'La') || (tr_name eq 'lA') />
									<cms:if is_interchanged eq '1'>
										<cms:incr to_la_loco_count '1' />
									</cms:if>
									<cms:show item />
								<cms:else />
									<cms:if is_interchanged eq '1' >
										<cms:incr to_live_count '1' />
									</cms:if>
									<cms:show item />
								</cms:if>
							</cms:if>
						</cms:each>
					<cms:else />
							-NA-	
					</cms:if>
				</td>
    		</tr>
    		</cms:pages>
    	</tbody>
    	<tfooter>
    		<tr>
    			<td>Count</td>
    			<td>TA=<cms:show to_ta_count /></td>
    			<td>LA=<cms:show to_la_count /></td>
    		</tr>
    		<tr>
    			<td colspan="3">
    				Ta Loco Count=<cms:show to_ta_loco_count />
    			</td>
    		</tr>
    		<tr>
    			<td colspan="3">
    				La Loco Count=<cms:show to_la_loco_count />
    			</td>
    		</tr>
    		<tr>
    			<td colspan='2'>Train Name Total=
    				<cms:set tr_name_total="<cms:add to_ta_count to_la_count />" scope="global" />	
    				<cms:show tr_name_total />
    			</td>
    		</tr>
    		<tr>
    			<td colspan='2'>Live loco Total=
					<cms:show to_live_count />
    			</td>
    		</tr>
    		<tr>
    			<td colspan='2'>Deadth loco Total=
					<cms:show to_death_count />
    			</td>
    		</tr>
    	</tfooter>
    </table>
    <script type="text/javascript">
    	<cms:content_type 'application/json'/>

			[
			    <cms:pages masterpage='test-train.php'>
			        "<cms:addslashes><cms:show k_page_title/></cms:addslashes>"<cms:if "<cms:not k_paginated_bottom/>">,</cms:if>
			    </cms:pages>
			]
    </script>
<?php COUCH::invoke(); ?>

	
