<?php require_once( 'couch/cms.php' ); ?>
<cms:embed 'header.html' />
<a href="javascript:pddPDF()" class="btn btn-warning gxcpl-fw-700" >
	<i class="fa fa-file-pdf-o"></i> PDF
</a>
<cms:pages masterpage='pointwise-interchange.php' custom_field="to_ho=0 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' />" order='asc' orderby="arrival_time" skip_custom_field='1'>
<script type="text/javascript">
	function pddPDF(){
		var dd = {
			content: [
				{text: 'Tables', style: 'header'},
				'Official documentation is in progress, this document is just a glimpse of what is possible with pdfmake and its layout engine.',
				{text: 'A simple table (no headers, no width specified, no spans, no styling)', style: 'subheader'},
				'The following table has nothing more than a body array',
				{
					style: 'tableExample',
					table: {
						body: [
							['Column 1', 'Column 2', 'Column 3'],
							['One value goes here', 'Another one here', 'OK?']
						]
					}
				},
			]
		}
		pdfMake.createPdf(dd).open();
	}
</script>
</cms:pages>
<cms:ignore>
<table width="100%">
	<tr style="position: relative; border-top: 1px solid rgba(0, 0, 0, 0.25); border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
		<th class="text-center gxcpl-table-padding">
			SNo.
		</th>
		<th class="gxcpl-table-padding">
			Stock
		</th>
		<th class="text-center gxcpl-table-padding">
			T/O
		</th>
		<th class="text-center gxcpl-table-padding">
			H/O
		</th>
	</tr>
	<!-- Anchor -->
	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=ET">
	<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
		<td class="text-center gxcpl-table-padding">
			<cms:show k_absolute_count />
		</td>
		<td class="gxcpl-table-padding">
			<cms:related_pages raketype >
			<cms:show k_page_title />
			</cms:related_pages>
		</td>
		<td class="text-center gxcpl-table-padding">
			
		</td>
		<td class="text-center gxcpl-table-padding">
			
		</td>
		<td class="overlay">
			<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date my_today_yesterday format='Y-m-d' />&interchange=ET&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
				<div style="width: 100%; height: 17px;">
					
				</div>
			</a>
		</td>
	</tr>
	</cms:pages>
	<!-- Anchor -->
</table>
</cms:ignore>
<cms:ignore>
	<!-- <cms:pages masterpage='type.php' >

		<cms:reverse_related_pages 'raketype' masterpage='pointwise-interchange.php' custom_field="interchange=BPQ | raketype=<cms:pages masterpage='type.php'><cms:show k_page_title /><cms:if "<cms:not k_paginated_bottom />">,</cms:if></cms:pages> | arrival_date=<cms:date 'yesterday' format='Y-m-d' /> | to_ho=0">
			<cms:set related_raketype="<cms:related_pages 'raketype' count_only='1'><cms:show k_page_title /></cms:related_pages>" />
			(<cms:show related_raketype />::<cms:show k_page_title />)<br>
			
		</cms:reverse_related_pages>
	</cms:pages>

	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=BPQ | raketype=<cms:pages masterpage='type.php'><cms:show k_page_title /><cms:if "<cms:not k_paginated_bottom />">,</cms:if></cms:pages> | arrival_date=<cms:date 'yesterday' format='Y-m-d' /> | to_ho=0,1" >

	<cms:if raketype eq raketype>
		<cms:incr my_rake_type_count />
	</cms:if>
	<cms:show my_rake_type_count />

	<cms:related_pages 'raketype' >
	<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
		<td class="text-center gxcpl-table-padding">
			<cms:show my_count />
			<cms:incr my_count />
		</td>
		<td class="gxcpl-table-padding">
			<cms:show interchange />::<cms:show k_page_title />::<cms:show to_ho />
		</td>
		<td class="text-center gxcpl-table-padding">
			
		</td>
		<td class="text-center gxcpl-table-padding">
			
		</td>
		<td class="overlay">
			<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date my_today_yesterday format='Y-m-d' />&interchange=ET&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
				<div style="width: 100%; height: 17px;">
					
				</div>
			</a>
		</td>
	</tr>
	</cms:related_pages>
	</cms:pages> -->


<cms:set my_count='1' scope='global' />
<table width="250px" border="1">
	<thead>
		<tr style="position: relative; border-top: 1px solid rgba(0, 0, 0, 0.25); border-bottom: 1px solid rgba(0, 0, 0, 0.25);">
			<th>
				Sr No
			</th>
			<th>
				Stock
			</th>
			<th>
				T/O
			</th>
			<th>
				H/O
			</th>
		</tr>
	</thead>
	<tbody>
		<cms:pages masterpage='type.php'>
		<tr>
			<td>
				<cms:show my_count />
				<cms:incr my_count />
			</td>
			<td>
				<cms:show k_page_title />
			</td>
			<td>
				<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=ET | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' />" count_only='1' />
			</td>
			<td>
				<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=ET | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' />" count_only='1' />
			</td>
		</tr>
		</cms:pages>
	</tbody>
</table>
</cms:ignore>
	<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>