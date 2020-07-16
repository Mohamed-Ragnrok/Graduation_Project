<?php
    session_start();// Start The Session
	ob_start();
	

	session_unset();// Unset The Data

	session_destroy();// Destory The Session

	header('location: index.php');
	
	exit();
	ob_end_flush();



?>