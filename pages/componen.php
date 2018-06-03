<?php
defined("KEY") or exit("No dirrect script access!");

function tab_menu($menu = array(), $active, $tab = null){
	echo "<ul class=\"nav nav-pills\">";
	foreach ($menu as $key => $value) {
		$xtab = "";
		$actived = "";
		if ($key == $active || $value == $active) {
			$actived = "active";
			$xtab = "data-toggle=\"tab\"";
		}
		if ($tab !== null) {
			$xtab = "data-toggle=\"tab\"";
		}
		echo "<li class=\"$actived\"><a href=\"$value\" $xtab>$key</a></li>";
	 } 
	 echo "</ul>";
}

function print_cells($row = array(), $row_class = null){
	foreach ($row as $key => $value) {
		echo "<td class=\"$key\">".$value."</td>";
	}
}

function print_rows($content = array()){
	echo "<tr>";
	foreach ($con as $key => $value) {
		echo "<td class=\"$key\">".$value."</td>";
	}
	echo "</tr>";
}

function alertScript($message){
	echo "<script> alert('".$message."';</script>";
}

function confirm($msg, $link = null){
	echo "<script>";
	echo " var conf = confirm(\" $msg \"); if(conf) window.location = \"$link\"; </script>";
}

function headerProperty($description = null, $author = null, $link = null){
	echo "
	<meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"$description\">
    <meta name=\"author\" content=\"$author\">
    <!-- Bootstrap Core CSS -->
    <link href=\"../vendor/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\">
    <!-- Custom Fonts -->
    <link href=\"../vendor/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\">
    ";
    if(is_array($link))
    	foreach ($link as $key => $value) {
    		if(!is_int($key)){
	    		$type = "text/css";
	    		$rel = "stylesheet";

	    		if($value == "icon"){
	    			$type = "image/png"; $rel = "icon"; break;
	    		}

	    		echo "<link href=\"$key\" rel=\"$rel\" type=\"$type\" />";
    		}
    	}

	echo "
    <style type=\"text/css\">
    .menu{
    	display: inline-block;
    	width: 100%;
    	text-decoration: none;
    	list-style-type: none;
    }
    .menu li{
    	padding: 6px 12px;
    	margin-left: 0px;
    	border-bottom: solid 1px #d8d8d8;
    	border-radius: 3px;
    }
    .menu li:hover{
    	background-color: #eee;
    	border-bottom:solid 1px #eee;
    }
    </style>
";
}

function setLink($file){
	if ($file === "#home") {
		return "../pages/#home";
	}
	return "../pages/?page=".$file;
}

function appendLink($query, $value){
	return "&".$query."=".$value;
}

function showResult($result, $message, $backLink){
	$panel = "";
	if (is_bool($result)) {
		if ($result) {
			$panel = "panel-info";
		}else{
			$panel = "panel-danger";
		}
	}

	echo "
		<br>
		<div class=\"panel $panel\">
			<div class=\"panel-heading\"><b>Result</b></div>
			<div class=\"panel-body text-center\">
				<p class=\"text-center\">
					$message
				</p>
				<p>
					<a href=\"$backLink\" class=\"btn btn-info\">Back</a>
				</p>
			</div>
		</div>
		<script>
			setInterval(function(){
				window.location = '".$backLink."';
				}, 3000);
		</script>
		";
}

function getHeaderTable($tb_name){
	$res = mysqli_query(connection(), "DESC ".$tb_name);
	$show = "";
	while ($row = mysqli_fetch_array($res)) {
		$show .= "<th>".$row['Field']."</th>";
	}
	return $show;
}