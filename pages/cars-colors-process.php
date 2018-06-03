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
	
	if (isset($_GET['mode']) && $_GET['mode'] == 'edit') {
		if(isset($_GET['id']))
			$valid = update("tb_color", $values, "_ID = '".$_GET['id']."'");
		else $valid = false;
	}else{
		$valid = insertInto("tb_color", $values);
	}
	//tambahan if else

	if ($valid){ 
		$msg = "Color has been recorded :)";
		unset($_POST);
	}else{
		$msg = "Failed to save color";
	}
}else{
	if (isset($_GET['mode']) && $_GET['mode'] == 'delete' && isset($_GET['id'])){
		$valid = deleteFrom("tb_color", "_ID = '".$_GET['id']."'");
		if ($valid) {
			$msg = "1 item has been deleted";
		}else{
			$msg = "Failed to delete this item";
		}
		//tambahan if else
	}else
		$msg = "Please fill in all";
}
$backLink = "../pages/#home";

if (isset($_GET['oldPage'])) {
	$backLink = setLink($_GET['oldPage']);
}

showResult($valid, $msg, $backLink);