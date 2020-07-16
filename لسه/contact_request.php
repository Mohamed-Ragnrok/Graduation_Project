<?php 
session_start();
ob_start();
$pageTitle = 'Thinx ..';
include "init.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $userForm   =  filter_var($_POST['username'] , FILTER_SANITIZE_STRING);
    $email  =  filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL) ;
    $phone  =  filter_var( $_POST['cellphone'] , FILTER_SANITIZE_NUMBER_INT );
    $massage=  filter_var($_POST['massage'] , FILTER_SANITIZE_STRING );

    $formErorr = array();

    if( strlen($userForm) < 3 ){
        $formErorr[] = 'username must Larger Then <strong>3</strong> Characters';
    }

    if( strlen($massage) < 10 ){
        $formErorr[] = 'massage must Larger Then <strong>10</strong> Characters';
    }

    // If No Errors Send The Email [ With Function mail(to , subject , Message , Headers , Parameters)]

    $headers =  'From:'. $email . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
    $myEmail = array('mandomando902@gmail.com','mohamed_mando_201110@yahoo.com');
    $to= implode(',',$myEmail);
    $subject = 'Contact Form With:' . $userForm ;

    if(empty($formErorr)){
        mail($to , $subject , $massage ,$headers );
        

        $userForm   = '';
        $email  = '';
        $phone  = '';
        $massage= '';

        $success = '<div class="alert alert-success">We Have Recieved Your Message</div>';
     
    }else{?>
            <br><br><br><br>
            <div class="alert alert-danger alert-dismissible" role="start">
                <button type="button" class="close" data-dismiss="alert" aria-lable="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            <?php
                    foreach($formErorr as $erorr){
                        echo  $erorr . '<br>';
                    }
            ?> 
            </div> 
            <br><br><br><br>
            <?php
    }

}
 

     if(isset($success)) {echo '<br><br><br><br>' . $success . '<br><br><br><br>';} 

include $tbl ."footer.php";
ob_end_flush();

?>