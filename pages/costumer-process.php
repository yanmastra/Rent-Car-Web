<?= tab_menu($menu, "Customer", null) ?>
<?php
$valid = true;

if (!isset($_POST['id']) || $_POST['id'] === "") {
	$valid = false;
}

if (!isset($_POST['name']) || $_POST['name'] === "") {
	$valid = false;
}
if (!isset($_POST['gender']) || $_POST['gender'] === "") {
	$valid = false;
}
if (!isset($_POST['almt']) || $_POST['almt'] === "") {
	$valid = false;
}
if (!isset($_POST['cp']) || $_POST['cp'] === "") {
	$valid = false;
}

$msg = "";

if ($valid) {
	$values = array(
		"IDCardNumber" => $_POST['id'],
		"Name" => $_POST['name'],
		"Address" => $_POST['almt'],
		"Gender" => $_POST['gender'],
		"ContactInfo" => $_POST['cp']
	);
	$valid = insertInto("tb_customers", $values);
	if ($valid){ 
		$msg = "Customer has been recorded :)";
		unset($_POST);
	}else{
		$msg = "Failed to save Customer";
	}
}else{
	$msg = "Please fill in all";
}
$backLink = "../pages/#home";

if (isset($_GET['oldPage'])) {
	$backLink = setLink($_GET['oldPage']);
}

showResult($valid, $msg, $backLink);