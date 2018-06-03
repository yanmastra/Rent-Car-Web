<?= tab_menu($menu, "Transaction", null) ?>
<?php
$valid = true;

if (!isset($_POST['customer']) || $_POST['customer'] === "") {
	$valid = false;
}

if (!isset($_POST['car']) || $_POST['car'] === "") {
	$valid = false;
}

if (!isset($_POST['range']) || $_POST['range'] === "") {
	$valid = false;
}
if (!isset($_POST['pay']) || $_POST['pay'] === "") {
	$valid = false;
}

$msg = "";

if ($valid) {
	$dateLease = date_create(date("Y-m-d"));
	$dateReturn = date_add(date_create(date("Y-m-d")), date_interval_create_from_date_string($_POST['range']." days"));

	$values = array(
		"CarNumber" => $_POST['car'],
		"DateLease" => $dateLease->format("Y-m-d"),
		"DateReturn" => $dateReturn->format("Y-m-d"),
		"RentRange" => $_POST['range'],
		"Renter" => $_POST['customer'],
		"PayedCost" => $_POST['pay']
	);
	$valid = insertInto("tb_transaction", $values);
	if ($valid){ 
		$msg = "Transaction has been recorded :)";
		unset($_POST);
	}else{
		$msg = "Failed to save transaction";
	}
}else{
	$msg = "Please fill in all";
}
$backLink = "../pages/#home";

showResult($valid, $msg, $backLink);