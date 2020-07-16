<!--Start Side bar main menu-->
<div class="main_sidebar bring_right ">
    <div class="main_sidebar_wrapper ">
        <form class="form-inline search_box text-center">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="كلمة البحث">
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>
                </button>
            </div>
        </form>

        <ul>
            <li><span class="glyphicon glyphicon-home"></span><a href="index.php">الصفحة الرئيسية</a></li>
            <li><span class="glyphicon glyphicon-education"></span><a href="index.php">اقسام المعهد</a>
                <ul class="drop_main_menu">
                    <?php $deps = getAllFrom("*","college_departments","","dep_id","ASC");
                    foreach($deps as $dep ){
                    echo "<li><a href='departments.php?do=".$dep["dep_id"]."'>".$dep["dep_name"]."</a></li>"; }
                    ?>
                </ul>
            </li>
            <li><span class="glyphicon glyphicon-cog"></span><a href="options.php">الانظمة الفرعية</a>
                <ul class="drop_main_menu">
                    <li><a href='dashboard.php?stu_settings'>شوؤن الطلاب</a></li>
                    <li><a href='dashboard.php?stu_finance'>مالية الطلاب</a></li>
                    <li><a href='dashboard.php?book_document'>تسليم الكتب</a></li>
                    <li><a href='dashboard.php?results'>إعلان النتائج</a></li>
                </ul>
            </li>
            <!-- <li><span class="glyphicon glyphicon-user"></span><a href="">إدارة الاعضاء</a>
                <ul class="drop_main_menu">
                    <li><a href="add_new_user.php">إضافة جديد</a></li>
                    <li><a href="view_all_users.php">عرض الكل</a></li>
                </ul>
            </li>
            <li><span class="glyphicon glyphicon-edit"></span><a href="">المواضييع والمقالات</a>
                <ul class="drop_main_menu">
                    <li><a href="add_new_topic.php">إضافة جديد</a></li>
                    <li><a href="view_all_topics.php">عرض الكل</a></li>
                </ul>
            </li>
            <li><span class="glyphicon glyphicon-picture"></span><a href="">البوم الصور</a>
                <ul class="drop_main_menu">
                    <li><a href="add_new_photo.php">إضافة جديد</a></li>
                    <li><a href="view_all_photos.php">عرض الكل</a></li>
                </ul>
            </li> -->
        </ul>
    </div>
</div>
<!--/End side bar main menu-->