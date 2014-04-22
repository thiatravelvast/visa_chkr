
// Visa checker Java script

// Initializer function
function v_init()
{
		set_rslt();
}

function set_rslt() {
	hide_stat_cmb();
	disp_rslt_title();
	set_visa_status();
}

function hide_stat_cmb() {
	if (sel_pspt == sel_res) {
		hide_cmb_and_txt(cmb_stat);
	} else {
		show_cmb_and_txt(cmb_stat);
	}
}

function v_ch_pspt() {
	sel_pspt = get_sel_from_cmb(cmb_pspt);
	set_rslt();
}

function v_ch_dest() {
	sel_dest = get_sel_from_cmb(cmb_dest);
	set_rslt();
}

function v_ch_res() {
	sel_res = get_sel_from_cmb(cmb_res);
	set_rslt();
}

function v_ch_stat() {
	sel_stat = get_sel_from_cmb(cmb_stat);
	set_rslt();
}

function disp_rslt_title() {
	var txt_rslt = "You are a citizen of " + sel_pspt + " and you are visiting " + sel_dest;
	if (sel_res != sel_pspt) {
		txt_rslt += " and a " + sel_stat + " of " + sel_res;
	}
	txt_rslt += ".";
	set_txt_on_obj(rslt_txt, txt_rslt);
}

function set_visa_status() {
		var chk_data = {
			action : 'visachecker_cb',
			pspt : sel_pspt,
			dest : sel_dest,
			res  : sel_res,
			stat : sel_stat
		};
		jQuery.ajax({
     			url: visachecker_cb_scripts.ajaxurl,
     			//url : 'index_cb.php',
     			data: chk_data,
     			beforeSend: function(res) {
     				set_txt_on_obj(rslt_msg, "We are checking our database. Please wait");
     			},
 				success: function(res) {
 					set_visa_msg(res);	
     			},
     			error: function() {
     				set_txt_on_obj(rslt_msg, "<strong>We couldn't find the visa requirements from our database</strong>");
     			}
     		
     		});	
}

function set_visa_msg(val) {
	var txt_rslt = "Your visa requirements are ";
	var grn = val.match(/No Visa/);
    var ylw = val.match(/eVisa/);
    var ppl = val.match(/Visa on Arrival/);
    var font_clr = "<font color='";
    if (grn) 		{	font_clr += "green"; 	}
    else if (ylw) 	{ 	font_clr += "blue";		} 
    else if (ppl) 	{	font_clr += "purple";	}
    else 			{	font_clr += "red";		}
    font_clr += "'/>";
    txt_rslt += font_clr + "<strong> " + val + "</strong>.</font>";
    console.log(txt_rslt);
    set_txt_on_obj(rslt_msg, txt_rslt);
}


