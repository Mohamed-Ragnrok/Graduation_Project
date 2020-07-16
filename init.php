<?php
	
	
	include 'admin/includes/connectDB.php';

	$sessionUser = '';
	if(isset($_SESSION['user'])){
		$sessionUser = $_SESSION['user'];
	}


	$tbl = "includes/templates/"; // templates folder
	$lang = "includes/lang/" ; // lang folder
	$func = "includes/functions/";// functions folder
	$css ="layout/css/" ; // css folder
	$js = "layout/js/" ; // js folder
	
	
	// Include The Important Files 
	include $func ."functions.php";
	include $lang . "eng.php";
	include $tbl ."header.php";



         




 ?>