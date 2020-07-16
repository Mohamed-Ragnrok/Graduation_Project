<?php
session_start();
    /*
    ================================================
       Report Page
    ================================================
    */
    ob_start(); // Output Buffering Start
    date_default_timezone_set('Africa/Cairo') ;
    include 'includes/connectDB.php';
    include "includes/functions/functions.php";
    $date = date('Y-m-d') ;
    if (isset($_SESSION['Username'])){
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="layout/css/bootstrap.min.css" rel="stylesheet">   
     <title>Report</title>
    <style>
      .moody{
        width:85%;
        
        font-style: italic;
        background-color:#dcd6f7;
        margin: 10px 0 20px 0 ;
      }
    .one{
        font-size: 18px;
        text-align: right;
    }
    #tober{
        border: 2px solid;
        font-size: 18px;
        font-style:initial;
    }
    .two{
        margin-left:50%;
        font-size: 20px;
    }
    .four{
        text-align: center;
        font-size: 20px;
    }
    
  </style>
  </head>
  <body>
      <center>
      <div class="moody">
        <h6 class="one">وزارة التعليم العالي <br> المعهد المصري لأكاديمية الإسكندرية للإدارة والمحاسبة</h6>
        
        <h3><u >التقرير المالي اليومي</u> </h3>
        
        <label for="name" class="two">تقرير يوم: <?php echo  $date ; ?></label>
        
        <p class="four">بيان يتم فية رصد المبلغ الاجمالي اليومي الذي تم تحصيلة من الطلبة المقيدين في الكلية </p>
       <br>
        <table class="table table-striped" id="tober">
            <thead>
              <tr>
                <th class="text-center" scope="col">المبلغ المدفوع </th>
                <th class="text-center" scope="col">رقم الأيصال</th>
                <th class="text-center" scope="col">الطالب</th>
              </tr>
            </thead>
            <?php 
            $myItems = getAllFrom( "*" , "installment ,students" , "WHERE installment.stu_id = students.stu_id AND installment.Payment_date='{$date}' " , "installment_id" , "ASC"); 
            $count = 0 ;
            $total = 0 ;
            ?>
            <tbody>
              <?php foreach($myItems as $item){
                $count++ ; 
                $total += $item['last_amount'] ; ?>
              <tr>
                <th class="text-center" scope="row"><?php echo $item['last_amount'] ?></th>
                <td class="text-center"><?php echo $item['installment_id'] ?></td>
                <td class="text-center"><?php echo  $item['first_name'] . " " . $item['second_name'] . " "  . $item['third_name'] . " " . $item['famliy_name']  ;   ?></td>
              </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr>
                <th class="text-center" scope="col">الاجمالي = <?php echo $total ; ?></th>
                <th class="text-center" scope="col"></th>
                <th class="text-center" scope="col">عدد الطلاب <?php echo $count ; ?>  </th>
              </tr>
            </tfoot>
          </table>
          

          
          <label class="col-md-6">امضاء رئيس مجلس الإدارة</label>
          <label class="col-md-6">امضاء مدير الحسابات</label>
          
      </div>
    </center>

    <script type="text/javascript" src="layout/js/jquery-2.1.4.min.js"></script>
    <script src="layout/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}else{

header('Location: index.php');

exit();
}
?>
</body>

</html>