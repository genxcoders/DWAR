<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Transportation" clonable='1' searchable='1' routable='1' parent='_coal_' order='2' >
	<cms:editable name="siding" label="Siding" type="relation" has="one" required="1" masterpage="loading-pt.php" order="1" /> 
	<cms:editable name="tons" label="Tons" type="text" validator='non_negative_integer' order="2" />
	<cms:editable name="transdate" label="Date" required="1" type="datetime" order="3" />
	<cms:route name='delete_trans' path='{:id}/delete' >
	    <cms:route_validators id='non_zero_integer' />
	</cms:route>
	<cms:config_list_view searchable='1' />
</cms:template>
<cms:embed 'header.html' />
	<div class="container-fluid">
		<div class="row">
			<cms:match_route debug='0' />
			<cms:if k_matched_route='delete_trans'>
			<cms:embed "transport/<cms:show k_matched_route />.html" />
			<cms:else />
			<cms:set submit_success_transport="<cms:get_flash 'submit_success_transport' />" />
			<cms:if submit_success_transport >
			<div class="col-md-12">
				<div class="alert alert-success">
					<strong>Success! </strong>Transportation created successfully.
				</div>
			</div>
			</cms:if>
			<!-- Transportation -->
			<cms:form name='transport' masterpage="transport.php" mode='create' enctype='multipart/form-data' method='post' anchor='0' >
				
				<cms:set my_template_name = 'transport.php' />
				<cms:set my_page_title="<cms:date frm_transdate format='Y-m-d' />_<cms:pages masterpage='loading-pt.php' id="<cms:gpc 'f_siding_chk' />" limit='1'><cms:show k_page_title /></cms:pages>" />
				
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
						<cms:db_persist_form _invalidate_cache='0' k_page_title="<cms:date frm_transdate format='Y-m-d' />_<cms:pages masterpage='loading-pt.php' id="<cms:gpc 'f_siding_chk' />" limit='1'><cms:show k_page_title /></cms:pages>" k_page_name="<cms:show k_page_title />" />
						<cms:if k_success >
							<cms:set_flash name='submit_success_transport' value='1' />
							<cms:redirect url="<cms:route_link 'create_coal' />" />
						</cms:if>
					</cms:if>

					<cms:if k_error >
			            <!-- <div class="row"> -->
		        		<div class="col-md-3">
		        			<div class="alert alert-danger">
		            			<cms:each k_error >
		            				<cms:show item /><br>
		            			</cms:each>
		                    </div>
		            	</div>  
			            <!-- </div> -->
			        </cms:if>
					<!-- <div class="gxcpl-ptop-10"></div> -->

				<cms:else />

					<div class="col-md-3" style="position: absolute; right: 0px;">
						<div class="alert alert-danger">
							<strong>ERROR:</strong> Data already exists in transportation!
						</div>
					</div>
				
				</cms:if>

				<div class="col-md-3" style="position: absolute; right: 0px;">
					
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

											<div class="col-md-5" style="padding-left: 0;">
												<label>Siding</label>
												<div class="gxcpl-ptop-5"></div>
												<cms:input type="bound" name="siding" class="gxcpl-input-select"  />
												<div class="gxcpl-ptop-10"></div>
											</div>

											<div class="col-md-2" style="padding-left: 0;">
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
						
						<!-- Footer -->
						<div class="gxcpl-card-footer gxcpl-no-padding">
							<button class="btn btn-danger btn-sm">
								SAVE
							</button>
						</div>
						<!-- Footer -->

					</div>
					<!-- Card -->
					<!-- <div class="gxcpl-ptop-10"></div> -->
				</div>
			</cms:form>
			<!-- Transportation -->
			<!-- Transportation Table -->
			<div class="col-md-3">
				<div class="gxcpl-card">
					<div class="gxcpl-card-header">
						<h4 class=" gxcpl-no-margin">TRANSPORTATION</h4>
					</div>
					<div class="gxcpl-card-body	tableFixHead">
						<table class="gxcpl-table" width="100%" >
							<thead>
								<tr>
									<th class="text-center" rowspan="2" style="padding: 0;">Sr No</th>
									<th class="text-center" rowspan="2" style="padding: 0;">Dt</th>
									<th class="text-center" rowspan="2" style="padding: 0;">Siding</th>
									<th class="text-center" rowspan="2" style="padding: 0;">Tons</th>
									<th class="text-center" rowspan="2" style="padding: 0;">Action</th>
								</tr>
							</thead>
							<cms:set tontotal='0' scope='global' />
							<cms:set yestdate="<cms:date return='yesterday -1 days' format='Y-m-d' />" scope='global' />
							<tbody>
								<cms:pages masterpage='transport.php' show_future_entries="1" >
									<cms:no_results>
										<tr>
											<cms:if k_user_access_level gt '7'>
											<td colspan="5" class="text-center">
												- No Result -
											</td>
											</cms:if>
										</tr>
									</cms:no_results>

									<cms:if yestdate eq "<cms:date transdate format='Y-m-d' />" >
										<tr>
											<td class="text-center" style="padding: 0;">
												<cms:show k_absolute_count />
											</td>
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
												<cms:if tons >
													<cms:show tons />
												<cms:else />
													-NA-
												</cms:if>
											</td>
											<td class="text-center" style="padding: 0;" >
												<cms:popup_edit ' siding | tons | transdate' link_text="<i class='fa fa-edit'></i>" /> 
												<a href="<cms:route_link 'delete_trans' rt_id=k_page_id />">
													<i class="fa fa-trash"></i>
												</a>
											</td>	
										</tr>
										<cms:set tontotal = "<cms:add tontotal tons />" scope='global' />
									</cms:if>
								</cms:pages>
							</tbody>
						</table>
					</div>

					<div class="gxcpl-card-footer gxcpl-no-padding" style="line-height: 25px;">
						<div class="row">
							<div class="col-md-9 text-right">
								<strong>Total Tons:</strong>
							</div>
							<div class="col-md-3" style="text-align: left; padding-left:0;">
								<cms:show tontotal />
							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- Transportation Table -->
			</cms:if>
		</div>
	</div>	
<cms:embed 'footer.html' />
<?php COUCH::invoke( K_IGNORE_CONTEXT ); ?>