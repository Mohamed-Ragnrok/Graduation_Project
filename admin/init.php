<?php
	
	
	include 'includes/connectDB.php';

	$tbl = "includes/templates/"; // templates folder
	$lang = "includes/lang/" ; // lang folder
	$func = "includes/functions/";// functions folder
	$css ="layout/css/" ; // css folder
	$js = "layout/js/" ; // js folder
	
	
	// Include The Important Files
	include "includes/functions/functions.php";
	include $lang . "eng.php";
	include "includes/templates/header.php";

	if (!isset($nonavbar)){

		include "includes/templates/nav_header.php";
        include('includes/templates/side_bar.php');

	}
	





 ?>