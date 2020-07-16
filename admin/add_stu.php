<?php
session_start();
/*
================================================
    add Page
================================================
*/
ob_start(); // Output Buffering Start

$pageTitle = 'تسجيل طالب';
include "init.php";

if (isset($_SESSION['Username'])) {

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Uplode Variables
    if (!empty($_FILES['img'])) {
      $avatarName = $_FILES['img']['name'];
      $avatarSize = $_FILES['img']['size'];
      $avatarTmp = $_FILES['img']['tmp_name'];
      $avatarType = $_FILES['img']['type'];

      // List Of Allowed File Typed To Uplode
      $avatarAllowedExtension = array("jpeg", "jpg", "png", "gif");

      // Get Avatar Extension
      $avatarExtension = explode('.', $avatarName);
      $lower = strtolower(end($avatarExtension));
    }




    // Get Variables Form The Form
    $name1     = filter_var($_POST['fristname'], FILTER_SANITIZE_STRING);
    $name2     = filter_var($_POST['secondname'], FILTER_SANITIZE_STRING);
    $name3     = filter_var($_POST['thirdname'], FILTER_SANITIZE_STRING);
    $name4     = filter_var($_POST['famliyname'], FILTER_SANITIZE_STRING);

    $level     = filter_var($_POST['level'], FILTER_SANITIZE_NUMBER_INT);
    $dep        = filter_var($_POST['dep'], FILTER_SANITIZE_NUMBER_INT);

    $Acceptance_type     = filter_var($_POST['Acceptance_type'], FILTER_SANITIZE_STRING);
    $address   = filter_var($_POST['address'], FILTER_SANITIZE_STRING);

    $gender   = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
    $nationality   = filter_var($_POST['nationality'], FILTER_SANITIZE_STRING);
    $date_of_birth   = filter_var($_POST['date_of_birth'], FILTER_SANITIZE_STRING);

    $national_id   = filter_var($_POST['national_id'], FILTER_SANITIZE_STRING);
    $graduation_year   = filter_var($_POST['graduation_year'], FILTER_SANITIZE_NUMBER_INT);
    $educational_qualification   = filter_var($_POST['educational_qualification'], FILTER_SANITIZE_STRING);

    $Parent_phone   = filter_var($_POST['Parent_phone'], FILTER_SANITIZE_STRING);

    if (!empty($_POST['Parent_job'])) {
      $Parent_job = filter_var($_POST['Parent_job'], FILTER_SANITIZE_STRING);
    } else {
      $Parent_job = "لا يوجد";
    }

    $name_of_the_parent   = filter_var($_POST['name_of_the_parent'], FILTER_SANITIZE_STRING);


    if (!empty($_POST['stu_phone'])) {
      $stu_phone       = filter_var($_POST['stu_phone'], FILTER_SANITIZE_STRING);
    } else {
      $stu_phone       = "لا يوجد";
    }

    if (!empty($_POST['Military_services'])) {
      $Military_services   = filter_var($_POST['Military_services'], FILTER_SANITIZE_STRING);
    } else {
      $Military_services   = "لا يوجد";
    }



    // Validata The Form
    $formErorrs = array();

    if (strlen($name1) > 20) {
      $formErorrs[] = 'Frist Name Cant Be More Then <strong>20 Characters</strong> ';
    }
    if (strlen($name2) > 20) {
      $formErorrs[] = 'Second Name Cant Be More Then <strong>20 Characters</strong> ';
    }
    if (strlen($name3) > 20) {
      $formErorrs[] = 'Third Name Cant Be More Then <strong>20 Characters</strong> ';
    }
    if (strlen($name4) > 20) {
      $formErorrs[] = 'Famliy Name Cant Be More Then <strong>20 Characters</strong> ';
    }
    if (strlen($national_id) < 14) {
      $formErorrs[] = 'National Id  Cant Be less  Then <strong>14 Characters</strong>';
    }

    if (empty($name1)) {
      $formErorrs[] = 'Frist Name Cant Be <strong> Empty</strong> ';
    }
    if (empty($name2)) {
      $formErorrs[] = 'Second Name Cant Be <strong> Empty</strong> ';
    }
    if (empty($name3)) {
      $formErorrs[] = 'Third Name Cant Be <strong> Empty</strong> ';
    }
    if (empty($name4)) {
      $formErorrs[] = 'Famliy Name Cant Be <strong> Empty</strong> ';
    }
    if (empty($level)) {
      $formErorrs[] = 'LEVEL Cant Be <strong> Empty</strong> ';
    }
    if (empty($dep)) {
      $formErorrs[] = 'Department Cant Be <strong> Empty</strong> ';
    }
    if (empty($Acceptance_type)) {
      $formErorrs[] = 'Acceptance Type Cant Be <strong> Empty</strong> ';
    }
    if (empty($address)) {
      $formErorrs[] = 'Address Cant Be <strong>Empty</strong>';
    }
    if (empty($gender)) {
      $formErorrs[] = 'Gender Cant Be <strong>Empty</strong> ';
    }
    if (empty($nationality)) {
      $formErorrs[] = 'Nationality Cant Be <strong>Empty</strong> ';
    }
    if (empty($date_of_birth)) {
      $formErorrs[] = 'date of birth Cant Be <strong>Empty</strong> ';
    }
    if (empty($national_id)) {
      $formErorrs[] = 'National Id Cant Be <strong>Empty</strong> ';
    }
    if (empty($graduation_year)) {
      $formErorrs[] = 'The Graduation Year Is Not <strong>Valid</strong> ';
    }
    if (empty($educational_qualification)) {
      $formErorrs[] = 'Educational Qualification Cant Be <strong>Empty</strong> ';
    }
    if (empty($Parent_phone)) {
      $formErorrs[] = 'Parent phone Qualification Cant Be <strong>Empty</strong> ';
    }
    if (empty($name_of_the_parent)) {
      $formErorrs[] = 'Name Of The Parent Qualification Cant Be <strong>Empty</strong> ';
    }
    if (empty($Parent_phone)) {
      $formErorrs[] = 'Parent phone Qualification Cant Be <strong>Empty</strong> ';
    }


    if (!empty($_FILES['img'])) {
      if (!empty($avatarName) && !in_array($lower, $avatarAllowedExtension)) {
        $formErorrs[] = 'This Extension Is Not <strong> Allowed </strong> ';
      }


      if ($avatarSize > 2097152) {
        $formErorrs[] = 'Image Cant Be Larger Than <strong> 2MB </strong> ';
      }
    }


    $random = rand(1000000, 9999999);
    $stuid =  $graduation_year . $random;
    if ($dep == 3) {
      $Frist_email = 'Mis';
    } elseif ($dep == 4) {
      $Frist_email = 'Acc';
    } elseif ($dep == 5) {
      $Frist_email = 'Man';
    } elseif ($dep == 7) {
      $Frist_email = 'Eac';
    } elseif ($dep == 8) {
      $Frist_email = 'Ema';
    }

    $email = $Frist_email . $stuid . '@eia.edu.eg';
    $password = "user@web";
    //Check If Thers's No Erorr Proceed The Update Operation
    if (empty($formErorrs)) {
      if (!empty($avatarName)) {
        $avatar = $random . '_' . $avatarName;
        move_uploaded_file($avatarTmp, "uplodes/avatars/" . $avatar);
      } else {
        $avatar = 'img.png';
      }

      // Insert Userinfo In Database
      $stmt = $connectDB->prepare("INSERT INTO students
                    (stu_id ,level_id ,dep_id ,first_name ,second_name  ,third_name ,famliy_name ,date_of_registration,Acceptance_type ,address  ,picture ,Nationality
                    ,gender,Date_of_Birth ,National_ID ,Educational_Qualification  ,Graduation_Year ,Military_services ,name_of_the_parent,Parent_job ,Parent_phone  ,stu_phone ,email , password)

                    VALUES(:xstid ,:xlev , :xdep , :xfir , :xsec ,:xthi , :xfam , now() , :xacc , :xadd , :xpic , :xnat ,:xgen , :xdate , :xnatid , :xecu, :xgra , :xmil , :xnaopa ,:xparjo
                    , :xparph , :xstuph , :xemai ,:xpass) ");
      $stmt->execute(array(
        'xstid'     => $stuid,
        'xlev'     => $level,
        'xdep'     => $dep,
        'xfir'     => $name1,
        'xsec'     => $name2,
        'xthi'      => $name3,
        'xfam'     => $name4,
        'xacc'     => $Acceptance_type,
        'xadd'     => $address,
        'xpic'      => $avatar,
        'xnat'     => $nationality,
        'xgen'     => $gender,
        'xdate'   => $date_of_birth,
        'xnatid'   => $national_id,
        'xecu'      => $educational_qualification,
        'xgra'      => $graduation_year,
        'xmil'     => $Military_services,
        'xnaopa'   => $name_of_the_parent,
        'xparjo'   => $Parent_job,
        'xparph'   => $Parent_phone,
        'xstuph'  => $stu_phone,
        'xemai'      => $email,
        'xpass' =>  password_hash($password, PASSWORD_DEFAULT)

      ));
      //Echo Success Message
      if ($stmt) {
        $theMsg = '<div class="alert alert-success">' . $stmt->rowCount() . ' Record Insert كود الطالب هو ' . $stuid . '</div>';
      }
    }
  }


?>

  <div class="main_content_container">
    <div class="main_container  main_menu_open">

      <!--Start system bath-->
      <div class="home_pass hidden-xs">
        <ul>
          <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
          <li class="bring_right"><a href="dashboard.php?stu_settings">شئون الطلاب</a></li>
          <li class="bring_right"><a href="add_stu.php">تسجيل طالب</a></li>
        </ul>
      </div>
      <!--/End system bath-->

      <div class="page_content" style="margin: 0px 20px 80px  20px;">
        <h1 class="heading_title">تسجيل بيانات الطالب</h1>

        <?php
        // Loop Into Errors Array And Echo It
        if (!empty($formErorrs)) {
          foreach ($formErorrs as $erorr) {
            echo '<div class="alert alert-danger">' . $erorr . '</div>';
          }
        } else {
          if (isset($theMsg)) {
            echo $theMsg;
          } else {
            echo    '<div class="alert alert-danger" >
                            <p>الحقول الموجود بجانبها
                            <span class="asterisk"> *</span>
                            اجبارية </p>
                            </div>';
          }
        }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="famliyname">اسم العائلة (اللقب) <span class="asterisk"> *</span></label>
              <input type="text" class="form-control" autocomplete="off" name="famliyname" placeholder="Enter the last name" id="famliyname" required>
            </div>
            <div class="form-group col-md-3">
              <label for="thirdname">الاسم الثالث <span class="asterisk"> *</span></label>
              <input type="text" class="form-control" autocomplete="off" name="thirdname" placeholder="Enter the third name " id="thirdname" required>
            </div>
            <div class="form-group col-md-3">
              <label for="secondname">الاسم الثاني <span class="asterisk"> *</span></label>
              <input type="text" class="form-control" autocomplete="off" name="secondname" placeholder="Enter the second name " id="secondname" required>
            </div>
            <div class="form-group col-md-3">
              <label for="fristname">الاسم الاول <span class="asterisk"> *</span></label>
              <input type="text" class="form-control" autocomplete="off" name="fristname" placeholder="Enter the first name " id="fristname" required>
            </div>
          </div>


          <div class="form-row">
            <div class="form-group col-md-6">
              <label>الدفعة <span class="asterisk"> *</span></label><br>
              <input type="radio" class="custom-control-input" id="level1" name="level" value="3" required="required">
              <label class="custom-control-label" for="level1">الفرقة الاولي</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" class="custom-control-input" id="level2" name="level" value="4" required="required">
              <label class="custom-control-label" for="level2">الفرقة الثانية</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" class="custom-control-input" id="level3" name="level" value="5" required="required">
              <label class="custom-control-label" for="level3">الفرقة الثالثة</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" class="custom-control-input" id="level4" name="level" value="6" required="required">
              <label class="custom-control-label" for="level4">الفرقة الرابعة</label>
            </div>
            <div class="form-group col-md-6">
              <label for="dep">القسم <span class="asterisk"> *</span></label>
              <select name="dep" class="form-control" id="dep" required>
                <?php
                $alldeps = getAllFrom("*", "college_departments", "", "dep_id", "ASC");
                foreach ($alldeps as $dep) {
                  echo '<option value="' . $dep['dep_id'] . '">' . $dep['dep_name'] . '</option>';
                }
                ?>
              </select>
            </div>
          </div>



          <div class="form-row">
            <div class="form-group col-md-6">
              <label>نوع القبول <span class="asterisk"> *</span></label><br>
              <input type="radio" class="custom-control-input" id="Acceptance_type1" name="Acceptance_type" value="تنسيق" required="required">
              <label class="custom-control-label" for="Acceptance_type1">تنسيق</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" class="custom-control-input" id="Acceptance_type2" name="Acceptance_type" value="محول" required="required">
              <label class="custom-control-label" for="Acceptance_type2">محول</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" class="custom-control-input" id="Acceptance_type3" name="Acceptance_type" value="وافد" required="required">
              <label class="custom-control-label" for="Acceptance_type3">وافد</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" class="custom-control-input" id="Acceptance_type4" name="Acceptance_type" value="اعادة قيد" required="required">
              <label class="custom-control-label" for="Acceptance_type4">اعادة قيد</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" class="custom-control-input" id="Acceptance_type5" name="Acceptance_type" value="مفصول" required="required">
              <label class="custom-control-label" for="Acceptance_type5">مفصول</label>
            </div>

            <div class="form-group col-md-4">
              <label for="address">العنوان <span class="asterisk"> *</span></label>
              <input type="text" class="form-control" autocomplete="off" placeholder="Enter the address " id="address" name="address" required>
            </div>

            <div class="form-group col-md-2">
              <label for="img">صورة الطالب </label>
              <input type="file" name="img" class="form-control" id="img">
            </div>
          </div>


          <div class="form-row">
            <div class="form-group col-md-6">
              <label>الجنس <span class="asterisk"> *</span></label><br>
              <input type="radio" class="custom-control-input" id="mile" name="gender" value="ذكر" required="required">
              <label class="custom-control-label" for="mile">ذكر</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" class="custom-control-input" id="femile" name="gender" value="انثي" required="required">
              <label class="custom-control-label" for="femile">انثي</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>

            <div class="form-group col-md-4">
              <label for="Nationality">الجنسية <span class="asterisk"> *</span></label>
              <input type="text" class="form-control" autocomplete="off" placeholder="Enter the Nationality " id="Nationality" name="nationality" required>
            </div>

            <div class="form-group col-md-2">
              <label for="date_of_birth">تاريخ الميلاد <span class="asterisk"> *</span></label>
              <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" required="required">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="National_ID">الرقم القومي <span class="asterisk"> *</span></label>
              <input type="text" class="form-control" autocomplete="off" name="national_id" placeholder="Enter the National ID" id="National_ID" required>
            </div>
            <div class="form-group col-md-2">
              <label for="graduation_year">سنة التخرج <span class="asterisk"> *</span></label>
              <input type="text" class="form-control" autocomplete="off" name="graduation_year" placeholder="(2015)Ex" id="graduation_year" required>
            </div>
            <div class="form-group col-md-6">
              <label for="educational_qualification">المؤهل الدراسي <span class="asterisk"> *</span></label>
              <select name="educational_qualification" class="form-control" id="educational_qualification">
                <?php //للاختصار
                $eq1 = "الثانوية العامة بشعبتيها العلمى والأدبى وما يعادلها من الشهادات العربية والأجنبية.";
                $eq2 = " الثانوية التجارية نظام 5 سنوات أو 3 سنوات.";
                $eq3 = "الثانوية الصناعية نظام 3 أو 5 سنوات";
                $eq4 = " دبلوم المعاهد الفنية الصناعية.";
                $eq5 = "دبلوم المعاهد الفنية التجارية.";
                $eq6 = "دبلوم المعاهد الفنية التجارية شعبة الحاسب الآلى للالتحاق بالفرقة الثانية مباشرة.";
                $eq7 = "الثانوية الفنية للادارة والخدمات ومدارس الأورمان نظام 3 سنوات.";
                $eq8 = "دبلوم المعاهد الفنية التجارية ومعاهد السكرتارية الفوق متوسطة والثانوية التجارية نظام 5 سنوات (للالتحاق بالفرقة الثانية مباشرة).";
                $eq9 = "حالات استنفاذ مرات الرسوب للفرقة الأولى من الكليات غير المناظرة.";
                $eq10 = "التحويلات من الكليات والمعاهد المناظرة والغير مناظرة لراغبى التحويل."; ?>
                <option value="<?php echo $eq1; ?>"><?php echo $eq1; ?></option>
                <option value="<?php echo $eq2; ?>"><?php echo $eq2; ?></option>
                <option value="<?php echo $eq3; ?>"><?php echo $eq3; ?></option>
                <option value="<?php echo $eq4; ?>"><?php echo $eq4; ?></option>
                <option value="<?php echo $eq5; ?>"><?php echo $eq5; ?></option>
                <option value="<?php echo $eq6; ?>"><?php echo $eq6; ?></option>
                <option value="<?php echo $eq7; ?>"><?php echo $eq7; ?></option>
                <option value="<?php echo $eq8; ?>"><?php echo $eq8; ?></option>
                <option value="<?php echo $eq9; ?>"><?php echo $eq9; ?></option>
                <option value="<?php echo $eq10; ?>"><?php echo $eq10; ?></option>
              </select>
            </div>



            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="Parent_phone">هاتف ولي الامر <span class="asterisk"> *</span></label>
                <input type="text" class="form-control" autocomplete="off" name="Parent_phone" placeholder="Enter the guardian's phone" id="Parent_phone" required>
              </div>
              <div class="form-group col-md-4">
                <label for="Parent_job">وظيفة ولي الامر</label>
                <input type="text" class="form-control" autocomplete="off" name="Parent_job" placeholder="Enter The Parent Job" id="Parent_job">
              </div>
              <div class="form-group col-md-4">
                <label for="name_of_the_parent">اسم ولي الامر <span class="asterisk"> *</span></label>
                <input type="text" class="form-control" autocomplete="off" name="name_of_the_parent" placeholder="Enter The Your Guardian" id="name_of_the_parent" required>
              </div>
            </div>


            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="stu_phone">هاتف الطالب</label>
                <input type="text" class="form-control" autocomplete="off" name="stu_phone" placeholder="Enter The phone" id="stu_phone">
              </div>
              <div class="form-group col-md-4">
                <label for="Military_services">الموقف من التجنيد</label>
                <select name="Military_services" class="form-control" id="Military_services">
                  <option value="لم تحدد معاملته">لم تحدد معاملته</option>
                  <option value="اعفاء مؤقت">اعفاء مؤقت</option>
                  <option value="اعفاء نهائي">اعفاء نهائي</option>
                  <option value="مؤجل">مؤجل</option>
                  <option value="غير مطلوب">غير مطلوب</option>
                  <option value="مجند">مجند</option>
                </select>
              </div>
              <div style="height: 60px;" class="form-group col-md-4">

              </div>

            </div>




            <br><br><br> <button type="submit" style="width: 25%; margin-top: 20px;" class="form-control btn btn-primary">تسجيل</button>


            <!-- <select name="courses" style="width: 30%; height: 45px;">
                    <?php
                    // $allcourses = getAllFrom("*","courses","","id" , "ASC");
                    // foreach ($allcourses as $courses ) {
                    //     echo '<option value="'.$courses['id'].'">'.$courses['name']." => ". $courses['dr_name'] .'</option>';
                    // }
                    ?>
                    </select><br>
                    <button style="width: 30%; margin-top: 10px;" class="btn btn-primary" type="submit">Done</button> -->
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