<?php
session_start();
/*
    ================================================
       Student Page
    ================================================
    */
ob_start(); // Output Buffering Start

$pageTitle = 'غياب وحضور الطلاب';
$nonavbar = "";


if (isset($_SESSION['Username']) && $_SESSION['status'] == 2) {
  include "init.php";
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $courses = $_GET['courses'];
  }

?>

  <div class="main_content_container" style="width : 21sm;">
    <!-- <h1 class="heading_title">طلاب القسم</h1>-->
    <div class="table-responsive">
      <table style="width : 21sm;" class="main-table manage-members table-center table table-bordered">
        <thead>
          <td style="font-size: 15px; width : 5%;">رقم</td>
          <td style="font-size: 15px; width : 25%;"> الاسم</td>
          <td style="font-size: 15px; width : 30%;">ملفات الابحاث</td>
          <td style="font-size: 15px; width : 7%;">Control</td>

        </thead>
        <?php

        $stu_attendance = getAllFrom(
          "*",
          "students , levels_of_study , courses ,college_departments",
          "WHERE students.level_id = levels_of_study.level_id 
                        AND courses.level_id = levels_of_study.level_id 
                        AND college_departments.dep_id = courses.dep_id 
                        AND college_departments.dep_id = students.dep_id 
                        AND courses.courses_id ={$courses} ",
          "first_name,second_name,third_name,famliy_name",
          "ASC"
        );
        $count = 1;

        foreach ($stu_attendance as $stu) {
          // Check If User Exist In Database

          echo "<tr>";

          echo  '<td style="font-size: 15px; width : 5px;"> ' . $count++ . '</td>';
          echo  '<td style="font-size: 15px;"> ' . $stu['first_name'] . " " . $stu['second_name'] . " "  . $stu['third_name'] . " " . $stu['famliy_name']  . '</td>';
          $stu_report = getAllFrom(
            "*",
            "students , levels_of_study , courses ,college_departments ,books , receive_books",
            "WHERE students.level_id = levels_of_study.level_id AND
                             courses.level_id = levels_of_study.level_id AND
                              college_departments.dep_id = courses.dep_id AND
                               college_departments.dep_id = students.dep_id AND
                               receive_books.stu_id = students.stu_id AND
                               receive_books.book_id = books.book_id AND
                               courses.courses_id = books.courses_id AND
                               

                                   courses.courses_id ={$courses} AND
                                    students.stu_id ={$stu['stu_id']} ",
            "students.stu_id",
            "ASC"
          );
          // All Lecture 
          foreach ($stu_report as $report) {
          echo '<td><a target="_blank" href="show_corses.php?re='. $report['submit_research'] .'"><h6>'. $report['submit_research'] .'</h6></a></td>';
          echo '<td style="font-size: 10px;">';
          
            echo '<form action="add_attendance.php" method="POST">';
            echo '<input type="hidden" name="stuid" value="' . $report['stu_id'] . '">';
            echo '<input type="hidden" name="book_id" value="' . $report['book_id'] . '">';
            echo '<input type="hidden" name="courses" value="' . $courses . '">';
            // '. "onclick=window.open('add_attendance.php','_blank');" .' كود لفتح صفحه جديده يوضع في button
            echo '<button style="margin-right: 15px; position: absolute; height: 20px;" type="submit" ';
            if ($report['receive_research'] == 1) {
              echo 'class="btn btn-success btn-sm"></button><input type="checkbox" name="receive_research1"  checked>';
            } elseif ($report['receive_research'] == 0) {
              echo 'class="btn btn-danger btn-sm"></button><input type="checkbox" name="receive_research0">';
            }

            echo '</form>';
          }
          echo '</td>';


          echo "</tr>";
        };


        ?>

        <tfoot>
          <tr>
            <?php
            $info_courses = getAllFrom(
              "*",
              "levels_of_study , courses ,college_departments , faculty_members",
              "WHERE courses.level_id = levels_of_study.level_id AND college_departments.dep_id = courses.dep_id AND courses.member_id = faculty_members.member_id AND courses.courses_id ={$courses} ",
              "courses.courses_id",
              "ASC"
            );
            foreach ($info_courses as $info) {
              echo '<td colspan="2" style="height : 60px;">المقرر :<br> ' . $info['courses_name'] . '</td>';
              echo '<td colspan="3" style="height : 60px;" >القسم :<br> ' . $info['dep_name'] . '</td>';
              echo '<td colspan="2" style="height : 60px;" >الدفعة :<br> ' . $info['level_name'] . '</td>';
              echo '<td colspan="2" style="height : 60px;" >دكتور المادة :<br> ' . $info['member_name'] . '</td>';
            }
            ?>
          </tr>
        </tfoot>
      </table>

    </div>
    <a title="Print Screen" alt="Print Screen" onclick="window.print();" target="_blank" style="cursor:pointer;"><span class=" glyphicon glyphicon-print"> طباعة</span></a>


    <!--/End Main content container-->
  </div>
  <!--/End body container section-->
  </div>
  </div>
<?php

} else {

  header('Location: index.php');

  exit();
}



ob_end_flush(); // Release The Output

?>