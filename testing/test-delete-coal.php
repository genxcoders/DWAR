<?php require_once( '../couch/cms.php' ); ?>
<cms:embed 'header.html' />
	<table width="98%" border="1" style="margin: 1%;">
		<thead>
			<tr>
				<th class="text-center" rowspan="2">Month</th>
				<th class="text-center" rowspan="2">2017-2018 <br><small>(Total)</small></th>
				<th class="text-center" colspan="10">2018-2019</th>
				<th class="text-center" colspan="10">2019-2020</th>
				<th class="text-center" rowspan="2">Diff</th>
			</tr>
			<tr>
				<th class="text-center">WCL</th>
				<th class="text-center">NTPG/MPBG</th>
				<th class="text-center">BTBR</th>
				<th class="text-center">PVIT</th>
				<th class="text-center">MKCW</th>
				<th class="text-center">WANI GDS</th>
				<th class="text-center">MLSW</th>
				<th class="text-center">MELG</th>
				<th class="text-center">CKNI</th>
				<th class="text-center">Total</th>
				<th class="text-center">WCL</th>
				<th class="text-center">NTPG/MPBG</th>
				<th class="text-center">BTBR</th>
				<th class="text-center">PVIT</th>
				<th class="text-center">MKCW</th>
				<th class="text-center">WANI GDS</th>
				<th class="text-center">MLSW</th>
				<th class="text-center">MELG</th>
				<th class="text-center">CKNI</th>
				<th class="text-center">Total</th>
			</tr>
		</thead>
		<tbody>
			
			<cms:repeat '12' startcount='1' >
			<cms:set curr_month = "<cms:date "last day of march +<cms:show k_count /> months" format="M" />" scope='global' />
			<cms:set my_month = "<cms:date format='M' />" scope="global" />
			
			<cms:if my_month eq curr_month>
			<cms:repeat '3' startcount='1' >
			<tr>
				<th class="text-center" style="background: red;"><cms:show my_month /></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
				<th class="text-center" style="background: red;"></th>
			</tr>
			</cms:repeat>
			</cms:if>

			<tr>
				<td class="text-center">
					<strong>
						<cms:show curr_month /><br/>
					</strong>
				</td>
				<td class="text-center">
					<cms:set april2017 = "0" scope="global" />
					<cms:pages masterpage="coal.php" custom_field="tdate=<cms:date "last day of march +<cms:show k_count /> months" format="Y-m-d" />">
							<cms:set april2017 = "<cms:add april2017 hlf_ful />" scope="global" />
					</cms:pages>
					<cms:show april2017 />
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			
			
			</cms:repeat>
		</tbody>
	</table>
	<div class="gxcpl-ptop-50"></div>
	<div class="gxcpl-ptop-50"></div>
<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>