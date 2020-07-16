<?php

 /* 
 ** GET  All Function v2.0
 ** Function To Get All Recorde Form Any Database Table 
 */

 function getAllFrom($field , $table , $where = Null , $orderBy , $ordering = 'DESC'){

  global $connectDB ;

  $getAll =$connectDB->prepare("SELECT $field FROM $table $where ORDER BY $orderBy $ordering ");

  $getAll->execute();

  $all = $getAll->fetchAll();

  return $all;

 }




 /* 
 ** GET  Records Function v1.0
 ** Function To Get Categories From Database 
 */

 function getCat(){

  global $connectDB ;

  $getCat =$connectDB->prepare("SELECT * FROM Categories ORDER BY Cat_ID ASC");

  $getCat->execute();

  $cats = $getCat->fetchAll();

  return $cats;

 }



  /* 
 ** Check If User Not Activated
 ** Function To Check The RegStatus Of The User 
 */
 function checkUserStatus($user){

  global $connectDB ;

  $stmtx = $connectDB->prepare("SELECT  Username, RegStatus 
                                From users 
                                WHERE Username=? And RegStatus = 0  ");
  $stmtx->execute(array($user));
  $status = $stmtx->rowCount();
  return $status ;
 }




 /*
 ** Check Items Function v1.0
 ** Function To Check Items In Database [ Function Accept Parameters]
 ** $select = The Item To Select 
 ** $form = The Table To Select From 
 ** $value = The Value Of Select 
 */
 function checkItem($select, $form, $value){

  global $connectDB ;

  $statement =$connectDB->prepare("SELECT $select FROM $form WHERE $select = ?");

  $statement->execute(array($value)); 

  $count = $statement->rowCount();
  return $count;  
 }















//  Function For Back End

 /*
 ** Title Function v1.0
 ** Title Function That Echo The Page Title In Case The Page
 **Has The Variable $pagetitle And Echo Defult Title For Other Pages 
 */
 function getTitle(){

  global $pageTitle;

  if (isset($pageTitle)) {

   echo $pageTitle;

  }else{

   echo "Default";
 
  }

 }


 /*
 ** Home Redirect Function v2.0
 ** This Function Accept Parmeters
 ** $theMsg = Echo The Error Massage [ Error | Success | Warning ]
 ** $url = THe Link You Want To Redirect To 
 ** $seconds = Seconds Before Redirecting
 */
 function redirectHome($theMsg , $url = null, $seconds= 3 ){
 
  echo "<div class='container'>";

  if($url === null){
    $url = 'index.php';
    $link = 'Homepage';
  }else{
    if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
      $url = $_SERVER['HTTP_REFERER'];
      $link = 'Previoud Page';
    }else{
      $url = 'index.php';
      $link = 'Homepage';
    }

  }

  echo  $theMsg ;
  echo "<div class ='alert alert-info'> You Will Be Redirected To " .$link. " After " .$seconds . "seconds.</div>";
  echo "</div>";
  header("refresh:$seconds;url=$url");
  exit();
 }





 /*
ﻩﺩﻮﺟﻮﻤﻟا ﺕﻼﺠﺴﻟا ﺩﺪﻋ ﺏﺎﺴﺣ 
 ** Count Number Of Items Function v1.0
 ** Function To Count Number Of Items Rows
 ** $item = The Item To Count 
 ** $table = The Table To Choose From
 */

 function countItems($item ,$table){

  global $connectDB ;

  $stmt2 = $connectDB->prepare("SELECT COUNT($item) FROM $table");

  $stmt2->execute();

  return $stmt2->fetchColumn();

 }


 /* 
 ** GET letest Records Function v1.0
 ** Function To Get Latest Items From Database [ Users , items , commenet]
 ** $select = Field To Select
 ** $table = The Table To Choose From
 ** $order = The Desc Ordering
 ** $limit = Number Of Records To Get
 */

 function getLatest($select ,$table, $where='' ,$order , $limit = 5 ){

  global $connectDB ;

  $getStmt =$connectDB->prepare("SELECT $select FROM $table $where ORDER BY $order DESC LIMIT $limit");

  $getStmt->execute();

  $rows = $getStmt->fetchAll();

  return $rows;

 }
 

?>