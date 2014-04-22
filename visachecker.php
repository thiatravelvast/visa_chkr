<?php
	
	// Settings
	include ('utils/visachecker_settings.php');
	// Utils
	include ('utils/page_builder_utils.php');


	// Mapping Classes
	include ('db_utils/CountryDb.php');
	$cdb = new CountryDb();
	$c_arr = $cdb->get_country_list();
	$res_arr = $cdb->get_residence_status_list();


	// Build page to display Data
	echo "<div class='well'>";

	// Citizenship list
	create_list('Citizenship', 'v_cmbpspt', $c_arr, DEF_PSPT, 'v_ch_pspt()', 2, 2);

	// Destination list
	create_list('Destination', 'v_cmbdest', $c_arr, DEF_DEST, 'v_ch_dest()', 2, 2);

	// Residence list
	create_list('Residence', 'v_cmbres', $c_arr, DEF_RES, 'v_ch_res()', 2, 0);

	// Status list
	create_list('Status', 'v_cmbstat', $res_arr, DEF_STAT, 'v_ch_stat()', 0, 2);

	// Display Visa Requirements
	echo "<span id=\"txt_v_rslt_title\"> </span>";
	// Message text for result
	echo "<span id=\"txt_v_rslt_msg\"> </span>";
	

	// Info about Destination Country
	add_space(2);
	echo "<span id=\"txt_v_cntry_info\"></span>";
	add_space(1);
	echo "<span id=\"txt_v_cntry_url\"></span>";
	add_space(2);
	echo "<span id=\"txt_v_cntry_link\"></span>";

	echo "</div>";
	// Note about Country
	// URL of Immigration website
	// Travelvast Link


	echo "</div>";	

	// Call Init Java script function

	echo "<script type='text/javascript'> v_init(); </script>"; 

	// Visachecker page utils

	function create_list($txt, $cmb_name, $data, $sel, $fn, $spc1, $spc2) {
		add_space($spc1);
		$disp_txt = pad_text($txt, PAD_LEN) . ":";
		build_combo($disp_txt , $cmb_name, $data, $sel, $fn);
		add_space($spc2);
	}
?>