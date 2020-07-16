<?php
session_start();
    /*
    ================================================
       Student Page
    ================================================
    */
    ob_start(); // Output Buffering Start

    $pageTitle = 'غياب وحضور الطلاب';
    $nonavbar = "" ;


    if (isset($_SESSION['Username'])){
        include "init.php";
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $courses=$_GET['courses'];
        }

        ?>
        
        <div class="main_content_container" style="width : 21sm;">
            <!-- <h1 class="heading_title">طلاب القسم</h1>-->
                <div class="table-responsive">
                    <table style="width : 21sm;" class="main-table manage-members table-center table table-bordered">
                        <thead>
                            <td style="font-size: 10px; width : 5%;">رقم</td>
                            <td style="font-size: 10px; width : 25%;"> الاسم</td>
                            <td style="font-size: 10px; width : 7%;">مـ 1</td>
                            <td style="font-size: 10px; width : 7%;">مـ 2</td>
                            <td style="font-size: 10px; width : 7%;">مـ 3</td>
                            <td style="font-size: 10px; width : 7%;">مـ 4</td>
                            <td style="font-size: 10px; width : 7%;">مـ 5</td>
                            <td style="font-size: 10px; width : 7%;">مـ 6</td>
                            <td style="font-size: 10px; width : 7%;">مـ 7</td>
                            <td style="font-size: 10px; width : 7%;">مـ 8</td>
                            <td style="font-size: 10px; width : 7%;">مـ 9</td>
                            <td style="font-size: 10px; width : 7%;">مـ 10</td>
                            
                        </thead>
                        <?php

                        $stu_attendance= getAllFrom("*","students , levels_of_study , courses ,college_departments",
                        "WHERE students.level_id = levels_of_study.level_id AND courses.level_id = levels_of_study.level_id AND college_departments.dep_id = courses.dep_id AND college_departments.dep_id = students.dep_id AND courses.courses_id ={$courses} " , "first_name,second_name,third_name,famliy_name" , "ASC");
                        $count = 1 ;
                        
                        foreach($stu_attendance as $stu){
                            // Check If User Exist In Database
                            $check = checkstu("stu_id , courses_id" , "attendance_lectures" ,"stu_id" , "{$stu['stu_id']}" , "courses_id" , "{$courses}")  ;
                            if($check != 1){
                                // Insert Userinfo In Database
                                $stmt = $connectDB->prepare("INSERT INTO attendance_lectures
                                (stu_id , courses_id, day_1, day_2, day_3, day_4, day_5, day_6, day_7, day_8, day_9, day_10,status, created_at)
                                VALUES(:xuser , :xcourses ,0,0,0,0,0,0,0,0,0,0,0,now() ) ");
                                $stmt->execute(array(
                                'xuser' 		=> $stu['stu_id']     ,
                                'xcourses' 		=> $courses 
                                ));
                            };
                            

                        echo "<tr>";

                            echo  '<td style="font-size: 10px; width : 5px;"> '. $count++ .'</td>';
                            echo  '<td style="font-size: 10px;"> '. $stu['first_name'] . " " . $stu['second_name'] . " "  . $stu['third_name'] . " " . $stu['famliy_name']  .'</td>';
                            $stu_report= getAllFrom("*","students , levels_of_study , courses ,college_departments, attendance_lectures",
                            "WHERE students.level_id = levels_of_study.level_id AND
                             courses.level_id = levels_of_study.level_id AND
                              college_departments.dep_id = courses.dep_id AND
                               college_departments.dep_id = students.dep_id AND
                                attendance_lectures.stu_id = students.stu_id AND
                                 attendance_lectures.courses_id = courses.courses_id AND
                                   courses.courses_id ={$courses} AND
                                    students.stu_id ={$stu['stu_id']} " ,
                                     "students.stu_id" , "ASC");
                            // All Lecture 
                            
                            
                            for($i = 1 ; $i <= 10 ; $i++ ){
                                echo '<td style="font-size: 10px;">';
                                foreach($stu_report as $report){
                                echo '<form action="add_attendance.php" method="POST">';
                                    echo '<input type="hidden" name="userid" value="'.$report['stu_id'].'">';
                                    echo '<input type="hidden" name="day" value="'.$i.'">';
                                    echo '<input type="hidden" name="courses" value="'.$courses.'">';
                                    // '. "onclick=window.open('add_attendance.php','_blank');" .' كود لفتح صفحه جديده يوضع في button
                                    echo '<button style="margin-right: 15px; position: absolute; height: 20px;" type="submit" '; 
                                if($report['day_'.$i] == 1){
                                    echo 'class="btn btn-success btn-sm"></button><input type="checkbox" name="attendace1"  checked>';
                                    
                                }elseif($report['day_'.$i] == 0){
                                    echo 'class="btn btn-danger btn-sm"></button><input type="checkbox" name="attendace1">';
                                }
                                
                                echo '</form>';
                                
                                }
                                echo '</td>';
                            }
                            
                        echo "</tr>";
                        };
                        
                        
                        ?>
                        
                        <tfoot>
                            <tr>
                            <?php
                            $info_courses= getAllFrom("*","levels_of_study , courses ,college_departments , faculty_members",
                            "WHERE courses.level_id = levels_of_study.level_id AND college_departments.dep_id = courses.dep_id AND courses.member_id = faculty_members.member_id AND courses.courses_id ={$courses} " , "courses.courses_id" , "ASC");
                            foreach($info_courses as $info){
                                echo '<td colspan="2" style="height : 60px;">المقرر :<br> '.$info['courses_name'] .'</td>' ;
                                echo '<td colspan="3" style="height : 60px;" >القسم :<br> '.$info['dep_name'] . '</td>' ;
                                echo '<td colspan="2" style="height : 60px;" >الدفعة :<br> '.$info['level_name'] . '</td>';
                                echo '<td colspan="2" style="height : 60px;" >دكتور المادة :<br> ' .$info['member_name'] . '</td>' ;
                            }
                            ?>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <a title="Print Screen" alt="Print Screen" onclick="window.print();" target="_blank" style="cursor:pointer;" ><span class="btn btn-primary glyphicon glyphicon-print"> طباعة</span></a>
                <a style="margin-right: 50px;" href="add_report_attendance.php"><span class="btn btn-primary"> رجوع</span></a>


                <!--/End Main content container-->
        </div>
            <!--/End body container section-->
        </div>
    </div>
    <?php

    }
    else{

        header('Location: index.php');

        exit();
    }



    ob_end_flush(); // Release The Output

?>
