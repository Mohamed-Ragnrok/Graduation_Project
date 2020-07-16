<?php
session_start();
/*
================================================
    add Page
================================================
*/
ob_start(); // Output Buffering Start

$pageTitle = 'اقساط الطلاب';
 include "init.php";

if (isset($_SESSION['Username'])){



$do = isset($_GET['do']) ? $_GET['do'] :'';


     ?>

    <div class="main_content_container" >
        <div class="main_container  main_menu_open" >

            <!--Start system bath-->
            <div class="home_pass hidden-xs">
                <ul>
                    <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                    <li class="bring_right"><a href="dashboard.php?stu_settings">مالية الطلاب</a></li>
                    <li class="bring_right"><a href="add_stu.php">تسجيل اقساط</a></li>
                </ul>
            </div>
            <!--/End system bath-->

            <div  class="page_content" style="margin: 0px 20px 80px  20px;" >
                <h1 class="heading_title">تسجيل دفعة مصاريف</h1>
                <p class="text-center">ادخل كود الطالب</p>
                    <form class="form-inline text-center" action="pay_stu.php?do=search" method="POST">
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
                      if ($do == 'search'){
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                             $stu_id = $_POST['search'] ;
                             $searchDB = getAllFrom("*","students , levels_of_study , college_departments , expenses"
                             ,"WHERE levels_of_study.level_id = students.level_id
                             AND college_departments.dep_id = students.dep_id
                             AND levels_of_study.level_id = expenses.level_id
                             AND college_departments.dep_id = expenses.dep_id
                             AND students.stu_id = {$_POST['search']}","stu_id" , "ASC");

                                foreach ($searchDB as $data ) {
                                    echo '<h1 >بيانات الدفع</h1>';
                                ?>
                                <div class="page_content" style="margin: 0px 20px 80px  20px;" >
                                    <form action="installment.php" method="POST">
                                        <input type="hidden" name="stu_id" value="<?php echo $data['stu_id']; ?>">
                                        <input type="hidden" name="Expenses_id" value="<?php echo $data['Expenses_id']; ?>">
                                        <input type="hidden" name="expenses_name" value="<?php echo $data['expenses_name']; ?>">
                                        <div class="form-row">
                                            <div style="float: right;" class="form-group col-md-6">
                                            <label for="famliyname">اسم الطالب</label>
                                            <input type="text" class="form-control" value="<?php echo $data['first_name'] . " " . $data['second_name'] . " "  . $data['third_name'] . " " . $data['famliy_name']  ?>"  name="stu_name" >
                                            </div>
                                            <div style="float: right;" class="form-group col-md-3">
                                            <label for="famliyname">الدفعه</label>
                                            <input type="text" class="form-control" value="<?php echo $data['level_name'] ?>"  name="stu_level" >
                                            </div>
                                            <div style="float: right;" class="form-group col-md-3">
                                            <label for="famliyname">القسم</label>
                                            <input type="text" class="form-control" value="<?php echo $data['dep_name'] ?>"  name="stu_dep" >
                                            </div>
                                        </div>
                                         <div class="form-row">
                                            <div style="float: right;" class="form-group col-md-6">
                                            <label for="famliyname">المصاريف الدراسية</label>
                                            <input style="color:red" type="text" class="form-control" value="<?php echo $data['value'] ?>"  name="value" >
                                            </div>

                                            <?php
                                            $mystus1 = getAllFrom( "*" , "installment" , "WHERE stu_id= {$data['stu_id']} AND Expenses_id= {$data['Expenses_id']}" , "installment_id" , "ASC");
                                             
                                                if(empty($mystus1)){
                                                    $value = $data['value'] ; 
                                                }else{
                                                    foreach($mystus1 as $myamount1){
                                                    $value = $myamount1['Remaining_amount'] ;}}
                                                ?>
                                            <div style="float: right;" class="form-group col-md-6">
                                            <label for="famliyname">المبلغ المتبقي</label>
                                            <input style="color:blue" type="text" class="form-control"  value="<?php echo $value ?>">
                                            </div>

                                            <div style="float: right;" class="form-group col-md-6">
                                            <label for="famliyname">المبلغ المدفوع</label>
                                            <input type="text" class="form-control"  name="The_amount_paid" >
                                            </div>

                                           
                                            



                                        <button type="submit" style="width: 25%; margin-top: 20px;" class="form-control btn btn-primary">تسجيل</button>
                                    </form>
                                </div>

                                <?php
                                }

                        }
                      }
                    ?>
                    </div>


            </div>
        </div>
    </div>


<?php }else{

header('Location: index.php');

exit();
}
include ('includes/templates/footer.php')  ?>
</body>

</html>
