<?php
	
	function build_combo($text, $name, $data, $sel, $fn) {
		build_combo_txt($text, $name);
		build_combo_box($name, $data, $sel, $fn);	
	}
	function pad_text($text, $len) {
		$str = strlen($text);
		$pad = $len - $str;
		$padtxt = $text.str_repeat('&nbsp;',$pad);
		return $padtxt;
		
	}
	
	function build_combo_txt($text, $name) {
		$txtCmb = "txt_" . $name;
		echo "<span id=$txtCmb>$text </span>";
	}
	
	function build_combo_box($name, $data, $sel, $fn) {
		echo "<select name='$name' id=$name onchange='$fn;' >";
		foreach ($data as $e) 
		{
			$selected = ($e == $sel) ? "selected" : "";
			echo "<option value='$e' $selected>$e</option>";
		}
		echo "</select>";
	}

	function add_space($cnt) {
		while ($cnt > 0) {
			echo "<br/>";
			--$cnt;
		}
	}
?>