<cms:pages masterpage='pointwise-interchange.php' custom_field="to_ho=0 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' />" order='asc' orderby="arrival_time" skip_custom_field='1' limit="1">
<cms:set arri = "<cms:gpc 'arrival_date' method='get' />" scope='global'  />
<cms:set total_pdd='0' scope='global' />
<script type="text/javascript">
	function pddPDF(){
		var dd = {
			content: [
				{
					text: 'PDD Report', style: 'subheader', alignment: 'center'
				},
				
				{
					text: '<cms:date arri format="d/m/Y" />' , style: 'subheader', alignment: 'center'
				},
				'\n',
				{
					style: 'tableExample',fontSize: 7,
					margin:[60, 0, 30, 0],
					table: {
						body: [
						[	{
								text: 'S.No.', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
							}, 
						 	{
						 		text: 'Train', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	}, 
						 	{
						 		text: 'Loco', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	},
						 	<cms:if my_icp eq 'NGP'>
						 	{
						 		text: 'NGP Arr', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	}, 
						 	{
						 		text: 'NGP Dep', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	},
						 	{
						 		text: 'AQ Arr', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	}, 
						 	{
						 		text: 'AQ Dep', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	},
						 	<cms:else_if my_icp eq 'GCC' />
						 	{
						 		text: 'GCC Arr', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	}, 
						 	{
						 		text: 'GCC Dep', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	},
						 	{
						 		text: 'GNQ Arr', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	}, 
						 	{
						 		text: 'GNQ Dep', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	},
						 	<cms:else />
						 	{
						 		text: 'Arr', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	}, 
						 	{
						 		text: 'Dep', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	}, 
						 	</cms:if>
						 	{
						 		text: 'Sign on', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	},
						 	{
						 		text: 'PDD(m)', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8,
						 	},
						 	{
						 		text: 'Remark', style: 'tableHeader', style: 'textCenter', bold: true, fontSize: 8, width: 200,
						 	},
						],
							<cms:pages masterpage='pointwise-interchange.php' custom_field="to_ho=0 | interchange=<cms:gpc 'interchange' method='get' /> | arrival_date=<cms:gpc 'arrival_date' method='get' />" order='asc' orderby="arrival_time" >
								<cms:embed 'pdd.html' />
								<cms:set pdf_min = "<cms:show minutes />" scope="global" />
								<cms:set tr_name_caps="<cms:php>echo strtoupper('<cms:show tr_name />');</cms:php>" />
								<cms:set div_factor_pdd = "<cms:show k_count />" scope="global" />
								<cms:set avg_pdd = "<cms:div total_pdd div_factor_pdd />" scope="global" />
								['<cms:show k_absolute_count />', '<cms:show tr_name_caps />', '<cms:show loco />', <cms:if my_icp eq 'NGP'>'<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>', '<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>', '<cms:if aq_arrival_time><cms:date aq_arrival_time format='H:i' /><cms:else />-NA-</cms:if>', '<cms:if aq_departure_time><cms:date aq_departure_time format='H:i' /><cms:else />-NA-</cms:if><cms:else_if my_icp eq 'GCC' />'<cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>', '<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if>', <cms:if gnq_arrival_time><cms:date gnq_arrival_time format='H:i' /><cms:else />-NA-</cms:if>', '<cms:if gnq_departure_time><cms:date gnq_departure_time format='H:i' /><cms:else />-NA-</cms:if><cms:else /><cms:if arrival_time><cms:date arrival_time format='H:i' /><cms:else />-NA-</cms:if>', '<cms:if departure_time><cms:date departure_time format='H:i' /><cms:else />-NA-</cms:if></cms:if> ', '<cms:if signon_time><cms:date signon_time format='H:i' /><cms:else />-NA-</cms:if>','<cms:show pdf_min />', '<cms:if remark><cms:show remark /><cms:else />-NA-</cms:if>'],
							</cms:pages>
							<cms:if my_icp eq 'NGP' || my_icp eq 'GCC'>
							[
								{
									colSpan: 8, 
									bold: true,
									text: 'Avg PDD'
								},
								{},
								{},
								{}, 
								{},
								{},
								{},
								{},
								{
									colSpan: 2,
									bold: true,
									text:'<cms:number_format avg_pdd decimal_precision="2" />'
								},
								{}
							]
							<cms:else />
							[
								{
									colSpan: 6, 
									bold: true,
									alignment: 'right',
									text: 'Avg PDD'
								},
								{},
								{},
								{}, 
								{},
								{},
								{
									colSpan: 2,
									bold: true,
									text:<cms:number_format avg_pdd decimal_precision="2" />
								},
								{}
							]
							</cms:if>
						]
					}
				},
			],
			styles: {
				textCenter: {
					alignment: 'center',
					fontSize: 9
				},
				header: {
					fontSize: 10,
					margin: [50, 0, 0, 5]
				},
				subheader: {
					fontSize: 12,
					margin: [0, 10, 0, 5]
				},
				tableExample: {
					fontSize: 9,
					margin: [0, 5, 0, 15]
				},
			},
			defaultStyle: {
				// alignment: 'justify'
			}
		}
		pdfMake.createPdf(dd).open();
		pdfMake.createPdf(dd).download("PDD_<cms:date arri format="d/m/Y" />.pdf");
	}
</script>
</cms:pages>

<cms:pages masterpage="pointwise-interchange.php" custom_field="is_stabled='1' | is_interchanged<>1" order='desc' orderby='arrival_date' >
	<cms:set arri = "<cms:gpc 'arrival_date' method='get' />" scope='global'  />
	<script type="text/javascript">
		function stablePDF(){
			var dd = {
				pageSize:'A4',
				pageOrientation:'potrait',
				info : 
				{
					title :"Stable Trains - <cms:date arri format= 'd/m/Y' />"
				},
				content: 
				[
					{text: 'Stable Trains', style: 'subheader' , alignment: 'center'},
					'\n',
					{ text: 'Date:- <cms:date arri format= "d/m/Y" />', style: 'subheader', alignment: 'center' },
					'\n',
					{
					style: 'tableExample', fontSize: 8.3, border:0, margin: [75, 2],   
					table: {
						headerRows: 1,
						widths: [25 , 70 , 50 , 50 , 40 , 40, '*' ],
						// dontBreakRows: true,
						// keepWithHeaderRows: 1,
						body: [
							[{text: 'Sr.No.', style: 'tableHeader', bold: true, fontSize: 9,}, 
							 {text: 'Train', style: 'tableHeader', bold: true, fontSize: 9,},
							 {text: 'Loco', style: 'tableHeader', bold: true, fontSize: 9,}, 
							 {text: 'Arr Date', style: 'tableHeader', bold: true, fontSize: 9,},
							 {text: 'Arr Time', style: 'tableHeader', bold: true, fontSize: 9,}, 
							 {text: 'Location', style: 'tableHeader', bold: true, fontSize: 9,},
							 {text: 'Remark', style: 'tableHeader', bold: true, fontSize: 9,}
							 ],
							
							<cms:pages masterpage="pointwise-interchange.php" custom_field="is_stabled='1' | is_interchanged<>1" order='desc' orderby='arrival_date' show_future_entries='1' >
								<cms:set tr_name_caps="<cms:php>echo strtoupper('<cms:show tr_name />');</cms:php>" />
								<cms:set schedule_caps="<cms:php>echo strtoupper('<cms:show schedule />');</cms:php>" />
							[
								'<cms:show k_absolute_count />',
								'<cms:show tr_name_caps />',
								'<cms:show loco />',
								'<cms:date arrival_date format='d-m-Y' />',
								'<cms:date arrival_time format="H:i" />',
								'<cms:related_pages 'location'><cms:show k_page_title /></cms:related_pages>',
								'<cms:if remark><cms:show remark /><cms:else />-NA-</cms:if>',
							],
							</cms:pages>				
						]
					}
					},
					{text: 'Total Stable Train: <cms:pages masterpage='pointwise-interchange.php' custom_field="is_stabled='1' | is_interchanged<>1 " order='asc' orderby='arrival_time' count_only='1' />', style: 'subheader' , bold: true, fontSize: 8.3, alignment: 'left', margin: [75, 2]},
				]
			}
			pdfMake.createPdf(dd).open();
			pdfMake.createPdf(dd).download("Stable Trains_<cms:date arri format='d-m-Y' />.pdf");
		}
	</script>
</cms:pages>