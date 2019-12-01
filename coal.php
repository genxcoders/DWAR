<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Coal" clonable='1' routable='1' parent='_coal_' order='1' >
	<cms:config_list_view  searchable='1' />
	<!-- Editable -->
	<cms:editable name='dt_ldpt' type='row'>
		<cms:editable name="tdate" label="Loading Date" type="datetime" allow_time='0' required="1" class="col-md-6" format="Y-m-d" order="1" />
		<cms:editable type='relation' name='loading_point' label="Loading Point" masterpage='loading-pt.php' has="one" class="col-md-6" required="1" order="2" />
		<cms:ignore>
		<cms:editable name="loading_point" label="Loading Point" type="dropdown" opt_values="Select =- | <cms:pages masterpage='loading-pt.php' order='asc' ><cms:show k_page_title /><cms:if '<cms:not k_paginated_bottom />' >|</cms:if></cms:pages>" required="1" class="col-md-6" order="2" />
		</cms:ignore>
	</cms:editable>
	<cms:editable name='hfl_nfunts' type='row'>
		<cms:editable name='hlf_ful' label='Full Half Rake' type="text" required="1" class="col-md-6" order="3" />
		<cms:editable name="no_unit" label="No of Units" type="text" required="1" class="col-md-6" order="4" validator='integer' />
	</cms:editable>
	<cms:editable name='stk_dest' type='row'>
		<cms:editable name="stock" label="Stock" type="dropdown" required="1" opt_values="Select =- | <cms:pages masterpage='stock.php' order='asc' ><cms:show k_page_title /><cms:if '<cms:not k_paginated_bottom />' >|</cms:if></cms:pages>" opt_selected ='BOXN' class="col-md-6" order="5" />
		<cms:editable name="desti" label="Destination" type="text" required="1" class="col-md-6" order="6" validator='alpha' />
	</cms:editable>
	<cms:editable name='typ_rmk' type='row'>
		<cms:editable name="coal_type" label="Coal Type" type="dropdown" required="1" opt_values="Select =- | <cms:pages masterpage='coal-type.php' order='asc' ><cms:show k_page_title /><cms:if '<cms:not k_paginate_bottom />' >|</cms:if></cms:pages>" opt_selected ='WCL FSA' class="col-md-6" order="7" />
		<cms:editable name="colremrk" label="Remark" type="text" class="col-md-6" order="8" />
	</cms:editable>
	<cms:editable name='typ_rmk' type='row'>
		<cms:editable name="no_wgn_rjct" label="No of Wagons Rejected" type="text" class="col-md-12" order="9" />
		<cms:repeatable name="my_repeatable" label="Rejection" class="col-md-12" order="10" >
		<cms:editable name="sr_no_rjct_wgn" label="Sr No of Rejected Wgns" type="text" col_width="200" input_width="75" order="2" />
		<cms:editable name="resn_rjct" label="Reason for Rejection" type="dropdown" col_width="200" input_width="75" opt_values="Select =- | <cms:pages masterpage='reason-rejection.php' order='asc' ><cms:show k_page_title /><cms:if '<cms:not k_paginate_bottom />' >|</cms:if></cms:pages>" order="3" />
		</cms:repeatable>
	</cms:editable>
	<cms:editable name='typ_stn' type='row'>
		<cms:editable name="bpc_type" label="BPC Type" type="dropdown" opt_values="Select =- | <cms:pages masterpage='bpc-type.php' order='asc' ><cms:show k_page_title /><cms:if '<cms:not k_paginate_bottom />' >|</cms:if></cms:pages>" class="col-md-6" order="11" />
		<cms:editable name="bpc_stn" label="BPC Station" type="text" class="col-md-6" order="12" />
	</cms:editable>	
	<cms:editable name='dt_perc' type='row'>
		<cms:editable name="brkdt" label="BPC Particular Date" type="datetime" allow_time='0' default_time='@current' class="col-md-6" order="13" />
		<cms:editable name="percentage" label="Percentage" type="text" class="col-md-6" order="14" />
	</cms:editable>
	<cms:editable name='stn_nowgn' type='row'>
		<cms:editable name="unld_stn" label="Unloading Station" type="text" class="col-md-6" order="15" />
		<cms:editable name="no_wagons" label="No of Wagons" type="text" class="col-md-6" order="16" />
	</cms:editable>
	<!-- Editable -->	
	<cms:route name='delete_coal' path='{:id}/delete' >
		<cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:ignore>
		<!-- Coal Route -->
		<cms:route name='list_coal' path='' />
		<cms:route name='create_coal' path='create' />
		<cms:route name='edit_coal' path='{:id}/edit' >
		<cms:route_validators id='non_zero_integer' />
		</cms:route>
	<!-- Coal Route -->
	</cms:ignore>
</cms:template>
<cms:embed 'header.html' />
	<!-- Content Here -->
	<div class="container-fluid">
		<h4 class="gxcpl-no-margin">
			COAL & TRANSPORTATION
		</h4>
		<!-- List View -->
		<div class="gxcpl-ptop-10"></div>
		<div class="gxcpl-divider-dark"></div>
		<div class="gxcpl-ptop-10"></div>
		<cms:match_route debug='0' />
		<cms:if k_matched_route=='delete_coal'>
			<cms:embed "coal/<cms:show k_matched_route />.html" />
		<cms:else />
		<div class="row">
			<!-- Coal -->
			<cms:set submit_success="<cms:get_flash 'submit_success' />" />
			<cms:if submit_success >
				<div class="col-md-12">
					<div class="alert alert-success">
						<strong>Success! </strong>Coal created successfully.
					</div>
				</div>
			</cms:if>

			<cms:set submit_success_transport="<cms:get_flash 'submit_success_transport' />" />
			<cms:if submit_success_transport >
				<div class="col-md-12">
					<div class="alert alert-success">
						<strong>Success! </strong>Transportation created successfully.
					</div>
				</div>
			</cms:if>	
			<cms:form
				name='coal'
				masterpage=k_template_name
				mode='create'
				enctype='multipart/form-data'
				method='post'
				anchor='0'
			>
			<cms:if k_success >
				<cms:db_persist_form
					_invalidate_cache='0'
					k_page_title="<cms:show frm_desti /> <cms:show frm_hlf_ful /> <cms:date frm_tdate /> "
					k_page_name="<cms:show k_page_title />"
				/>
				<cms:if k_success >
					<cms:set_flash name='submit_success' value='1' />
					<cms:redirect url="<cms:route_link 'create_coal' />" />
				</cms:if>
			</cms:if>

			<cms:if k_error >
				<div class="col-md-4">
					<div class="alert alert-danger">
						<cms:each k_error >
							<cms:show item /><br>
						</cms:each>
					</div>
				</div>  
			</cms:if>

			<div class="col-md-9">
				<!-- Card -->
				<div class="gxcpl-card">
					<div class="gxcpl-card-header ">
						<h4 class="gxcpl-position gxcpl-heading-color gxcpl-no-margin">LOADING</h4>
					</div>
					<!-- Body -->
					<div class="gxcpl-card-body">
						<div class="gxcpl-padding">
							<div class="gxcpl-ptop-10"></div>
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-2">
											<label>Date *</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:hide>
												<cms:input type="bound" name="tdate" />
											</cms:hide>
											<input type="date" name="f_tdate" class="gxcpl-input-text" value="<cms:date return='yesterday' format='Y-m-d' />" style="width: auto !important;" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-2">
											<label>Ld Pts *</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-select" name="loading_point" type="bound" style="width: auto !important;" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-1">
											<label>F/H *</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input type="bound" name="hlf_ful" class="gxcpl-input-text" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-2">
											<label>No of Units *</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-text" name="no_unit" type="bound" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-1">
											<label>Stock *</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-text" name="stock" type="bound" style="width: auto !important;" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-1">
											<label>Desti *</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-text" name="desti" type="bound" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-2">
											<label>Type *</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-text" name="coal_type" type="bound" style="width: auto !important;" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-1">
											<label>Remark</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-text" name="colremrk" type="bound" />
											<div class="gxcpl-ptop-10"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="gxcpl-card-body">
						<div class="gxcpl-padding">
							<div class="row">
								<div class="col-md-4 gxcpl-heading-color">
									<h4 class="gxcpl-no-margin">Rejection</h4>
								</div>
								<div class="col-md-5 gxcpl-heading-color">
									<h4 class="gxcpl-no-margin">BPC Particulars</h4>
								</div>	
								<div class="col-md-3 gxcpl-heading-color">
									<h4 class="gxcpl-no-margin">Last Unloading Point</h4>
								</div>
							</div>
						</div>
					</div>
					<div class="gxcpl-card-body">
						<div class="gxcpl-padding">
							<div class="row">
								<div class="gxcpl-ptop-10"></div>
								<div class="col-md-4">
									<div class="row">
										<div class="col-md-3">
											<label class="gxcpl-ptop-20">Wgns Rejected</label>
											<cms:input type='bound' name='no_wgn_rjct' class="gxcpl-input-text gxcpl-ptop-30" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-8 col-xs-11">
											<cms:input type='bound' name='my_repeatable' />
										</div>
										<div class="gxcpl-ptop-10"></div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="row">
										<div class="gxcpl-ptop-40"></div>
										<div class="col-md-3">
											<label>Type</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-text" name="bpc_type" type="bound" style="width: auto !important;" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-3">
											<label>Station</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-text" name="bpc_stn" type="bound" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-2">
											<label>Date</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:hide>
												<cms:input name="brkdt" type="bound" />
											</cms:hide>
											<input type="date" name="f_brkdt" class="gxcpl-input-text" value="<cms:date format='Y-m-d' />" style="width: auto !important;" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-2">
										</div>
										<div class="col-md-2">
											<label>%age</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-text" name="percentage" type="bound" />
											<div class="gxcpl-ptop-10"></div>	
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="row">
										<div class="gxcpl-ptop-40"></div>
										<div class="col-md-6">
											<label>Station</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-text" name="unld_stn" type="bound" />
											<div class="gxcpl-ptop-10"></div>
										</div>
										<div class="col-md-6">
											<label>No of Wgns</label>
											<div class="gxcpl-ptop-5"></div>
											<cms:input class="gxcpl-input-text" name="no_wagons" type="bound" />
											<div class="gxcpl-ptop-10"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Body -->
					<!-- Card Footer -->
					<div class="gxcpl-card-footer gxcpl-no-padding">
						<button class="btn btn-danger btn-sm">
							<i class="fa fa-floppy-o"></i> SAVE
						</button>
					</div>
					<!-- Card Footer -->
				</div>
				<!-- Card -->
				<div class="gxcpl-ptop-10"></div>
			</div>
			</cms:form>
			<!-- Coal -->
			<!-- Transportation -->

			<cms:form name='transport' 
				masterpage="transport.php" 
				mode='create' 
				enctype='multipart/form-data' 
				method='post' 
				anchor='0' 
			>

				<cms:set my_template_name ='transport.php' />
				<cms:set my_page_title="<cms:date frm_transdate format='Y-m-d' /> <cms:pages masterpage='siding.php' id="<cms:gpc 'f_siding_chk' />" limit='1'><cms:show k_page_title /></cms:pages>" />

				<cms:php>
					global $CTX, $FUNCS;
					$name = $FUNCS->get_clean_url( "<cms:show my_page_title />" );
					$CTX->set( 'my_page_name', $name ); 
				</cms:php>

				<cms:set my_page_id='' 'global' />
				<cms:pages masterpage=my_template_name page_name=my_page_name limit='1' show_future_entries='1'>
					<cms:set my_page_id=k_page_id  'global' />
				</cms:pages>

				<cms:if my_page_id=''>

				<cms:if k_success >
					<cms:db_persist_form _invalidate_cache='0' k_page_title="<cms:date frm_transdate format='Y-m-d' /> <cms:pages masterpage='siding.php' id="<cms:gpc 'f_siding_chk' />" limit='1'><cms:show k_page_title /></cms:pages>" k_page_name="<cms:show k_page_title />" />
					<cms:if k_success >
						<cms:set_flash name='submit_success_transport' value='1' />
						<cms:redirect url="<cms:route_link 'create_coal' />" />
					</cms:if>
				</cms:if>

				<cms:if k_error >
					<div class="col-md-3">
						<div class="alert alert-danger">
							<cms:each k_error >
								<cms:show item /><br>
							</cms:each>
						</div>
					</div>  
				</cms:if>

				<cms:else />
					<div class="col-md-3">
						<div class="alert alert-danger">
							<strong>ERROR:</strong> Data for this Siding already exists in transportation!
						</div>
					</div>
				</cms:if>

				<div class="col-md-3" style="clear: none;">		
					<!-- Card -->
					<div class="gxcpl-card">
						<div class="gxcpl-card-header">
							<h4 class="gxcpl-no-margin">TRANSPORTATION</h4>
						</div>

						<!-- Body -->
						<div class="gxcpl-card-body">
							<div class="gxcpl-padding">
								<div class="gxcpl-ptop-10"></div>
								<div class="row">

									<div class="col-md-12">
										<div class="row">
											
											<div class="col-md-5">
												<label>Date</label>
												<div class="gxcpl-ptop-5"></div>
												<cms:hide>
													<cms:input type="bound" name="transdate" />
												</cms:hide>
												<input type="date" name="f_transdate" class="gxcpl-input-text" value="<cms:date return='yesterday -1 days' format='Y-m-d' />"  style="width: auto !important;" />
											</div>

											<div class="col-md-4" >
												<label>Siding</label>
												<div class="gxcpl-ptop-5"></div>
												<cms:input type="bound" name="siding" />
												<div class="gxcpl-ptop-10"></div>
											</div>

											<div class="col-md-3">
												<label>Tons</label>
												<div class="gxcpl-ptop-5"></div>
												<cms:input class="gxcpl-input-text" name="tons" type="bound" />
												<div class="gxcpl-ptop-10"></div>
											</div>
										
										</div>
									</div>

								</div>
							
							</div>
							<!-- <div class="gxcpl-ptop-30"></div> -->
						</div>
						<!-- Body -->

						<!-- Card Footer -->
						<div class="gxcpl-card-footer gxcpl-no-padding">
							<button class="btn btn-danger btn-sm">
								<i class="fa fa-floppy-o"></i> SAVE
							</button>
						</div>
						<!-- Card Footer -->

					</div>
					<div class="gxcpl-ptop-10"></div>
				</div>
			</cms:form>
			<!-- Card -->
		</div>
		<!-- Transportation -->
		<div class="row">
			<!-- Table -->
			<!-- Coal Table -->
			<div class="col-md-9">

				<!-- Card -->
				<div class="gxcpl-card">

					<!-- Body -->
					<div class="gxcpl-card-header">
						<h4 class="gxcpl-no-margin">COAL</h4>
					</div>

					<div class="gxcpl-card-body	gxcpl-scroll" style="overflow-x: auto;">
						<table class="gxcpl-table" width="100%">
							<thead>
								<tr>
									<th class="text-center" rowspan="2">Dt</th>
									<th class="text-center" rowspan="2">Ld Pt</th>
									<th class="text-center" rowspan="2">F/H</th>
									<th class="text-center" rowspan="2">Units</th>
									<th class="text-center" rowspan="2">Stock</th>
									<th class="text-center" rowspan="2">Desti</th>
									<th class="text-center" rowspan="2">Type</th>
									<th class="text-center" colspan="3">Rejection</th>
									<th class="text-center" colspan="3">BPC Particulars</th>
									<th class="text-center" colspan="3">Last Unldg. Pt.</th>
									<th class="text-center" class="text-center" rowspan="2">Remark</th>
									<th class="text-center" rowspan="2">Action</th>
								</tr>
								<tr>
									<th class="text-center">No. Wgn</th>
									<th class="text-center">Sr No.</th>
									<th class="text-center">Reason</th>
									<th class="text-center">Type</th>
									<th class="text-center">Stn</th>
									<th class="text-center">Dt</th>
									<th class="text-center">%</th>
									<th class="text-center">Stn</th>
									<th class="text-center">Wgns</th>
								</tr>
							</thead>
							<cms:ignore>
							<thead>
								<tr>
									<th class="text-center" rowspan="2">Dt</th>
									<th class="text-center" rowspan="2">Ld Pt</th>
									<th class="text-center" rowspan="2">F/H</th>
									<th class="text-center" rowspan="2">Units</th>
									<th class="text-center" rowspan="2">Stock</th>
									<th class="text-center" rowspan="2">Desti</th>
									<th class="text-center" rowspan="2">Type</th>
									<th class="text-center" colspan="3">Rejection</th>
									<th class="text-center" colspan="4">BPC Particulars</th>
									<th class="text-center" colspan="2">Last Unldg. Pt.</th>
									<th class="text-center" rowspan="2">Remark</th>
									<th class="text-center" rowspan="2">Action</th>
								</tr>

								<tr>	
									<th class="text-center">No. Wgn</th>
									<th class="text-center">Sr No.</th>
									<th class="text-center">Reason</th>
									<th class="text-center">Type</th>
									<th class="text-center">Stn</th>
									<th class="text-center">Dt</th>
									<th class="text-center">%age</th>
									<th class="text-center">Stn</th>
									<th class="text-center">Wgns</th>
								</tr>
							</thead>
							</cms:ignore>
							<tbody>
								<cms:set yestdate="<cms:date return='yesterday' format='Y-m-d' />" scope='global' />

								<cms:pages masterpage='coal.php' show_future_entries="1" >
									<cms:no_results>
										<tr>
											<cms:if k_user_access_level gt '7'>
											<td colspan="18" class="text-center">
												- No Result - 
											</td>
											</cms:if>
										</tr>
									</cms:no_results>

									<cms:if yestdate eq "<cms:date tdate format='Y-m-d' />" >
									<tr>
										<td>
											<cms:date tdate format='d/m/Y' />
										</td>
										<td class="text-center">
											<cms:related_pages 'loading_point'>
												<cms:no_results>
													-NA-
												</cms:no_results>
												<cms:show k_page_title />
											</cms:related_pages>
										</td>
										<td class="text-center">
											<cms:if hlf_ful >
												<cms:show hlf_ful />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if no_unit >
												<cms:show no_unit />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if stock = '-' >
												-NA-
											<cms:else />
												<cms:show stock />
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if desti >
												<cms:show desti />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if coal_type = '-'>
												-NA-
											<cms:else />
												<cms:show coal_type />
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if no_wgn_rjct >
												<cms:show no_wgn_rjct />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:show_repeatable 'my_repeatable'>
												<cms:if sr_no_rjct_wgn >
													<cms:show sr_no_rjct_wgn />
												<cms:else />
													-NA-
												</cms:if><br>
											</cms:show_repeatable>
										</td>
										<td class="text-center">
											<cms:show_repeatable 'my_repeatable'>
												<cms:if resn_rjct = '-'>
													-NA-
												<cms:else />
													<cms:show resn_rjct />
												</cms:if><br>
											</cms:show_repeatable>
										</td>
										<td class="text-center">
											<cms:if bpc_type = '-' >
												-NA-
											<cms:else />
												<cms:show bpc_type />
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if bpc_stn >
												<cms:show bpc_stn />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if brkdt >
												<cms:date brkdt format="d/m/Y" />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if percentage >
												<cms:show percentage />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if unld_stn >
												<cms:show unld_stn />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td class="text-center">
											<cms:if no_wagons >
												<cms:show no_wagons />
											<cms:else />
												-NA-
											</cms:if>
										</td>
										<td>
											<div id="colremrk" <cms:inline_edit 'colremrk' toolbar='custom' /> >
												<cms:if colremrk >
													<cms:set strip_text = "<cms:php>global $text;echo strip_tags('<cms:show colremrk />');</cms:php>" />
													<cms:show strip_text />
												<cms:else />
													-NA-
												</cms:if>
											</div>
										</td>
										<cms:ignore>
										<td>
											<cms:set submit_success="<cms:get_flash 'submit_success' />" />
										    <cms:form
										        masterpage=k_template_name
										        mode='edit'
										        page_id=k_page_id
										        enctype='multipart/form-data'
										        method='post'
										        anchor='0'
										        >

										        <cms:if k_success >

										            <cms:check_spam email=frm_email />

										            <cms:db_persist_form
										                _invalidate_cache='0'
										                _auto_title='1'
										            />

										            <cms:set_flash name='submit_success' value='1' />
										            <cms:redirect url="coal.php" /> 
										        </cms:if>

										        <cms:if k_error >
										            <div class="error">
										                <cms:each k_error >
										                    <br><cms:show item />
										                </cms:each>
										            </div>
										        </cms:if>

										        <cms:if colremrk eq ''>
										        	<cms:input type='bound' name='colremrk' placeholder='-NA-' class="gxcpl-inline-text" autocomplete="off" />
										        <cms:else />
										        	<cms:input type='bound' name='colremrk' class="gxcpl-inline-text" autocomplete="off" />
										    	</cms:if>
										    	<button type="submit" class="btn btn-warning btn-xs gxcpl-inline-btn" onclick="alert('Success: Remark has been saved!')">
										    		UPDATE
										    	</button>
										    </cms:form>
										</td>
										</cms:ignore>
										<td>
											<cms:popup_edit 'tdate | loading_point | hlf_ful | no_unit | stock | desti | coal_type | colremrk | no_wgn_rjct | my_repeatable | bpc_type | bpc_stn | brkdt | percentage | unld_stn | no_wagons' link_text="<i class='fa fa-edit'></i>" />
														
											<a href="<cms:route_link 'delete_coal' rt_id=k_page_id />" class="gxcpl-fw-700" data-toggle="tooltip" data-placement="top" title="DELETE">
												<i class="fa fa-trash"></i>
											</a>
										</td>
									</tr>
									</cms:if>
								</cms:pages>
							</tbody>
						</table>
					</div>
					<!-- Full/Half Total -->
					<cms:set fhtotal='0' scope='global' />
					<cms:pages masterpage='coal.php' >
						<cms:if yestdate eq "<cms:date tdate format='Y-m-d' />" >
							<cms:set fhtotal = "<cms:add fhtotal hlf_ful />" scope='global' />
						</cms:if>
					</cms:pages>    
					<!-- Full/Half Total -->

					<!-- No of Units Total  -->
					<cms:set unttotal='0' scope='global' />
						<cms:pages masterpage='coal.php' >
							<cms:if yestdate eq "<cms:date tdate format='Y-m-d' />" >
								<cms:set unttotal = "<cms:add unttotal no_unit />" scope='global' />
							</cms:if>
						</cms:pages>
					<!-- No of Units Total  -->

					<div class="gxcpl-card-footer gxcpl-no-padding" style="line-height: 24px; text-align: left;">
						<div class="row">
							<div class="col-md-1">
								&nbsp;
							</div>
							<div class="col-md-3" style="margin-left: 5px;">
								<strong>Total</strong>&nbsp;
								<strong>F/H:</strong> <cms:show fhtotal />&nbsp;
								<strong>U:</strong> <cms:show unttotal />
							</div>
						</div>
					</div>
					<!-- Body -->
				</div>
				<!-- Card -->
				<div class="gxcpl-ptop-30"></div>
			</div>

			<!-- Coal Table -->
			<!-- Transportation Table -->
			<div class="col-md-3">
				<div class="gxcpl-card">
					<div class="gxcpl-card-header">
						<h4 class="gxcpl-no-margin">TRANSPORTATION</h4>
					</div>
					<div class="gxcpl-card-body	tableFixHead" style="overflow-x: auto;">
						<table class="gxcpl-table" width="100%" >
							<thead>
								<tr>
									<th class="text-center" rowspan="2" style="padding: 0;">Dt</th>
									<th class="text-center" rowspan="2" style="padding: 0;">Siding</th>
									<th class="text-center" rowspan="2" style="padding: 0;">Tons</th>
								</tr>
							</thead>
								<cms:set tontotal='0' scope='global' />
								<cms:set yestdate="<cms:date return='yesterday -1 days' format='Y-m-d' />" scope='global' />
							<tbody>
							<cms:pages masterpage='transport.php' show_future_entries="1" >
								<cms:no_results>
									<tr>
										<cms:if k_user_access_level gt '7'>
											<td colspan="3" class="text-center">
												- No Result -
											</td>
										</cms:if>
									</tr>
								</cms:no_results>

								<cms:if yestdate eq "<cms:date transdate format='Y-m-d' />" >
									<tr>
										<td class="text-center" style="padding: 0;">
											<cms:date transdate format="d/m/Y" />
										</td>
										<td class="text-center" style="padding: 0;">
											<cms:related_pages 'siding'>
												<cms:no_results>
													-NA-
												</cms:no_results>
												<cms:show k_page_title />
											</cms:related_pages>
										</td>
										<td class="text-center" style="padding: 0;">
											<div id="tons" <cms:inline_edit 'tons' toolbar='custom' /> >
												<cms:if tons >
													<cms:set strip_text = "<cms:php>global $text;echo strip_tags('<cms:show tons />');</cms:php>" />
													<cms:show strip_text />
												<cms:else />
													-NA-
												</cms:if>
											</div>
										</td>
										<cms:ignore>
										<td>
											<cms:set submit_success="<cms:get_flash 'submit_success' />" />
										    <cms:form
										        masterpage='transport.php'
										        mode='edit'
										        page_id=k_page_id
										        enctype='multipart/form-data'
										        method='post'
										        anchor='0'
										        >

										        <cms:if k_success >

										            <cms:check_spam email=frm_email />

										            <cms:db_persist_form
										                _invalidate_cache='0'
										                _auto_title='1'
										            />

										            <cms:set_flash name='submit_success' value='1' />
										            <cms:redirect url="coal.php" /> 
										        </cms:if>

										        <cms:if k_error >
										            <div class="error">
										                <cms:each k_error >
										                    <br><cms:show item />
										                </cms:each>
										            </div>
										        </cms:if>

										        <cms:if tons eq ''>
										        	<cms:input type='bound' name='tons' placeholder='-NA-' class="gxcpl-inline-text" autocomplete="off" />
										        <cms:else />
										        	<cms:input type='bound' name='tons' class="gxcpl-inline-text" autocomplete="off" />
										    	</cms:if>
										    	<button type="submit" class="btn btn-warning btn-xs gxcpl-inline-btn" onclick="alert('Success: Tons has been saved!')">
										    		UPDATE
										    	</button>
										    </cms:form>
										</td>
										
										<td class="text-center" style="padding: 0;" >
											<cms:popup_edit ' siding | tons | transdate' link_text="<i class='fa fa-edit'></i>" />
										</td>	
										</cms:ignore>
									</tr>
									<cms:set tontotal = "<cms:add tontotal tons />" scope='global' />
								</cms:if>
							</cms:pages>
							</tbody>
						</table>
					</div>

					<div class="gxcpl-card-footer gxcpl-no-padding" style="line-height: 25px;">
						<div class="row">
							<div class="col-md-11 col-md-offset-1 text-center">
								<strong>Total Tons:</strong>
								<cms:show tontotal />
							</div>
						</div>
					</div>
				</div>
				<div class="gxcpl-ptop-30"></div>
			</div>
			
			<!-- Transportation Table -->
		</div>
		</cms:if>
	</div>
	<div class="gxcpl-ptop-50"></div>
<!-- Content Here -->
<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>