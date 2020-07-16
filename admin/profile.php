<?php
session_start();
    /*
    ================================================
       Departments Page
    ================================================
    */
    ob_start(); // Output Buffering Start

    $pageTitle = 'بيانات الطلاب';
    // $nonavbar = "" ;


    if (isset($_SESSION['Username'])){

        include "init.php";
        
        $do = isset($_GET['do']) ? $_GET['do'] :'';
        if($do == 'edit'){
            $editstus = getAllFrom("*","students","WHERE students.stu_id = {$_GET['stu_id']}" ,"stu_id" , "ASC"); 
            foreach($editstus as $edit){
            ?>
            <div class="main_content_container" >
            <div class="main_container  main_menu_open" >
            <div class="page_content" style="margin: 0px 20px 80px  20px;" >
                <h1 class="heading_title">تعديل بيانات الطالب</h1>
                <form action="?do=Update" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                    <input type="hidden" name="stu_id" value="<?php echo $edit['stu_id']; ?>">
                        <div class="form-group col-md-3">
                        <label for="famliyname">اسم العائلة (اللقب) <span class="asterisk"> *</span></label>
                        <input type="text" class="form-control"  value="<?php echo $edit['famliy_name']; ?>" autocomplete="off" name="famliyname" placeholder="Enter the last name" id="famliyname" required>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="thirdname">الاسم الثالث <span class="asterisk"> *</span></label>
                        <input type="text" class="form-control" value="<?php echo $edit['third_name']; ?>" autocomplete="off" name="thirdname"  placeholder="Enter the third name " id="thirdname" required>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="secondname">الاسم الثاني <span class="asterisk"> *</span></label>
                        <input type="text" class="form-control" value="<?php echo $edit['second_name']; ?>" autocomplete="off" name="secondname"  placeholder="Enter the second name " id="secondname" required>
                        </div>
                        <div class="form-group col-md-3">
                        <label for="fristname">الاسم الاول <span class="asterisk"> *</span></label>
                        <input type="text" class="form-control" value="<?php echo $edit['first_name']; ?>" autocomplete="off" name="fristname"  placeholder="Enter the first name " id="fristname" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>الدفعة <span class="asterisk"> *</span></label><br>
                        <input type="radio" class="custom-control-input" id="level1" name="level" <?php if($edit['level_id']==3){echo "checked";} ?> value="3" required="required">
                        <label class="custom-control-label" for="level1">الفرقة الاولي</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-control-input" id="level2" name="level" <?php if($edit['level_id']==4){echo "checked";} ?> value="4" required="required">
                        <label class="custom-control-label" for="level2">الفرقة الثانية</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-control-input" id="level3" name="level" <?php if($edit['level_id']==5){echo "checked";} ?> value="5" required="required">
                        <label class="custom-control-label" for="level3">الفرقة الثالثة</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-control-input" id="level4" name="level" <?php if($edit['level_id']==6){echo "checked";} ?> value="6" required="required">
                        <label class="custom-control-label" for="level4">الفرقة الرابعة</label>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="dep">القسم <span class="asterisk"> *</span></label>
                            <select name="dep" class="form-control" id="dep" required>
                                <?php
                                    $alldeps = getAllFrom("*","college_departments","","dep_id" , "ASC");
                                    foreach ($alldeps as $dep ) {
                                        echo '<option value="'.$dep['dep_id'].'"';
                                        if($edit['dep_id'] == $dep['dep_id']){echo "selected" ;}
                                        echo '>'.$dep['dep_name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>نوع القبول <span class="asterisk"> *</span></label><br>
                        <input type="radio" class="custom-control-input" id="Acceptance_type1" name="Acceptance_type" <?php if($edit['Acceptance_type']=='تنسيق'){echo "checked";} ?> value="تنسيق" required="required">
                        <label class="custom-control-label" for="Acceptance_type1">تنسيق</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-control-input" id="Acceptance_type2" name="Acceptance_type" <?php if($edit['Acceptance_type']=='محول'){echo "checked";} ?> value="محول" required="required">
                        <label class="custom-control-label" for="Acceptance_type2">محول</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-control-input" id="Acceptance_type3" name="Acceptance_type" <?php if($edit['Acceptance_type']=='وافد'){echo "checked";} ?> value="وافد" required="required">
                        <label class="custom-control-label" for="Acceptance_type3">وافد</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-control-input" id="Acceptance_type4" name="Acceptance_type" <?php if($edit['Acceptance_type']=='اعادة قيد'){echo "checked";} ?> value="اعادة قيد" required="required">
                        <label class="custom-control-label" for="Acceptance_type4">اعادة قيد</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-control-input" id="Acceptance_type5" name="Acceptance_type" <?php if($edit['Acceptance_type']=='مفصول'){echo "checked";} ?> value="مفصول" required="required">
                        <label class="custom-control-label" for="Acceptance_type5">مفصول</label>
                        </div>

                        <div class="form-group col-md-4">
                        <label for="address">العنوان <span class="asterisk"> *</span></label>
                        <input type="text" class="form-control" value="<?php echo $edit['address']; ?>" autocomplete="off"  placeholder="Enter the address " id="address" name="address" required>
                        </div>

                        <div class="form-group col-md-2">
                        <label for="img">صورة الطالب </label>
                        <input type="file" name="img" class="form-control" id="img">
                        <?php echo $edit['picture']; ?>
                        <input type="hidden" name="stu_img_now" value="<?php echo $edit['picture']; ?>">
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>الجنس <span class="asterisk"> *</span></label><br>
                        <input type="radio" class="custom-control-input" id="mile" <?php if($edit['gender']=='ذكر'){echo "checked";} ?> name="gender" value="ذكر" required="required">
                        <label class="custom-control-label" for="mile">ذكر</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" class="custom-control-input" id="femile" <?php if($edit['gender']=='انثي'){echo "checked";} ?> name="gender" value="انثي" required="required">
                        <label class="custom-control-label" for="femile">انثي</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>

                        <div class="form-group col-md-4">
                        <label for="Nationality">الجنسية <span class="asterisk"> *</span></label>
                        <input type="text" class="form-control" value="<?php echo $edit['Nationality']; ?>" autocomplete="off"  placeholder="Enter the Nationality " id="Nationality" name="nationality" required>
                        </div>

                        <div class="form-group col-md-2">
                        <label for="date_of_birth">تاريخ الميلاد <span class="asterisk"> *</span></label>
                        <input type="date" class="form-control" value="<?php echo $edit['Date_of_Birth']; ?>" name="date_of_birth" id="date_of_birth" required="required">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="National_ID">الرقم القومي <span class="asterisk"> *</span></label>
                        <input type="text" class="form-control" value="<?php echo $edit['National_ID']; ?>" autocomplete="off" name="national_id" placeholder="Enter the National ID" id="National_ID" required>
                        </div>
                        <div class="form-group col-md-2">
                        <label for="graduation_year">سنة التخرج <span class="asterisk"> *</span></label>
                        <input type="text" class="form-control" value="<?php echo $edit['Graduation_Year']; ?>" autocomplete="off" name="graduation_year"  placeholder="(2015)Ex" id="graduation_year" required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="educational_qualification">المؤهل الدراسي <span class="asterisk"> *</span></label>
                        <select name="educational_qualification" class="form-control" id="educational_qualification">
                        <?php //للاختصار
                            $eq1= "الثانوية العامة بشعبتيها العلمى والأدبى وما يعادلها من الشهادات العربية والأجنبية.";
                            $eq2= " الثانوية التجارية نظام 5 سنوات أو 3 سنوات.";
                            $eq3="الثانوية الصناعية نظام 3 أو 5 سنوات";
                            $eq4= " دبلوم المعاهد الفنية الصناعية.";
                            $eq5= "دبلوم المعاهد الفنية التجارية.";
                            $eq6= "دبلوم المعاهد الفنية التجارية شعبة الحاسب الآلى للالتحاق بالفرقة الثانية مباشرة.";
                            $eq7= "الثانوية الفنية للادارة والخدمات ومدارس الأورمان نظام 3 سنوات.";
                            $eq8= "دبلوم المعاهد الفنية التجارية ومعاهد السكرتارية الفوق متوسطة والثانوية التجارية نظام 5 سنوات (للالتحاق بالفرقة الثانية مباشرة).";
                            $eq9="حالات استنفاذ مرات الرسوب للفرقة الأولى من الكليات غير المناظرة.";
                            $eq10="التحويلات من الكليات والمعاهد المناظرة والغير مناظرة لراغبى التحويل."; ?>
                            <option value="<?php echo $eq1 ; ?>"<?php if($edit['Educational_Qualification'] == $eq1){echo "selected" ;} ?>><?php echo $eq1 ; ?></option>
                            <option value="<?php echo $eq2 ; ?>"<?php if($edit['Educational_Qualification'] == $eq2){echo "selected" ;} ?>><?php echo $eq2 ; ?></option>
                            <option value="<?php echo $eq3 ; ?>"<?php if($edit['Educational_Qualification'] == $eq3){echo "selected" ;} ?>><?php echo $eq3 ; ?></option>
                            <option value="<?php echo $eq4 ; ?>"<?php if($edit['Educational_Qualification'] == $eq4){echo "selected" ;} ?>><?php echo $eq4 ; ?></option>
                            <option value="<?php echo $eq5 ; ?>"<?php if($edit['Educational_Qualification'] == $eq5){echo "selected" ;} ?>><?php echo $eq5 ; ?></option>
                            <option value="<?php echo $eq6 ; ?>"<?php if($edit['Educational_Qualification'] == $eq6){echo "selected" ;} ?>><?php echo $eq6 ; ?></option>
                            <option value="<?php echo $eq7 ; ?>"<?php if($edit['Educational_Qualification'] == $eq7){echo "selected" ;} ?>><?php echo $eq7 ; ?></option>
                            <option value="<?php echo $eq8 ; ?>"<?php if($edit['Educational_Qualification'] == $eq8){echo "selected" ;} ?>><?php echo $eq8 ; ?></option>
                            <option value="<?php echo $eq9 ; ?>"<?php if($edit['Educational_Qualification'] == $eq9){echo "selected" ;} ?>><?php echo $eq9 ; ?></option>
                            <option value="<?php echo $eq10 ; ?>"<?php if($edit['Educational_Qualification'] == $eq10){echo "selected" ;} ?>><?php echo $eq10 ; ?></option>
                        </select>
                    </div>



                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="Parent_phone">هاتف ولي الامر <span class="asterisk"> *</span></label>
                        <input type="text" class="form-control"  value="<?php echo $edit['Parent_phone']; ?>" autocomplete="off" name="Parent_phone"  placeholder="Enter the guardian's phone" id="Parent_phone" required>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="Parent_job">وظيفة ولي الامر</label>
                        <input type="text" class="form-control"  value="<?php echo $edit['Parent_job']; ?>"  autocomplete="off" name="Parent_job"  placeholder="Enter The Parent Job" id="Parent_job" >
                        </div>
                        <div class="form-group col-md-4">
                        <label for="name_of_the_parent">اسم ولي الامر <span class="asterisk"> *</span></label>
                        <input type="text" class="form-control"  value="<?php echo $edit['name_of_the_parent']; ?>" autocomplete="off" name="name_of_the_parent" placeholder="Enter The Your Guardian" id="name_of_the_parent" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="email">البريد الالكتروني</label>
                        <input type="text" class="form-control" value="<?php echo $edit['email']; ?>" autocomplete="off" name="email"  placeholder="Enter the Email" id="email" >
                        </div>
                        <div class="form-group col-md-4">
                        <label for="stu_phone">هاتف الطالب</label>
                        <input type="text" class="form-control" autocomplete="off" value="<?php echo $edit['stu_phone']; ?>" name="stu_phone"  placeholder="Enter The phone" id="stu_phone" >
                        </div>
                        <div class="form-group col-md-4">
                        <label for="Military_services">الموقف من التجنيد</label>
                        <select name="Military_services" class="form-control" id="Military_services">
                        <?php
                        $ms1= "لم تحدد معاملته" ;
                        $ms2= "اعفاء مؤقت";
                        $ms3= "اعفاء نهائي";
                        $ms4= "مؤجل" ; 
                        $ms5="غير مطلوب";
                        $ms6= "مجند";
                        ?>
                            <option value="<?php echo $ms1 ; ?>"<?php if($edit['Military_services'] == $ms1){echo "selected" ;} ?>><?php echo $ms1 ; ?></option>
                            <option value="<?php echo $ms2 ; ?>"<?php if($edit['Military_services'] == $ms2){echo "selected" ;} ?>><?php echo $ms2 ; ?></option>
                            <option value="<?php echo $ms3 ; ?>"<?php if($edit['Military_services'] == $ms3){echo "selected" ;} ?>><?php echo $ms3 ; ?></option>
                            <option value="<?php echo $ms4 ; ?>"<?php if($edit['Military_services'] == $ms4){echo "selected" ;} ?>><?php echo $ms4 ; ?></option>
                            <option value="<?php echo $ms5 ; ?>"<?php if($edit['Military_services'] == $ms5){echo "selected" ;} ?>><?php echo $ms5 ; ?></option>
                            <option value="<?php echo $ms6 ; ?>"<?php if($edit['Military_services'] == $ms6){echo "selected" ;} ?>><?php echo $ms6 ; ?></option>
                        </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="newpassword">كلمة المرور</label>
                        <input type="hidden" name="oldpassword" value="<?php echo $edit['password']; ?>">
                        <input type="text" class="form-control" autocomplete="off" name="newpassword"  placeholder="اتركه فارغا اذا كنت لا تريد التغيير" id="newpassword">
                        </div>
                    </div>



                        <button type="submit" style="width: 25%; margin-top: 20px;" class="form-control btn btn-primary">تعديل</button>

                </form>
            </div>
            </div>
            </div>
      <?php
         } }elseif($do == 'Update'){
                echo "<h1 class='text-center'>Update Members</h1>";
                echo "<div class='container'>";
    
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $stu_id = $_POST['stu_id'] ;
                 // Uplode Variables
                    $avatarName = $_FILES['img']['name'];
                    $avatarSize = $_FILES['img']['size'];
                    $avatarTmp = $_FILES['img']['tmp_name'];
                    $avatarType = $_FILES['img']['type'];
                    // List Of Allowed File Typed To Uplode
                    $avatarAllowedExtension = array("jpeg" , "jpg"  , "png" , "gif");
                    // Get Avatar Extension
                    $avatarExtension = explode('.', $avatarName);
                    $lower = strtolower(end($avatarExtension));
                

                    // Get Variables Form The Form
                    $name1 		= filter_var($_POST['fristname'] , FILTER_SANITIZE_STRING );
                    $name2 		= filter_var($_POST['secondname'] , FILTER_SANITIZE_STRING );
                    $name3 		= filter_var($_POST['thirdname'] , FILTER_SANITIZE_STRING );
                    $name4 		= filter_var($_POST['famliyname'] , FILTER_SANITIZE_STRING );

                    $stu_img_now 		= filter_var($_POST['stu_img_now'] , FILTER_SANITIZE_STRING );
                    

                    $level 		= filter_var($_POST['level'] , FILTER_SANITIZE_NUMBER_INT );
                    $dep        = filter_var($_POST['dep'] , FILTER_SANITIZE_NUMBER_INT );

                    $Acceptance_type 		= filter_var($_POST['Acceptance_type'] , FILTER_SANITIZE_STRING );
                    $address 	= filter_var($_POST['address'] , FILTER_SANITIZE_STRING );

                    $gender 	= filter_var($_POST['gender'] , FILTER_SANITIZE_STRING );
                    $nationality 	= filter_var($_POST['nationality'] , FILTER_SANITIZE_STRING );
                    $date_of_birth 	= filter_var($_POST['date_of_birth'] , FILTER_SANITIZE_STRING );

                    $national_id 	= filter_var($_POST['national_id'] , FILTER_SANITIZE_STRING );
                    $graduation_year 	= filter_var($_POST['graduation_year'] , FILTER_SANITIZE_NUMBER_INT );
                    $educational_qualification 	= filter_var($_POST['educational_qualification'] , FILTER_SANITIZE_STRING );

                    $Parent_phone 	= filter_var($_POST['Parent_phone'] , FILTER_SANITIZE_STRING );

                    if(!empty($_POST['Parent_job'])){
                        $Parent_job = filter_var($_POST['Parent_job'] , FILTER_SANITIZE_STRING );}
                    else{
                        $Parent_job = "لا يوجد" ;}

                    $name_of_the_parent 	= filter_var($_POST['name_of_the_parent'] , FILTER_SANITIZE_STRING );

                    if(!empty($_POST['email'])){
                        $email = filter_var($_POST['email'] , FILTER_VALIDATE_EMAIL );}
                    else{
                        $email = "لا يوجد" ;}

                    if(!empty($_POST['stu_phone'] )){
                        $stu_phone 	    = filter_var($_POST['stu_phone'] , FILTER_SANITIZE_STRING );}
                    else{
                        $stu_phone 	    = "لا يوجد" ;}

                    if(!empty($_POST['Military_services'])){
                        $Military_services 	= filter_var($_POST['Military_services'] , FILTER_SANITIZE_STRING );}
                    else{
                        $Military_services 	= "لا يوجد" ;}



                    // Validata The Form
                    $formErorrs = array();

                    if(strlen($name1) > 20){
                        $formErorrs[]='Frist Name Cant Be More Then <strong>20 Characters</strong> ';}
                    if(strlen($name2) > 20){
                        $formErorrs[]='Second Name Cant Be More Then <strong>20 Characters</strong> ';}
                    if(strlen($name3) > 20){
                        $formErorrs[]='Third Name Cant Be More Then <strong>20 Characters</strong> ';}
                    if(strlen($name4) > 20){
                        $formErorrs[]='Famliy Name Cant Be More Then <strong>20 Characters</strong> ';}
                    if(strlen($national_id) < 14 ){
                        $formErorrs[]='National Id  Cant Be less  Then <strong>20 Characters</strong>';}

                    if(empty($name1)){
                        $formErorrs[]='Frist Name Cant Be <strong> Empty</strong> ';}
                    if(empty($name2)){
                        $formErorrs[]='Second Name Cant Be <strong> Empty</strong> ';}
                    if(empty($name3)){
                        $formErorrs[]='Third Name Cant Be <strong> Empty</strong> ';}
                    if(empty($name4)){
                        $formErorrs[]='Famliy Name Cant Be <strong> Empty</strong> ';}
                    if(empty($level)){
                        $formErorrs[]='LEVEL Cant Be <strong> Empty</strong> ';}
                    if(empty($dep)){
                        $formErorrs[]='Department Cant Be <strong> Empty</strong> ';}
                    if(empty($Acceptance_type)){
                        $formErorrs[]='Acceptance Type Cant Be <strong> Empty</strong> ';}
                    if(empty($address)){
                        $formErorrs[]='Address Cant Be <strong>Empty</strong>';}
                    if(empty($gender)){
                        $formErorrs[]='Gender Cant Be <strong>Empty</strong> ';}
                    if(empty($nationality)){
                        $formErorrs[]='Nationality Cant Be <strong>Empty</strong> ';}
                    if(empty($date_of_birth)){
                        $formErorrs[]='date of birth Cant Be <strong>Empty</strong> ';}
                    if(empty($national_id)){
                        $formErorrs[]='National Id Cant Be <strong>Empty</strong> ';}
                    if(empty($graduation_year)){
                        $formErorrs[]='The Graduation Year Is Not <strong>Valid</strong> ';}
                    if(empty($educational_qualification)){
                        $formErorrs[]='Educational Qualification Cant Be <strong>Empty</strong> ';}
                    if(empty($Parent_phone)){
                        $formErorrs[]='Parent phone Qualification Cant Be <strong>Empty</strong> ';}
                    if(empty($name_of_the_parent)){
                        $formErorrs[]='Name Of The Parent Qualification Cant Be <strong>Empty</strong> ';}
                    if(empty($Parent_phone)){
                        $formErorrs[]='Parent phone Qualification Cant Be <strong>Empty</strong> ';}


                    if(!empty($_FILES['img'])){
                        if( !empty($avatarName) && !in_array($lower, $avatarAllowedExtension)){
                            $formErorrs[]= 'This Extension Is Not <strong> Allowed </strong> ';
                        }
                        if($avatarSize > 2097152){
                            $formErorrs[]= 'Image Cant Be Larger Than <strong> 2MB </strong> ';
                        }
                    }
                    // Password Trick :)
				    $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : password_hash($_POST['newpassword'], PASSWORD_DEFAULT);


                    // Loop Into Errors Array And Echo It
                    foreach ($formErorrs as $erorr ) {
                        $theMsg = '<div class="alert alert-danger">' . $erorr . '</div>';
                        redirectHome($theMsg,5);
                    }

                    //Check If Thers's No Erorr Proceed The Update Operation
                    if(empty($formErorrs)) {
                        if(!empty($_FILES['img']['name'])){
							$avatar = rand(0 , 1000000) . '_' . $avatarName;
							move_uploaded_file($avatarTmp, "uplodes/avatars/".$avatar); 
						}else{ 	
							$avatar = $stu_img_now ;	 
                        }
                        // Updata The Database With This Info
						$stmt = $connectDB->prepare("UPDATE students SET level_id=? ,dep_id=? ,first_name=? ,second_name=?  ,third_name=? ,famliy_name=? ,Acceptance_type=? ,address=?  ,picture=? ,Nationality=?
                                                                        ,gender=? ,Date_of_Birth=? ,National_ID=? ,Educational_Qualification=? ,Graduation_Year=? ,Military_services=? ,name_of_the_parent=? ,Parent_job=? ,Parent_phone=? ,stu_phone=? ,email=? , password=?
                         WHERE stu_id = ?");
						$stmt->execute(array($level ,$dep ,$name1 ,$name2 ,$name3 , $name4 ,$Acceptance_type ,$address ,$avatar , $nationality ,$gender ,$date_of_birth ,$national_id ,$educational_qualification ,$graduation_year , $Military_services ,$name_of_the_parent , $Parent_job ,$Parent_phone , $stu_phone,$email , $pass , $stu_id));
						//Echo Success Message 
                        $theMsg = '<div class="alert alert-success">'.$stmt->rowCount() .' Record Updated</div>';  
                        redirectHome($theMsg ,'back' ,3);         
                    }
    

                }else{
    
                    $theMsg = '<div class="alert alert-danger"> Sorry You Cant Browse This Page Directly</div>';
    
                    redirectHome($theMsg,5);
                }
    
                echo "</div>";
        }elseif($do == 'Manage'){
            $stu_id = $_GET['stu_id'] ;
            $stus = getAllFrom("*","students , college_departments , levels_of_study","WHERE students.dep_id= college_departments.dep_id AND students.level_id=levels_of_study.level_id  AND stu_id = {$stu_id}" ,"stu_id" , "ASC"); 
            foreach($stus as $stu){
        ?>

        <div class="main_content_container" >
            <div class="main_container  main_menu_open" >
    
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="dashboard.php?stu_settings">شئون الطلاب</a></li>
                        <li class="bring_right"><a href="departments.php">معلومات الطالب </a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <?php  ?>
                <div  class="page_content"  >
                    <h1 class="heading_title">معلومات <?php echo $stu['first_name'] ?></h1>
                    <div class="information block">
                        <div class="container">
                            <div class="panel panel-primary">
                                <div class="panel-heading">كود الطالب :<span style="color:#f0c0a7;"> <?php echo $stu['stu_id']; ?></span></div>
                                <div class="panel-body">
                                    <div class="col-md-3">
                                        <img class = "img-responsive img-thumbnail center-block" src="uplodes/avatars/<?php echo $stu['picture'];?>"  alt="User Image" />
                                    </div>
                                    <div class="col-md-9 item-info">
                                        <ul class="list-unstyled">

                                            <li style="font-size: 20px;">
                                                <!-- <i class="fa fa-unlock-alt fa-fw"></i> -->
                                                <i class="fa fa-user fa-fw"></i>
                                                <span>الاسم بالكامل</span> :  <?php echo  $stu['first_name'] . " " . $stu['second_name'] . " "  . $stu['third_name'] . " " . $stu['famliy_name']  ;   ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-university fa-fw"></i>
                                                <span>القسم</span> : <?php echo  $stu['dep_name']  ?> 
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-layer-group fa-fw"></i>
                                                <span>الفرقة</span> : <?php echo  $stu['level_name']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="far fa-calendar-alt fa-fw"></i>
                                                <span>تاريخ التسجيل</span> : <?php echo $stu['date_of_registration']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <!-- <i class="fa fa-tags fa-fw"></i> -->
                                                <i class="fas fa-vote-yea fa-fw"></i>
                                                <span>نوع القبول</span> : <?php echo $stu['Acceptance_type']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-map-marked-alt fa-fw"></i>
                                                <span>العنوان</span> : <?php echo  $stu['address']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-search-location fa-fw"></i>
                                                <span>الجنسية</span> : <?php echo $stu['Nationality']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <!-- <i class="fa fa-tags fa-fw"></i> -->
                                                <i class="fas fa-venus-mars fa-fw"></i>
                                                <span>الجنس</span> : <?php echo $stu['gender']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-calendar-day fa-fw"></i>
                                                <span>تاريخ الميلاد</span> : <?php echo  $stu['Date_of_Birth']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="far fa-id-card fa-fw"></i>
                                                <span>الرقم القومى</span> : <?php echo $stu['National_ID']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-school fa-fw"></i>
                                                <span>المؤهل العلمي</span> : <?php echo  $stu['Educational_Qualification']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-calendar-check fa-fw"></i>
                                                <span>سنة التخرج</span> : <?php echo $stu['Graduation_Year']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="far fa-building fa-fw"></i>
                                                <span>الخدمات العسكرية</span> : <?php echo  $stu['Military_services']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-street-view fa-fw"></i>
                                                <span>اسم ولي الامر</span> : <?php echo $stu['name_of_the_parent']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-street-view fa-fw"></i>
                                                <span>وظيفة ولي الامر</span> : <?php echo  $stu['Parent_job']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-phone fa-fw"></i>
                                                <span>هاتف ولي الامر</span> : <?php echo $stu['Parent_phone']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="fas fa-phone fa-fw"></i>
                                                <span>هاتف الطالب</span> : <?php echo  $stu['stu_phone']  ?>
                                            </li>
                                            <li style="font-size: 20px;">
                                                <i class="far fa-envelope fa-fw"></i>
                                                <span>البريد الجامعي</span> : <?php echo $stu['email']  ?>
                                            </li>

                                        </ul>
                                    </div>
                                    <a href='profile.php?do=edit&stu_id=<?php echo $stu["stu_id"] ?>' class="btn btn-default">Edit Information</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div id="my-ads" class="my-ads block"> -->
                    <div id="" class=" block">
                        <div class="container">
                            <div class="panel panel-primary">
                                <div class="panel-heading">المقرارات</div>
                                <div class="panel-body">

                                    <?php
                                    $myItems = getAllFrom( "*" , "courses ,faculty_members" , "WHERE courses.member_id = faculty_members.member_id AND dep_id={$stu['dep_id']} AND level_id={$stu['level_id']}" , "courses_id" , "ASC");
                                    echo '<div class="row">';
                                    foreach ($myItems as $item ) {
                                        echo '<div class ="col-sm-6 col-md-4">';
                                            echo '<div class ="thumbnail item-box">';
                                                echo '<img class = "img-responsive" src="uplodes/avatars/books.jpg" alt="" />';
                                                echo '<div class = "caption">';
                                                    echo '<a target="_blank" href="show_corses.php?do='. $item['courses_name'] .'"><h3>'. $item['courses_name'] .'</h3></a>';
                                                    echo '<p>' . $item['member_name'] . '</p>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                    echo '</div>';
                                   
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


<?php
            }
        } 
}else{

header('Location: index.php');

exit();
}
include ('includes/templates/footer.php')  ?>
</body>

</html>
