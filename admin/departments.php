<?php
session_start();
    /*
    ================================================
       Departments Page
    ================================================
    */
    ob_start(); // Output Buffering Start

    $pageTitle = 'الاقسام';
    // $nonavbar = "" ;


    if (isset($_SESSION['Username'])){

        include "init.php";
        $do = isset($_GET['do']) ? $_GET['do'] :'3';
        $level = isset($_GET['level']) && is_numeric($_GET['level']) ? intval($_GET['level']) : '' ;
        if($level > 0){
            $quiry = "AND levels_of_study.level_id=$level";
            $level_Pagination = "&level=$level";
        }else{
            $quiry = "";
            $level_Pagination = "";
        }


        if(!isset($_GET['page'])){
            $page = 1;
        }else{
            $page =$_GET['page'];
        }


        $deps = getAllFrom("*","college_departments","" ,"dep_id" , "ASC");

        foreach($deps as $dep){
            // start  page
            if ($do == $dep['dep_id']){ //   page
                ?>

            <div class="main_content_container">
                <div class="main_container  main_menu_open">


                    <!--Start system bath-->
                    <div class="home_pass hidden-xs">
                        <ul>
                            <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                            <li class="bring_right"><a href="dashboard.php">الصفحة الرئيسية</a></li>
                            <li class="bring_right"><a href="departments.php?do=<?php echo $dep['dep_id'] ?>"><?php echo $dep['dep_name'] ;?></a></li>
                        </ul>
                    </div>
                    <!--/End system bath-->
                    <div class="page_content">
                        <div class="page_content">


                            <form class="form-inline search_box text-center">
                                <div class="form-group">
                                    <input type="text" autocomplete="off" id="some" class="form-control" placeholder="بحث عن ....">
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
                                <h1 class="heading_title">طلاب القسم</h1>
                                <div class="table-responsive">
                                    <table class="main-table manage-members table-center table table-bordered">
                                        <thead>
                                            <td>الكود</td>
                                            <td>الاسم</td>
                                            <td>الصورة</td>
                                            <td>القسم</td>
                                            <td>الفرقة </td>
                                            <td>تيلفون</td>
                                            <td>Control</td>
                                        </thead>
                                        <?php
                                           //For Pagination
                                            $results_per_page = 25;
                                            $number_of_results = countItems("*" , "students , college_departments , levels_of_study","WHERE college_departments.dep_id = students.dep_id AND students.level_id = levels_of_study.level_id AND students.dep_id = {$dep['dep_id']} $quiry" );
                                            $number_of_pages = ceil($number_of_results/$results_per_page) ;
                                            $this_page_first_result = ($page-1)*$results_per_page;
                                            //For Pagination

                                           $stus = getAllFrom("*","students , college_departments , levels_of_study","WHERE college_departments.dep_id = students.dep_id AND students.level_id = levels_of_study.level_id AND students.dep_id = {$dep['dep_id']} $quiry " ,"students.stu_id " , "ASC LIMIT $this_page_first_result,$results_per_page");
                                            foreach ($stus as $stu) {
                                                echo "<tr>";
                                                    echo "<td>" . $stu['stu_id']   ."</td>";
                                                    echo "<td>" . $stu['first_name'] ." ".$stu['second_name'] ." ".$stu['third_name']." ".$stu['famliy_name'] ."</td>";
                                                    echo "<td><img src='uplodes/avatars/" . $stu['picture']   ."' alt='' /></td>";
                                                    echo "<td>" . $stu['dep_name'] ."</td>";
                                                    echo "<td>" . $stu['level_name'] ."</td>";
                                                    echo "<td>" . $stu['stu_phone'] ."</td>";
                                                    echo "<td><a href='profile.php?do=Manage&stu_id=".$stu['stu_id']."' class='btn btn-info'><i class='fa fa-edit'></i> مزيد من المعلومات</a></td>";
                                                echo "</tr>";
                                            }
                                        ?>

                                    </table>
                                    <?php
                                    // Pagination

                                        $Previous = $page-1;
                                        $Next = $page+1;

                                        echo '<nav aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item"><a class="page-link" href="departments.php?do='.$dep["dep_id"].$level_Pagination.'&page='.$Previous .'">Previous</a></li>  ';

                                                    echo '<li class="page-item"><a>'.$page . '</a></li>' ;

                                                    echo'<li class="page-item"><a class="page-link" href="departments.php?do='.$dep["dep_id"].$level_Pagination.'&page='.$Next .'">Next</a></li>
                                                </ul>
                                            </nav>';

                                    // end Pagination
                                    ?>
                                </div>
                            </div>

                           <!-- print test 1   <a title="Print Screen" alt="Print Screen" onclick="window.print();" target="_blank" style="cursor:pointer;" ><span class=" glyphicon glyphicon-print"> طباعة</span></a>   -->
                           <!-- print test 2   <button target="blank" style="cursor: pointer" onclick="window.print();">Print</button>       -->
                            <div class="home_statics text-center">
                                <div class="quick_links text-center">
                                    <h1 class="heading_title">دفعات القسم</h1>
                                </div><br>

                                <div style="background-color: #9b59b6">
                                    <span class="bring_right glyphicon glyphicon-user"></span>
                                    <a href="departments.php?do=<?php echo $dep["dep_id"] ?>&level=3">

                                    <h3>الفرقة الاولي</h3>
                                    <p class="h4"><?php echo countItems("stu_id" ,"students","WHERE dep_id = {$dep['dep_id']} AND level_id = 3" );  ?></p>
                                    </a>
                                </div>

                                <div style="background-color: #34495e">
                                    <span class="bring_right glyphicon glyphicon-user"></span>
                                    <a href="departments.php?do=<?php echo $dep["dep_id"] ?>&level=4">
                                    <h3>الفرقة الثانية</h3>

                                    <p class="h4"><?php echo countItems("stu_id" ,"students","WHERE dep_id = {$dep['dep_id']} AND level_id = 4" );  ?></p>
                                    </a>
                                </div>
                                <div style="background-color: #00adbc">
                                    <span class="bring_right glyphicon glyphicon-user"></span>
                                     <a href="departments.php?do=<?php echo $dep["dep_id"] ?>&level=5">
                                    <h3>الفرقة الثالثة</h3>

                                    <p class="h4"><?php echo countItems("stu_id" ,"students","WHERE dep_id = {$dep['dep_id']} AND level_id = 5" );  ?></p>
                                    </a>
                                </div>
                                <div style="background-color: #f39c12">
                                    <span class="bring_right glyphicon glyphicon-education"></span>
                                     <a href="departments.php?do=<?php echo $dep["dep_id"] ?>&level=6">
                                    <h3>الفرقة الرابعة</h3>

                                    <p class="h4"><?php echo countItems("stu_id" ,"students","WHERE dep_id = {$dep['dep_id']} AND level_id = 6" );  ?></p>
                                    </a>
                                </div>
                                <div style="background-color: #2ecc71">
                                    <span class="bring_right glyphicon glyphicon glyphicon-inbox"></span>
                                      <a href="departments.php?do=<?php echo $dep["dep_id"] ?>&level=0">
                                    <h3>جميع الطلبة</h3>

                                    <p class="h4"><?php echo countItems("stu_id" ,"students","WHERE dep_id = {$dep['dep_id']}" );  ?></p>
                                    </a>
                                </div>

                            </div>


                            <br><br><br>
                        </div>
                    </div>
                </div>
                <!--/End Main content container-->
            </div>
            <!--/End body container section-->
        </div>
    </div>
               <?php
       		}
        }

        include $tbl ."footer.php";

    }else{

        header('Location: index.php');

        exit();
    }



    ob_end_flush(); // Release The Output

?>