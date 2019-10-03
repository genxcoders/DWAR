<?php require_once( '../couch/cms.php' ); ?>
<cms:embed 'header.html' />
	<style type="text/css">
		a {
		  text-decoration: none;
		}
		.gxcpl-legend-outer {
		  width: 44px;
		  height: 44px;
		  position: absolute;
		  /*bottom: 40px;*/
		  right: 40px;
		  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
		  border: 1px solid rgba(0,0,0,0.05);
		  border: radius: 4px;
		}
		.gxcpl-legend-outer:hover {
		  cursor: pointer;
		}
		.gxcpl-legend {
		  padding: 3px;
		}
		.gxcpl-legend-inner {
		  width: 40px;
		  height: 20px;
		}
		.gxcpl-legend-interchange, .gxcpl-legend-stable, .gxcpl-legend-schedule, .gxcpl-legend-signon {
		  display: inline-block;
		  width: 16px;
		  height: 16px;
		  border-radius: 2px;
		}
		.gxcpl-legend-interchange, .child-one {
		  background-color: #55a5ea;
		}
		.gxcpl-legend-stable, .child-two {
		  background-color: #f0e40e;
		}
		.gxcpl-legend-schedule, .child-three {
		  background-color: #85EA10;
		}
		.gxcpl-legend-signon, .child-four {
		  background-color: #FFAAB3;
		}
	</style>
	<div class="container">
		<div class="row">
			<span class="col-md-1 pull-right"  data-toggle="tooltip" data-placement="left" title="Click to know Table Legend">
			    <a class="gxcpl-legend-outer"  data-toggle="modal" data-target="#myModal">
				  	<div class="gxcpl-legend">
				    	<div class="gxcpl-legend-inner">
					      	<div class="gxcpl-legend-interchange"></div>
					      	<div class="gxcpl-legend-stable"></div>
				    	</div>
					    <div class="gxcpl-legend-inner">
					      	<div class="gxcpl-legend-schedule"></div>
					      	<div class="gxcpl-legend-signon"></div>
				    	</div>
				  	</div>
				</a>
				<!-- Legend Box -->

				<!-- Legend Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
				    	<div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">LEGEND</h4>
					    </div>
					    <div class="modal-body">
							<div class="row gxcpl-padding-5 gxcpl-no-margin">
								<div class="col-md-6 col-sm-12 col-xs-12 gxcpl-modal-interchange text-center">
									<div class="gxcpl-ptop-5"></div>
									<strong>TRAIN INTERCHANGE</strong>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 gxcpl-modal-stable text-center">
									<div class="gxcpl-ptop-5"></div>
									<strong>STABLE TRAIN</strong>
								</div>
								<div class="gxcpl-ptop-50"></div>
								<div class="col-md-6 col-sm-12 col-xs-12 gxcpl-modal-schedule text-center">
									<div class="gxcpl-ptop-5"></div>
									<strong>SCHEDULE OVERDUE</strong>
								</div>							
								<div class="col-md-6 col-sm-12 col-xs-12 gxcpl-modal-signon text-center">
									<div class="gxcpl-ptop-5"></div>
									<strong>SIGN ON OVERDUE</strong>
								</div>
							</div>
						</div>
						<div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					    </div>
				    </div>
				  </div>
				</div>
				
				<!-- Legend Modal -->
			</span>
		</div>
	</div>
	<script type="text/javascript">
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>