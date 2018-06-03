<?= tab_menu($menu, "Cars Colors", null) ?>
<?php
$valid = true;

if (!isset($_POST['name']) || $_POST['name'] === "") {
	$valid = false;
}

if (!isset($_POST['maincost']) || $_POST['maincost'] === "") {
	$valid = false;
}

$msg = "";

if ($valid) {
	$values = array(
		"Name" => $_POST['name'],
		"MaintCost" => $_POST['maincost']
	);
	$valid = insertInto("tb_color", $values);
	if ($valid){ 
		$msg = "Color has been recorded :)";
		unset($_POST);
	}else{
		$msg = "Failed to save color";
	}
}else{
	$msg = "Please fill in all";
}
$backLink = "../pages/#home";

if (isset($_GET['oldPage'])) {
	$backLink = setLink($_GET['oldPage']);
}

showResult($valid, $msg, $backLink);