<?php
function format_phone($phone) {
	return '('.substr($phone,0,3).')-'.substr($phone,3,3).'-'.substr($phone,-4);
}

/**
 * outputs an input elament with the given attribute values
 * this function examines SESSION data
 * @param unknown_type $name
 * @param unknown_type $placeholders
 * @return HTML input element
 */
function input($name, $placeholder, $value=null) {
	if($value == null && isset($_SESSION['POST'][$name])) {
		$value = $_SESSION['POST'][$name];

		unset($_SESSION['POST'][$name]);

		if($value == '') {
			$class = 'class="error"';
		} else {
			$class = '';
		} 
	}elseif($value != null) {
		$class = '';
	} else {
		$value = '';
		$class = '';
	}
	return "<input $class type=\"text\"name=\"$name\"placeholder=\"$placeholder\"value=\"$value\" />";
}

/**
 * Makes an HTML select alement with the given name
 * function examines session data for submitted value
 * @param String $name Name attribute
 * @param Array $options Array of options in the form value => text
 * @return HTML select element
 */
function dropdown ($name, $options) {
	$select = "<select name=\"$name\">";
	foreach($options as $value => $text) {
		if(isset($_SESSION['POST'][$name]) && $_SESSION['POST'][$name] == $value) {
			unset($_SESSION['POST'][$name]);
			$selected = 'selected="selected"';
		} else {
			$selected = '';
		}
		$select .="<option $selected value=\"$value\">$text</option>";
	}
	$select .="</select>";
	return $select;
}

/**
 * Makes an HTML radio buttons with the given name
 * function examines session data for submitted value
 * @param String $name Name attribute
 * @param Array $options Array of options in the form value => text
 * @return HTML input[type=radio]
 */
function radio($name, $options) {
	$radio = '';
	foreach($options as $value => $text) {
		if(isset($_SESSION['POST'][$name]) && $_SESSION['POST'][$name] == $value) {
			unset($_SESSION['POST'][$name]);
			$checked = 'checked="checked"';
		} else {
			$checked = '';
		}
		$radio .="<label><input type=\"radio\"name=\"$name\" value=\"$value\" $checked />$text</label>";
	}
	return $radio;
}

function get_options($table,$default_value=0,$default_name='Select') {
	$options = array($default_value => $default_name);
	
	$id_field = $table.'_id';
	$name_field = $table.'_name';
	//conect
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	//query
	$sql = "SELECT $id_field, $name_field FROM {$table}s ORDER BY $name_field";
	$results = $conn->query($sql);
	//loop
	while(($row = $results->fetch_assoc()) != null) {
		$key = $row[$id_field];
		$value = $row[$name_field];
		$options[$key] = $value;
	}
	$conn->close();
	return $options;
}
?>
