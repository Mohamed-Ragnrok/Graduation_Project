<?php
session_start();
ob_start();
$pageTitle = 'ارسال البحث';
include "init.php";


if (isset($_SESSION['user'])) {
  $getUser = $connectDB->prepare("SELECT * FROM students WHERE stu_id = ?");
  $getUser->execute(array($_SESSION['uid']));
  $info = $getUser->fetch();

  // SUBMIT 
  $do = isset($_GET['do']) ? $_GET['do'] : '';
  if ($do == 'insert') {
?>
    <h1 style="margin-top: 60px;" id="profile" class="text-center">ارسال البحث</h1>
    <div class="container">
      <form class="form-horizontal main-form " action="?do=Update" method="POST" enctype="multipart/form-data">
        <div class="information block">
          <div class="panel panel-primary">
            <div class="panel-heading">معلومات عامة</div>
            <div class="panel-body">
              <div class="col-md-12 item-info">
                <ul class="list-unstyled">
                  <li>
                    <span><?php echo $_SESSION['user'] ?> </span> <span style="font-weight: bold;"> : الاسم</span>
                    <i class="fas fa-user"></i>
                  </li>
                  <li>
                    <span><?php echo $_GET['memberName'] ?> </span> <span style="font-weight: bold;"> :اسم استاذ الماده</span>
                    <i class="fas fa-user"></i>
                  </li>
                  <li>
                    <span><?php echo $_GET['coursesName'] ?> </span> <span style="font-weight: bold;"> :اسم المقرر</span>
                    <!-- <i class="fas fa-user"></i> -->
                  </li>
                  <li>
                    <i style="float:right;" class="far fa-envelope fa-fw"></i>
                    <span style="font-weight: bold;float:right;"> :حدد مكان البحث في جهازك</span>
                    <input type="file" name="file" style="float:right;" />
                    <br><br>
                  </li>
                  <input type="hidden" name="coursesName" value="<?php echo $_GET['coursesName']; ?>">
                  <input type="hidden" name="bookId" value="<?php echo $_GET['bookId']; ?>">
                  <li>
                    <div class="alert alert-danger" role="alert">
                      يرجي التأكد من استكمال كل التعليمات الخاصه بالبحث , عملية ارسال البحث مره واحدة فقط
                    </div>
                    <input type="submit" value="ارسال" class="btn btn-primary btn-lg btn-block" />
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </form>

    </div>


  <?php
  } elseif ($do == 'Update') {

    echo '<h1 style="margin-top: 60px;" class="text-center">تم التسليم</h1>';
    echo "<div class='container'>";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      // Get Variables Form The Form
      $idStu   = $info['stu_id'];
      $idBook = $_POST['bookId'];
      $coursesName = $_POST['coursesName'];

      // $file  = $_FILES['file']['name'];
      $file = $idStu . $coursesName . '.PDF';
      if ($file) {
        $move = move_uploaded_file($_FILES["file"]["tmp_name"], "admin/uplodes/research/" . $file);
        if ($move) {
          echo "file uploaded";
        }
      }

      if($_FILES["file"]["tmp_name"]){
      // Updata The Database With This Info
      $stmt = $connectDB->prepare("UPDATE receive_books SET  submit_research =? , research_status=1 WHERE stu_id = ? AND book_id=?");
      $stmt->execute(array($file, $idStu, $idBook));
      //Echo Success Message
      echo '<div class="alert alert-success">   تم استلام البحث</div>';
    }else{
      echo '<div class="alert alert-danger">   اختر الملف</div>';
    }
    } else {

      $theMsg = '<div class="alert alert-danger"> Sorry You Cant Browse This Page Directly</div>';

      redirectHome($theMsg, 9);
    }

    echo "</div>";
  }
  ?>






<?php

} else {
  header('Location: login.php');
  exit();
}
include $tbl . "footer.php";
ob_end_flush();
?>