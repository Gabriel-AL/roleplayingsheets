<?php

if(isset($_GET["campaign"]) && is_numeric($_GET["campaign"]) && is_dir($_GET["campaign"])){
	require_once("creating_sheet.php");
	require_once($_GET["campaign"]."/view.php");
}else{
	header("HTTP/1.0 404 Not Found");
}
?>
