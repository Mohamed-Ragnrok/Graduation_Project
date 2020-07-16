<?php
session_start();
ob_start();
$pageTitle = 'Profile';
include "init.php";


if (isset($_SESSION['user'])) {
  $getUser = $connectDB->prepare("SELECT * FROM students WHERE stu_id = ?");
  $getUser->execute(array($_SESSION['uid']));
  $info = $getUser->fetch();

  // Edit Profile Page
  $do = isset($_GET['do']) ? $_GET['do'] : '';
  if ($do == $sessionUser) {
?>
    <h1 style="margin-top: 60px;" id="edit" class="text-center">Change Password</h1>
    <div class="container">
      <form class="form-horizontal main-form " action="?do=Update" method="POST">
        <input type="hidden" name="userid" value="<?php echo $info['stu_id']; ?>">

        <!-- Start Password Filed -->
        <div class="form-group form-group-lg">
          <label class="col-sm-2 control-lable">New Password</label>
          <div class="col-sm-10 col-md-8">
            <input type="password" name="newpassword" class="form-control" autocomplete="new-password" placeholder="Leave Blank If You Dont Want Change" />
          </div>
        </div>
        <!-- End Password Filed -->

        <!-- Start submit Filed -->
        <div class="form-group form-group-lg">
          <div class="col-sm-offset-2 col-sm-8">
            <input type="submit" value="حفظ" class="btn btn-primary btn-lg" />
          </div>
        </div>
        <!-- End submit Filed -->
      </form>
    </div>
  <?php
  } elseif ($do == 'Update') {
    echo '<h1 style="margin-top: 60px;" class="text-center">Update Members</h1>';
    echo "<div class='container'>";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Get Variables Form The Form
      $id   = $_POST['userid'];

      // Password Trick :)
      $pass = empty($_POST['newpassword']) ? $info['password'] : password_hash($_POST['newpassword'], PASSWORD_DEFAULT);



      // Loop Into Errors Array And Echo It
      foreach ($formErorrs as $erorr) {
        echo '<div class="alert alert-danger">' . $erorr . '</div>';
      }

      //Check If Thers's No Erorr Proceed The Update Operation
      if (empty($formErorrs)) {

        // Updata The Database With This Info
        $stmt = $connectDB->prepare("UPDATE students SET  Password =? WHERE stu_id = ?");
        $stmt->execute(array($pass, $id));
        //Echo Success Message
        $theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Updated</div>';

        redirectHome($theMsg, 'back', 1);
      }
    } else {

      $theMsg = '<div class="alert alert-danger"> Sorry You Cant Browse This Page Directly</div>';

      redirectHome($theMsg, 9);
    }

    echo "</div>";
  } else {



  ?>
    <h1 style="margin-top: 60px;" id="profile" class="text-center">My Profile</h1>

    <div class="information block">
      <div class="container">
        <div class="panel panel-primary">
          <div class="panel-heading">معلومات شخصية</div>
          <div class="panel-body">
            <div class="col-md-3">
              <img class="img-responsive img-thumbnail center-block" src="admin/uplodes/avatars/<?php echo $info['picture']; ?>" alt="User Image" />
            </div>
            <div class="col-md-9 item-info">
              <ul class="list-unstyled">

                <li>

                  <span><?php echo $_SESSION['user'] ?> </span> <span style="font-weight: bold;"> : الاسم</span>
                  <i class="fas fa-user"></i>
                </li>
                <li>

                  <span><?php echo $_SESSION['uid'] ?> </span> <span style="font-weight: bold;"> : كود الطالب</span>
                  <i class="fas fa-user"></i>
                </li>
                <li>
                  <span><?php echo $info['email']  ?> </span> <span style="font-weight: bold;"> : البريد الجامعي</span>
                  <i class="far fa-envelope fa-fw"></i>
                </li>
                <li>
                  <span><?php

                        $mydeparts = getAllFrom("*", "college_departments", "WHERE college_departments.dep_id ={$info['dep_id']}", "dep_id");
                        foreach ($mydeparts as $mydepa) {
                          echo $mydepa["dep_name"];
                        }  ?>
                  </span> <span style="font-weight: bold;"> : القسم</span>
                  <i class="fas fa-graduation-cap"></i>
                </li>
                <li>
                  <span><?php

                        $mylevels = getAllFrom("*", "levels_of_study", "WHERE levels_of_study.level_id ={$info['level_id']}", "level_id");
                        foreach ($mylevels as $mylevel) {
                          echo $mylevel["level_name"];
                        }  ?>
                  </span> <span style="font-weight: bold;"> : الفرقة </span>
                  <i class="fas fa-layer-group"></i>
                </li>
                <li>
                  <span><?php echo $info['Date_of_Birth']  ?> </span> <span style="font-weight: bold;"> : تاريخ الميلاد</span>
                  <i class="far fa-calendar-alt fa-fw"></i>
                </li>
                <li>
                  <span><?php echo $info['Nationality']  ?> </span> <span style="font-weight: bold;"> : الجنسية</span>
                  <i class="far fa-calendar-alt fa-fw"></i>
                </li>

              </ul>
            </div>
            <a href='profile.php?do=<?php echo $info['first_name'] . " " . $info['second_name'] . " "  . $info['third_name'] . " " . $info['famliy_name'] ?>' class="btn btn-primary">تغيير كلمة المرور</a>
            <div class="alert alert-danger" role="alert">
              في حين كنت اول مره تسجل دخولك يرجي تغيير كلمة المرور
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div id="my-ads" class="my-ads block"> -->
    <div id="" class=" block">
      <div class="container">
        <div class="panel panel-primary">
          <div class="panel-heading">المقرارات ونسبة حضور وغياب كل مقرر</div>
          <div class="panel-body">

            <?php
            $myItems = getAllFrom("*", "courses ,faculty_members", "WHERE courses.member_id = faculty_members.member_id AND dep_id={$info['dep_id']} AND level_id={$info['level_id']}", "semester", "ASC");
            if (!empty($myItems)) {
              echo '<div class="row">';
              foreach ($myItems as $item) {
                echo '<div class ="col-sm-6 col-md-3">';
                echo '<div class ="thumbnail item-box">';
                // if($item['semester'] == 1){echo '<span class ="approve-status">ترم اول</span>';}else{echo '<span class ="approve-status">ترم ثاني</span>';}
                if ($item['semester'] == 1) {
                  echo '<span class = "price-tag">مقرر ترم اول</span>';
                } else {
                  echo '<span class = "price-tag">مقرر ترم ثاني</span>';
                }

                $myBooks = getAllFrom("*", "students ,receive_books ,books", "WHERE books.courses_id  ={$item['courses_id']}  AND books.book_id = receive_books.book_id AND students.stu_id = receive_books.stu_id  AND students.stu_id={$info['stu_id']}", "receive_books_id", "ASC");
                if ($myBooks) {
                  foreach ($myBooks as $book) {
                    if ($book['book_status'] == 0) {
                      echo '<span style="color:#27496d;" class = "price-tag1"> لم يستلم الكتاب</span>';
                    } else {
                      echo '<span style="color:#649d66;" class = "price-tag1">تم تسليم الكتاب</span>';
                    }
                  }
                }
                echo '<img class = "img-responsive" src="admin/uplodes/avatars/books.jpg"" alt="" />';
                echo '<div class = "caption">';
                echo '<h3><a target="_blank" href="admin/show_corses.php?do=' . $item['courses_name'] . '">' . $item['courses_name'] . '</a></h3>';
                echo '<p>' . $item['member_name'] . '</p>';

                if ($myBooks) {
                  if ($book['research_status'] == 0) {
                    echo '<a href="submit_research.php?do=insert&coursesName=' . $item['courses_name'] . '&bookId=' . $book['book_id'] . '&memberName=' . $item['member_name'] . ' " style="color:#fff;" class="btn btn-primary">ارسال البحث</a>';
                  } else {
                    echo '<a style="color:#fff;" class="btn btn-success">تم ارسال البحث</a>';
                  }
                }

                $myattendance = getAllFrom("*", "attendance_lectures", "WHERE attendance_lectures.courses_id ={$item['courses_id']}  AND attendance_lectures.stu_id={$info['stu_id']}", "id", "ASC");
                foreach ($myattendance as $attendance) {
                  $reta = (($attendance["day_1"] + $attendance["day_2"] + $attendance["day_3"] + $attendance["day_4"] + $attendance["day_5"] + $attendance["day_6"] + $attendance["day_7"] + $attendance["day_8"] + $attendance["day_9"] + $attendance["day_10"]) / 10) * 100;

                  echo '<div class= "date" ';
                  if ($reta >= 50) {
                    echo 'style="color: green ;" ';
                  };
                  echo '>' . $reta  . '% <- نسبة الحضور </div>';
                  echo '<div class= "date">' . $attendance["created_at"]  . ' <- اخر حضور </div>';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
              echo '</div>';
            } else {
              echo 'ليس هناك مقرارات حالية';
            }
            ?>

          </div>
        </div>
      </div>
    </div>
    <!-- <div class="comment block">
      <div class="container">
        <div class="panel panel-primary">
          <div class="panel-heading">Latest Comments</div>
          <div class="panel-body"> -->
            <?php
            // $myComments =getAllFrom( "comment , item_ID" , "comments" , "WHERE user_ID={$info['UserID']}" , "Com_ID");
            // if (! empty($myComments)){

            // 	foreach ($myComments as $comment ) { 
            ?>

            <!-- <div class="comment-box">
					   			<div class="row">
					   				<div class="col-sm-2 text-center"> 
					   					<img class = "img-responsive img-thumbnail img-circle center-block" src="admin/uplodes/avatars/<?php echo $info['avatar']; ?>" alt=""  />
					   					<?php  // echo$info["UserName"]; 
                        ?> 
					   				</div>
					   				<div class="col-sm-10">
					   					<a href='items.php?itemid=<?php echo $comment['item_ID'] ?>'>View Item</a>
					   				 <p class="lead"> <?php // echo $comment['comment']; 
                                        ?> </p> 
					   				</div>
					   			</div>
				   			</div>
				   			<hr class="custom-hr"> -->

            <?php // }

            // }else{
            // 	echo 'There\'s No Comments To Show';
            // }
            ?>
          <!-- </div>
        </div>
      </div>
    </div> -->

<?php
  }
} else {
  header('Location: login.php');
  exit();
}
include $tbl . "footer.php";
ob_end_flush();
?>