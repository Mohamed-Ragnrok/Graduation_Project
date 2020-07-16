<?php
    include 'includes/connectDB.php';
    include "includes/functions/functions.php";

    // $d = getAllFrom("*","departments","" ,"id" , "ASC");
     $data = filter_var($_POST['text'] ,FILTER_SANITIZE_STRING);

     if(!empty($data)){
        $search = getAllFrom("*","students","WHERE stu_id LIKE '%$data%'","stu_id","ASC") or die() ;

        foreach($search as $key => $fetch){
            echo '<li style="display: block;"><a href="profile.php?do=Manage&stu_id='.$fetch['stu_id'].'">'. $fetch['first_name'] . " " . $fetch['second_name'] . " "  . $fetch['third_name'] . " " . $fetch['famliy_name']  .'</a></li>';
            if($key == 5){
                break ;
            }
        }

       
     }







?>