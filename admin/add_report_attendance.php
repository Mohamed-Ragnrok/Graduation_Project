<?php
session_start();
/*
================================================
    Departments Page
================================================
*/
//نسخه من صفحة الاقسام مشروع اونلاين
ob_start(); // Output Buffering Start

$pageTitle = 'لوحة الادارة';

if (isset($_SESSION['Username'])) {

  include "init.php"; ?>

  <div class="main_content_container">
    <div class="main_container  main_menu_open">

      <!--Start system bath-->
      <div class="home_pass hidden-xs">
        <ul>
          <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
          <li class="bring_right"><a href="index.php">الصفحة الرئيسية للوحة تحكم الموقع</a></li>
          <li class="bring_right"><a href="">انشاء تقرير حضور وغياب</a></li>
        </ul>
      </div>
      <!--/End system bath-->

      <div class="page_content text-center">
        <h1 class="heading_title">فتح تقرير غياب</h1>
        <p>اختيار الماده المراد تعبئة بيانات الغياب و الحضور الخاصه بها </p>

        <form action="attendance_absence_report.php" method="get">
          <select name="courses" style="width: 30%; height: 45px;">
            <?php
            if ($_SESSION['status']  == 1) {
              $allcourses = getAllFrom("*", "courses ,faculty_members , college_departments , levels_of_study ", "WHERE levels_of_study.level_id  = courses.level_id AND college_departments.dep_id  = courses.dep_id  AND courses.member_id = faculty_members.member_id", "college_departments.dep_id", "ASC");
            }elseif($_SESSION['status']  == 2){
              $allcourses = getAllFrom("*", "courses ,faculty_members ", "WHERE faculty_members.member_id = {$_SESSION['ID']} AND courses.member_id = faculty_members.member_id", "courses_id", "ASC");
            }
            foreach ($allcourses as $courses) {
              echo '<option value="' . $courses['courses_id'] . '">' . $courses['courses_name'] . " => " . $courses['member_name'] . " => " . $courses['dep_cut']. " => " . $courses['level_name']. '</option>';
            }
            ?>
          </select><br>
          <button style="width: 30%; margin-top: 10px;" class="btn btn-primary" type="submit">Done</button>
        </form>
      </div>
    </div>
  </div>


<?php } else {

  header('Location: index.php');

  exit();
}
include('includes/templates/footer.php')  ?>
</body>

</html>