<?php
session_start();
ob_start(); // Output Buffering Start


$nonavbar = "";
$pageTitle = 'Login';
if (isset($_SESSION['Username']) /*&& $_SESSION['admin_status'] == 1*/) {  // لو كنت سجلت قبل كدا هتدخل علي اللوحه عل طول
  header('Location: dashboard.php');
}
include "init.php";

//chack If User Coming Form HTTP post Request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $status   = $_POST['status'];

  if ($status == 1) {
    // Check If The User Exist In Database التأكد من وجود الاسم والباس في قاعده البيانات
    $stmt = $connectDB->prepare("SELECT *
                                  From login
                                  WHERE username='{$username}' AND password = '{$password}'
                                  LIMIT 1 ");
    $stmt->execute();
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    //if count > 0 this user in database هنا لو هو اجمن فعلا يدخل وتبدء الجلسة
    if ($count > 0 /*&& password_verify($password, $row['Password'])*/) {
      $_SESSION['Username'] = $row['name']; // Register Session name
      $_SESSION['ID'] = $row['id']; //Register Session ID
      $_SESSION['status'] = $row['admin_status'];
      header('Location: dashboard.php');
      exit();
    }
  } elseif ($status == 2) {
    // Check If The User Exist In Database التأكد من وجود الاسم والباس في قاعده البيانات
    $stmt = $connectDB->prepare("SELECT *
                                  From faculty_members
                                  WHERE member_email='{$username}' AND password = '{$password}'
                                  LIMIT 1 ");
    $stmt->execute();
    $row = $stmt->fetch();
    $count = $stmt->rowCount();

    //if count > 0 this user in database هنا لو هو اجمن فعلا يدخل وتبدء الجلسة
    if ($count > 0 /*&& password_verify($password, $row['Password'])*/) {
      $_SESSION['Username'] = $row['member_name']; // Register Session name
      $_SESSION['ID'] = $row['member_id']; //Register Session ID
      $_SESSION['status'] = $row['member_status'];
      header('Location: dashboard.php');
      exit();
    }
  }
} ?>

<!--Start Login Form-->
<div class="login_area">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title">تسجيل الدخول الي لوحة التحكم</h4>
      </div>
      <div id="test" class="modal-body notvis">
        ادخل اسم المستخدم وكلمة المرور
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" style="direction: ltr">
          <div class="input-group input-group-lg">
            <input type="text" name="username" class="form-control" placeholder="اسم المستخدم" aria-describedby="username" required="required">
            <span class="input-group-addon glyphicon glyphicon-user" id="username"></span>
          </div>
          <div class="input-group input-group-lg">
            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" aria-describedby="password" required="required">
            <span class="input-group-addon glyphicon glyphicon-lock" id="password"></span>
          </div>
          <div class="input-group input-group-lg">
            <select class="form-control" name="status" required="required">
              <option value="1">إداري</option>
              <option value="2">استاذ</option>
            </select>
            <span class="input-group-addon glyphicon glyphicon-user"></span>
          </div>
          <div class="alert alert-warning" role="alert">
            برجاء تحديد صلاحية الدخول (اداري او استاذ)
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> حفظ بيانات الدخول
            </label>
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">تسجيل دخول</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--End Login From-->



<?php include $tbl . "footer.php";

ob_end_flush();
?>