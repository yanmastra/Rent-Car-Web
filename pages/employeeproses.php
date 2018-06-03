<?= tab_menu($menu, "Transaction", null) ?>
<?php
$valid = true;

if (!isset($_POST['user']) || $_POST['user'] === "") {
	$valid = false;
}

if (!isset($_POST['pass']) || $_POST['pass'] === "") {
	$valid = false;
}

if (!isset($_POST['nama']) || $_POST['nama'] === "") {
	$valid = false;
}
if (!isset($_POST['address']) || $_POST['address'] === "") {
	$valid = false;
}
if (!isset($_POST['phone']) || $_POST['phone'] === "") {
	$valid = false;
}


$msg = "";

if ($valid) {
	

	$values = array(
		"Username" => $_POST['user'],
		"Password" =>  $_POST['pass'],
		"Name" => $_POST['nama'],
		"Address" =>  $_POST['address'],
		"PhoneNumber" => $_POST['phone'],
	);
	$valid = insertInto("tb_employes", $values);
	if ($valid){ 
		$msg = "Employes has been Added :)";
		unset($_POST);
	}else{
		$msg = "Failed to save data";
	}
}else{
	$msg = "Please fill in all";
}

$backLink = "../pages/#home";

if(isset($_GET['oldPage'])) $backLink=setLink($_GET['oldPage']);

showResult($valid, $msg, $backLink);