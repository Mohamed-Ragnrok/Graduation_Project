<?php
	
	

	$dsn = 'mysql:host=localhost;dbname=alex_project1';
	$user = 'root';
	$pass = '';
	$options = array (

		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ,
	);

	try {

		$connectDB = new PDO($dsn ,$user ,$pass ,$options); 

		$connectDB->setattribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

	}
	
	catch(PDOException $e){
		echo "Falied To Connect " . $e->getmessage();
	}




?>