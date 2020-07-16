<?php

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

   function checkstu($select, $form, $where1 , $value1 , $where2 , $value2){

    global $connectDB ;

    $statement =$connectDB->prepare("SELECT $select FROM $form WHERE $where1 = ? AND $where2 = ?");

    $statement->execute(array($value1 , $value2)); 

    $count = $statement->rowCount();
    return $count;  
   }


   /*
  ﻩﺩﻮﺟﻮﻤﻟا ﺕﻼﺠﺴﻟا ﺩﺪﻋ ﺏﺎﺴﺣ
   ** Count Number Of Items Function v1.0
   ** Function To Count Number Of Items Rows
   ** $item = The Item To Count 
   ** $table = The Table To Choose From
   */

   function countItems($item ,$table ,$where=Null ){

    global $connectDB ;

    $stmt2 = $connectDB->prepare("SELECT COUNT($item) FROM $table $where");

    $stmt2->execute();

    return $stmt2->fetchColumn();

   }



    /* 
 ** GET  All Function v2.0
 ** Function To Get All Recorde Form Any Database Table 
 */

 function getAllFrom($field,$table,$where = Null ,$orderBy , $ordering = 'DESC'){

  global $connectDB ;

  $getAll =$connectDB->prepare("SELECT $field FROM $table $where ORDER BY $orderBy $ordering ");

  $getAll->execute();

  $all = $getAll->fetchAll();

  return $all;

 }
