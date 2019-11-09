<?php require_once( '../couch/cms.php' ); ?>
<cms:template title="Add LP, S, NC" clonable='1' parent="_test_">
	<cms:editable name='lpsnc_name' type='text' required="1" order='1' />
	<cms:editable name='appearance' type='checkbox' opt_values="Loading Point=1 || Siding=2 || Non-coal=3" opt_selected="" order="2" />
</cms:template>
<!DOCTYPE html>
<html>
	<head>
		<title>Add: Loading Point, Siding, Non Coal</title>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-3" style="padding: 10px 20px; border: 1px solid rgba(0,0,0,0.25);">
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
				                _auto_title='0'
				                k_page_title="<cms:show frm_lpsnc_name /> <cms:show appearance />"
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
						
						<div class="row">
							<div class="col-md-12">
								<cms:input placeholder="Add Name" class="form-control" type="bound" name="lpsnc_name" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								Select appearance
							</div>
							<div class="col-md-12">
								<cms:input type="bound" name="appearance" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-primary btn-sm" type="submit">
									SAVE
								</button>
							</div>
						</div>

					</cms:form>
				</div>
				<div class="col-md-9">
					<table style="border: 1px solid rgba(0,0,0,0.25);" width="100%">
						<thead>
							<tr>
								<th style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
									Sr. No.
								</th>
								<th style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
									Name
								</th>
								<th style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
									Loading Point
								</th>
								<th style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
									Siding
								</th>
								<th style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
									Non-coal
								</th>
							</tr>
						</thead>
						<tbody>
							<cms:pages show_future_entries='1'>
							<cms:no_results>
								<tr>
									<td colspan="5" class="text-center" style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
										- No Result -
									</td>
								</tr>
							</cms:no_results>
							<tr>
								<td style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
									<cms:show k_absolute_count />
								</td>
								<td style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
									<cms:show lpsnc_name />
								</td>
								<cms:each appearance sep='|'>
									<cms:if (item eq '1') || (item eq '2') || (item eq '3') >
									<td style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
										Y
									</td>
									<cms:else />
									<td style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
										N
									</td>
									</cms:if>
								</cms:each>
								<cms:ignore>
								<!-- <td style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
									<cms:each appearance sep='|'>
									<cms:if apprearnce_display eq '1'>
									<cms:set apprearnce_display="<cms:show item />" scope="global" />
									</cms:if>
									<cms:if apprearnce_display eq '1'>
										<span class="glyphicon glyphicon-ok"></span>
									<cms:else />
										<span class="glyphicon glyphicon-remove"></span>
									</cms:if>
									</cms:each>
								</td>
								<td style="border: 1px solid rgba(0,0,0,0.25);padding: 5px 10px;">
									<cms:each appearance sep='|'>
									<cms:if apprearnce_display eq '2'>
									<cms:set apprearnce_display="<cms:show item />" scope="global" />
									</cms:if>
									<cms:if apprearnce_display eq '2'>
										<span class="glyphicon glyphicon-ok"></span>
									<cms:else />
										<span class="glyphicon glyphicon-remove"></span>
									</cms:if>
									</cms:each>
								</td> -->
								</cms:ignore>
							</tr>
							</cms:pages>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- Script -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
		<!-- Script -->
	</body>
</html>
<?php COUCH::invoke(); ?>