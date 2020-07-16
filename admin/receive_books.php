<?php
session_start();
/*
================================================
    add Page
================================================
*/
ob_start(); // Output Buffering Start

$pageTitle = 'تسليم الكتب ';
include "init.php";

if (isset($_SESSION['Username'])) {



  $do = isset($_GET['do']) ? $_GET['do'] : '';


?>

  <div class="main_content_container">
    <div class="main_container  main_menu_open">

      <!--Start system bath-->
      <div class="home_pass hidden-xs">
        <ul>
          <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
          <li class="bring_right"><a href="dashboard.php?stu_settings">تسليم الكتب</a></li>
          <li class="bring_right"><a href="add_stu.php">تسجيل بيانات تسليم الطلبة</a></li>
        </ul>
      </div>
      <!--/End system bath-->

      <div class="page_content" style="margin: 0px 20px 80px  20px;">
        <h1 class="heading_title">تسجيل بيانات الاستلام </h1>
        <p class="text-center">ادخل كود الطالب</p>
        <form class="form-inline text-center" action="receive_books.php?do=search" method="POST">
          <div class="form-group">
            <input type="text" id="some" autocomplete="off" name="search" class="form-control" placeholder="بحث عن ....">
            <button type="submit" id="se" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>
            </button>
          </div>
        </form>
        <div class=" text-center">
          <ul class="searchList">

          </ul>
          <!--<li class="text-center" style=" display: block;">محمد شعبان</li>  -->
        </div>
        <div class="quick_links text-center">
          <?php
          if ($do == 'search') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $stu_id = $_POST['search'];
              $searchDB = getAllFrom(
                "*",
                "students , levels_of_study , college_departments , courses , books",
                "WHERE levels_of_study.level_id = students.level_id 
                AND college_departments.dep_id = students.dep_id 
                AND levels_of_study.level_id = courses.level_id 
                AND college_departments.dep_id = courses.dep_id 
                AND courses.courses_id = books.courses_id
                AND students.stu_id = {$_POST['search']}",
                "semester",
                "ASC"
              );


              $SearchInfoStu = getAllFrom(
                "*",
                "students , levels_of_study , college_departments",
                "WHERE levels_of_study.level_id = students.level_id 
                AND college_departments.dep_id = students.dep_id 
                AND students.stu_id = {$_POST['search']}",
                "stu_id",
                "ASC"
              );
              foreach ($SearchInfoStu as $q) {
          ?>
                <h1>بيانات الاستلام</h1>
                <div class="form-row">
                  <div style="float: right;" class="form-group col-md-6">
                    <label for="famliyname">اسم الطالب</label>
                    <input type="text" class="form-control" value="<?php echo $q['first_name'] . " " . $q['second_name'] . " "  . $q['third_name'] . " " . $q['famliy_name']  ?>" name="stu_name">
                  </div>
                  <div style="float: right;" class="form-group col-md-3">
                    <label for="famliyname">الدفعه</label>
                    <input type="text" class="form-control" value="<?php echo $q['level_name'] ?>" name="stu_level">
                  </div>
                  <div style="float: right;" class="form-group col-md-3">
                    <label for="famliyname">القسم</label>
                    <input type="text" class="form-control" value="<?php echo $q['dep_name'] ?>" name="stu_dep">
                  </div>
                </div>
              <?php } ?>

              <table class="main-table  table-center table table-bordered">
                <thead class="bg-success">
                  <td >اسم الكتاب</td>
                  <td> استلام الطالب</td>
                  <td>حالة الاستلام </td>
                  <td>تاريخ الاستلام</td>
                </thead>
                <?php
                foreach ($searchDB as $data) {
                  $check = checkstu("stu_id , book_id", "receive_books", "stu_id", "{$data['stu_id']}", "book_id", "{$data['book_id']}");
                  if ($check != 1) {
                    // Insert Userinfo In Database
                    $stmt = $connectDB->prepare("INSERT INTO receive_books
                                            (book_id , stu_id, book_status, Receive_books , submit_research , research_status , receive_research)
                                            VALUES(:xbook , :xuser ,0,now(),NULL,0,0 ) ");
                    $stmt->execute(array(
                      'xbook'     => $data['book_id'],
                      'xuser'     => $data['stu_id']
                    ));
                  };
                  echo "<tr>";
                  echo "<td>" .  $data['book_name']  ; if($data['semester'] == 1){echo '<span style="border: solid;  color: cadetblue; float: left;"> ترم اول </span>';}else{echo'<span style="border: solid;  color: brown; float: left;"> ترم ثاني </span>';} echo "</td>";
                  echo "<td>";
                  $as= $data['stu_id'];
                  $ad= $data['book_id'];
                      echo '<a href="add_receive.php?userid=';echo $as.'&bookid=';echo $ad.'';
                      $info_receive = getAllFrom("*", "receive_books", "WHERE book_id ={$data['book_id']} AND stu_id ={$data['stu_id']} ", "receive_books_id ", "ASC");
                      foreach ($info_receive as $qq) {
                        if ($qq['book_status'] == 1) {
                          echo '&receive=" onclick="javascript:window.close();" target="_blank" style="margin-left: 15px;  height: 20px;" type="submit" class="btn btn-success btn-sm"></a><input type="checkbox" name="receive"  checked>';
                          $book_status = $qq['book_status'];
                          $Receive_books = $qq['Receive_books'];
                        } elseif ($qq['book_status'] == 0) {
                          echo '&receive=1" onclick="javascript:window.close();" target="_blank" style="margin-left: 15px;  height: 20px;" type="submit" class="btn btn-danger btn-sm"></a><input type="checkbox" name="receive">';
                          $book_status = $qq['book_status'];
                          $Receive_books = "-";
                        }
                      }
                  echo "</td>";
                echo "<td>" ;  if($book_status == 1){echo'<h5 style="color:green">تم التسليم</h5>';}else{echo'<h5 style="color:red">لم يستلم</h5>';} 
                echo "</td>";
                echo "<td>" .  $Receive_books . "</td>";
                }
                ?>
              </table>
          <?php
            }
          }
          ?>
        </div>


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