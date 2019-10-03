<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Non Coal Report" clonable='1' parent='_ncoal_' order="5" />
<cms:embed "header.html" />
	<div class="container-fluid">
		<div class="gxcpl-ptop-50"></div>
		<h4 class="gxcpl-no-margin">
			NON COAL REPORT
		</h4>
		<div class="gxcpl-ptop-10"></div>
		<div class="gxcpl-divider-dark"></div>
		<div class="gxcpl-ptop-20"></div> 
		<cms:set noncoaldate ="<cms:date n_c_date format='Y-m-d' />" scope="global" />
		<cms:embed 'searchnoncoal.html' />
		<cms:if n_c_date!="<cms:show my_search_str />">
			<div class="col-md-12">
				<div class="gxcpl-card"> 
					<div class="gxcpl-card-body	scroll tableFixHead">
						<table class="gxcpl-table" width="100%">
							<thead>
								<tr>
									<th class="text-center">
										Date
									</th>
									<th class="text-center">
										Commodity
									</th>
									<th class="text-center">
										Loading Point
									</th>
									<th class="text-center">
										Full/Half
									</th>
									<th class="text-center">
										No. of Units
									</th>
									<th class="text-center">
										Stock
									</th>
									<th class="text-center">
										Destination
									</th>
									<th>
										Action
									</th>
								</tr>
							</thead>
							<cms:set yestdate="<cms:date return='yesterday' format='Y-m-d' />" scope='global' />
							<tbody>
								<cms:pages masterpage='non-coal.php' show_future_entries="1" custom_field="<cms:show my_search_str />" >
								<cms:no_results>
									<tr>
										<cms:if k_user_access_level gt '7'>
										<td colspan="9" class="text-center">
											- No Result -
										</td>
										</cms:if>
									</tr>
								</cms:no_results>
								<tr>
									<td class="text-center">
										<cms:if n_c_date >
											<cms:date n_c_date format='d/m/Y' />
										<cms:else />
											-NA-
										</cms:if>
								    </td>
									<td class="text-center text-uppercase">
										<cms:related_pages 'ncoal_cmdt'>
											<cms:show k_page_title />
										</cms:related_pages>
									</td>
									<td class="text-center text-uppercase">
										<cms:related_pages 'ncoal_ld_pt'>
											<cms:show k_page_title />
										</cms:related_pages>
									</td>
									<td class="text-center">
										<cms:show ncoal_h_f />
									</td>
									<td class="text-center">
										<cms:show ncoal_units />
									</td>
									<td class="text-center text-uppercase">
										<cms:related_pages 'ncoal_stock'>
											<cms:show k_page_title />
										</cms:related_pages>
									</td>
									<td class="text-center">
										<cms:show ncoal_dest />
									</td>
									<td class="text-center">
										<cms:popup_edit 'n_c_date | ncoal_cmdt | ncoal_ld_pt | ncoal_h_f | ncoal_units | ncoal_stock | ncoal_dest' link_text="<i class='fa fa-edit'></i>" />

										<a href="<cms:route_link 'delete_ncoal' rt_id=k_page_id />" class="gxcpl-fw-700" data-toggle="tooltip" data-placement="top" title="DELETE">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr> 
								<cms:set ncfhtotal = "<cms:add ncfhtotal ncoal_h_f />" scope='global' />

								<cms:set ncunttotal = "<cms:add ncunttotal ncoal_units />" scope='global' />
								</cms:pages>
							</tbody>
						</table>
					</div>
					<div class="gxcpl-card-footer" style="line-height: 24px; text-align: left;">
						<div class="row">
							<div class="col-md-1">
							&nbsp;
							</div>
							<div class="col-md-5 text-right" style="margin-left: -16px;">
								<strong>Total</strong>&nbsp;
								<strong>F/H:</strong> <cms:show ncfhtotal />&nbsp;
							</div>
							<div class="col-md-1 text-right" style="margin-left: 50px;">
								<strong>U:</strong> <cms:show ncunttotal />
							</div>
						</div>
					</div>
					<!-- Body -->
				</div>
			</div>
		<cms:else />
		</cms:if>
	</div>
	<div class="gxcpl-ptop-50"></div>
<cms:embed "footer.html" />
<?php COUCH::invoke( ); ?>