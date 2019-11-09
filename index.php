<?php require_once( 'couch/cms.php' ); ?>
<cms:template title="Dashboard" order="2" />
<cms:no_cache />
	<cms:embed 'header.html' />
	<style type="text/css">
		.nav-tabs {
		    border-bottom: 1px solid transparent !important;
		    margin-left: 15px;
		}
	</style>
	<div class="container-fluid">
		<div class="row">
			<div class="gxcpl-ptop-30"></div>

			
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active">
						<a href="#today_yesterday0" aria-controls="today_yesterday0" role="tab" data-toggle="tab">TODAY</a>
					</li>
					<li role="presentation">
						<a href="#today_yesterday1" aria-controls="today_yesterday1" role="tab" data-toggle="tab">YESTERDAY</a>
					</li>
					<!-- <li role="presentation">
						<a href="#search_train" aria-controls="search_train" role="tab" data-toggle="tab">
							SEARCH TRAIN
						</a>
					</li> -->
				</ul>
				<div class="gxcpl-ptop-20"></div>
				<!-- Separate as test for index page: time reduction -->
				<cms:set et_intchg="0" scope="global"/>
				<cms:set et_too="0" scope="global"/>
				<cms:set et_ho="0" scope="global"/>
				<cms:set et_tdho="0" scope="global"/>
				<cms:set et_crho="0" scope="global"/>

				<cms:set bd_intchg="0" scope="global"/>
				<cms:set bd_too="0" scope="global"/>
				<cms:set bd_ho="0" scope="global"/>
				<cms:set bd_tdho="0" scope="global"/>
				<cms:set bd_crho="0" scope="global"/>

				<cms:set cndb_intchg="0" scope="global"/>
				<cms:set cndb_too="0" scope="global"/>
				<cms:set cndb_ho="0" scope="global"/>
				<cms:set cndb_tdho="0" scope="global"/>
				<cms:set cndb_crho="0" scope="global"/>

				<cms:set ngp_intchg="0" scope="global"/>
				<cms:set ngp_too="0" scope="global"/>
				<cms:set ngp_ho="0" scope="global"/>
				<cms:set ngp_tdho="0" scope="global"/>
				<cms:set ngp_crho="0" scope="global"/>

				<cms:set gcc_intchg="0" scope="global"/>
				<cms:set gcc_too="0" scope="global"/>
				<cms:set gcc_ho="0" scope="global"/>
				<cms:set gcc_tdho="0" scope="global"/>
				<cms:set gcc_crho="0" scope="global"/>

				<cms:set cwa_intchg="0" scope="global"/>
				<cms:set cwa_too="0" scope="global"/>
				<cms:set cwa_ho="0" scope="global"/>
				<cms:set cwa_tdho="0" scope="global"/>
				<cms:set cwa_crho="0" scope="global"/>

				<cms:set caf_intchg="0" scope="global"/>
				<cms:set caf_too="0" scope="global"/>
				<cms:set caf_ho="0" scope="global"/>
				<cms:set caf_tdho="0" scope="global"/>
				<cms:set caf_crho="0" scope="global"/>

				<cms:set bpq_intchg="0" scope="global"/>
				<cms:set bpq_too="0" scope="global"/>
				<cms:set bpq_ho="0" scope="global"/>
				<cms:set bpq_tdho="0" scope="global"/>
				<cms:set bpq_crho="0" scope="global"/>

				<cms:set pmkt_intchg="0" scope="global"/>
				<cms:set pmkt_too="0" scope="global"/>
				<cms:set pmkt_ho="0" scope="global"/>
				<cms:set pmkt_tdho="0" scope="global"/>
				<cms:set pmkt_crho="0" scope="global"/>

				<cms:set local_intchg="0" scope="global"/>
				<cms:set local_too="0" scope="global"/>
				<cms:set local_ho="0" scope="global"/>
				<cms:set local_tdho="0" scope="global"/>
				<cms:set local_crho="0" scope="global"/>

				<!-- TODAY -->
				<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=<cms:pages masterpage='interchange.php'><cms:show interchange /></cms:pages> | is_interchanged='1' | arrival_date=<cms:date format='Y-m-d' /> | to_ho=0,1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " >
					<cms:set intchg="<cms:show interchange />" scope="global" />
					<cms:set toho="<cms:show to_ho />" scope="global" />
					<cms:if intchg eq 'ET' && toho eq '0'>
						<cms:incr et_too />
						<cms:set et_too="<cms:add et_intchg et_too />" scope="global" />
					<cms:else_if intchg eq 'ET' && toho eq '1' />
						<cms:incr et_ho />
						<cms:set et_ho="<cms:add et_intchg et_ho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BD' && toho eq '0'>
						<cms:incr bd_too />
						<cms:set bd_too="<cms:add bd_intchg bd_too />" scope="global" />
					<cms:else_if intchg eq 'BD' && toho eq '1' />
						<cms:incr bd_ho />
						<cms:set bd_ho="<cms:add bd_intchg bd_ho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CNDB' && toho eq '0'>
						<cms:incr cndb_too />
						<cms:set cndb_too="<cms:add cndb_intchg cndb_too />" scope="global" />
					<cms:else_if intchg eq 'CNDB' && toho eq '1' />
						<cms:incr cndb_ho />
						<cms:set cndb_ho="<cms:add cndb_intchg cndb_ho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'NGP' && toho eq '0'>
						<cms:incr ngp_too />
						<cms:set ngp_too="<cms:add ngp_intchg ngp_too />" scope="global" />
					<cms:else_if intchg eq 'NGP' && toho eq '1' />
						<cms:incr ngp_ho />
						<cms:set ngp_ho="<cms:add ngp_intchg ngp_ho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'GCC' && toho eq '0'>
						<cms:incr gcc_too />
						<cms:set gcc_too="<cms:add gcc_intchg gcc_too />" scope="global" />
					<cms:else_if intchg eq 'GCC' && toho eq '1' />
						<cms:incr gcc_ho />
						<cms:set gcc_ho="<cms:add gcc_intchg gcc_ho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CWA' && toho eq '0'>
						<cms:incr cwa_too />
						<cms:set cwa_too="<cms:add cwa_intchg cwa_too />" scope="global" />
					<cms:else_if intchg eq 'CWA' && toho eq '1' />
						<cms:incr cwa_ho />
						<cms:set cwa_ho="<cms:add cwa_intchg cwa_ho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CAF' && toho eq '0'>
						<cms:incr caf_too />
						<cms:set caf_too="<cms:add caf_intchg caf_too />" scope="global" />
					<cms:else_if intchg eq 'CAF' && toho eq '1' />
						<cms:incr caf_ho />
						<cms:set caf_ho="<cms:add caf_intchg caf_ho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BPQ' && toho eq '0'>
						<cms:incr bpq_too />
						<cms:set bpq_too="<cms:add bpq_intchg bpq_too />" scope="global" />
					<cms:else_if intchg eq 'BPQ' && toho eq '1' />
						<cms:incr bpq_ho />
						<cms:set bpq_ho="<cms:add bpq_intchg bpq_ho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'PMKT' && toho eq '0'>
						<cms:incr pmkt_too />
						<cms:set pmkt_too="<cms:add pmkt_intchg pmkt_too />" scope="global" />
					<cms:else_if intchg eq 'PMKT' && toho eq '1' />
						<cms:incr pmkt_ho />
						<cms:set pmkt_ho="<cms:add pmkt_intchg pmkt_ho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'LOCAL' && toho eq '0'>
						<cms:incr local_too />
						<cms:set local_too="<cms:add local_intchg local_too />" scope="global" />
					<cms:else_if intchg eq 'LOCAL' && toho eq '1' />
						<cms:incr local_ho />
						<cms:set local_ho="<cms:add local_intchg local_ho />" scope="global" />
					</cms:if>
				</cms:pages>

				<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=<cms:pages masterpage='interchange.php'><cms:show interchange /></cms:pages> | today_interchange='1' | arrival_date=<cms:date format='Y-m-d' /> | to_ho=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " >
					<cms:set intchg="<cms:show interchange />" scope="global" />
					<cms:if intchg eq 'ET'>
						<cms:incr et_tdho />
						<cms:set et_tdho="<cms:add et_intchg et_tdho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BD'>
						<cms:incr bd_tdho />
						<cms:set bd_tdho="<cms:add bd_intchg bd_tdho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CNDB'>
						<cms:incr cndb_tdho />
						<cms:set cndb_tdho="<cms:add cndb_intchg cndb_tdho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'NGP'>
						<cms:incr ngp_tdho />
						<cms:set ngp_tdho="<cms:add ngp_intchg ngp_tdho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'GCC'>
						<cms:incr gcc_tdho />
						<cms:set gcc_tdho="<cms:add gcc_intchg gcc_tdho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CWA'>
						<cms:incr cwa_tdho />
						<cms:set cwa_tdho="<cms:add cwa_intchg cwa_tdho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CAF'>
						<cms:incr caf_tdho />
						<cms:set caf_tdho="<cms:add caf_intchg caf_tdho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BPQ'>
						<cms:incr bpq_tdho />
						<cms:set bpq_tdho="<cms:add bpq_intchg bpq_tdho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'PMKT'>
						<cms:incr pmkt_tdho />
						<cms:set pmkt_tdho="<cms:add pmkt_intchg pmkt_tdho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'LOCAL'>
						<cms:incr local_tdho />
						<cms:set local_tdho="<cms:add local_intchg local_tdho />" scope="global" />
					</cms:if>
				</cms:pages>

				<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=<cms:pages masterpage='interchange.php'><cms:show interchange /></cms:pages> | is_interchanged<>'1' | arrival_date<=<cms:date format='Y-m-d' /> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " >
				<cms:set intchg="<cms:show interchange />" scope="global" />
					<cms:if intchg eq 'ET'>
						<cms:incr et_crho />
						<cms:set et_crho="<cms:add et_intchg et_crho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BD'>
						<cms:incr bd_crho />
						<cms:set bd_crho="<cms:add bd_intchg bd_crho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CNDB'>
						<cms:incr cndb_crho />
						<cms:set cndb_crho="<cms:add cndb_intchg cndb_crho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'NGP'>
						<cms:incr ngp_crho />
						<cms:set ngp_crho="<cms:add ngp_intchg ngp_crho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'GCC'>
						<cms:incr gcc_crho />
						<cms:set gcc_crho="<cms:add gcc_intchg gcc_crho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CWA'>
						<cms:incr cwa_crho />
						<cms:set cwa_crho="<cms:add cwa_intchg cwa_crho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CAF'>
						<cms:incr caf_crho />
						<cms:set caf_crho="<cms:add caf_intchg caf_crho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BPQ'>
						<cms:incr bpq_crho />
						<cms:set bpq_crho="<cms:add bpq_intchg bpq_crho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'PMKT'>
						<cms:incr pmkt_crho />
						<cms:set pmkt_crho="<cms:add pmkt_intchg pmkt_crho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'LOCAL'>
						<cms:incr local_crho />
						<cms:set local_crho="<cms:add local_intchg local_crho />" scope="global" />
					</cms:if>
				</cms:pages>
				
				<cms:set et_frho = "<cms:add et_tdho et_crho />" scope="global" />
				<cms:set bd_frho = "<cms:add bd_tdho bd_crho />" scope="global" />
			 	<cms:set cndb_frho = "<cms:add cndb_tdho cndb_crho />" scope="global" />
				<cms:set ngp_frho = "<cms:add ngp_tdho ngp_crho />" scope="global" />
				<cms:set gcc_frho = "<cms:add gcc_tdho gcc_crho />" scope="global" />
				<cms:set cwa_frho = "<cms:add cwa_tdho cwa_crho />" scope="global" />
				<cms:set caf_frho = "<cms:add caf_tdho caf_crho />" scope="global" />
				<cms:set bpq_frho = "<cms:add bpq_tdho bpq_crho />" scope="global" />
				<cms:set pmkt_frho = "<cms:add pmkt_tdho pmkt_crho />" scope="global" />
				<cms:set local_frho = "<cms:add local_tdho local_crho />" scope="global" />
				<!-- TODAY -->

				<!-- YESTERDAY -->
				<cms:set et_yintchg="0" scope="global"/>
				<cms:set et_ytoo="0" scope="global"/>
				<cms:set et_yho="0" scope="global"/>
				<cms:set et_ydho="0" scope="global"/>
				<cms:set et_ycrho="0" scope="global"/>

				<cms:set bd_yintchg="0" scope="global"/>
				<cms:set bd_ytoo="0" scope="global"/>
				<cms:set bd_yho="0" scope="global"/>
				<cms:set bd_ytho="0" scope="global"/>
				<cms:set bd_ycrho="0" scope="global"/>

				<cms:set cndb_yintchg="0" scope="global"/>
				<cms:set cndb_ytoo="0" scope="global"/>
				<cms:set cndb_yho="0" scope="global"/>
				<cms:set cndb_ytho="0" scope="global"/>
				<cms:set cndb_ycrho="0" scope="global"/>

				<cms:set ngp_yintchg="0" scope="global"/>
				<cms:set ngp_ytoo="0" scope="global"/>
				<cms:set ngp_yho="0" scope="global"/>
				<cms:set ngp_ydho="0" scope="global"/>
				<cms:set ngp_ycrho="0" scope="global"/>

				<cms:set gcc_yintchg="0" scope="global"/>
				<cms:set gcc_ytoo="0" scope="global"/>
				<cms:set gcc_yho="0" scope="global"/>
				<cms:set gcc_ydho="0" scope="global"/>
				<cms:set gcc_ycrho="0" scope="global"/>

				<cms:set cwa_yintchg="0" scope="global"/>
				<cms:set cwa_ytoo="0" scope="global"/>
				<cms:set cwa_yho="0" scope="global"/>
				<cms:set cwa_ydho="0" scope="global"/>
				<cms:set cwa_ycrho="0" scope="global"/>

				<cms:set caf_yintchg="0" scope="global"/>
				<cms:set caf_ytoo="0" scope="global"/>
				<cms:set caf_yho="0" scope="global"/>
				<cms:set caf_ydho="0" scope="global"/>
				<cms:set caf_ycrho="0" scope="global"/>

				<cms:set bpq_yintchg="0" scope="global"/>
				<cms:set bpq_ytoo="0" scope="global"/>
				<cms:set bpq_yho="0" scope="global"/>
				<cms:set bpq_ydho="0" scope="global"/>
				<cms:set bpq_ycrho="0" scope="global"/>

				<cms:set pmkt_yintchg="0" scope="global"/>
				<cms:set pmkt_ytoo="0" scope="global"/>
				<cms:set pmkt_yho="0" scope="global"/>
				<cms:set pmkt_ydho="0" scope="global"/>
				<cms:set pmkt_ycrho="0" scope="global"/>

				<cms:set local_yintchg="0" scope="global"/>
				<cms:set local_ytoo="0" scope="global"/>
				<cms:set local_yho="0" scope="global"/>
				<cms:set local_ydho="0" scope="global"/>
				<cms:set local_ycrho="0" scope="global"/>

				<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=<cms:pages masterpage='interchange.php'><cms:show interchange /></cms:pages> | is_interchanged='1' | arrival_date=<cms:date return='yesterday' format='Y-m-d'/> | to_ho=0,1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " >
					<cms:set intchg="<cms:show interchange />" scope="global" />
					<cms:set toho="<cms:show to_ho />" scope="global" />
					<cms:if intchg eq 'ET' && toho eq '0'>
						<cms:incr et_ytoo />
						<cms:set et_ytoo="<cms:add et_yintchg et_ytoo />" scope="global" />
					<cms:else_if intchg eq 'ET' && toho eq '1' />
						<cms:incr et_yho />
						<cms:set et_yho="<cms:add et_yintchg et_yho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BD' && toho eq '0'>
						<cms:incr bd_ytoo />
						<cms:set bd_ytoo="<cms:add bd_yintchg bd_ytoo />" scope="global" />
					<cms:else_if intchg eq 'BD' && toho eq '1' />
						<cms:incr bd_yho />
						<cms:set bd_yho="<cms:add bd_yintchg bd_yho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CNDB' && toho eq '0'>
						<cms:incr cndb_ytoo />
						<cms:set cndb_ytoo="<cms:add cndb_yintchg cndb_ytoo />" scope="global" />
					<cms:else_if intchg eq 'CNDB' && toho eq '1' />
						<cms:incr cndb_yho />
						<cms:set cndb_yho="<cms:add cndb_yintchg cndb_yho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'NGP' && toho eq '0'>
						<cms:incr ngp_ytoo />
						<cms:set ngp_ytoo="<cms:add ngp_yintchg ngp_ytoo />" scope="global" />
					<cms:else_if intchg eq 'NGP' && toho eq '1' />
						<cms:incr ngp_yho />
						<cms:set ngp_yho="<cms:add ngp_yintchg ngp_yho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'GCC' && toho eq '0'>
						<cms:incr gcc_ytoo />
						<cms:set gcc_ytoo="<cms:add gcc_yintchg gcc_ytoo />" scope="global" />
					<cms:else_if intchg eq 'GCC' && toho eq '1' />
						<cms:incr gcc_yho />
						<cms:set gcc_yho="<cms:add gcc_yintchg gcc_yho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CWA' && toho eq '0'>
						<cms:incr cwa_ytoo />
						<cms:set cwa_ytoo="<cms:add cwa_yintchg cwa_ytoo />" scope="global" />
					<cms:else_if intchg eq 'CWA' && toho eq '1' />
						<cms:incr cwa_yho />
						<cms:set cwa_yho="<cms:add cwa_yintchg cwa_yho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CAF' && toho eq '0'>
						<cms:incr caf_ytoo />
						<cms:set caf_ytoo="<cms:add caf_yintchg caf_ytoo />" scope="global" />
					<cms:else_if intchg eq 'CAF' && toho eq '1' />
						<cms:incr caf_yho />
						<cms:set caf_yho="<cms:add caf_yintchg caf_yho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BPQ' && toho eq '0'>
						<cms:incr bpq_ytoo />
						<cms:set bpq_ytoo="<cms:add bpq_yintchg bpq_ytoo />" scope="global" />
					<cms:else_if intchg eq 'BPQ' && toho eq '1' />
						<cms:incr bpq_yho />
						<cms:set bpq_yho="<cms:add bpq_yintchg bpq_yho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'PMKT' && toho eq '0'>
						<cms:incr pmkt_ytoo />
						<cms:set pmkt_ytoo="<cms:add pmkt_yintchg pmkt_ytoo />" scope="global" />
					<cms:else_if intchg eq 'PMKT' && toho eq '1' />
						<cms:incr pmkt_yho />
						<cms:set pmkt_yho="<cms:add pmkt_yintchg pmkt_yho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'LOCAL' && toho eq '0'>
						<cms:incr local_ytoo />
						<cms:set local_ytoo="<cms:add local_yintchg local_ytoo />" scope="global" />
					<cms:else_if intchg eq 'LOCAL' && toho eq '1' />
						<cms:incr local_yho />
						<cms:set local_yho="<cms:add local_yintchg local_yho />" scope="global" />
					</cms:if>
				</cms:pages>

				<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=<cms:pages masterpage='interchange.php'><cms:show interchange /></cms:pages> | today_interchange='1' | arrival_date=<cms:date return='yesterday' format='Y-m-d'/> | to_ho=1 | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " >
					<cms:set intchg="<cms:show interchange />" scope="global" />
					<cms:if intchg eq 'ET'>
						<cms:incr et_ydho />
						<cms:set et_ydho="<cms:add et_yintchg et_ydho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BD'>
						<cms:incr bd_ydho />
						<cms:set bd_ydho="<cms:add bd_yintchg bd_ydho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CNDB'>
						<cms:incr cndb_ydho />
						<cms:set cndb_ydho="<cms:add cndb_yintchg cndb_ydho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'NGP'>
						<cms:incr ngp_ydho />
						<cms:set ngp_ydho="<cms:add ngp_yintchg ngp_ydho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'GCC'>
						<cms:incr gcc_ydho />
						<cms:set gcc_ydho="<cms:add gcc_yintchg gcc_ydho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CWA'>
						<cms:incr cwa_ydho />
						<cms:set cwa_ydho="<cms:add cwa_yintchg cwa_ydho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CAF'>
						<cms:incr caf_ydho />
						<cms:set caf_ydho="<cms:add caf_yintchg caf_ydho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BPQ'>
						<cms:incr bpq_ydho />
						<cms:set bpq_ydho="<cms:add bpq_yintchg bpq_ydho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'PMKT'>
						<cms:incr pmkt_ydho />
						<cms:set pmkt_ydho="<cms:add pmkt_yintchg pmkt_ydho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'LOCAL'>
						<cms:incr local_ydho />
						<cms:set local_ydho="<cms:add local_yintchg local_ydho />" scope="global" />
					</cms:if>
				</cms:pages>

				<cms:pages masterpage="pointwise-interchange.php" custom_field="interchange=<cms:pages masterpage='interchange.php'><cms:show interchange /></cms:pages> | is_interchanged<>'1' | arrival_date<=<cms:date return='yesterday' format='Y-m-d'/> | to_ho=1 | today_interchange='1' | tr_name<>TA | tr_name<>ta | tr_name<>Ta | tr_name<>tA | tr_name<>LA | tr_name<>la | tr_name<>La | tr_name<>lA " >
				<cms:set intchg="<cms:show interchange />" scope="global" />
					<cms:if intchg eq 'ET'>
						<cms:incr et_ycrho />
						<cms:set et_ycrho="<cms:add et_yintchg et_ycrho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BD'>
						<cms:incr bd_ycrho />
						<cms:set bd_ycrho="<cms:add bd_yintchg bd_ycrho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CNDB'>
						<cms:incr cndb_ycrho />
						<cms:set cndb_ycrho="<cms:add cndb_yintchg cndb_ycrho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'NGP'>
						<cms:incr ngp_ycrho />
						<cms:set ngp_ycrho="<cms:add ngp_yintchg ngp_ycrho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'GCC'>
						<cms:incr gcc_ycrho />
						<cms:set gcc_ycrho="<cms:add gcc_yintchg gcc_ycrho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CWA'>
						<cms:incr cwa_ycrho />
						<cms:set cwa_ycrho="<cms:add cwa_yintchg cwa_ycrho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'CAF'>
						<cms:incr caf_ycrho />
						<cms:set caf_ycrho="<cms:add caf_yintchg caf_ycrho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'BPQ'>
						<cms:incr bpq_ycrho />
						<cms:set bpq_ycrho="<cms:add bpq_yintchg bpq_ycrho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'PMKT'>
						<cms:incr pmkt_ycrho />
						<cms:set pmkt_ycrho="<cms:add pmkt_yintchg pmkt_ycrho />" scope="global" />
					</cms:if>
					<cms:if intchg eq 'LOCAL'>
						<cms:incr local_ycrho />
						<cms:set local_ycrho="<cms:add local_yintchg local_ycrho />" scope="global" />
					</cms:if>
				</cms:pages>
				
				<cms:set et_yfrho = "<cms:add et_ydho et_ycrho />" scope="global" />
				<cms:set bd_yfrho = "<cms:add bd_ydho bd_ycrho />" scope="global" />
			 	<cms:set cndb_yfrho = "<cms:add cndb_ydho cndb_ycrho />" scope="global" />
				<cms:set ngp_yfrho = "<cms:add ngp_ydho ngp_ycrho />" scope="global" />
				<cms:set gcc_yfrho = "<cms:add gcc_ydho gcc_ycrho />" scope="global" />
				<cms:set cwa_yfrho = "<cms:add cwa_ydho cwa_ycrho />" scope="global" />
				<cms:set caf_yfrho = "<cms:add caf_ydho caf_ycrho />" scope="global" />
				<cms:set bpq_yfrho = "<cms:add bpq_ydho bpq_ycrho />" scope="global" />
				<cms:set pmkt_yfrho = "<cms:add pmkt_ydho pmkt_ycrho />" scope="global" />
				<cms:set local_yfrho = "<cms:add local_ydho local_ycrho />" scope="global" />
				<!-- YESTERDAY -->
				<!-- Separate as test for index page: time reduction -->	

				<div class="tab-content">
					<!-- Today -->
					<div role="tabpanel" class="tab-pane active" id="today_yesterday0">
						<!-- WCR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=ET&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
										<div class="gxcpl-dashboard-box-card-header text-center">
											<strong>WCR</strong>
										</div>
										<div class="gxcpl-dashboard-box-card-body">
											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr style="position: relative;">
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr style="position: relative;">
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:show et_too />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:show et_ho />/<cms:show et_frho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
									</a>
									<div class="gxcpl-dashboard-box-card-footer">
										<strong><center>Point-Wise</center></strong>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr style="position: relative;">
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													ET
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show et_too />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show et_ho />/<cms:show et_frho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=ET&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
										</table>
									</div>
									<!-- Stock-wise ET -->
									<div class="gxcpl-dashboard-box-card-footer-extended">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" data-target="#collapseOne">
												<strong class="panel-title">
													<a class="accordion-toggle" role="button" aria-expanded="true" aria-controls="collapseOne">
														Stock-wise
													</a>
												</strong>
											</div>
											<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
												<div class="panel-body">
													<cms:set my_count='1' scope='global' />
													<table width="100%">
														<thead>
															<tr style="position: relative; border-top: 1px solid rgba(255, 255, 255, 0.39); border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<th>
																	
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
															<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<td>
																	<cms:show my_count />
																	<cms:incr my_count />
																</td>
																<td>
																	<cms:show k_page_title />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=ET | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=ET | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
															</tr>
															</cms:pages>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- Stock-wise ET -->
								</div>
							</div>
						</div>
						<!-- WCR -->

						<!-- CR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=BD&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
										<div class="gxcpl-dashboard-box-card-header text-center	">
											<strong>CR</strong>
										</div>
										<div class="gxcpl-dashboard-box-card-body">
											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr style="position: relative;">
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr style="position: relative;">
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add bd_too cndb_too />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add  bd_ho cndb_ho />/<cms:add bd_frho cndb_frho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
									</a>
									<div class="gxcpl-dashboard-box-card-footer">
										<strong><center>Point-Wise</center></strong>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr style="position: relative;">
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<!-- BD Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													BD
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bd_too />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bd_ho />/<cms:show bd_frho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=BD&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- BD Table -->

											<!-- CNDB Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													CNDB
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cndb_too />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cndb_ho />/<cms:show cndb_frho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=CNDB&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- CNDB Table -->
										</table>
									</div>
									<!-- Stock-wise BD,CNDB -->
									<div class="gxcpl-dashboard-box-card-footer-extended">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" data-target="#collapseTwo">
												<strong class="panel-title">
													<a class="accordion-toggle" role="button" aria-expanded="true" aria-controls="collapseTwo">
														Stock-wise
													</a>
												</strong>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
												<div class="panel-body">
													<cms:set my_count='1' scope='global' />
													<table width="100%">
														<thead>
															<tr style="position: relative; border-top: 1px solid rgba(255, 255, 255, 0.39); border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<th>
																	
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
															<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<td>
																	<cms:show my_count />
																	<cms:incr my_count />
																</td>
																<td>
																	<cms:show k_page_title />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=BD,CNDB | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=BD,CNDB | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
															</tr>
															</cms:pages>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- Stock-wise BD,CNDB -->
								</div>
							</div>
						</div>
						<!-- CR -->

						<!-- SECR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=NGP&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
										<div class="gxcpl-dashboard-box-card-header text-center	">
											<strong>SECR</strong>
										</div>
										<div class="gxcpl-dashboard-box-card-body">
											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr style="position: relative;">
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr style="position: relative;">
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add ngp_too gcc_too cwa_too caf_too />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add ngp_ho gcc_ho cwa_ho caf_ho />/<cms:add ngp_frho gcc_frho cwa_frho caf_frho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
									</a>
									<div class="gxcpl-dashboard-box-card-footer">
										<strong><center>Point-Wise</center></strong>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr style="position: relative;">
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<!-- NGP Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													NGP
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show ngp_too />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show ngp_ho />/<cms:show ngp_frho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=NGP&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- NGP Table -->

											<!-- GCC Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													GCC
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show gcc_too />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show gcc_ho />/<cms:show gcc_frho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=GCC&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- GCC Table -->

											<!-- CWA Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													CWA
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cwa_too />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cwa_ho />/<cms:show cwa_frho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=CWA&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- CWA Table -->

											<!-- CAF Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													CAF
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show caf_too />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show caf_ho />/<cms:show caf_frho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=CAF&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- CAF Table -->
										</table>
									</div>
									<!-- Stock-wise NGP,GCC,CWA,CAF -->
									<div class="gxcpl-dashboard-box-card-footer-extended">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" data-target="#collapseThree">
												<strong class="panel-title">
													<a class="accordion-toggle" role="button" aria-expanded="true" aria-controls="collapseThree">
														Stock-wise
													</a>
												</strong>
											</div>
											<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
												<div class="panel-body">
													<cms:set my_count='1' scope='global' />
													<table width="100%">
														<thead>
															<tr style="position: relative; border-top: 1px solid rgba(255, 255, 255, 0.39); border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<th>
																	
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
															<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<td>
																	<cms:show my_count />
																	<cms:incr my_count />
																</td>
																<td>
																	<cms:show k_page_title />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=NGP,GCC,CWA,CAF | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=NGP,GCC,CWA,CAF | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
															</tr>
															</cms:pages>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- Stock-wise NGP,GCC,CWA,CAF -->
								</div>
							</div>
						</div>
						<!-- SECR -->

						<!-- SCR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=BPQ&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
										<div class="gxcpl-dashboard-box-card-header text-center	">
											<strong>SCR</strong>
										</div>
										<div class="gxcpl-dashboard-box-card-body">
											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr style="position: relative;">
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr style="position: relative;">
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add bpq_too pmkt_too />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add bpq_ho pmkt_ho />/<cms:add bpq_frho pmkt_frho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
									</a>
									<div class="gxcpl-dashboard-box-card-footer">
										<strong><center>Point-Wise</center></strong>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr style="position: relative;">
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<!-- BPQ Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													BPQ
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bpq_too />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bpq_ho />/<cms:show bpq_frho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=BPQ&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- BPQ Table -->

											<!-- PMKT Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													PMKT
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show pmkt_too />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show pmkt_ho />/<cms:show pmkt_frho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=PMKT&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- PMKT Table -->
										</table>
									</div>
									<!-- Stock-wise BPQ,PMKT -->
									<div class="gxcpl-dashboard-box-card-footer-extended">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingFour" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" data-target="#collapseFour">
												<strong class="panel-title">
													<a class="accordion-toggle" role="button" aria-expanded="true" aria-controls="collapseFour">
														Stock-wise
													</a>
												</strong>
											</div>
											<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
												<div class="panel-body">
													<cms:set my_count='1' scope='global' />
													<table width="100%">
														<thead>
															<tr style="position: relative; border-top: 1px solid rgba(255, 255, 255, 0.39); border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<th>
																	
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
															<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<td>
																	<cms:show my_count />
																	<cms:incr my_count />
																</td>
																<td>
																	<cms:show k_page_title />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=BPQ,PMKT | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=BPQ,PMKT | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
															</tr>
															</cms:pages>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- Stock-wise BPQ,PMKT -->
								</div>
							</div>
						</div>
						<!-- SCR -->
						
						<!-- LOCAL -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=LOCAL&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
										<div class="gxcpl-dashboard-box-card-header text-center	">
											<strong>LOCAL</strong>
										</div>
										<div class="gxcpl-dashboard-box-card-body">
											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr style="position: relative;">
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr style="position: relative;">
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:show local_too />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:show local_ho />/<cms:show local_frho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
									</a>
									<div class="gxcpl-dashboard-box-card-footer">
										<strong><center>Point-Wise</center></strong>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr style="position: relative;">
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													LOCAL
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show local_too />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show local_ho />/<cms:show local_frho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=LOCAL&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
										</table>
									</div>
									<!-- Stock-wise LOCAL -->
									<div class="gxcpl-dashboard-box-card-footer-extended">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingFive" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" data-target="#collapseFive">
												<strong class="panel-title">
													<a class="accordion-toggle" role="button" aria-expanded="true" aria-controls="collapseFive">
														Stock-wise
													</a>
												</strong>
											</div>
											<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
												<div class="panel-body">
													<cms:set my_count='1' scope='global' />
													<table width="100%">
														<thead>
															<tr style="position: relative; border-top: 1px solid rgba(255, 255, 255, 0.39); border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<th>
																	
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
															<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<td>
																	<cms:show my_count />
																	<cms:incr my_count />
																</td>
																<td>
																	<cms:show k_page_title />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=LOCAL | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=LOCAL | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
															</tr>
															</cms:pages>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- Stock-wise LOCAL -->
								</div>
							</div>
						</div>
						<!-- LOCAL -->
					</div>
					<!-- Today -->

					<!-- Yesterday -->
					<div role="tabpanel" class="tab-pane" id="today_yesterday1">
						<!-- WCR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=ET&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
										<div class="gxcpl-dashboard-box-card-header text-center	">
											<strong>WCR</strong>
										</div>
										<div class="gxcpl-dashboard-box-card-body">
											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr style="position: relative;">
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr style="position: relative;">
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:show et_ytoo />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:show et_yho />/<cms:show et_yfrho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
									</a>
									<div class="gxcpl-dashboard-box-card-footer">
										<strong><center>Point-Wise</center></strong>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr style="position: relative;">
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													ET
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show et_ytoo />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show et_yho />/<cms:show et_yfrho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=ET&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
										</table>
									</div>
									<!-- Stock-wise ET -->
									<div class="gxcpl-dashboard-box-card-footer-extended">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingSix" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" data-target="#collapseSix">
												<strong class="panel-title">
													<a class="accordion-toggle" role="button" aria-expanded="true" aria-controls="collapseSix">
														Stock-wise
													</a>
												</strong>
											</div>
											<div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
												<div class="panel-body">
													<cms:set my_count='1' scope='global' />
													<table width="100%">
														<thead>
															<tr style="position: relative; border-top: 1px solid rgba(255, 255, 255, 0.39); border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<th>
																	
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
															<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<td>
																	<cms:show my_count />
																	<cms:incr my_count />
																</td>
																<td>
																	<cms:show k_page_title />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=ET | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date return='yesterday' format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=ET | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date return='yesterday' format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
															</tr>
															</cms:pages>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- Stock-wise ET -->
								</div>
							</div>
						</div>
						<!-- WCR -->

						<!-- CR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=BD&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
										<div class="gxcpl-dashboard-box-card-header text-center	">
											<strong>CR</strong>
										</div>
										<div class="gxcpl-dashboard-box-card-body">
											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr style="position: relative;">
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr style="position: relative;">
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add bd_ytoo cndb_ytoo />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add  bd_yho cndb_yho />/<cms:add bd_yfrho cndb_yfrho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
									</a>
									<div class="gxcpl-dashboard-box-card-footer">
										<strong><center>Point-Wise</center></strong>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr style="position: relative;">
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<!-- BD Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													BD
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bd_ytoo />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bd_yho />/<cms:show bd_yfrho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=BD&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- BD Table -->

											<!-- CNDB Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													CNDB
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cndb_ytoo />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cndb_yho />/<cms:show cndb_yfrho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date format='Y-m-d' />&interchange=CNDB&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- CNDB Table -->
										</table>
									</div>
									<!-- Stock-wise BD,CNDB -->
									<div class="gxcpl-dashboard-box-card-footer-extended">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingSeven" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" data-target="#collapseSeven">
												<strong class="panel-title">
													<a class="accordion-toggle" role="button" aria-expanded="true" aria-controls="collapseSeven">
														Stock-wise
													</a>
												</strong>
											</div>
											<div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
												<div class="panel-body">
													<cms:set my_count='1' scope='global' />
													<table width="100%">
														<thead>
															<tr style="position: relative; border-top: 1px solid rgba(255, 255, 255, 0.39); border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<th>
																	
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
															<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<td>
																	<cms:show my_count />
																	<cms:incr my_count />
																</td>
																<td>
																	<cms:show k_page_title />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=BD,CNDB | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date return='yesterday' format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=BD,CNDB | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date return='yesterday' format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
															</tr>
															</cms:pages>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- Stock-wise BD,CNDB -->
								</div>
							</div>
						</div>
						<!-- CR -->

						<!-- SECR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=NGP&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
										<div class="gxcpl-dashboard-box-card-header text-center	">
											<strong>SECR</strong>
										</div>
										<div class="gxcpl-dashboard-box-card-body">
											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr style="position: relative;">
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr style="position: relative;">
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add ngp_ytoo gcc_ytoo cwa_ytoo caf_ytoo />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add ngp_yho gcc_yho cwa_yho caf_yho />/<cms:add ngp_yfrho gcc_yfrho cwa_yfrho caf_yfrho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
									</a>
									<div class="gxcpl-dashboard-box-card-footer">
										<strong><center>Point-Wise</center></strong>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr style="position: relative;">
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<!-- NGP Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													NGP
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show ngp_ytoo />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show ngp_yho />/<cms:show ngp_yfrho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=NGP&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- NGP Table -->

											<!-- GCC Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													GCC
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show gcc_ytoo />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show gcc_yho />/<cms:show gcc_yfrho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=GCC&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- GCC Table -->

											<!-- CWA Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													CWA
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cwa_ytoo />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show cwa_yho />/<cms:show cwa_yfrho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=CWA&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- CWA Table -->

											<!-- CAF Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													CAF
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show caf_ytoo />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show caf_yho />/<cms:show caf_yfrho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=CAF&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- CAF Table -->
										</table>
									</div>
									<!-- Stock-wise NGP,GCC,CWA,CAF -->
									<div class="gxcpl-dashboard-box-card-footer-extended">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingEight" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" data-target="#collapseEight">
												<strong class="panel-title">
													<a class="accordion-toggle" role="button" aria-expanded="true" aria-controls="collapseEight">
														Stock-wise
													</a>
												</strong>
											</div>
											<div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
												<div class="panel-body">
													<cms:set my_count='1' scope='global' />
													<table width="100%">
														<thead>
															<tr style="position: relative; border-top: 1px solid rgba(255, 255, 255, 0.39); border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<th>
																	
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
															<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<td>
																	<cms:show my_count />
																	<cms:incr my_count />
																</td>
																<td>
																	<cms:show k_page_title />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=NGP,GCC,CWA,CAF | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date return='yesterday' format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=NGP,GCC,CWA,CAF | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date return='yesterday' format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
															</tr>
															</cms:pages>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- Stock-wise NGP,GCC,CWA,CAF -->
								</div>
							</div>
						</div>
						<!-- SECR -->

						<!-- SCR -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=BPQ&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
										<div class="gxcpl-dashboard-box-card-header text-center	">
											<strong>SCR</strong>
										</div>
										<div class="gxcpl-dashboard-box-card-body">
											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr style="position: relative;">
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr style="position: relative;">
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:add bpq_ytoo pmkt_ytoo />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:add bpq_yho pmkt_yho />/<cms:add bpq_yfrho pmkt_yfrho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
									</a>
									<div class="gxcpl-dashboard-box-card-footer">
										<strong><center>Point-Wise</center></strong>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr style="position: relative;">
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<!-- BPQ Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													BPQ
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bpq_ytoo />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show bpq_yho />/<cms:show bpq_yfrho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=BPQ&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- BPQ Table -->

											<!-- PMKT Table -->
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													PMKT
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show pmkt_ytoo />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show pmkt_yho />/<cms:show pmkt_yfrho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=PMKT&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
											<!-- PMKT Table -->
										</table>
									</div>
									<!-- Stock-wise BPQ,PMKT -->
									<div class="gxcpl-dashboard-box-card-footer-extended">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingNine" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" data-target="#collapseNine">
												<strong class="panel-title">
													<a class="accordion-toggle" role="button" aria-expanded="true" aria-controls="collapseNine">
														Stock-wise
													</a>
												</strong>
											</div>
											<div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
												<div class="panel-body">
													<cms:set my_count='1' scope='global' />
													<table width="100%">
														<thead>
															<tr style="position: relative; border-top: 1px solid rgba(255, 255, 255, 0.39); border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<th>
																	
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
															<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<td>
																	<cms:show my_count />
																	<cms:incr my_count />
																</td>
																<td>
																	<cms:show k_page_title />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=BPQ,PMKT | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date return='yesterday' format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=BPQ,PMKT | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date return='yesterday' format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
															</tr>
															</cms:pages>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- Stock-wise BPQ,PMKT -->
								</div>
							</div>
						</div>
						<!-- SCR -->
						
						<!-- LOCAL -->
						<div class="col-md-2 col-sm-6 col-xs-6">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=LOCAL&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
										<div class="gxcpl-dashboard-box-card-header text-center	">
											<strong>LOCAL</strong>
										</div>
										<div class="gxcpl-dashboard-box-card-body">
											<!-- TOTAL TO & HO -->
											<table width="100%;">
												<tr style="position: relative;">
													<th></th>
													<th class="text-center gxcpl-table-padding">T/O</th>
													<th class="text-center gxcpl-table-padding">H/O</th>
												</tr>
												<tr style="position: relative;">
													<th class="text-center gxcpl-table-padding">TOTAL</th>
													<td class="text-center gxcpl-table-padding">
														<cms:show local_ytoo />
													</td>
													<td class="text-center gxcpl-table-padding">
														<cms:show local_yho />/<cms:show local_yfrho />
													</td>
												</tr>
											</table>
											<!-- TOTAL TO & HO -->
										</div>
									</a>
									<div class="gxcpl-dashboard-box-card-footer">
										<strong><center>Point-Wise</center></strong>
										<!-- INDIVIDUAL TO & HO -->
										<table width="100%">
											<tr style="position: relative;">
												<th class="text-center gxcpl-table-padding">
													
												</th>
												<th class="text-center gxcpl-table-padding">
													T/O
												</th>
												<th class="text-center gxcpl-table-padding">
													H/O
												</th>
											</tr>
											<tr style="position: relative;">
												<td class="text-center gxcpl-table-padding">
													LOCAL
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show local_ytoo />
												</td>
												<td class="text-center gxcpl-table-padding">
													<cms:show local_yho />/<cms:show local_yfrho />
												</td>
												<td class="overlay">
													<a href="<cms:show k_site_link />ptwise-int-report.php?arrival_date=<cms:date return='yesterday' format='Y-m-d'/>&interchange=LOCAL&submit=SEARCH&k_hid_quicksearch=quicksearch&nc=1" class="gxcpl-fc-21 pointer">
														<div style="width: 100%; height: 17px;">
															
														</div>
													</a>
												</td>
											</tr>
										</table>
									</div>
									<!-- Stock-wise LOCAL -->
									<div class="gxcpl-dashboard-box-card-footer-extended">
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingTen" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" data-target="#collapseTen">
												<strong class="panel-title">
													<a class="accordion-toggle" role="button" aria-expanded="true" aria-controls="collapseTen">
														Stock-wise
													</a>
												</strong>
											</div>
											<div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
												<div class="panel-body">
													<cms:set my_count='1' scope='global' />
													<table width="100%">
														<thead>
															<tr style="position: relative; border-top: 1px solid rgba(255, 255, 255, 0.39); border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<th>
																	
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
															<tr style="position: relative; padding-bottom: 5px; border-bottom: 1px solid rgba(255, 255, 255, 0.39);">
																<td>
																	<cms:show my_count />
																	<cms:incr my_count />
																</td>
																<td>
																	<cms:show k_page_title />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=LOCAL | to_ho=0 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date return='yesterday' format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
																<td>
																	<cms:pages masterpage='pointwise-interchange.php' custom_field="interchange=LOCAL | to_ho=1 | raketype=<cms:show k_page_title /> | arrival_date=<cms:date return='yesterday' format='Y-m-d' /> | is_interchanged='1'" count_only='1' />
																</td>
															</tr>
															</cms:pages>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- Stock-wise LOCAL -->
								</div>
							</div>
						</div>
						<!-- LOCAL -->
					</div>
					<!-- Yesterday -->
					<!-- Stable Train -->
					<div class="col-md-2 col-sm-6 col-xs-6">
						<a href="<cms:show k_site_link />stable-train.php" class="gxcpl-fc-21 pointer">
							<div class="gxcpl-dashboard-box gxcpl-shadow-1 gxcpl-br-2 gxcpl-bg-white">
								<div class="gxcpl-dashboard-box-card">
									<div class="gxcpl-dashboard-box-card-header text-center	">
										<strong>STABLE TRAIN</strong>
									</div>
									<div class="gxcpl-dashboard-box-card-body text-center">
										<div class="gxcpl-ptop-20"></div>
										<strong>Total Stable Trains</strong>
									</div>
									<div class="gxcpl-dashboard-box-card-footer">
										<div class="text-center" style="font-size: 50px;">
											<div class="gxcpl-ptop-20"></div>
											<cms:pages masterpage='pointwise-interchange.php' custom_field="is_stabled='1' | is_interchanged<>1 " order='asc' orderby='arrival_time' count_only='1' />
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<!-- Stable Train -->
					
					<cms:ignore>
					<!-- Search Train -->
					<div role="tabpanel" class="tab-pane" id="search_train">
						<!-- Search Train Across The Board -->
						<div class="col-md-3 col-md-offset-5">
							<div class="gxcpl-card">
								<div class="gxcpl-card-header">
									<h4 class="gxcpl-no-margin text-center">Search Train Across The Board</h4>
								</div>
								<div class="gxcpl-card-body gxcpl-padding-15 text-center">
									<!-- Modal Button -->
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-primary btn-sm gxcpl-fc-white gxcpl-fw-700" data-toggle="modal" data-target=".bs-example-modal-lg" data-keyboard="false" data-backdrop="static">
										<i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Click to search
									</button>
									<!-- Button trigger modal -->
									<!-- Modal -->
									<div class="modal fade bs-example-modal-lg  text-center" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
									  	<div class="modal-dialog gxcpl-modal-lg" role="document">
									    	<div class="modal-content">
									      		<div class="modal-header gxcpl-padding-5">
									        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									        			<span aria-hidden="true" style="margin-right: 10px;">&times;</span>
									        		</button>
									        		<h4 class="modal-title" id="myModalLabel1">
									        			<strong>Search Train Across The Board</strong>
									        		</h4>
									      		</div>
											    <div class="modal-body" style="background: #ebebeb;">
											       	<iframe class="embed-responsive-item" width="100%" height="470" frameborder="0" name="pointwise" src="<cms:show k_site_link />/pointwise-dash.php" allowfullscreen>
											        </iframe>
											    </div>
									      		<div class="gxcpl-padding-5 btn-group" role="group">
									        		<button type="button" onclick="refreshIframept();" class="btn btn-danger gxcpl-fc-21 gxcpl-fw-700" data-dismiss="modal">
									        			<i class="fa fa-times" aria-hidden="true"></i> Close
									        		</button>
									        		<button type="button" onclick="refreshIframept();" class="btn btn-info gxcpl-fc-21 gxcpl-fw-700">
									        			<i class="fa fa-refresh" aria-hidden="true"></i> Refresh
									        		</button>
									      		</div>
									    	</div>
									  	</div>
									</div>
									<!-- Modal -->
									<!-- Modal Button -->
								</div>
							</div>
							<div class="gxcpl-ptop-10"></div>
						</div>
						<!-- Search Train Across The Board -->
					</div>
					<!-- Search Train -->
					</cms:ignore>
				</div>
			</div>
		</div>
		<div class="gxcpl-ptop-30"></div>
	</div>
	<!-- Content Here -->

	<div class="gxcpl-ptop-50"></div>
	<cms:embed 'footer.html' />
<?php COUCH::invoke( ); ?>