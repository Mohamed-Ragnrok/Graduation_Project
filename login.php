<?php 
    session_start();
	ob_start(); // Output Buffering Start

	 $pageTitle = 'Login';
	 if (isset($_SESSION['user'])){ 
		header('Location: index.php');
		exit;
	 }
	 include 'admin/includes/connectDB.php';

	 $sessionUser = '';
	 if(isset($_SESSION['user'])){
		 $sessionUser = $_SESSION['user'];
	 }
 
 
	 $tbl = "includes/templates/"; // templates folder
	 $lang = "includes/lang/" ; // lang folder
	 $func = "includes/functions/";// functions folder
	
	 
	 
	 // Include The Important Files 
	 include $func ."functions.php";
	 include $lang . "eng.php";
	 ?>

	 <!DOCTYPE html>
	<html>
	<head>
		<title><?php echo getTitle() ;  ?></title>
		<link rel="stylesheet" type="text/css" href="layout/atherLayout/css/boootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="layout/atherLayout/css/all.min.css"/>
		<link rel="stylesheet" type="text/css" href="layout/atherLayout/css/forntend.css"/>
		
	</head>
	<body>
	 



	 <?php
	 //chack If User Coming Form HTTP post Request
	 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	 	
	 	if(isset($_POST['login'])){
		 	$user = $_POST['username'];
			$pass = $_POST['password'];
 

		 	// Check If The User Exist In Database التأكد من وجود الاسم والباس في قاعده البيانات
		 	$stmtuser = $connectDB->prepare("SELECT * 
		 								 From students 
		 								 WHERE email='{$user}' LIMIT 1");
		 	$stmtuser->execute();
		 	$get = $stmtuser->fetch();
		 	$count = $stmtuser->rowCount();
		 	
		 	//if count > 0 this user in database ﺔﺴﻠﺠﻟا ءﺪﺒﺗﻭ ﻞﺧﺪﻳ ﻼﻌﻓ ﻦﻤﺟا ﻮﻫ ﻮﻟ ﺎﻨﻫ
		 	if ($count > 0 && password_verify($pass, $get['password']) ){
		 		
				 $_SESSION['user'] = $get['first_name'] . " " . $get['second_name'] . " "  . $get['third_name'] . " " . $get['famliy_name']  ;// Register Session name
				 $_SESSION['uid'] =$get['stu_id']; // Register User ID In Session
				 $_SESSION['avatar'] =$get['picture'];
				 header('Location: index.php');
				 exit();	
				
		 	}
	 	}
	}
			
?>
	<div class="container login-page">
		<h1 class="text-center" style="margin-left: -14px;" >
			<span  data-class ="login" class="selected" > دخول الطالب </span>
		</h1>
		<!-- Start Login Form -->
		<form class="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
			<div class="input-container">
				<input class="form-control" type="text" name="username" autocomplete="off" placeholder="ادخل البريد الجامعي" required />
			</div>
			<div class="input-container">
				<input class="form-control" type="password" name="password" autocomplete="new-password" placeholder="ادخل كلمة المرور" required />
			</div>
			<input class="btn btn-primary btn-block" name="login" type="submit" value="Login" />
		</form>
		<!-- End Login Form -->
	</div>

	<div class="the-errors text-center">
	 	<?php 
	 	// if(!empty($formErorrs)){
	 	// 	foreach($formErorrs as $erorr){
	 	// 		echo '<div class="alert alert-danger">' . $erorr . '</div>';
	 	// 	}
	 	// }

	 	// if (isset($succesMsg)){

	 	// 	echo '<div class="alert alert-success">' . $succesMsg . '</div>';
	 	// }


	 	?>
	</div> 

	<script src="layout/atherLayout/js/jquery-2.2.4.min.js"></script>
	<script src="layout/atherLayout/js/Javaforntend.js"></script>
	<script src="layout/atherLayout/js/bootstrap.min.js"></script>
		
	</body>	
</html>	
<?php

ob_end_flush();
?>
	
