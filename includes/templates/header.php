<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

            <!-- Title -->
            <title><?php echo getTitle() ;  ?></title>

		    <!-- Favicon -->
            <link rel="icon" href="layout/img/core-img/favicon1.ico">

            <!-- Core Stylesheet -->
            <link rel="stylesheet" type="text/css" href="layout/atherLayout/css/boootstrap.min.css"/>
            <link rel="stylesheet" href="<?php echo $css ?>style.css">
            <link href="layout/atherLayout/css/all.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="layout/atherLayout/css/forntend.css"/>
	</head>
	<body>
 
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>
 
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header" style="direction: rtl;">
            <div class="container h-150">
                <div class="row h-150">
                    <div class="col-12 h-150">
                        <div class="header-content h-150 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="index.php"><img style=" width: 100%; float: right;" src="layout/img/core-img/logo4.PNG" alt=""></a>
                                <!-- <a href="#"><img style="width: 2%; float: right; margin: 40px 19px 0 0" src="layout/img/core-img/favicon1.png" alt=""></a>
                                <a href="#"><img style="width: 2%; float: right; margin: 40px 10px 0 0" src="layout/img/core-img/favicon2.png" alt=""></a> -->
                            </div>
                            <div class="login-content">
                            <?php if (isset($_SESSION['user'])){  ?>
                                <!-- <a href="profile.php">الصفحة الشخصية</a>
                                <a href="Logout.php">تسجيل خروج</a> -->
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']; ?> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.php">الصفحة الشخصية</a></li>
                                        <li><a href="Logout.php">تسجيل خروج</a></li>
                                    
                                    </ul>
                                    </li>
                                </ul>
                            <?php }else{  ?>
                                <a href="login.php">دخول الطالب</a>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container" style="direction: rtl;">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index.php">الرئيسية</a></li>
                                    <li><a href="#">عن المعهد</a>
                                        <ul class="dropdown">
                                            <li><a href="about-us.php?do=About_us&page=hestory">تاريخ المعهد</a></li>
                                            <li><a href="about-us.php?do=About_us&page=Vision"> الرؤية و الرسالة والاهداف</a></li>
                                            <li><a href="about-us.php?do=About_us&page=The_founders">المؤسسون </a></li>
                                            <li><a href="about-us.php?do=About_us&page=Board_of-Directors">مجلس الادارة </a></li>
                                            <li><a href="about-us.php?do=About_us&page=Organizational_structure">الهيكل التنظيمي</a></li>
                                            <li><a href="about-us.php?do=About_us&page=Members"> اعضاء هيئة التدريس والهيئة المعاونة </a></li>
                                            <li><a href="about-us.php?do=About_us&page=halls">القاعات الدراسية و معامل الحاسب</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#">نظام الالتحاق</a>
                                        <ul class="dropdown">
                                            <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=Admission_Requirements">شروط الالتحاق بالمعهد</a></li>
                                            <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=system">نظام الدراسة بالمعهد</a></li>
                                            <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=Student_rights">حقوق الطالب ومسؤولياته</a></li>
                                            <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=Irregularities">المخالفات والجزاءات التأديبية</a></li>
                                            <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=">تحميل نماذج شئون الطلاب</a></li>
                                            <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=">المصروفات الدراسية</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">الاكاديميات</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">الاقسام العلمية</a></li>
                                            <li><a href="about-us.html">المقرارات الدراسية</a></li>
                                            <li><b><u>هئية التدريس</u></b></li>
                                            <li><a href="">اعضاء هيئة التدريس</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#">الطلاب</a>
                                        <div class="dropdown">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#">دليل الطالب </a></li>
                                                <li><a href="#">الانشطة و الخدمات الطلابية</a></li>
                                                <li><a href="#">التوقيتات الدراسية</a></li>
                                                <li><a href="#">الجداول الدراسية</a></li>
                                                <li><a href="#">النتائج الدراسية</a></li>
                                               
                                                
                                                <li><b><u>المشاريع</u></b></li>
                                                <li><a href="">المسابقات</a></li>
                                                <li><a href="">مشاريع تخرج الطلبة بالمعهد</a></li>
                                                <li>
                                                    <div class="single-mega cn-col-4">
                                                        <img src="layout/img/bg-img/bg-22.jpg" alt="">
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="#">الاخبار والاحداث</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">الاخبار والاحداث بالمعهد</a></li>
                                            <li><a href="about-us.html">المؤتمرات العلمية</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#">وحدة ضمان الجودة</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">الرؤية والرسالة</a></li>
                                            <li><a href="about-us.html">الائحة الداخلية</a></li>
                                            <li><a href="">الهيكل التنظيمي</a>
                                                <ul class="dropdown">
                                                <li><a href="index.html">مجلس ادارة الوحدة</a></li>
                                                <li><a href="about-us.html">اللجان التنفيذية</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="index.html">ميثاق الشرف الاخلاقي</a></li>
                                            <li><a href="about-us.html">ميثاق اخلاقيات البحث العلمي</a></li>
                                            <li><a href="index.html">دليل الطالب للجوده</a></li>
                                            <li><a href="about-us.html">التقارير السنوية</a></li>
                                            <li><a href="index.html">روابط هامة</a></li>
                                            <li><a href="about-us.html">اتصل بنا</a></li>

                                        </ul>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="tel:031234567"><i class="icon-telephone-2"></i> <span>031234567</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
