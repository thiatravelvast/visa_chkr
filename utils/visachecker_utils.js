
function get_obj(name) {
	return document.getElementById(name);
}

function hide_obj(name) {
	get_obj(name).style.display = "none";
}
function show_obj(name) {
	get_obj(name).style.display = "";
}
function set_txt_on_obj(name, txt) {
	get_obj(name).innerHTML = txt;
}
function hide_cmb_and_txt(name) {
	hide_obj(name);
	hide_obj("txt_"+name);
}
function show_cmb_and_txt(name) {
	show_obj(name);
	show_obj("txt_"+name);
}

function get_sel_from_cmb(name) {
	var e = get_obj(name);//get the combobox
	return e.options[e.selectedIndex].text;
}
