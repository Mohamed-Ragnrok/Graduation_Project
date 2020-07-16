<div class="container-fluid">
    <div class="row header_section">
        <div class="col-sm-3 col-xs-12 logo_area bring_right">
            <h1 class="inline-block"><img src="layout/img/logo.png" alt="">لوحة تحكم</h1>
            <span class="glyphicon glyphicon-align-justify bring_left open_close_menu" data-toggle="tooltip"
                  data-placement="right" title="Tooltip on left"></span>
        </div>
        <div class="col-sm-3 col-xs-12 head_buttons_area bring_right hidden-xs">
            <!-- <div class="inline-block messages bring_right">
                <span class="glyphicon glyphicon-envelope" data-toggle="tooltip" data-placement="left"
                      title="الرسائل"><span class="notifications">9</span></span>
            </div>   -->
            <div class="inline-block full_screen bring_right hidden-xs">
                <span class="glyphicon glyphicon-fullscreen" data-toggle="tooltip" data-placement="left"
                      title="شاشة كاملة"></span>
            </div>
        </div>
        <div class=" col-sm-4 col-xs-12 user_header_area bring_left left_text">
            

            <div class="user_info inline-block">
                <img src="layout/img/user.jpg" alt="" class="img-circle">
                <span class="h4 nomargin user_name"><?php echo $_SESSION['Username']; ?></span>
                <span class="glyphicon glyphicon-cog"></span>
            </div>
        </div>
    </div>
    <div class="row container_section">

        <div class="user_details close_user_details  bring_left">
            <div class="user_area">
                <img class="img-thumbnail img-rounded bring_right" src="layout/img/user.jpg">

                <h1 class="h3"><?php echo $_SESSION['Username']; ?></h1>

                <p><a href="">بيانات المستخدم</a></p>

                <p><a href="">تغيير كلمة المرور</a></p>

                <p><a href="Logout.php">تسجيل الخروج</a></p>
            </div>
            <div class="who_is_online">
                <h3>العامليين حاليا علي النظام</h3>

                <div class="employee_online">
                    <img src="layout/img/user.jpg" class="img-circle bring_right">

                    <p>userName</p>

                    <p>مركز التقنية - جامعة </p>
                </div>
                <div class="employee_online">
                    <img src="layout/img/user.jpg" class="img-circle bring_right">

                    <p>userName</p>

                    <p>مركز التقنية - جامعة </p>
                </div>
                <div class="employee_online">
                    <img src="layout/img/user.jpg" class="img-circle bring_right">

                    <p>userName</p>

                    <p>مركز التقنية - جامعة </p>
                </div>
                <div class="employee_online">
                    <img src="layout/img/user.jpg" class="img-circle bring_right">

                    <p>userName</p>

                    <p>مركز التقنية - جامعة </p>
                </div>
                <div class="employee_online">
                    <img src="layout/img/user.jpg" class="img-circle bring_right">

                    <p>userName</p>

                    <p>مركز التقنية - جامعة </p>
                </div>
            </div>
        </div>
       

