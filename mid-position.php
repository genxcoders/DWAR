<?php require_once( 'couch/cms.php' ); ?>
<!-- 

    29/06/2019
    ==========
    1. Converted all Total Fields to disabled using .gxcpl-disable
    2. Added .highlight call to Total <tr>
    3. Added blank <tr style="height: 20px !important;">...</tr> above <tr>Total</tr> for asthetics.
    4. Adjusted Ineffective and Surplus Text field | Does it need to have .gxcpl-disabled
    5. Added value="0" and readonly="1" to all Total Fields in #1
    6. Replaced value="0" with placeholder="0" as the value was being replaced with blank because of the javascript used to create the runtime addition logic

-->
<cms:template title="Midnight Position" clonable="1" routable='1' parent='_mdpt_' order='1'>
      <!-- DATE on Every page -->
      <cms:editable name="mdp_date" label="Mid-Night Position Date" type="datetime" allow_time='0' required="1" format="Y-m-d" order="1" />
      <!-- DATE on Every page -->
    
        <!-- Midnight Position 1 RECEIPTS -->
        <cms:editable name="rcpt_md_pt_1" label="RECEIPTS" type="group" order="2" >
            <cms:editable name="rcpt_md_pt" label="Midnight Position" type="row" >
                  <!-- ET -->
                <cms:editable name="rcpt_wcr" label="WCR" type="text" group="rcpt_md_pt_1" class="col-md-2" order="1" />
                <cms:editable name="rcpt_et" label="ET" type="text" group="rcpt_md_pt_1" class="col-md-2" order="2" />
                <cms:editable name="rcpt_fc_et_tns_1" label="Forecast ET Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="3" />
                <cms:editable name="rcpt_fc_et_tns_2" label="Forecast ET Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="4" />
                <cms:editable name="rcpt_et_wgns" label="Wagons ET" type="text" group="rcpt_md_pt_1" class="col-md-2" order="5" />
                <cms:editable name="rcpt_actual_et_tns_1" label="Actual ET Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="6" />
                <cms:editable name="rcpt_actual_et_tns_2" label="Actual ET Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="7" />
                <cms:editable name="rcpt_et_cog" label="ET Cog" type="text" group="rcpt_md_pt_1" class="col-md-2" order="8" />
                <cms:editable name="rcpt_et_ta" label="ET TA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="9" />
                <cms:editable name="rcpt_et_la" label="ET LA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="10" />
                <cms:editable name="rcpt_et_d" label="ET D" type="text" group="rcpt_md_pt_1" class="col-md-2" order="11" />
                <cms:editable name="rcpt_et_oth" label="ET OTH" type="text" group="rcpt_md_pt_1" class="col-md-2" order="12" />
                <cms:editable name="rcpt_et_ac" label="ET AC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="13" />
                <cms:editable name="rcpt_et_dsl" label="ET DSL" type="text" group="rcpt_md_pt_1" class="col-md-2" order="14" />
                <cms:editable name="rcpt_et_ldd" label="ET Ldd" type="text" group="rcpt_md_pt_1" class="col-md-2" order="15" />
                <cms:editable name="rcpt_et_emp" label="ET Emp" type="text" group="rcpt_md_pt_1" class="col-md-2" order="16" />
                <cms:editable name="rcpt_et_mt" label="ET MT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="17" />
                <cms:editable name="rcpt_et_shortfall" label="ET Shortfall" type="text" group="rcpt_md_pt_1" class="col-md-12" order="18" />
                <!-- ET -->

                <!-- NGP -->
                <cms:editable name="rcpt_secr_ngp" label="SECR NGP" type="text" group="rcpt_md_pt_1" class="col-md-2" order="19" />
                <cms:editable name="rcpt_ngp" label="NGP" type="text" group="rcpt_md_pt_1" class="col-md-2" order="20" />
                <cms:editable name="rcpt_fc_ngp_tns_1" label="Forecast NGP Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="21" />
                <cms:editable name="rcpt_fc_ngp_tns_2" label="Forecast NGP Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="22" />
                <cms:editable name="rcpt_ngp_wgns" label="Wagons NGP" type="text" group="rcpt_md_pt_1" class="col-md-2" order="23" />
                <cms:editable name="rcpt_actual_ngp_tns_1" label="Actual NGP Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="24" />
                <cms:editable name="rcpt_actual_ngp_tns_2" label="Actual NGP Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="25" />
                <cms:editable name="rcpt_ngp_cog" label="NGP Cog" type="text" group="rcpt_md_pt_1" class="col-md-2" order="26" />
                <cms:editable name="rcpt_ngp_ta" label="NGP TA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="27" />
                <cms:editable name="rcpt_ngp_la" label="NGP LA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="28" />
                <cms:editable name="rcpt_ngp_d" label="NGP D" type="text" group="rcpt_md_pt_1" class="col-md-2" order="29" />
                <cms:editable name="rcpt_ngp_oth" label="NGP OTH" type="text" group="rcpt_md_pt_1" class="col-md-2" order="30" />
                <cms:editable name="rcpt_ngp_ac" label="NGP AC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="31" />
                <cms:editable name="rcpt_ngp_dsl" label="NGP DSL" type="text" group="rcpt_md_pt_1" class="col-md-2" class="col-md-2" order="32" />
                <cms:editable name="rcpt_ngp_ldd" label="NGP Ldd" type="text" group="rcpt_md_pt_1" class="col-md-2" order="33" />
                <cms:editable name="rcpt_ngp_emp" label="NGP Emp" type="text" group="rcpt_md_pt_1" class="col-md-2" order="34" />
                <cms:editable name="rcpt_ngp_mt" label="NGP MT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="35" />
                <cms:editable name="rcpt_ngp_shortfall" label="NGP Shortfall" type="text" group="rcpt_md_pt_1" class="col-md-12" order="36" />
                <!-- NGP -->

                <!-- GCC -->
                <cms:editable name="rcpt_secr_gcc" label="SECR GCC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="37" />
                <cms:editable name="rcpt_gcc" label="GCC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="38" />
                <cms:editable name="rcpt_fc_gcc_tns_1" label="Forecast GCC Train 1" type="text" class="col-md-2" group="rcpt_md_pt_1" order="39" />
                <cms:editable name="rcpt_fc_gcc_tns_2" label="Forecast GCC Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="40" />
                <cms:editable name="rcpt_gcc_wgns" label="Wagons GCC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="41" />
                <cms:editable name="rcpt_actual_gcc_tns_1" label="Actual GCC Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="42" />
                <cms:editable name="rcpt_actual_gcc_tns_2" label="Actual GCC Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="43" />
                <cms:editable name="rcpt_gcc_cog" label="GCC Cog" type="text" group="rcpt_md_pt_1" class="col-md-2" order="44" />
                <cms:editable name="rcpt_gcc_ta" label="GCC TA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="45" />
                <cms:editable name="rcpt_gcc_la" label="GCC LA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="46" />
                <cms:editable name="rcpt_gcc_d" label="GCC D" type="text" group="rcpt_md_pt_1" class="col-md-2" order="47" />
                <cms:editable name="rcpt_gcc_oth" label="GCC OTH" type="text" group="rcpt_md_pt_1" class="col-md-2" order="48" />
                <cms:editable name="rcpt_gcc_ac" label="GCC AC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="49" />
                <cms:editable name="rcpt_gcc_dsl" label="GCC DSL" type="text" group="rcpt_md_pt_1" class="col-md-2" order="50" />
                <cms:editable name="rcpt_gcc_ldd" label="GCC Ldd" type="text" group="rcpt_md_pt_1" class="col-md-2" order="51" />
                <cms:editable name="rcpt_gcc_emp" label="GCC Emp" type="text" group="rcpt_md_pt_1" class="col-md-2" order="52" />
                <cms:editable name="rcpt_gcc_mt" label="GCC MT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="53" />
                <cms:editable name="rcpt_gcc_shortfall" label="GCC Shortfall" type="text" group="rcpt_md_pt_1" class="col-md-12" order="54" />
                <!-- GCC -->

                <!-- CWA -->
                <cms:editable name="rcpt_secr_cwa" label="SECR CWA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="55" />
                <cms:editable name="rcpt_cwa" label="CWA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="56" />
                <cms:editable name="rcpt_fc_cwa_tns_1" label="Forecast CWA Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="57" />
                <cms:editable name="rcpt_fc_cwa_tns_2" label="Forecast CWA Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="58" />
                <cms:editable name="rcpt_cwa_wgns" label="Wagons CWA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="59" />
                <cms:editable name="rcpt_actual_cwa_tns_1" label="Actual CWA Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="60" />
                <cms:editable name="rcpt_actual_cwa_tns_2" label="Actual CWA Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="61" />
                <cms:editable name="rcpt_cwa_cog" label="CWA Cog" type="text" group="rcpt_md_pt_1" class="col-md-2" order="62" />
                <cms:editable name="rcpt_cwa_ta" label="CWA TA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="63" />
                <cms:editable name="rcpt_cwa_la" label="CWA LA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="64" />
                <cms:editable name="rcpt_cwa_d" label="CWA D" type="text" group="rcpt_md_pt_1" class="col-md-2" order="65" />
                <cms:editable name="rcpt_cwa_oth" label="CWA OTH" type="text" group="rcpt_md_pt_1" class="col-md-2" order="66" />
                <cms:editable name="rcpt_cwa_ac" label="CWA AC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="67" />
                <cms:editable name="rcpt_cwa_dsl" label="CWA DSL" type="text" group="rcpt_md_pt_1" class="col-md-2" order="68" />
                <cms:editable name="rcpt_cwa_ldd" label="CWA Ldd" type="text" group="rcpt_md_pt_1" class="col-md-2" order="69" />
                <cms:editable name="rcpt_cwa_emp" label="CWA Emp" type="text" group="rcpt_md_pt_1" class="col-md-2" order="70" />
                <cms:editable name="rcpt_cwa_mt" label="CWA MT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="71" />
                <cms:editable name="rcpt_cwa_shortfall" label="CWA Shortfall" type="text" group="rcpt_md_pt_1" class="col-md-12" order="72" />
                <!-- CWA -->

                <!-- CAF -->
                <cms:editable name="rcpt_secr_caf" label="SECR CAF" type="text" group="rcpt_md_pt_1" class="col-md-2" order="73" />
                <cms:editable name="rcpt_caf" label="CAF" type="text" group="rcpt_md_pt_1" class="col-md-2" order="74" />
                <cms:editable name="rcpt_fc_caf_tns_1" label="Forecast CAF Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="75" />
                <cms:editable name="rcpt_fc_caf_tns_2" label="Forecast CAF Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="76" />
                <cms:editable name="rcpt_caf_wgns" label="Wagons CAF" type="text" group="rcpt_md_pt_1" class="col-md-2" order="77" />
                <cms:editable name="rcpt_actual_caf_tns_1" label="Actual CAF Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="78" />
                <cms:editable name="rcpt_actual_caf_tns_2" label="Actual CAF Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="79" />
                <cms:editable name="rcpt_caf_cog" label="CAF Cog" type="text" group="rcpt_md_pt_1" class="col-md-2" order="80" />
                <cms:editable name="rcpt_caf_ta" label="CAF TA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="81" />
                <cms:editable name="rcpt_caf_la" label="CAF LA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="82" />
                <cms:editable name="rcpt_caf_d" label="CAF D" type="text" group="rcpt_md_pt_1" class="col-md-2" order="83" />
                <cms:editable name="rcpt_caf_oth" label="CAF OTH" type="text" group="rcpt_md_pt_1" class="col-md-2" order="84" />
                <cms:editable name="rcpt_caf_ac" label="CAF AC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="85" />
                <cms:editable name="rcpt_caf_dsl" label="CAF DSL" type="text" group="rcpt_md_pt_1" class="col-md-2" order="86" />
                <cms:editable name="rcpt_caf_ldd" label="CAF Ldd" type="text" group="rcpt_md_pt_1" class="col-md-2" order="87" />
                <cms:editable name="rcpt_caf_emp" label="CAF Emp" type="text" group="rcpt_md_pt_1" class="col-md-2" order="88" />
                <cms:editable name="rcpt_caf_mt" label="CAF MT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="89" />
                <cms:editable name="rcpt_caf_shortfall" label="CAF Shortfall" type="text" group="rcpt_md_pt_1" class="col-md-12" order="90" />
                <!-- CAF -->

                <!-- BPQ -->
                <cms:editable name="rcpt_scr_bpq" label="SCR BPQ" type="text" group="rcpt_md_pt_1" class="col-md-2" order="91" />
                <cms:editable name="rcpt_bpq" label="BPQ" type="text" group="rcpt_md_pt_1" class="col-md-2" order="92" />
                <cms:editable name="rcpt_fc_bpq_tns_1" label="Forecast BPQ Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="93" />
                <cms:editable name="rcpt_fc_bpq_tns_2" label="Forecast BPQ Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="94" />
                <cms:editable name="rcpt_bpq_wgns" label="Wagons BPQ" type="text" group="rcpt_md_pt_1" class="col-md-2" order="95" />
                <cms:editable name="rcpt_actual_bpq_tns_1" label="Actual BPQ Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="96" />
                <cms:editable name="rcpt_actual_bpq_tns_2" label="Actual BPQ Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="97" />
                <cms:editable name="rcpt_bpq_cog" label="BPQ Cog" type="text" group="rcpt_md_pt_1" class="col-md-2" order="98" />
                <cms:editable name="rcpt_bpq_ta" label="BPQ TA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="99" />
                <cms:editable name="rcpt_bpq_la" label="BPQ LA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="100" />
                <cms:editable name="rcpt_bpq_d" label="BPQ D" type="text" group="rcpt_md_pt_1" class="col-md-2" order="101" />
                <cms:editable name="rcpt_bpq_oth" label="BPQ OTH" type="text" group="rcpt_md_pt_1" class="col-md-2" order="102" />
                <cms:editable name="rcpt_bpq_ac" label="BPQ AC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="103" />
                <cms:editable name="rcpt_bpq_dsl" label="BPQ DSL" type="text" group="rcpt_md_pt_1" class="col-md-2" order="104" />
                <cms:editable name="rcpt_bpq_ldd" label="BPQ Ldd" type="text" group="rcpt_md_pt_1" class="col-md-2" order="105" /> 
                <cms:editable name="rcpt_bpq_emp" label="BPQ Emp" type="text" group="rcpt_md_pt_1" class="col-md-2" order="106" />
                <cms:editable name="rcpt_bpq_mt" label="BPQ MT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="107" />
                <cms:editable name="rcpt_bpq_shortfall" label="BPQ Shortfall" type="text" group="rcpt_md_pt_1" class="col-md-12" order="108" />
                <!-- BPQ -->

                <!-- PMKT -->
                <cms:editable name="rcpt_scr_pmkt" label="SCR PMKT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="109" />
                <cms:editable name="rcpt_pmkt" label="PMKT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="110" />
                <cms:editable name="rcpt_fc_pmkt_tns_1" label="Forecast PMKT Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="111" />
                <cms:editable name="rcpt_fc_pmkt_tns_2" label="Forecast PMKT Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="112" />
                <cms:editable name="rcpt_pmkt_wgns" label="Wagons PMKT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="113" />
                <cms:editable name="rcpt_actual_pmkt_tns_1" label="Actual PMKT Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="114" />
                <cms:editable name="rcpt_actual_pmkt_tns_2" label="Actual PMKT Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="115" />
                <cms:editable name="rcpt_pmkt_cog" label="PMKT Cog" type="text" group="rcpt_md_pt_1" class="col-md-2" order="116" />
                  <cms:editable name="rcpt_pmkt_ta" label="PMKT TA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="117" />
                  <cms:editable name="rcpt_pmkt_la" label="PMKT LA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="118" />
                  <cms:editable name="rcpt_pmkt_d" label="PMKT D" type="text" group="rcpt_md_pt_1" class="col-md-2" order="119" />
                  <cms:editable name="rcpt_pmkt_oth" label="PMKT OTH" type="text" group="rcpt_md_pt_1" class="col-md-2" order="120" />
                  <cms:editable name="rcpt_pmkt_ac" label="PMKT AC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="121" />
                  <cms:editable name="rcpt_pmkt_dsl" label="PMKT DSL" type="text" group="rcpt_md_pt_1" class="col-md-2" order="122" />
                  <cms:editable name="rcpt_pmkt_ldd" label="PMKT Ldd" type="text" group="rcpt_md_pt_1" class="col-md-2" order="123" />
                  <cms:editable name="rcpt_pmkt_emp" label="PMKT Emp" type="text" group="rcpt_md_pt_1" class="col-md-2" order="124" />
                  <cms:editable name="rcpt_pmkt_mt" label="PMKT MT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="125" />
                  <cms:editable name="rcpt_pmkt_shortfall" label="PMKT Shortfall" type="text" group="rcpt_md_pt_1" class="col-md-12" order="126" />
                  <!-- PMKT -->

                  <!-- BD -->
                  <cms:editable name="rcpt_bsl_bd" label="BSL BD" type="text" group="rcpt_md_pt_1" class="col-md-2" order="127" />
                  <cms:editable name="rcpt_bd" label="BD" type="text" group="rcpt_md_pt_1" class="col-md-2" order="128" />
                  <cms:editable name="rcpt_fc_bd_tns_1" label="Forecast BD Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="129" />
                  <cms:editable name="rcpt_fc_bd_tns_2" label="Forecast BD Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="130" />
                  <cms:editable name="rcpt_bd_wgns" label="Wagons BD" type="text" group="rcpt_md_pt_1" class="col-md-2" order="131" />
                  <cms:editable name="rcpt_actual_bd_tns_1" label="Actual BD Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="132" />
                  <cms:editable name="rcpt_actual_bd_tns_2" label="Actual BD Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="133" />
                  <cms:editable name="rcpt_bd_cog" label="BD Cog" type="text" group="rcpt_md_pt_1" class="col-md-2" order="134" />
                  <cms:editable name="rcpt_bd_ta" label="BD TA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="135" />
                  <cms:editable name="rcpt_bd_la" label="BD LA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="136" />
                  <cms:editable name="rcpt_bd_d" label="BD D" type="text" group="rcpt_md_pt_1" class="col-md-2" order="137" />
                  <cms:editable name="rcpt_bd_oth" label="BD OTH" type="text" group="rcpt_md_pt_1" class="col-md-2" order="138" />
                  <cms:editable name="rcpt_bd_ac" label="BD AC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="139" />
                  <cms:editable name="rcpt_bd_dsl" label="BD DSL" type="text" group="rcpt_md_pt_1" class="col-md-2" order="140" />
                  <cms:editable name="rcpt_bd_ldd" label="BD Ldd" type="text" group="rcpt_md_pt_1" class="col-md-2" order="141" />
                  <cms:editable name="rcpt_bd_emp" label="BD Emp" type="text" group="rcpt_md_pt_1" class="col-md-2" order="142" />
                  <cms:editable name="rcpt_bd_mt" label="BD MT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="143" />
                  <cms:editable name="rcpt_bd_shortfall" label="BD Shortfall" type="text" group="rcpt_md_pt_1" class="col-md-12" order="144" />
                  <!-- BD -->

                  <!-- CNDB -->
                  <cms:editable name="rcpt_bsl_cndb" label="BSL CNDB" type="text" group="rcpt_md_pt_1" class="col-md-2" order="145" />
                  <cms:editable name="rcpt_cndb" label="CNDB" type="text" group="rcpt_md_pt_1" class="col-md-2" order="146" />
                  <cms:editable name="rcpt_fc_cndb_tns_1" label="Forecast CNDB Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="147" />
                  <cms:editable name="rcpt_fc_cndb_tns_2" label="Forecast CNDB Train 2" type="text" group=" rcpt_md_pt_1" class="col-md-2" order="148" />
                  <cms:editable name="rcpt_cndb_wgns" label="Wagons CNDB" type="text" group="rcpt_md_pt_1" class="col-md-2" order="149" />
                  <cms:editable name="rcpt_actual_cndb_tns_1" label="Actual CNDB Train 1" type="text" group="rcpt_md_pt_1" class="col-md-2" order="150" />
                  <cms:editable name="rcpt_actual_cndb_tns_2" label="Actual CNDB Train 2" type="text" group="rcpt_md_pt_1" class="col-md-2" order="151" />
                  <cms:editable name="rcpt_cndb_cog" label="CNDB Cog" type="text" group="rcpt_md_pt_1" class="col-md-2" order="152" />
                  <cms:editable name="rcpt_cndb_ta" label="CNDB TA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="153" />
                  <cms:editable name="rcpt_cndb_la" label="CNDB LA" type="text" group="rcpt_md_pt_1" class="col-md-2" order="154" />
                  <cms:editable name="rcpt_cndb_d" label="CNDB D" type="text" group="rcpt_md_pt_1" class="col-md-2" order="155" />
                  <cms:editable name="rcpt_cndb_oth" label="CNDB OTH" type="text" group="rcpt_md_pt_1" class="col-md-2" order="156" />
                  <cms:editable name="rcpt_cndb_ac" label="CNDB AC" type="text" group="rcpt_md_pt_1" class="col-md-2" order="157" />
                  <cms:editable name="rcpt_cndb_dsl" label="CNDB DSL" type="text" group="rcpt_md_pt_1" class="col-md-2" order="158" />
                  <cms:editable name="rcpt_cndb_ldd" label="CNDB Ldd" type="text" group="rcpt_md_pt_1" class="col-md-2" order="159" />
                  <cms:editable name="rcpt_cndb_emp" label="CNDB Emp" type="text" group="rcpt_md_pt_1" class="col-md-2" order="160" />
                  <cms:editable name="rcpt_cndb_mt" label="CNDB MT" type="text" group="rcpt_md_pt_1" class="col-md-2" order="161" />
                  <cms:editable name="rcpt_cndb_shortfall" label="CNDB Shortfall" type="text" group="rcpt_md_pt_1" class="col-md-12" order="162" />
                  <!-- CNDB -->
                  <!-- TOTAL -->
                  <cms:editable name="fc_tran1_total" label="Trains 1 Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="163" />
                  <cms:editable name="fc_tran2_total" label="Trains 2 Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="164" />
                  <cms:editable name="fc_wgns_total" label="Wagons Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="165" />
                  <cms:editable name="fc_tran3_total" label="Trains 3 Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="166" />
                  <cms:editable name="fc_tran4_total" label="Trains 4 Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="167" />
                  <cms:editable name="cog_total" label="Cog Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="168" />
                  <cms:editable name="ta_total" label="TA Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="169" />
                  <cms:editable name="la_total" label="LA Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="170" />
                  <cms:editable name="d_total" label="D Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="171" />
                  <cms:editable name="oth_total" label="Oth Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="172" />
                  <cms:editable name="ac_total" label="AC Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="173" />
                  <cms:editable name="dsl_total" label="DSL Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="174" />
                  <cms:editable name="ldd_total" label="Ldd Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="175" />
                  <cms:editable name="emp_total" label="Emp Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="176" />
                  <cms:editable name="mt_total" label="MT Total" type="text" group="rcpt_md_pt_1" class="col-md-2" order="177" />
                  <cms:editable name="shortfall_total" label="Shortfall Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="178" />
                  <!-- TOTAL -->
                <!-- Stable Loads -->
                <cms:editable name="rcpt_stble_shortfall" label="Stable Loads Shortfall" type="text" group="rcpt_md_pt_1" class="col-md-12" order="179" />
                <!-- Stable Loads -->
            </cms:editable>
        </cms:editable>
      <!-- Midnight Position 1 RECEIPTS -->


      <!-- Midnight Position 1 DESPATCHES -->
        <cms:editable name="dsph_md_pt_1" label="DESPATCHES" type="group" order="3" >
            <cms:editable name="dsph_md_pt" label="Midnight Position" type="row" >
                <!-- ET -->
                <cms:editable name="dsph_wcr_et" label="WCR" type="text" group="dsph_md_pt_1" class="col-md-2" order="1" />
                <cms:editable name="dsph_et" label="ET" type="text" group="dsph_md_pt_1" class="col-md-2" order="2" />
                <cms:editable name="dsph_fc_et_tns_1" label="Forecast ET Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="3" />
                <cms:editable name="dsph_fc_et_tns_2" label="Forecast ET Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="4" />
                <cms:editable name="dsph_et_wgns" label="Wagons ET" type="text" group="dsph_md_pt_1" class="col-md-2" order="5" />
                <cms:editable name="dsph_actual_et_tns_1" label="Actual ET Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="6" />
                <cms:editable name="dsph_actual_et_tns_2" label="Actual ET Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="7" />
                <cms:editable name="dsph_et_cog" label="ET Cog" type="text" group="dsph_md_pt_1" class="col-md-2" order="8" />
                <cms:editable name="dsph_et_ta" label="ET TA" type="text" group="dsph_md_pt_1" class="col-md-2" order="9" />
                <cms:editable name="dsph_et_la" label="ET LA" type="text" group="dsph_md_pt_1" class="col-md-2" order="10" />
                <cms:editable name="dsph_et_d" label="ET D" type="text" group="dsph_md_pt_1" class="col-md-2" order="11" />
                <cms:editable name="dsph_et_oth" label="ET OTH" type="text" group="dsph_md_pt_1" class="col-md-2" order="12" />
                <cms:editable name="dsph_et_ac" label="ET AC" type="text" group="dsph_md_pt_1" class="col-md-2" order="13" />
                <cms:editable name="dsph_et_dsl" label="ET DSL" type="text" group="dsph_md_pt_1" class="col-md-2" order="14" />
                <cms:editable name="dsph_et_ldd" label="ET Ldd" type="text" group="dsph_md_pt_1" class="col-md-2" order="15" />
                <cms:editable name="dsph_et_emp" label="ET Emp" type="text" group="dsph_md_pt_1" class="col-md-2" order="16" />
                <cms:editable name="dsph_et_mt" label="ET MT" type="text" group="dsph_md_pt_1" class="col-md-2" order="17" />
                <cms:editable name="dsph_et_shortfall" label="ET Shortfall" type="text" group="dsph_md_pt_1" class="col-md-12" order="18" />
                <!-- ET -->

                <!-- NGP -->
                <cms:editable name="dsph_secr_ngp" label="SECR NGP" type="text" group="dsph_md_pt_1" class="col-md-2" order="19" />
                <cms:editable name="dsph_ngp" label="NGP" type="text" group="dsph_md_pt_1" class="col-md-2" order="20" />
                <cms:editable name="dsph_fc_ngp_tns_1" label="Forecast NGP Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="21" />
                <cms:editable name="dsph_fc_ngp_tns_2" label="Forecast NGP Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="22" />
                <cms:editable name="dsph_ngp_wgns" label="Wagons NGP" type="text" group="dsph_md_pt_1" class="col-md-2" order="23" />
                <cms:editable name="dsph_actual_ngp_tns_1" label="Actual NGP Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="24" />
                <cms:editable name="dsph_actual_ngp_tns_2" label="Actual NGP Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="25" />
                <cms:editable name="dsph_ngp_cog" label="NGP Cog" type="text" group="dsph_md_pt_1" class="col-md-2" order="26" />
                <cms:editable name="dsph_ngp_ta" label="NGP TA" type="text" group="dsph_md_pt_1" class="col-md-2" order="27" />
                <cms:editable name="dsph_ngp_la" label="NGP LA" type="text" group="dsph_md_pt_1" class="col-md-2" order="28" />
                <cms:editable name="dsph_ngp_d" label="NGP D" type="text" group="dsph_md_pt_1" class="col-md-2" order="29" />
                <cms:editable name="dsph_ngp_oth" label="NGP OTH" type="text" group="dsph_md_pt_1" class="col-md-2" order="30" />
                <cms:editable name="dsph_ngp_ac" label="NGP AC" type="text" group="dsph_md_pt_1" class="col-md-2" order="31" />
                <cms:editable name="dsph_ngp_dsl" label="NGP DSL" type="text" group="dsph_md_pt_1" class="col-md-2" order="32" />
                <cms:editable name="dsph_ngp_ldd" label="NGP Ldd" type="text" group="dsph_md_pt_1" class="col-md-2" order="33" />
                <cms:editable name="dsph_ngp_emp" label="NGP Emp" type="text" group="dsph_md_pt_1" class="col-md-2" order="34" />
                <cms:editable name="dsph_ngp_mt" label="NGP MT" type="text" group="dsph_md_pt_1" class="col-md-2" order="35" />
                <cms:editable name="dsph_ngp_shortfall" label="NGP Shortfall" type="text" group="dsph_md_pt_1" class="col-md-12" order="36" />
                <!-- NGP -->

                <!-- GCC -->
                <cms:editable name="dsph_secr_gcc" label="SECR GCC" type="text" group="dsph_md_pt_1" class="col-md-2" order="37" />
                <cms:editable name="dsph_gcc" label="GCC" type="text" group="dsph_md_pt_1" class="col-md-2" order="38" />
                <cms:editable name="dsph_fc_gcc_tns_1" label="Forecast GCC Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="39" />
                <cms:editable name="dsph_fc_gcc_tns_2" label="Forecast GCC Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="40" />
                <cms:editable name="dsph_gcc_wgns" label="Wagons GCC" type="text" group="dsph_md_pt_1" class="col-md-2" order="41" />
                <cms:editable name="dsph_actual_gcc_tns_1" label="Actual GCC Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="42" />
                <cms:editable name="dsph_actual_gcc_tns_2" label="Actual GCC Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="43" />
                <cms:editable name="dsph_gcc_cog" label="GCC Cog" type="text" group="dsph_md_pt_1" class="col-md-2" order="44" />
                <cms:editable name="dsph_gcc_ta" label="GCC TA" type="text" group="dsph_md_pt_1" class="col-md-2" order="45" />
                <cms:editable name="dsph_gcc_la" label="GCC LA" type="text" group="dsph_md_pt_1" class="col-md-2" order="46" />
                <cms:editable name="dsph_gcc_d" label="GCC D" type="text" group="dsph_md_pt_1" class="col-md-2" order="47" />
                <cms:editable name="dsph_gcc_oth" label="GCC OTH" type="text" group="dsph_md_pt_1" class="col-md-2" order="48" />
                <cms:editable name="dsph_gcc_ac" label="GCC AC" type="text" group="dsph_md_pt_1" class="col-md-2" order="49" />
                <cms:editable name="dsph_gcc_dsl" label="GCC DSL" type="text" group="dsph_md_pt_1" class="col-md-2" order="50" />
                <cms:editable name="dsph_gcc_ldd" label="GCC Ldd" type="text" group="dsph_md_pt_1" class="col-md-2" order="51" />
                <cms:editable name="dsph_gcc_emp" label="GCC Emp" type="text" group="dsph_md_pt_1" class="col-md-2" order="52" />
                <cms:editable name="dsph_gcc_mt" label="GCC MT" type="text" group="dsph_md_pt_1" class="col-md-2" order="53" />
                <cms:editable name="dsph_gcc_shortfall" label="GCC Shortfall" type="text" group="dsph_md_pt_1" class="col-md-12" order="54" />
                <!-- GCC -->

                <!-- CWA -->
                <cms:editable name="dsph_secr_cwa" label="SECR CWA" type="text" group="dsph_md_pt_1" class="col-md-2" order="55" />
                <cms:editable name="dsph_cwa" label="CWA" type="text" group="dsph_md_pt_1" class="col-md-2" order="56" />
                <cms:editable name="dsph_fc_cwa_tns_1" label="Forecast CWA Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="57" />
                <cms:editable name="dsph_fc_cwa_tns_2" label="Forecast CWA Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="58" />
                <cms:editable name="dsph_cwa_wgns" label="Wagons CWA" type="text" group="dsph_md_pt_1" class="col-md-2" order="59" />
                <cms:editable name="dsph_actual_cwa_tns_1" label="Actual CWA Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="60" />
                <cms:editable name="dsph_actual_cwa_tns_2" label="Actual CWA Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="61" />
                <cms:editable name="dsph_cwa_cog" label="CWA Cog" type="text" group="dsph_md_pt_1" class="col-md-2" order="62" />
                <cms:editable name="dsph_cwa_ta" label="CWA TA" type="text" group="dsph_md_pt_1" class="col-md-2" order="63" />
                <cms:editable name="dsph_cwa_la" label="CWA LA" type="text" group="dsph_md_pt_1" class="col-md-2" order="64" />
                <cms:editable name="dsph_cwa_d" label="CWA D" type="text" group="dsph_md_pt_1" class="col-md-2" order="65" />
                <cms:editable name="dsph_cwa_oth" label="CWA OTH" type="text" group="dsph_md_pt_1" class="col-md-2" order="66" />
                <cms:editable name="dsph_cwa_ac" label="CWA AC" type="text" group="dsph_md_pt_1" class="col-md-2" order="67" />
                <cms:editable name="dsph_cwa_dsl" label="CWA DSL" type="text" group="dsph_md_pt_1" class="col-md-2" order="68" />
                <cms:editable name="dsph_cwa_ldd" label="CWA Ldd" type="text" group="dsph_md_pt_1" class="col-md-2" order="69" />
                <cms:editable name="dsph_cwa_emp" label="CWA Emp" type="text" group="dsph_md_pt_1" class="col-md-2" order="70" />
                <cms:editable name="dsph_cwa_mt" label="CWA MT" type="text" group="dsph_md_pt_1" class="col-md-2" order="71" />
                <cms:editable name="dsph_cwa_shortfall" label="CWA Shortfall" type="text" group="dsph_md_pt_1" class="col-md-12" order="72" />
                <!-- CWA -->

                <!-- CAF -->
                <cms:editable name="dsph_secr_caf" label="SECR CAF" type="text" group="dsph_md_pt_1" class="col-md-2" order="73" />
                <cms:editable name="dsph_caf" label="CAF" type="text" group="dsph_md_pt_1" class="col-md-2" order="74" />
                <cms:editable name="dsph_fc_caf_tns_1" label="Forecast CAF Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="75" />
                <cms:editable name="dsph_fc_caf_tns_2" label="Forecast CAF Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="76" />
                <cms:editable name="dsph_caf_wgns" label="Wagons CAF" type="text" group="dsph_md_pt_1" class="col-md-2" order="77" />
                <cms:editable name="dsph_actual_caf_tns_1" label="Actual CAF Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="78" />
                <cms:editable name="dsph_actual_caf_tns_2" label="Actual CAF Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="79" />
                <cms:editable name="dsph_caf_cog" label="CAF Cog" type="text" group="dsph_md_pt_1" class="col-md-2" order="80" />
                <cms:editable name="dsph_caf_ta" label="CAF TA" type="text" group="dsph_md_pt_1" class="col-md-2" order="81" />
                <cms:editable name="dsph_caf_la" label="CAF LA" type="text" group="dsph_md_pt_1" class="col-md-2" order="82" />
                <cms:editable name="dsph_caf_d" label="CAF D" type="text" group="dsph_md_pt_1" class="col-md-2" order="83" />
                <cms:editable name="dsph_caf_oth" label="CAF OTH" type="text" group="dsph_md_pt_1" class="col-md-2" order="84" />
                <cms:editable name="dsph_caf_ac" label="CAF AC" type="text" group="dsph_md_pt_1" class="col-md-2" order="85" />
                <cms:editable name="dsph_caf_dsl" label="CAF DSL" type="text" group="dsph_md_pt_1" class="col-md-2" order="86" />
                <cms:editable name="dsph_caf_ldd" label="CAF Ldd" type="text" group="dsph_md_pt_1" class="col-md-2" order="87" />
                <cms:editable name="dsph_caf_emp" label="CAF Emp" type="text" group="dsph_md_pt_1" class="col-md-2" order="88" />
                <cms:editable name="dsph_caf_mt" label="CAF MT" type="text" group="dsph_md_pt_1" class="col-md-2" order="89" />
                <cms:editable name="dsph_caf_shortfall" label="CAF Shortfall" type="text" group="dsph_md_pt_1" class="col-md-12" order="90" />
                <!-- CAF -->

                <!-- BPQ -->
                <cms:editable name="dsph_scr_bpq" label="SCR BPQ" type="text" group="dsph_md_pt_1" class="col-md-2" order="91" />
                <cms:editable name="dsph_bpq" label="BPQ" type="text" group="dsph_md_pt_1" class="col-md-2" order="92" />
                <cms:editable name="dsph_fc_bpq_tns_1" label="Forecast BPQ Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="93" />
                <cms:editable name="dsph_fc_bpq_tns_2" label="Forecast BPQ Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="94" />
                <cms:editable name="dsph_bpq_wgns" label="Wagons BPQ" type="text" group="dsph_md_pt_1" class="col-md-2" order="95" />
                <cms:editable name="dsph_actual_bpq_tns_1" label="Actual BPQ Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="96" />
                <cms:editable name="dsph_actual_bpq_tns_2" label="Actual BPQ Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="97" />
                <cms:editable name="dsph_bpq_cog" label="BPQ Cog" type="text" group="dsph_md_pt_1" class="col-md-2" order="98" />
                <cms:editable name="dsph_bpq_ta" label="BPQ TA" type="text" group="dsph_md_pt_1" class="col-md-2" order="99" />
                <cms:editable name="dsph_bpq_la" label="BPQ LA" type="text" group="dsph_md_pt_1" class="col-md-2" order="100" />
                <cms:editable name="dsph_bpq_d" label="BPQ D" type="text" group="dsph_md_pt_1" class="col-md-2" order="101" />
                <cms:editable name="dsph_bpq_oth" label="BPQ OTH" type="text" group="dsph_md_pt_1" class="col-md-2" order="102" />
                <cms:editable name="dsph_bpq_ac" label="BPQ AC" type="text" group="dsph_md_pt_1" class="col-md-2" order="103" />
                <cms:editable name="dsph_bpq_dsl" label="BPQ DSL" type="text" group="dsph_md_pt_1" class="col-md-2" order="104" />
                <cms:editable name="dsph_bpq_ldd" label="BPQ Ldd" type="text" group="dsph_md_pt_1" class="col-md-2" order="105" />
                <cms:editable name="dsph_bpq_emp" label="BPQ Emp" type="text" group="dsph_md_pt_1" class="col-md-2" order="106" />
                <cms:editable name="dsph_bpq_mt" label="BPQ MT" type="text" group="dsph_md_pt_1" class="col-md-2" order="107" />
                <cms:editable name="dsph_bpq_shortfall" label="BPQ Shortfall" type="text" group="dsph_md_pt_1" class="col-md-12" order="108" />
                <!-- BPQ -->

                <!-- PMKT -->
                <cms:editable name="dsph_scr_pmkt" label="SCR PMKT" type="text" group="dsph_md_pt_1" class="col-md-2" order="109" />
                <cms:editable name="dsph_pmkt" label="PMKT" type="text" group="dsph_md_pt_1" class="col-md-2" order="110" />
                <cms:editable name="dsph_fc_pmkt_tns_1" label="Forecast PMKT Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="111" />
                <cms:editable name="dsph_fc_pmkt_tns_2" label="Forecast PMKT Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="112" />
                <cms:editable name="dsph_pmkt_wgns" label="Wagons PMKT" type="text" group="dsph_md_pt_1" class="col-md-2" order="113" />
                <cms:editable name="dsph_actual_pmkt_tns_1" label="Actual PMKT Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="114" />
                <cms:editable name="dsph_actual_pmkt_tns_2" label="Actual PMKT Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="115" />
                <cms:editable name="dsph_pmkt_cog" label="PMKT Cog" type="text" group="dsph_md_pt_1" class="col-md-2" order="116" />
                <cms:editable name="dsph_pmkt_ta" label="PMKT TA" type="text" group="dsph_md_pt_1" class="col-md-2" order="117" />
                <cms:editable name="dsph_pmkt_la" label="PMKT LA" type="text" group="dsph_md_pt_1" class="col-md-2" order="118" />
                <cms:editable name="dsph_pmkt_d" label="PMKT D" type="text" group="dsph_md_pt_1" class="col-md-2" order="119" />
                <cms:editable name="dsph_pmkt_oth" label="PMKT OTH" type="text" group="dsph_md_pt_1" class="col-md-2" order="120" />
                <cms:editable name="dsph_pmkt_ac" label="PMKT AC" type="text" group="dsph_md_pt_1" class="col-md-2" order="121" />
                <cms:editable name="dsph_pmkt_dsl" label="PMKT DSL" type="text" group="dsph_md_pt_1" class="col-md-2" order="122" />
                <cms:editable name="dsph_pmkt_ldd" label="PMKT Ldd" type="text" group="dsph_md_pt_1" class="col-md-2" order="123" />
                <cms:editable name="dsph_pmkt_emp" label="PMKT Emp" type="text" group="dsph_md_pt_1" class="col-md-2" order="124" />
                <cms:editable name="dsph_pmkt_mt" label="PMKT MT" type="text" group="dsph_md_pt_1" class="col-md-2" order="125" />
                <cms:editable name="dsph_pmkt_shortfall" label="PMKT Shortfall" type="text" group="dsph_md_pt_1" class="col-md-12"  order="126" />
                <!-- PMKT -->

                <!-- BD -->
                <cms:editable name="dsph_bsl_bd" label="BSL BD" type="text" group="dsph_md_pt_1" class="col-md-2" order="127" />
                <cms:editable name="dsph_bd" label="BD" type="text" group="dsph_md_pt_1" class="col-md-2" order="128" />
                <cms:editable name="dsph_fc_bd_tns_1" label="Forecast BD Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="129" />
                <cms:editable name="dsph_fc_bd_tns_2" label="Forecast BD Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="130" />
                <cms:editable name="dsph_bd_wgns" label="Wagons BD" type="text" group="dsph_md_pt_1" class="col-md-2" order="131" />
                <cms:editable name="dsph_actual_bd_tns_1" label="Actual BD Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="132" />
                <cms:editable name="dsph_actual_bd_tns_2" label="Actual BD Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="133" />
                <cms:editable name="dsph_bd_cog" label="BD Cog" type="text" group="dsph_md_pt_1" class="col-md-2" order="134" />
                <cms:editable name="dsph_bd_ta" label="BD TA" type="text" group="dsph_md_pt_1" class="col-md-2" order="135" />
                <cms:editable name="dsph_bd_la" label="BD LA" type="text" group="dsph_md_pt_1" class="col-md-2" order="136" />
                <cms:editable name="dsph_bd_d" label="BD D" type="text" group="dsph_md_pt_1" class="col-md-2" order="137" />
                <cms:editable name="dsph_bd_oth" label="BD OTH" type="text" group="dsph_md_pt_1" class="col-md-2" order="138" />
                <cms:editable name="dsph_bd_ac" label="BD AC" type="text" group="dsph_md_pt_1" class="col-md-2" order="139" />
                <cms:editable name="dsph_bd_dsl" label="BD DSL" type="text" group="dsph_md_pt_1" class="col-md-2" order="140" />
                <cms:editable name="dsph_bd_ldd" label="BD Ldd" type="text" group="dsph_md_pt_1" class="col-md-2" order="141" />
                <cms:editable name="dsph_bd_emp" label="BD Emp" type="text" group="dsph_md_pt_1" class="col-md-2" order="142" />
                <cms:editable name="dsph_bd_mt" label="BD MT" type="text" group="dsph_md_pt_1" class="col-md-2" order="143" />
                <cms:editable name="dsph_bd_shortfall" label="BD Shortfall" type="text" group="dsph_md_pt_1" class="col-md-12" order="144" />
                <!-- BD -->

                <!-- CNDB -->
                <cms:editable name="dsph_bsl_cndb" label="BSL CNDB" type="text" group="dsph_md_pt_1" class="col-md-2" order="145" />
                <cms:editable name="dsph_cndb" label="CNDB" type="text" group="dsph_md_pt_1" class="col-md-2" order="146" />
                <cms:editable name="dsph_fc_cndb_tns_1" label="Forecast CNDB Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="147" />
                <cms:editable name="dsph_fc_cndb_tns_2" label="Forecast CNDB Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="148" />
                <cms:editable name="dsph_cndb_wgns" label="Wagons CNDB" type="text" group="dsph_md_pt_1" class="col-md-2" order="149" />
                <cms:editable name="dsph_actual_cndb_tns_1" label="Actual CNDB Train 1" type="text" group="dsph_md_pt_1" class="col-md-2" order="150" />
                <cms:editable name="dsph_actual_cndb_tns_2" label="Actual CNDB Train 2" type="text" group="dsph_md_pt_1" class="col-md-2" order="151" />
                <cms:editable name="dsph_cndb_cog" label="CNDB Cog" type="text" group="dsph_md_pt_1" class="col-md-2" order="152" />
                <cms:editable name="dsph_cndb_ta" label="CNDB TA" type="text" group="dsph_md_pt_1" class="col-md-2" order="153" />
                <cms:editable name="dsph_cndb_la" label="CNDB LA" type="text" group="dsph_md_pt_1" class="col-md-2" order="154" />
                <cms:editable name="dsph_cndb_d" label="CNDB D" type="text" group="dsph_md_pt_1" class="col-md-2" order="155" />
                <cms:editable name="dsph_cndb_oth" label="CNDB OTH" type="text" group="dsph_md_pt_1" class="col-md-2" order="156" />
                <cms:editable name="dsph_cndb_ac" label="CNDB AC" type="text" group="dsph_md_pt_1" class="col-md-2" order="157" />
                <cms:editable name="dsph_cndb_dsl" label="CNDB DSL" type="text" group="dsph_md_pt_1" class="col-md-2" order="158" />
                <cms:editable name="dsph_cndb_ldd" label="CNDB Ldd" type="text" group="dsph_md_pt_1" class="col-md-2" order="159" />
                <cms:editable name="dsph_cndb_emp" label="CNDB Emp" type="text" group="dsph_md_pt_1" class="col-md-2" order="160" />
                <cms:editable name="dsph_cndb_mt" label="CNDB MT" type="text" group="dsph_md_pt_1" class="col-md-2" order="161" />
                <cms:editable name="dsph_cndb_shortfall" label="CNDB Shortfall" type="text" group="dsph_md_pt_1" class="col-md-12" order="162" />
                <!-- CNDB -->

                <!-- TOTAL -->
                <cms:editable name="dsph_tran1_total" label="Trains 1 Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="163" />
                <cms:editable name="dsph_tran2_total" label="Trains 2 Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="164" />
                <cms:editable name="dsph_wgns_total" label="Wagons Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="165" />
                <cms:editable name="dsph_tran3_total" label="Trains 3 Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="166" />
                <cms:editable name="dsph_tran4_total" label="Trains 4 Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="167" />
                <cms:editable name="dsph_cog_total" label="Cog Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="168" />
                <cms:editable name="dsph_ta_total" label="TA Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="169" />
                <cms:editable name="dsph_la_total" label="LA Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="170" />
                <cms:editable name="dsph_d_total" label="D Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="171" />
                <cms:editable name="dsph_oth_total" label="Oth Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="172" />
                <cms:editable name="dsph_ac_total" label="AC Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="173" />
                <cms:editable name="dsph_dsl_total" label="DSL Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="174" />
                <cms:editable name="dsph_ldd_total" label="Ldd Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="175" />
                <cms:editable name="dsph_emp_total" label="Emp Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="176" />
                <cms:editable name="dsph_mt_total" label="MT Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="177" />
                <cms:editable name="dsph_shortfall_total" label="Shortfall Total" type="text" group="dsph_md_pt_1" class="col-md-2" order="178" />
                <!-- TOTAL -->
                <!-- Stable Loads -->
                <cms:editable name="dsph_stble_shortfall" label="Stable Loads Shortfall" type="text" group="dsph_md_pt_1" class="col-md-12" order="179" />
                <!-- Stable Loads -->
            </cms:editable>
        </cms:editable>
      <!-- Midnight Position 1 DESPATCHES -->

      <!-- For Ineffective & Surplus -->
        <cms:editable name="inf_sur" label="Ineffective & Surplus" type="group" order="4" >
            <cms:editable name="inf_sur_row" label="Ineffective & Surplus" type="row" order="4">
                <cms:editable name="ineffective" label="Ineffective" type="text" group="inf_sur" class="col-md-6" />
                <cms:editable name="surplus" label="Surplus" type="text" group="inf_sur" class="col-md-6" />
            </cms:editable>
        </cms:editable>
      <!-- For Ineffective & Surplus -->
      
      <!-- AC/DSL Holding -->
        <cms:editable name="ac_dsl_hlding" label="AC/DSL HOLDING" type="group" order="5" >
            <cms:editable name="ac_dsl_hlding1" label="AC/DSL Holding" type="row" >
                <cms:editable name="dsl_hld_holding" label="DSL Holding" type="text" group="ac_dsl_hlding" order="1" class="col-md-2" />
                <cms:editable name="hld_ac_vlu" label="Holding AC Value" type="text" group="ac_dsl_hlding" order="2" class="col-md-2" />
                <cms:editable name="hld_dsl_vlu" label="Holding DSL Value" type="text" group="ac_dsl_hlding" order="3" class="col-md-2" />
                <cms:editable name="hld_leng_vlu1" label="Holding L/Eng Value1" type="text" group="ac_dsl_hlding" order="4" class="col-md-2" />
                <cms:editable name="hld_leng_vlu2" label="Holding L/Eng Value2" type="text" group="ac_dsl_hlding" order="5" class="col-md-2" />
                <cms:editable name="dsl_hld_kms" label="DSL Holding Kms" type="text" group="ac_dsl_hlding" order="6" class="col-md-2" />
                <cms:editable name="kms_ac_vlu" label="Kms AC Value" type="text" group="ac_dsl_hlding" order="7" class="col-md-2" />
                <cms:editable name="kms_dsl_vlu" label="Kms DSL Value" type="text" group="ac_dsl_hlding" order="8" class="col-md-2" />
                <cms:editable name="kms_l_eng_vlu" label="Kms L/Eng Value" type="text" group="ac_dsl_hlding" order="9" class="col-md-2" />
            </cms:editable>
        </cms:editable>
      <!-- AC/DSL Holding -->

      <!-- Inter Rly Outage -->
        <cms:editable name="int_rly_outage" label="Inter Rly Outage" type="group" order="6" >
            <cms:editable name="int_rly_outage1" label="Inter Rly Outage" type="row" >
                <cms:editable name="cr_sc" label="CR on SC" type="text" group="int_rly_outage" order="1" class="col-md-2" />
                <cms:editable name="sc_cr" label="SC on CR" type="text" group="int_rly_outage" order="2" class="col-md-2" />
                <cms:editable name="se_cr" label="SE on CR" type="text" group="int_rly_outage" order="3" class="col-md-2" />
                <cms:editable name="cr_se" label="CR on SE" type="text" group="int_rly_outage" order="4" class="col-md-2" />
                <cms:editable name="cr_sc_ac" label="CR on SC AC" type="text" group="int_rly_outage" order="5" class="col-md-2" />
                <cms:editable name="cr_sc_mu" label="CR on SC MU" type="text" group="int_rly_outage" order="6" class="col-md-2" />
                <cms:editable name="sc_cr_ac" label="SC on CR AC" type="text" group="int_rly_outage" order="7" class="col-md-2" />
                <cms:editable name="sc_cr_mu" label="SC on CR MU" type="text" group="int_rly_outage" order="8" class="col-md-2" />
                <cms:editable name="se_cr_ac" label="SE on CR AC" type="text" group="int_rly_outage" order="9" class="col-md-2" />
                <cms:editable name="se_cr_mu" label="SE on CR MU" type="text" group="int_rly_outage" order="10" class="col-md-2" />
                <cms:editable name="cr_se_ac" label="CR on SE AC" type="text" group="int_rly_outage" order="11" class="col-md-2" />
                <cms:editable name="cr_se_mu" label="CR on SE MU" type="text" group="int_rly_outage" order="12" class="col-md-2" />
            </cms:editable>
        </cms:editable>
      <!-- Inter Rly Outage -->

      <!-- Holding -->
        <cms:editable name="holding" label="Holding" type="group" order="7" >
            <cms:editable name="holding1" label="Holding" type="row" >
                <cms:editable name="hld_net" label="Holding Net" type="text" group="holding" order="1" class="col-md-2" />
                <cms:editable name="hld_net_hr" label="Holding Net 00 hr" type="text" group="holding" order="2" class="col-md-2" />
                <cms:editable name="hld_net_mu" label="Holding Net MU" type="text" group="holding" order="3" class="col-md-2" />
                <cms:editable name="hld_sdg" label="Holding Sdg" type="text" group="holding" order="4" class="col-md-2" />
                <cms:editable name="hld_sdg_hr" label="Holding Sdg 00 hr" type="text" group="holding" order="5" class="col-md-2" />
                <cms:editable name="hld_sdg_mu" label="Holding Sdg MU" type="text" group="holding" order="6" class="col-md-2" />
                <cms:editable name="hld_be" label="Holding B/E" type="text" group="holding" order="7" class="col-md-2" />
                <cms:editable name="hld_be_hr" label="Holding B/E 00 hr" type="text" group="holding" order="8" class="col-md-2" />
                <cms:editable name="hld_be_mu" label="Holding B/E MU" type="text" group="holding" order="9" class="col-md-2" />
                <cms:editable name="hld_la" label="Holding LA" type="text" group="holding" order="10" class="col-md-2" />
                <cms:editable name="hld_la_hr" label="Holding LA 00 hr" type="text" group="holding" order="11" class="col-md-2" />
                <cms:editable name="hld_la_mu" label="Holding LA MU" type="text" group="holding" order="12" class="col-md-2" />
                <cms:editable name="hld_ta" label="Holding TA" type="text" group="holding" order="13" class="col-md-2" />
                <cms:editable name="hld_ta_hr" label="Holding TA 00 hr" type="text" group="holding" order="14" class="col-md-2" />
                <cms:editable name="hld_ta_mu" label="Holding TA MU" type="text" group="holding" order="15" class="col-md-2" />
                <cms:editable name="hld_dead" label="Holding Dead" type="text" group="holding" order="16" class="col-md-2" />
                <cms:editable name="hld_dead_hr" label="Holding Dead 00 hr" type="text" group="holding" order="17" class="col-md-2" />
                <cms:editable name="hld_dead_mu" label="Holding Dead MU" type="text" group="holding" order="18" class="col-md-2" />
                <cms:editable name="hld_cog" label="Holding Cog" type="text" group="holding" order="19" class="col-md-2" />
                <cms:editable name="hld_cog_hr" label="Holding Cog 00 hr" type="text" group="holding" order="20" class="col-md-2" />
                <cms:editable name="hld_cog_mu" label="Holding Cog MU" type="text" group="holding" order="21" class="col-md-2" />
                <cms:editable name="hld_deptl" label="Holding Deptl" type="text" group="holding" order="22" class="col-md-2" />
                <cms:editable name="hld_deptl_hr" label="Holding Deptl 00 hr" type="text" group="holding" order="23" class="col-md-2" />
                <cms:editable name="hld_deptl_mu" label="Holding Deptl MU" type="text" group="holding" order="24" class="col-md-2" />
                <cms:editable name="hld_els" label="Holding ELS" type="text" group="holding" order="25" class="col-md-2" />
                <cms:editable name="hld_els_hr" label="Holding ELS 00 hr" type="text" group="holding" order="26" class="col-md-2" />
                <cms:editable name="hld_els_mu" label="Holding ELS MU" type="text" group="holding" order="27" class="col-md-2" />
                <cms:editable name="hld_ts" label="Holding T/S" type="text" group="holding" order="28" class="col-md-2" />
                <cms:editable name="hld_ts_hr" label="Holding T/S 00 hr" type="text" group="holding" order="29" class="col-md-2" />
                <cms:editable name="hld_ts_mu" label="Holding T/S MU" type="text" group="holding" order="30" class="col-md-2" />
                <cms:editable name="hld_acmu" label="Holding AC/MU" type="text" group="holding" order="31" class="col-md-2" />
                <cms:editable name="hld_acmu_hr" label="Holding AC/MU 00 hr" type="text" group="holding" order="32" class="col-md-2" />
                <cms:editable name="hld_acmu_mu" label="Holding AC/MU MU" type="text" group="holding" order="33" class="col-md-2" />
                <cms:editable name="hld_dsl" label="Holding DSL" type="text" group="holding" order="34" class="col-md-2" />
                <cms:editable name="hld_dsl_hr" label="Holding DSL 00 hr" type="text" group="holding" order="35" class="col-md-2" />
                <cms:editable name="hld_dsl_mu" label="Holding DSL MU" type="text" group="holding" order="36" class="col-md-2" />
                <cms:editable name="hld_mu" label="Holding MU" type="text" group="holding" order="37" class="col-md-2" />
                <cms:editable name="hld_mu_hr" label="Holding MU 00 hr" type="text" group="holding" order="38" class="col-md-2" />
                <cms:editable name="hld_mu_mu" label="Holding MU MU" type="text" group="holding" order="39" class="col-md-2" />
            </cms:editable>
        </cms:editable>
      <!-- Holding -->

      <!-- PUNCTUALITY  -->
        <cms:editable name="punc" label="Puncualtilty" type="group" order="8">
            <cms:editable name="punc_row" type="row" >
                    <cms:editable name="mexp_punc" label="M/Exp Punctuality" group="punc" type="text" order="2" class="col-md-3" />
                    <cms:editable name="mexp_run_punc" label="M/Exp Run" type="text" group="punc" order="3" class="col-md-3" />
                    <cms:editable name="mexp_lost_punc" label="M/Exp Lost" type="text" group="punc" order="4" class="col-md-3" />
                    <cms:editable name="mexp_trno_punc" label="M/Exp Train Number" type="text" group="punc" order="5" class="col-md-3" />
                    <cms:editable name="pass_punc" label="Pass Punctuality" type="text" group="punc" order="6" class="col-md-3" />
                    <cms:editable name="pass_run_punc" label="Pass Run" type="text" group="punc" order="7" class="col-md-3" />
                    <cms:editable name="pass_lost_punc" label="Pass Lost" type="text" group="punc" order="8" class="col-md-3" />
                    <cms:editable name="pass_trno_punc" label="Pass Train Number" type="text" group="punc" order="9" class="col-md-3" />
            </cms:editable>
        </cms:editable>
      <!-- PUNCTUALITY  -->

      <!-- STOCK HOLDING -->
        <cms:editable name="stck_hld" label="Stock Holding " type="group" order="10" >
            <cms:editable name="stck_row" type="row">
                <cms:editable name="recd_stck" label="Recd Stock Holding" type="text" group="stck_hld" order="1" class="col-md-2" />
                <cms:editable name="recd_ldd_boxn" label="Recd Ldd BOXN" type="text" group="stck_hld" order="2" class="col-md-2" />
                <cms:editable name="recd_emp_boxn" label="Recd Emp BOXN" type="text" group="stck_hld" order="3" class="col-md-2" />
                <cms:editable name="recd_ldd_ot" label="Recd Ldd OT" type="text" group="stck_hld" order="4" class="col-md-2" />
                <cms:editable name="recd_emp_ot" label="Recd Emp OT" type="text" group="stck_hld" order="5" class="col-md-2" />
                <cms:editable name="recd_ldd_jumbo" label="Recd Ldd Jumbo" type="text" group="stck_hld" order="6" class="col-md-2" />
                <cms:editable name="recd_emp_jumbo" label="Recd Emp Jumbo" type="text" group="stck_hld" order="7" class="col-md-2" />
                <cms:editable name="recd_ldd_steel" label="Recd Ldd Steel" type="text" group="stck_hld" order="8" class="col-md-2" />
                <cms:editable name="recd_emp_steel" label="Recd Emp Steel" type="text" group="stck_hld" order="9" class="col-md-2" />
                <cms:editable name="recd_ldd_cont" label="Recd Ldd Cont" type="text" group="stck_hld" order="10" class="col-md-2" />
                <cms:editable name="recd_emp_cont" label="Recd Emp Cont" type="text" group="stck_hld" order="11" class="col-md-2" />

                <cms:editable name="desp_stck" label="Desp Stock Holding" type="text" group="stck_hld" order="12" class="col-md-2" />
                <cms:editable name="desp_ldd_boxn" label="Desp Ldd BOXN" type="text" group="stck_hld" order="13" class="col-md-2" />
                <cms:editable name="desp_emp_boxn" label="Desp Emp BOXN" type="text" group="stck_hld" order="14" class="col-md-2" />
                <cms:editable name="desp_ldd_ot" label="Desp Ldd OT" type="text" group="stck_hld" order="15" class="col-md-2" />
                <cms:editable name="desp_emp_ot" label="Desp Emp OT" type="text" group="stck_hld" order="16" class="col-md-2" />
                <cms:editable name="desp_ldd_jumbo" label="Desp Ldd Jumbo" type="text" group="stck_hld" order="17" class="col-md-2" />
                <cms:editable name="desp_emp_jumbo" label="Desp Emp Jumbo" type="text" group="stck_hld" order="18" class="col-md-2" />
                <cms:editable name="desp_ldd_steel" label="Desp Ldd Steel" type="text" group="stck_hld" order="19" class="col-md-2" />
                <cms:editable name="desp_emp_steel" label="Desp Emp Steel" type="text" group="stck_hld" order="20" class="col-md-2" />
                <cms:editable name="desp_ldd_cont" label="Desp Ldd Cont" type="text" group="stck_hld" order="21" class="col-md-2" />
                <cms:editable name="desp_emp_cont" label="Desp Emp Cont" type="text" group="stck_hld" order="22" class="col-md-2" />
            </cms:editable>
        </cms:editable>
      <!-- STOCK HOLDING -->

      <!-- DIST WAGONS -->
        <cms:editable name="dist_wgns" label="Dist Wagons" type="group" order="12" >
            <cms:editable name="wgns_row" type="row">
                <cms:editable name="avai_wgns" label="Available" type="text" group="dist_wgns" order="1" class="col-md-4" />
                <cms:editable name="plce_wgns" label="Placed" type="text" group="dist_wgns" order="2" class="col-md-4" />
                <cms:editable name="unld_wgns" label="Unldd" type="text" group="dist_wgns" order="3" class="col-md-4" />
            </cms:editable>
        </cms:editable>
      <!-- DIST WAGONS -->


      <!-- Loading -->
        <cms:editable name="loading" label="Loading" type="group" order="11" >
            <cms:editable name="lding_row" type="row" >
                <cms:editable name="coal" label="Coal" type="text" group="loading" order="1" class="col-md-3" />
                <cms:editable name="coal_fc_rake" label="Coal Forecasted Rakes" type="text" group="loading" order="2" class="col-md-3" />
                <cms:editable name="coal_fc_wgn" label="Coal Forecasted Wagons" type="text" group="loading" order="3" class="col-md-3" />
                <cms:editable name="coal_ld_rake" label="Coal Loading Rakes" type="text" group="loading" order="4" class="col-md-3" />
                <cms:editable name="coal_ld_wgn" label="Coal Loading Wagons" type="text" group="loading" order="5" class="col-md-3" />
                <cms:editable name="coal_rejc" label="Coal Rejection" type="text" group="loading" order="6" class="col-md-3" />
                <cms:editable name="coal_tdays_fc" label="Coal Todays Forecast" type="text" group="loading" order="7" class="col-md-3" />

                <cms:editable name="cement" label="Cement" type="text" group="loading" order="8" class="col-md-3" />
                <cms:editable name="cement_fc_rake" label="Cement Forecasted Rakes" type="text" group="loading" order="9" class="col-md-3" />
                <cms:editable name="cement_fc_wgn" label="Cement Forecasted Wagons" type="text" group="loading" order="10" class="col-md-3" />
                <cms:editable name="cement_ld_rake" label="Cement Loading Rakes" type="text" group="loading" order="11" class="col-md-3" />
                <cms:editable name="cement_ld_wgn" label="Cement Loading Wagons" type="text" group="loading" order="12" class="col-md-3" />
                <cms:editable name="cement_rejc" label="Cement Rejection" type="text" group="loading" order="13" class="col-md-3" />
                <cms:editable name="cement_tdays_fc" label="Cement Todays Forecast" type="text" group="loading" order="14" class="col-md-3" />

                <cms:editable name="others" label="Others" type="text" group="loading" order="15" class="col-md-3" />
                <cms:editable name="others_fc_rake" label="Others Forecasted Rakes" type="text" group="loading" order="16" class="col-md-3" />
                <cms:editable name="others_fc_wgn" label="Others Forecasted Wagons" type="text" group="loading" order="17" class="col-md-3" />
                <cms:editable name="others_ld_rake" label="Others Loading Rakes" type="text" group="loading" order="18" class="col-md-3" />
                <cms:editable name="others_ld_wgn" label="Others Loading Wagons" type="text" group="loading" order="19" class="col-md-3" />
                <cms:editable name="others_rejc" label="Others Rejection" type="text" group="loading" order="20" class="col-md-3" />
                <cms:editable name="others_tdays_fc" label="Others Todays Forecast" type="text" group="loading" order="21" class="col-md-3" />

                <cms:editable name="total_fc_rake" label="Total Forecasted Rakes" type="text" group="loading" order="22" class="col-md-3" />
                <cms:editable name="total_fc_wgn" label="Total Forecasted Wagons" type="text" group="loading" order="23" class="col-md-3" />
                <cms:editable name="total_ld_rake" label="Total Loading Rakes" type="text" group="loading" order="24" class="col-md-3" />
                <cms:editable name="total_ld_wgn" label="Total Loading Wagons" type="text" group="loading" order="25" class="col-md-3" />
                <cms:editable name="total_rejc" label="Total Rejection" type="text" group="loading" order="26" class="col-md-3" />
                <cms:editable name="total_tdays_fc" label="Total Todays Forecast" type="text" group="loading" order="27" class="col-md-3" />
            </cms:editable>
        </cms:editable>
      <!-- Loading -->

      <!-- Custom Routes -->
      <cms:route name='list_mnp' path='' />
      <cms:route name='create_mnp' path='create' />
      <cms:route name='edit_mnp' path='{:id}/edit' >
            <cms:route_validators id='non_zero_integer' />
      </cms:route>
      <cms:route name='page_mnp' path='{:id}' >
            <cms:route_validators id='non_zero_integer' />
      </cms:route>
      <cms:route name='delete_mnp' path='{:id}/delete' >
            <cms:route_validators id='non_zero_integer' />
      </cms:route>
      <!-- Custom Routes -->
</cms:template>
<cms:embed 'header.html' />
        <!-- Content Here -->
    <cms:match_route debug='0' />
    <div class="container-fluid">
        <div class="row">
            <div class="gxcpl-ptop-30"></div>

            <!-- Section Title -->
            <cms:embed 'mnp-title.html' />
            <!-- Section Title -->

            <!-- Section Divider -->
            <div class="gxcpl-ptop-10"></div>
            <!-- <div class="gxcpl-divider-dark"></div> -->
            <div class="gxcpl-ptop-10"></div>
            <!-- Section Divider -->
            <cms:embed 'searchmnp.html' />
            Searching for:<cms:show my_search_str /><br /><!-- for debugging -->
            MDP Date::<cms:show mdp_date />
            <cms:pages paginate='1' limit='10' custom_field="mdp_date=<cms:show my_search_str />" >
                <cms:if k_paginated_top >
                    <cms:set my_records_found='1' scope='global'/>
                    <cms:if k_paginator_required > 
                       Page <cms:show k_current_page /> of <cms:show k_total_pages /><br />
                    </cms:if>
                    <cms:show k_total_records /> Properties Found. (Displaying: <cms:show k_record_from />-<cms:show k_record_to />)
                </cms:if>
            </cms:pages>

            <cms:if my_records_found!='1' >
                No properties Found <cms:show mdp_date />
            </cms:if>
            
            <!-- Only for testing -->
            <cms:match_route debug='0' />
            
            <!-- List View -->
            <cms:embed "mid-posi/<cms:show k_matched_route />.html" />
            <!-- List View -->
        </div>
    </div>
    <!-- Content Here -->
<cms:embed 'footer.html' />
<?php COUCH::invoke(); ?>