<?= tab_menu($menu, "Cars Brand", null) ?>
<?php
$valid = true;

if (!isset($_POST['brandname']) || $_POST['brandname'] === "") {
	$valid = false;
}

if (!isset($_POST['cost']) || $_POST['cost'] === "") {
	$valid = false;
}

$msg = "";

if ($valid) {
	$values = array(
		"BrandName" => $_POST['brandname'],
		"Cost" => $_POST['cost']
	);
	$valid = insertInto("tb_cars_brand", $values);
	if ($valid){ 
		$msg = "Cars Brand has been recorded :)";
		unset($_POST);
	}else{
		$msg = "Failed to save Cars Brand";
	}
}else{
	$msg = "Please fill in all";
}
$backLink = "../pages/#home";

if (isset($_GET['oldPage'])) {
	$backLink = setLink($_GET['oldPage']);
}

showResult($valid, $msg, $backLink);