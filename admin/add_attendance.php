<?php
session_start();
    /*
    ================================================
       add attendce Page
    ================================================
    */
    ob_start(); // Output Buffering Start

    $pageTitle = 'تسجيل';
    
    include "init.php";
    if (isset($_SESSION['Username'])){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(empty($_POST['attendace1'])){
                $x = 0 ;

                ?>
                <div class="main_content_container">
                    <div class="main_container  main_menu_open">

                        <!--Start system bath-->
                        <div class="home_pass hidden-xs">
                            <ul>
                                <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                                <li class="bring_right"><a href="index.php">الصفحة الرئيسية للوحة تحكم الموقع</a></li>
                                <li class="bring_right"><a href="add_report_attendance.php">تسجيل غياب </a></li>
                            </ul>
                        </div>
                        <!--/End system bath-->

                        <div class="page_content text-center">
                            <h1 class="heading_title">تسجيل غياب محاضرة <?php echo $_POST['day'] ?></h1>


                        <?php
                        // Updata The Database With This Info
                        $stmt = $connectDB->prepare("UPDATE attendance_lectures SET day_{$_POST['day']}=?, updated_at =now() WHERE courses_id =? AND stu_id = ?");
                        $stmt->execute(array($x , $_POST['courses'] , $_POST['userid']));
                        //Echo Success Message 
                        $theMsg = '<div class="alert alert-success">'.$stmt->rowCount() .' Record Updated</div>'; 

                        redirectHome($theMsg ,'back' ,.0); 
                    
                
            }else{

                $x = 1 ;
                
                ?>
                <div class="main_content_container">
                    <div class="main_container  main_menu_open">

                        <!--Start system bath-->
                        <div class="home_pass hidden-xs">
                            <ul>
                                <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                                <li class="bring_right"><a href="index.php">الصفحة الرئيسية للوحة تحكم الموقع</a></li>
                                <li class="bring_right"><a href="add_report_attendance.php">تسجيل غياب </a></li>
                            </ul>
                        </div>
                        <!--/End system bath-->

                        <div class="page_content text-center">
                                <h1 class="heading_title">تسجيل غياب محاضرة <?php echo $_POST['day'] ?></h1>
                            
                            <?php
                           
                            
                            // Updata The Database With This Info
                            $stmt = $connectDB->prepare("UPDATE attendance_lectures SET day_{$_POST['day']}=?, updated_at =now() WHERE courses_id =? AND stu_id = ?");
                            $stmt->execute(array($x,$_POST['courses'],$_POST['userid'] ));
                            //Echo Success Message 
                            $theMsg = '<div class="alert alert-success">'.$stmt->rowCount() .' Record Updated</div>'; 

                            redirectHome($theMsg ,'back' ,.0);	
                        }
                            ?>
                        </div>
                    </div>
                </div>

                
                <?php
        
        }else{
            ?>
                <div class="main_content_container">
                    <div class="main_container  main_menu_open">

                        <!--Start system bath-->
                        <div class="home_pass hidden-xs">
                            <ul>
                                <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                                <li class="bring_right"><a href="index.php">الصفحة الرئيسية للوحة تحكم الموقع</a></li>
                                <li class="bring_right"><a href="add_report_attendance.php">تسجيل غياب </a></li>
                            </ul>
                        </div>
                        <!--/End system bath-->

                        <div class="page_content text-center">
                            <h1 class="heading_title">لا تستطيع الوصول الي هذه الصفحة مباشرة </h1>
                            <p></p>
                        </div>
                    </div>
                </div>

                
                <?php
        }
}else{

header('Location: index.php');

exit();
}
include ('includes/templates/footer.php')  ?>
</body>

</html> 
    
    
?>

