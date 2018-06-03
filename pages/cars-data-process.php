<?= tab_menu($menu, "Cars Data", null) ?>
<?php
$valid = true;

if (!isset($_POST['plat']) || $_POST['plat'] === "") {
	$valid = false;
}

if (!isset($_POST['year']) || $_POST['year'] === "") {
	$valid = false;
}
if (!isset($_POST['brand']) || $_POST['brand'] === "") {
	$valid = false;
}
if (!isset($_POST['color']) || $_POST['color'] === "") {
	$valid = false;
}

$msg = "";

if ($valid) {
	$values = array(
		"PlatNumber" => $_POST['plat'],
		"Year" => $_POST['year'],
		"Brand" => $_POST['brand'],
		"Color" => $_POST['color']
	);
	$valid = insertInto("tb_cars", $values);
	if ($valid){ 
		$msg = "Cars Data has been recorded :)";
		unset($_POST);
	}else{
		$msg = "Failed to save Cars Data";
	}
}else{
	$msg = "Please fill in all";
}
$backLink = "../pages/#home";

if (isset($_GET['oldPage'])) {
	$backLink = setLink($_GET['oldPage']);
}

showResult($valid, $msg, $backLink);