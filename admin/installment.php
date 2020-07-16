<?php
session_start();
/*
================================================
    add Page
================================================
*/
ob_start(); // Output Buffering Start
include 'includes/connectDB.php';
include "includes/functions/functions.php";

if (isset($_SESSION['Username'])){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $stu_id = $_POST['stu_id']      ;
        $Expenses_id = $_POST['Expenses_id']     ;
        $stu_level = $_POST['stu_level']  ;
        $stu_dep = $_POST['stu_dep']     ;
        $stu_name= $_POST['stu_name']   ;
        $expenses_name = $_POST['expenses_name'] ;
        $total = $_POST['value']    ;
        $The_amount_paid = $_POST['The_amount_paid']  ;
        $Remaining_amount = $total -  $The_amount_paid ;

          $check = checkstu("*","installment", "stu_id","{$stu_id}" ,"Expenses_id","{$Expenses_id}");
          if($check !== 1){
            $stmt = $connectDB->prepare("INSERT INTO installment
            (stu_id ,Expenses_id ,The_amount_paid ,The_total_amount ,Remaining_amount ,last_amount ,Payment_date)
            VALUES(:xstid ,:xEx , :xtap , :xtta , :xra ,:xlam , now() ) ");
            $stmt->execute(array(
                'xstid'   => $stu_id ,
                'xEx' 		=> $Expenses_id ,
                'xtap' 		=> $The_amount_paid ,
                'xtta' 		=> $total ,
                'xra' 		=> $Remaining_amount ,
                'xlam'    => $The_amount_paid
            ));
          }else{
            $mystus = getAllFrom( "*" , "installment" , "WHERE stu_id= {$stu_id} AND Expenses_id= {$Expenses_id}" , "installment_id" , "ASC");
            foreach($mystus as $mystu)
            { $amunt = $mystu['The_amount_paid'] + $The_amount_paid ; $Remaining = $total - $amunt ;}

            $stmt = $connectDB->prepare("UPDATE installment SET The_amount_paid=?,last_amount= ? , Remaining_amount=?, Payment_date=now() WHERE stu_id = ? AND Expenses_id = ?");
						$stmt->execute(array($amunt , $The_amount_paid , $Remaining ,$stu_id ,$Expenses_id ));
          }

   ?>
    <!doctype html>
    <html>
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <style>
         .fontstyle{
            font-size: larger;
            font-weight: bold;
         }

         </style>
        <title>أيصال تحصيل الرسوم الدراسية
        </title>
      </head>
      <body>
          <div class="main-content pt-4" style="font-family: 'Amiri', serif;">
              <div  class="container-fluid">
                  <div class="row mb-4">
                    <div class="col bl-2">
                        <section class="img" >
                            <img src="123.jpg" width="200px" height="200px">
                        </section>
                      </div>
                      <div class="col pt-3">
                          <article class="text-center">
                            <h3>وزارة التعليم العالي</h3>
                            <h3>المعهد المصري</h3>
                            <h3>لأكاديمية<span class="border-bottom border-primary pb-2"> الأسكندرية للإدراة</span> والمحاسبة</h3>
                          </article>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6 offset-md-3">
                        <article>
                            <h3 class="text-center">أيصال تحصيل الرسوم الدراسية</h3>
                        </article>
                      </div>
                  </div>

                  <div class="cont">
                    <form style="direction: rtl !important; ">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                              <label  class="float-right">أسم الطالب</label>
                              <input type="text" class="form-control fontstyle"  value="<?php echo $stu_name;  ?>">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label  class="float-right">الشعبة</label>
                                <input type="text" class="form-control fontstyle" value="<?php echo $stu_dep;  ?>" >
                            </div>
                            <div class="form-group col-md-6">
                                <label  class="float-right">الفرقة الدراسية</label>
                                <input type="text" class="form-control fontstyle" value="<?php echo $stu_level;  ?>" >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                              <label  class="float-right">قيمة المصاريف</label>
                              <input type="text" class="form-control fontstyle"  value="<?php echo $total;  ?>">
                            </div>
                        </div>
                        
                        <?php
                        $mystus1 = getAllFrom( "*" , "installment" , "WHERE stu_id= {$stu_id} AND Expenses_id= {$Expenses_id}" , "installment_id" , "ASC");
                        foreach($mystus1 as $myamount1){ ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label  class="float-right">المبلغ المدفوع</label>
                              <input type="text" class="form-control fontstyle"  value="<?php echo $myamount1['The_amount_paid'];  ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label  class="float-right">المبلغ المتبقي</label>
                              <input type="text" class="form-control fontstyle"  value="<?php echo $myamount1['Remaining_amount'];  ?>">
                            </div>
                        </div>
                        <?php } ?>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                              <label  class="float-right">وذلك قيمة</label>
                              <input type="text" class="form-control fontstyle"  value="<?php echo $expenses_name ." لسنة ". date('Y')  ?>">
                            </div>
                        </div>
                         <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <label  class="float-right"></label>
                            </div>
                            <div class="form-group col-md-6">
                              <label  class="float-right">الحسابات</label>
                              <input type="text" class="form-control"  value="<?php ?>">
                            </div>
                        </div>


                      </form>
                  </div>
              </div>
              <a style="float: right;" href="pay_stu.php"><span class="btn btn-primary badge-info"> رجوع</span></a>
          </div>

     <?php }}else{

        header('Location: index.php');

        exit();
        }                     ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>