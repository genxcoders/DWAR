<?php require_once( 'couch/cms.php' ); ?>
<cms:template title='Users Modal' />
<cms:no_cache />

<cms:set page_to_edit="<cms:gpc 'page_id' method='get' />" scope="global" />
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<cms:pages masterpage='pointwise-interchange.php' id=page_to_edit show_future_entries='1' limit='1' >
		<div class="modal-dialog modal-lg" role="document">
			<!--<div class="modal-content"> -->
				<!-- <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><cms:show user_fname /> <cms:show user_lname /></h4>
				</div> -->
				<!-- <div class="modal-body"> -->
					Embed
					<cms:embed 'ptwise-intrchnge/edit_ptic.html' />
				<!-- </div> -->
				<!-- <div class="modal-footer">
					<button type="button" class="btn btn-default gxcpl-btn ripple" data-dismiss="modal">
						<i class="fa fa-times"></i> Close
					</button>
				</div> -->
			<!-- </div>-->
		</div> 
		</cms:pages>
	</body>
</html>		
<?php COUCH::invoke(); ?>								