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
  <!--Start navigation header-->

  <!--end of  navigation header-->

  <!--Start side bar -->

  <!--end side bar-->
  <?php if ($_SESSION['status']  == 1) { ?>
    <!--Start Main content container-->
    <div class="main_content_container">

      <div class="main_container  main_menu_open">

        <!--Start system bath-->
        <div class="home_pass hidden-xs">
          <ul>
            <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
            <li class="bring_right"><a href="">الصفحة الرئيسية للوحة تحكم الموقع</a></li>
          </ul>
        </div>
        <!--/End system bath-->

        <div class="page_content">
          <div class="quick_links text-center">
            <h1 class="heading_title">انظمة التحكم</h1>
            <a href="../index.php" style="background-color: #c0392b">
              <h4>استعراض الموقع</h4>
            </a>
            <a href="?stu_settings" style="background-color: #34495e">
              <h4>شؤون الطلاب</h4>
            </a>
            <a href="?stu_finance" style="background-color: #95a5a6">
              <h4>مالية الطلاب</h4>
            </a>
            <a href="?book_document" style="background-color: #d35400">
              <h4>تسليم الكتب</h4>
            </a>
            <a href="?results" style="background-color: #2c3e50">
              <h4>اعلان النتائج</h4>
            </a>
          </div>

          <!-- start stining stu -->
          <?php if (isset($_GET['stu_settings'])) { ?>
            <div class="home_statics text-center">
              <h1 class="heading_title">شؤون الطلاب</h1>

              <div style="background-color: #1abc9c">
                <span class="bring_right glyphicon glyphicon-plus"></span>
                <a href="add_stu.php">
                  <h3>تسجيل</h3>
                  <p class="h4">الطلاب</p>
                </a>
              </div>

              <div style="background-color: #7f8c8d">
                <span class="bring_right glyphicon glyphicon-print"></span>
                <a href="add_report_attendance.php">
                  <h3>انشاء تقارير غياب</h3>
                  <p class="h4">الطلاب</p>
                </a>
              </div>

              <div style="background-color: #34495e">
                <span class="bring_right glyphicon glyphicon-user"></span>
                <a href="">
                  <h3>اعداد البطاقات</h3>
                  <p class="h4">الجامعية وتسليمها</p>
                </a>
              </div>

              <div style="background-color: #00b894">
                <span class="bring_right glyphicon glyphicon-file"></span>
                <a href="">
                  <h3>تقارير بيانات الطلاب </h3>
                  <p class="h4">بالاقسام</p>
                </a>
              </div>

              <div style="background-color: #636e72">
                <span class="bring_right glyphicon glyphicon-euro"></span>
                <a href="">
                  <h3>فحص الوضع المالى</h3>
                  <p class="h4">لاستلام الكارنيه</p>
                </a>
              </div>

              <div style="background-color: #d63031">
                <span class="bring_right glyphicon glyphicon-asterisk"></span>
                <a href="">
                  <h3>إدارة كل الامور التي</h3>
                  <p class="h4">تتعلق بالطالب</p>
                </a>
              </div>
            </div>
          <?php } ?>
          <!-- end stining stu -->

          <!-- start stining stu -->
          <?php if (isset($_GET['stu_finance'])) { ?>
            <div class="home_statics text-center">
              <h1 class="heading_title">مالية الطلاب</h1>

              <div style="background-color: #1abc9c">
                <span class="bring_right glyphicon glyphicon-search"></span>
                <a href="">
                  <h3>فحص مالية</h3>
                  <p class="h4">الطلاب</p>
                </a>
              </div>

              <div style="background-color: #7f8c8d">
                <span class="bring_right glyphicon glyphicon-print"></span>
                <a href="">
                  <h3>ايصدار ايصال دفع </h3>
                  <p class="h4">نقدية</p>
                </a>
              </div>

              <div style="background-color: #34495e">
                <span class="bring_right glyphicon glyphicon-plus"></span>
                <a href="pay_stu.php">
                  <h3>تحصيل المبالغ</h3>
                  <p class="h4">وتسجيلها</p>
                </a>
              </div>

              <div style="background-color: #00b894">
                <span class="bring_right glyphicon glyphicon-file"></span>
                <a href="report_finance.php">
                  <h3>ايصدار تقارير مالية</h3>
                  <p class="h4">يومية</p>
                </a>
              </div>

              <div style="background-color: #636e72">
                <span class="bring_right glyphicon glyphicon-euro"></span>
                <a href="">
                  <h3>ايصدار ايصال استلام</h3>
                  <p class="h4">نقدية</p>
                </a>
              </div>

              <div style="background-color: #d63031">
                <span class="bring_right glyphicon glyphicon-asterisk"></span>
                <h3>ايصدار الميزانية</h3>
                <p class="h4">*</p>
              </div>
            </div>
          <?php } ?>
          <!-- end stining stu -->

          <!-- start  Books and document -->
          <?php if (isset($_GET['book_document'])) { ?>
            <div class="home_statics text-center">
              <h1 class="heading_title">تسليم الكتب</h1>

              <div style="background-color: #2c3e50">
                <span class="bring_right glyphicon glyphicon-pencil"></span>
                <a href="receive_books.php">
                  <h3>تسجيل بيانات الكتب</h3>
                  <p class="h4">المسلمة للطلبة</p>
                </a>
              </div>

              <div style="background-color: #16a085">
                <span class="bring_right glyphicon glyphicon-road "></span>
                <a href="">
                  <h3>ارسال واستلام </h3>
                  <p class="h4">الطلبية للمطبعة</p>
                </a>
              </div>



            </div>
          <?php } ?>
          <!-- end Books and document  -->

          <!-- start  results -->
          <?php if (isset($_GET['results'])) { ?>
            <div class="home_statics text-center">
              <h1 class="heading_title">اعلان النتائج</h1>

              <div style="background-color: #2c3e50">
                <span class="bring_right  glyphicon glyphicon-list-alt"></span>
                <a href="">
                  <h3>تقارير عن نتائج</h3>
                  <p class="h4">الطلبة</p>
                </a>
              </div>

              <div style="background-color: #16a085">
                <span class="bring_right glyphicon glyphicon-file"></span>
                <a href="">
                  <h3>ايصدار تقدير الطالب</h3>
                  <p class="h4">بالسجل</p>
                </a>
              </div>



            </div>
          <?php } ?>
          <!-- end results  -->

          <div class="home_statics text-center">
            <h1 class="heading_title">احصائيات عامة للنظام</h1>

            <div style="background-color: #9b59b6">
              <span class="bring_right glyphicon glyphicon-home"></span>

              <h3>سنوات مكتملة</h3>

              <p class="h4">55</p>
            </div>

            <div style="background-color: #34495e">
              <span class="bring_right glyphicon glyphicon-phone-alt"></span>

              <h3>المتصلين الان</h3>

              <p class="h4">55</p>
            </div>
            <div style="background-color: #00adbc">
              <span class="bring_right glyphicon glyphicon-user"></span>

              <h3>عدد الطلاب</h3>

              <p class="h4">55</p>
            </div>
            <div style="background-color: #f39c12">
              <span class="bring_right glyphicon glyphicon-pencil"></span>

              <h3>عدد الدورات</h3>

              <p class="h4">55</p>
            </div>
            <div style="background-color: #2ecc71">
              <span class="bring_right glyphicon glyphicon-calendar"></span>

              <h3>الخطة الزمنية</h3>

              <p class="h4">55</p>
            </div>
          </div>
        </div>

      </div>
      <!--/End Main content container-->


    </div>
    <!--/End body container section-->
  <?php } elseif ($_SESSION['status'] == 2) { ?>
    <!--Start Main content container-->
    <div class="main_content_container">

      <div class="main_container  main_menu_open">

        <!--Start system bath-->
        <div class="home_pass hidden-xs">
          <ul>
            <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
            <li class="bring_right"><a href="">الصفحة الرئيسية للوحة تحكم الاستاذ</a></li>
          </ul>
        </div>
        <!--/End system bath-->

        <div class="page_content">
          <div class="quick_links text-center">
            <h1 class="heading_title">الصلاحيات الخاصة</h1>
            <a href="../index.php" style="background-color: #c0392b">
              <h4>استعراض الموقع</h4>
            </a>
            <a href="?stu_settings" style="background-color: #34495e">
              <h4>المقرارات</h4>
            </a>
            <a href="?stu_finance" style="background-color: #95a5a6">
              <h4>تسجيل حضور محاضرات</h4>
            </a>
            <a href="?book_document" style="background-color: #d35400">
              <h4>استلام الابحاث</h4>
            </a>
            <a href="?results" style="background-color: #2c3e50">
              <h4>درجات الطلبة</h4>
            </a>
          </div>

          <!-- start stining stu -->
          <?php if (isset($_GET['stu_settings'])) { ?>
            <div class="home_statics text-center">
              <h1 class="heading_title">المقرارات العملية</h1>
              <?php
              $allcourses = getAllFrom("*", "courses , college_departments , levels_of_study", "WHERE courses.member_id = {$_SESSION['ID']} AND levels_of_study.level_id = courses.level_id AND college_departments.dep_id = courses.dep_id", "courses_id", "ASC");
              foreach ($allcourses as $courses) {
                echo '<div style="background-color: #1abc9c">
                        <span class="bring_right glyphicon glyphicon-file"></span>
                        <a  target="_blank" href="show_corses.php?do='.$courses['courses_name'].'">
                          <h4>' . $courses['courses_name'] . '</h4>
                          <p class="h5">' . $courses['level_name'] . '</p>
                          <p class="h5">' . $courses['dep_name'] . '</p>
                        </a>
                      </div>';
              }
              ?>



            </div>
          <?php } ?>
          <!-- end stining stu -->

          <!-- start stining stu -->
          <?php if (isset($_GET['stu_finance'])) { ?>
            <div class="home_statics text-center">
              <h1 class="heading_title">كشوف حضور الطلاب المحاضرات</h1>

              <div style="background-color: #1abc9c">
                <span class="bring_right glyphicon glyphicon-search"></span>
                <a href="add_report_attendance.php">
                  <h3>اعداد </h3>
                  <p class="h4">الكشوفات</p>
                </a>
              </div>

            </div>
          <?php } ?>
          <!-- end stining stu -->

          <!-- start  Books and document -->
          <?php if (isset($_GET['book_document'])) { ?>
            <div class="home_statics text-center">
              <h1 class="heading_title">استلام ابحاث الطلاب</h1>
              <?php
              $allcourses = getAllFrom("*", "courses , college_departments , levels_of_study", "WHERE courses.member_id = {$_SESSION['ID']} AND levels_of_study.level_id = courses.level_id AND college_departments.dep_id = courses.dep_id", "courses_id", "ASC");
              foreach ($allcourses as $courses) {
                echo '<div style="background-color: #1abc9c">
                        <span class="bring_right glyphicon glyphicon-pencil"></span>
                        <a href="research_report.php?courses='.$courses['courses_id'].'">
                          <h4>' . $courses['courses_name'] . '</h4>
                          <p class="h5">' . $courses['level_name'] . '</p>
                          <p class="h5">' . $courses['dep_name'] . '</p>
                        </a>
                      </div>';
              }
              ?>
              

              



            </div>
          <?php } ?>
          <!-- end Books and document  -->

          <!-- start  results -->
          <?php if (isset($_GET['results'])) { ?>
            <div class="home_statics text-center">
              <h1 class="heading_title">درجات الخاصة بالطلاب</h1>

              <div style="background-color: #2c3e50">
                <span class="bring_right  glyphicon glyphicon-list-alt"></span>
                <a href="">
                  <h3>تقارير عن نتائج</h3>
                  <p class="h4">الطلبة</p>
                </a>
              </div>

              <div style="background-color: #16a085">
                <span class="bring_right glyphicon glyphicon-file"></span>
                <a href="">
                  <h3>ايصدار تقدير الطالب</h3>
                  <p class="h4">بالسجل</p>
                </a>
              </div>



            </div>
          <?php } ?>
          <!-- end results  -->

        </div>

      </div>
      <!--/End Main content container-->


    </div>
    <!--/End body container section-->
  <?php } ?>
  </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- Include all compiled plugins (below), or include individual files as needed -->
<?php
} else {

  header('Location: index.php');

  exit();
}
include('includes/templates/footer.php')  ?>
</body>

</html>