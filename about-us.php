<?php
	session_start();
    ob_start();
	$pageTitle = 'عن المعهد';
    include "init.php";
    
    $do = isset($_GET['do']) ? $_GET['do'] :'';
    if($do = "About_us
    "){
?>
    
    <div class="container" >
    
        <div class="row"style="margin-top: 60px;">
            <div class="col-sm-9 item-info">
            <?php if(isset($_GET['page']) && $_GET['page'] == "hestory"){ ?>
                <h3  id="edit" class="bg-success" > تاريخ المعهد</h3>
                <ul  class="list-unstyled" style="font-weight: bold;"> 
                <li><center><img src="layout/img/bg-img/bg-6.jpg" alt="" style="text-aline: center ;"></center></li>
                <li>أنشأ المعهد المصري العالى للادارة والمحاسبة بمقتضى القرار الوزارى رقم 1540 لسنة 1996 بالمبنى الكائن بـ 3 ميدان المساجد بجوار مسجد المرسى أبى العباسى بشعبتى الادارة والمحاسبة وقسم اللغة الانجليزية وبمقتضى القرار الوزارى رقم 663 لسنة 1999 تم إنشاء شعبة نظم المعلومات والحاسب الآلى.</li>
                <li>وتم تغيير اسم المعهد بمقتضى القرار الوزارى رقم 396 لسنة 2000 ليصبح “المعهد المصرى لأكاديمية الاسكندرية للادارة والمحاسبة” و بدأت الدراسة بالمعهد بعدد 60 طالبا وطالبة واستمر العدد فى التزايد فى السنوات اللاحقة حتى بلغ 4000 طالب وطالبة.</li>
                <li>وانتقل المعهد إلى مقره الجديد بـ 3 شارع الملك – أمام قصر المنتزة – محافظة الاسكندرية بمقتضى القرار الوزارى رقم 1019 لسنة 2011.</li>
                <li>وقد تخرجت أول دفعة بالمعهد فى شهر يونيو عام 2000 وحصلت على درجة البكالوريوس فى الادارة والمحاسبة والتى تمت معادلتها عام 2005 ببكالوريوس التجارة فى المحاسبة والادارة التى تمنحها الجامعات المصرية.</li>
                
                </ul>
            <?php }elseif(isset($_GET['page']) && $_GET['page'] == "Vision"){ ?>
                <h3  id="edit" class="bg-success" >الرؤية و الرسالة و الأهداف</h3>
                <ul  class="list-unstyled" style="font-weight: bold;"> 
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : الرؤية</h4>
                        <li>تحقيق الريادة والتميز في التعليم العالى على المستوى القومي و الإقليمي في مجالات العلوم التجارية و نظم المعلومات مع تقديم الدعم الدائم للبحث العلمي و خدمة المجتمع.</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : الرسالة </h4>
                        <li> إعداد خريجين متميزين علميا و معرفيا و مهاريا و مهنيا في مجالات العلوم التجارية ونظم المعلومات ليكونوا قادرين على تلبية إحتياجات سوق العمل على المستوى المحلي و الإقليمي و مواكبة المتطلبات الحديثة في مجالات العلمية و التكنولوجية.</li>
                    </ul>
                    <ul style="margin-top: 15px;"><h4 class="bg-primary"> : اهداف المعهد </h4>
                        <ul>مع تنامى ظاهرة العولمة وتغيير قواعد المنافسة وشروطها بين الدول ومؤسسات الأعمال منذ مطلع القرن الحادى والعشرين ، وحيث أن المعرفة والعلم أصبحت أهم أنواع الموارد اللازمة لنجاح المنظومة التنموية فى الدول التى تسعى دائما إلى بناء مجتمع التعلم الذى يقوم ليس فقط على المعلومات بل أيضا السعى لتوليد معارف جديدة، فضلا عن التمكين وبناء المهارات والرسملة على رأس المال الفكرى ، ومع تطور صناعة التعليم بالدول المتقدمة فقد تم تطوير منظومة التعليم بالمعهد حتى تواكب هذا التطور ومن ثم المساهمة فى توفير المهارات البشرية اللازمة لبناء مجتمع التعلم. وعلى ذلك فإن المعهد يهدف إلى تحقيق الأهداف التالية:-
                            <li>المساهمة الجادة فى تخريج طبقة متميزة من الاداريين المتخصصين فى التخطيط والتنظيم والقيادة فى منظمات الأعمال والأجهزة الحكومية ، بالاضافة إلى بناء مهارات جديدة فى مجالات الأنشطة الحيوية بمنظمات الأعمال (التسويق، الانتاج، الامداد وغيرها).</li>
                            <li>تكوين طبقة من المحاسبين على أعلى مستوى علمى طبقا للتطور العالمى فى هذا المجال، خصوصا بإستخدام تقنيات الحاسب الآلى فى المحاسبة ، وإتخاذ القرارات ودعمها.</li>
                            <li>تخريج طبقة متميزة فى مجال صناعة الخدمات المصرفية والمالية (كالبنوك وشركات التأمين) حيث توجد ندرة فى الخريجين فى هذا المجال ، وهذا يساهم أيضا فى الوفاء بإحتياجات المجتمع من الاداريين والمحاسبين القادرين على التعامل باللغتين العربية والانجليزية على حد سواء.</li>
                            <li>الاهتمام بالتخصصات الدقيقة فى مجال إدارة الأعمال ونظم المعلومات الادارية الحديثة، وبحوث التسويق وإستخدام بحوث العمليات فى إتخذا القرارات والاهتمام بخلق أدوات وآليات للتعامل مع وحل مشاكل التمويل.</li>
                            <li>تكوين وبناء مهارات جديدة فى علوم الحاسب الآلى وإنشاء المواقع الاليكترونية ، والتجارة الاليكترونية.</li>
                        </ul>
                    </ul>
                </ul>
            <?php }elseif(isset($_GET['page']) && $_GET['page'] == "The_founders"){ ?>
                <h3  id="edit" class="bg-success" >المؤسسون  </h3>
                <ul  class="list-unstyled" style="font-weight: bold;"> 
                <li><center><img src="layout/img/bg-img/adel.gif" alt="" style="text-aline: center ;"></center>
                <h3  id="edit" class = "text-center">أ.د./عادل عبد الحميد عز  </h3></li>
                    <ul style="margin-top: 10px;" ><h4 class="bg-primary"> : الدرجة العلمية</h4>
                        <li>دكتوراه فى العلوم الاقتصادية والتأمين (جامعة سانت جالين- سويسرا) بتقدير عام ممتاز، ودرجة الزمالة (دكتوراه فخرية من أكاديمية السادات للعلوم الادارية).</li>
                        <li>أسس المعهد المصرى لأكاديمية الاسكندرية للادارة والمحاسبة وتولى رئاسته حتى وفاته.</li>
                        <li>قام بالتدريس بجمعات (القاهرة-الاسكندرية- الزقازيق-المنصورة-أسيوط-جامعة بيروت العربية-معهد الاحصاء-أكاديمية السادات للعلوم الادارية-المعهد المصرى لأكاديمية الاسكندرية).</li>
                        <li>ساهم بجهد كبير فى العديد من الدورات التدريبية داخل مصر وخارجها بكلا من (قطر-المملكة العربية السعودية-ليبيا).</li>
                        <li>عمل رائدا لاتحاد طلاب كلية التجارة ورائدا لأحد لجان جامعة القاهرة ورائد لاتحاد جامعة بيروت العربية وأشرف على الأنشطة الرياضية والاجتماعية والفنية.</li>
                        <li>عضو عامل بالنادى الأهلى منذ عام 1966 وعضو عامل بأندية الجزيرة والصيد والزهور.</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : الأوسمة </h4>
                        <li>حاصل على وسام الجمهورية من الطبقة الأولى (جمهورية مصر العربية).</li>
                        <li>حاصل على وسام الجمهورية من الطبقة الأولى (تونس).</li>
                        <li>حاصل على وسام الصليب الأكبر (قبرص).</li>
                        <li>كما حصل على العديد من شهادات التقدير.</li>
                    </ul>
                    <ul style="margin-top: 15px;"><h4 class="bg-primary">  : المؤهلات الدراسية والعلمية </h4>
                        <li>حاصل على بكالوريوس التجارة جامعة القاهرة شعبة محاسبة مع مرتبة الشرف عام 1954.</li>
                        <li>درس ماجستير المحاسبة بكلية التجارة جامعة القاهرة ودرس بكلية الحقوق جامعة عين شمس حتى السنة الثالثة وقطع هذه الدراسة لسفره فى بعثة إلى سويسرا عام 1957.</li>
                        <li>حصل على دبلوم الرياضة والتأمين ودكتوراه فى العلوم الاقتصادية والتأمين بتقدير عام ممتاز من جامعة سانت جالين سنة 1962.</li>
                        <li>كرمته أكاديمية السادات للعلوم الادارية بمنحه درجة الزمال (الدكتوراه) الفخرية.</li>
                    </ul>
                    <ul style="margin-top: 15px;"><h4 class="bg-primary">  : الوظائف والمناصب القيادية والادارية </h4>
                        <li>عمل مفتشا للحسابات ومأمور للضرائب بعد التخرج مباشرة.</li>
                        <li>أنتدب ضابط بالقوات المسلحة (إدارة التعبئة بالدقى)</li>
                        <li>قضى فترة خبرة علمية فى مؤسسة التأمين الاجتماعى فى سويسرا وفى الشركة السويسرية لإعادة التأمين.</li>
                        <li>عاد إلى أرض لوطن وعمل بمصلحة التأمين (هيئة الاشراف والرقابة) مديرا لإدارة التأمين الاجبارى ومديرا للبحوث الفنية للمؤسسة المصرية العامة للتأمين.</li>
                        <li>عين مدرسا ثم أستاذا مساعدا ثم وكيلا فعميدا لكلية التجارة جامعة القاهرة فى الفترى من 1975-1979 وأسس كلية التجارة جامعة القاهرة (بنى سويف) وكان أول عميد لها.</li>
                        <li>أختير مستشارا تأمينيا وإقتصاديا للهيئة العامة للتأمين الصحى وقام بإعداد كافة الدراسات الرياضية والاحصائية والتأمينية لأول تجربة للتأمين الصحى فى محافظة الاسكندرية عام 1965 فى عهد المرحوم الوزير /محمد نصار.</li>
                        <li>عين رئيسا للمعهد القومى للتنمية الادارية وأسس أكاديمية السادات للعلوم الادارية وكان أول رئيس لها.</li>
                        <li>عضو عامل بالنادى الأهلى وأنتخب عضوا بمجلس الادارة عام 1976.</li>
                        <li>أختير عضوا بمجلس إدارة شركة مصر للتأمين والمجلس الأعلى لقطاع التأمين.</li>
                        <li>وبجوار عمله أسس شركة قناة السويس للتأمين وعمل رئيسا لها لمدة خمس سنوات من 1980-1985 وأستطاع ان يحقق متوسط ربح سنوى 100%.</li>
                        <li>عمل عضوا منتدبا لشركة مصر للاستثمار العقارى والسياحى وحقق طفرة كبيرة فى أرباح الشركة 1993-2000.</li>
                        <li>عمل مستشار لوزير التأمينات المرحوم د/حسن الشريف ثم المرحوم الأستاذ/محمد عبد الفتاح وساهم فى إعداد قانون التأمين الاجتماعى رقم 79 لسنة 1975.</li>
                        <li>عمل مستشارا (لشئون قطاع التأمين) لوزير الاقتصاد المرحو الدكتور/ زكى شافعى وساهم فى إعداد قانون الاشراف والرقابة رقم 10 لسنة 1981.</li>
                        <li>أختير عضوا بمجلس الشورى لمدة 21 عاما منذ عام 1980 وحتى عام 2001.</li>
                        <li>أختير وزيرا للبحث العلمى عام 1986 ووزيرا للتربية والتعليم عام 1990-1991 وأستمر وزيرا للبحث العلمى حتى أكتوبر 1993.</li>
                        <li>أختير عضوا بالمجالس القومية المتخصصة وحتى وفاته.</li>
                        <li>أختير عضوا بمجلس أمناء اتحاد الاذاعة والتلفزيون وحتى وفاته.</li>
                        <li>قام بالتدريس كما أشرف على العديد من رسائل الماجستير والدكتوراه بجامعة القاهرة والمنصورة وأكاديمية السادات للعوم الادارة وجامعة بيروت العربية.</li>
                    </ul>
                    <ul style="margin-top: 15px;"><h4 class="bg-primary">  : قام بإعداد كم هائل من البحوث العلمية وألف المراجع العلمية التالية </h4>
                        <li>الرياضة للتجاريين، رياضيات المال الاستثمار، الدراسات الكمية- التأمينات العامة-التأمين الاجتماعى ورياضياته- الإحصاء السكانى- بحوث فى التأمين(حساباته-إقتصادياته-تكاليفه).</li>
                    </ul>
                </ul>
            <?php }elseif(isset($_GET['page']) && $_GET['page'] == "Board_of-Directors"){ ?>

            <?php }elseif(isset($_GET['page']) && $_GET['page'] == "Organizational_structure"){ ?>
                <h3  id="edit" class="bg-success" >: الهيكل التنظيمي</h3>
                <ul  class="list-unstyled" style="font-weight: bold;"> 
                <li><center><img src="layout/img/bg-img/s-o.jpg" alt="" style="text-aline: center ;"></center>
                <h3  id="edit" class = "text-center">الهيكل التنظيمي لاكاديمية الاسكندرية للادراة والمحاسبة</h3></li>
                </ul>
            <?php }elseif(isset($_GET['page']) && $_GET['page'] == "Members"){ ?>
                <h3  id="edit" class="bg-success" >: اعضاء هيئة التدريس والهيئة المعاونة</h3>
                <!-- ##### Top Popular Courses Area Start ##### -->
                <div class="top-popular-courses-area section-padding-100-70">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                                    <h3><i class="fas fa-user"></i><i class="fas fa-user-graduate"></i><i class="fas fa-user"></i>     &nbsp اعضاء الهيئة التدريسية  </h3>
                                </div>
                            </div>
                        </div>
                        <div class="row"  style="direction: rtl;">
                        
                            <!-- Single Top Popular Course -->
                            <div class="col-12 col-lg-6">
                                <div style="height: 44em;" class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                    <div class="popular-course-content">
                                        <h5>قسم نظم المعلومات الإدارية</h5>
                                        <h6>الاساتذة والاساتذة المساعدين  &nbsp <i class="fas fa-user"></i><i class="fas fa-user-graduate"></i><i class="fas fa-user"></i></h6>
                                        <span>أعضاء هيئة التدريس</span>
                                        <ul>
                                            <li><a href="#">د.تامر فؤاد.</a></li>
                                            <li><a href="#">د.صفاء صالح.</a></li>
                                            <li><a href="#">أ.د.حاتم عبد القادر.</a></li>
                                            <li><a href="#">د.أحمد عبد الظاهر.</a></li>
                                        </ul>
                                        <span>أعضاء الهيئة المعاونة </span>
                                        <ul>
                                            <li>أ/ أميرة حمدي (مدرس مساعد).</li>
                                            <li>أ/محمود شعبان (معيد).</li>
                                            <li>أ/أحمد يسري (معيد).</li>
                                            <li>أ/بارديس خالد (معيد).</li>
                                            <li>أ/أمل حنفي (معيد).</li>
                                            <li>أ/روضة السعيد (معيد)</li>
                                            <li>أ/ يوسف ياسين (معيد).</li>
                                        </ul>
                                        
                                    </div>
                                    <div class="popular-course-thumb bg-img" style="background-image: url(layout/img/bg-img/dep-2.jpg);"></div>
                                </div>
                            </div>
                            
                            <!-- Single Top Popular Course -->
                            <!-- Single Top Popular Course -->
                            <div class="col-12 col-lg-6">
                                <div style="height: 44em;" class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                    <div class="popular-course-content">
                                        <h5>قسم المحاسبة و المراجعة</h5>
                                        <h6>الاساتذة والاساتذة المساعدين  &nbsp <i class="fas fa-user"></i><i class="fas fa-user-graduate"></i><i class="fas fa-user"></i></h6>
                                        <span>أعضاء هيئة التدريس</span>
                                        <ul>
                                            <li><a href="#">د. رشا إبراهيم.</a></li>
                                            <li><a href="#">د. محمد جمعة.</a></li>
                                            <li><a href="#">د. منى سلامة.</a></li>
                                        </ul>
                                        <span>أعضاء الهيئة المعاونة </span>
                                        <ul>
                                            <li>أ/سماح إبراهيم (مدرس مساعد).</li>
                                            <li>أ/آية عبد السلام (مدرس مساعد).</li>
                                            <li>أ/سارة السيد (معيد).</li>
                                            <li>أ/شروق سيد محمد (معيد).</li>
                                        </ul>
                                        
                                    </div>
                                    <div class="popular-course-thumb bg-img" style="background-image: url(layout/img/bg-img/dep-1.jpg);"></div>
                                </div>
                            </div>
                            
                            <!-- Single Top Popular Course -->
                            <!-- Single Top Popular Course -->
                            <div class="col-12 col-lg-6">
                                <div style="height: 44em;" class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                    <div class="popular-course-content">
                                        <h5>قسم ادارة الاعمال</h5>
                                        <h6>الاساتذة والاساتذة المساعدين  &nbsp <i class="fas fa-user"></i><i class="fas fa-user-graduate"></i><i class="fas fa-user"></i></h6>
                                        <span>أعضاء هيئة التدريس</span>
                                        <ul>
                                            <li><a href="#">د.رشدي احمد.</a></li>
                                            <li><a href="#">د.ميرفت نصري.</a></li>
                                            <li><a href="#">أ.د.امنية عادل.</a></li>
                                        </ul>
                                        <span>أعضاء الهيئة المعاونة </span>
                                        <ul>
                                            <li>أ/ وائل غريب (مدرس مساعد).</li>
                                        </ul>
                                        
                                    </div>
                                    <div class="popular-course-thumb bg-img" style="background-image: url(layout/img/bg-img/dep-3.jpg);"></div>
                                </div>
                            </div>
                            
                            <!-- Single Top Popular Course -->
                            <!-- Single Top Popular Course -->
                            <div class="col-12 col-lg-6">
                                <div style="height: 44em;" class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                    <div class="popular-course-content">
                                        <h5>قسم الرياضة و الاحصاء والتامين</h5>
                                        <h5>قسم الاقتصاد</h5>
                                        <h6>الاساتذة والاساتذة المساعدين  &nbsp <i class="fas fa-user"></i><i class="fas fa-user-graduate"></i><i class="fas fa-user"></i></h6>
                                        <span>أعضاء هيئة التدريس</span>
                                        <ul>
                                            <li><a href="#">أ.د.عبد الله بدر.(عميد المعهد)</a></li>
                                            <li><a href="#">د.جلال جويدة .</a></li>
                                            <li><a href="#">د.عمرو يوسف .</a></li>
                                            <li><a href="#">د.مروة البغدادي .</a></li>
                                        </ul>
                                        <span>أعضاء الهيئة المعاونة </span>
                                        <ul>
                                            <li>أ/ غادة ربيع (مدرس مساعد).</li>
                                            <li>أ/ فاتن سليمان (مدرس مساعد).</li>
                                            <li>أ/محمد أنيس (معيد).</li>
                                        </ul>
                                        
                                    </div>
                                    <div class="popular-course-thumb bg-img" style="background-image: url(layout/img/bg-img/dep-4.jpg);"></div>
                                </div>
                            </div>
                            
                            <!-- Single Top Popular Course -->
                        </div>
                    </div>
                </div>
            <?php }elseif(isset($_GET['page']) && $_GET['page'] == "halls"){ ?>
                <h3  id="edit" class="bg-success" >: القاعات الدراسية ومعامل الحاسب</h3>
                <!-- ##### Testimonials Area Start ##### -->
                <div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url(layout/img/bg-img/bg-00.jpg);padding-top: 20px;">
                    <div class="container">
                        <div class="row">
                            <ul style="font-weight: bold; color:darkcyan ;" > 
                                <ul style="margin-top: 10px;"><h4 class="bg-primary"> : قاعات المحاضرات</h4><h5  class="text-warning">جميعها مجهزة بأحدث وسائل العرض والايضاح والمراوح ونوافذ التهويه وتوزيعها كالتالي:</h5>
                                    <li>عدد (2) مدرج كبير. </li><li>عدد (3) مدرج صغير.</li><li>عدد (13) قاعه دراسية.</li>
                                </ul>
                                <ul style="margin-top: 10px;"><h4 class="bg-primary"> : معامل الحاسب الآلى </h4><h5  class="text-warning">معامل مجهزة بأجهزه الحاسب الآلى والمزوده بأحدث البرامج بالإضافه لوسائل العرض والإيضاح، والمعامل مكيفة.</h5>
                                    <li>عدد (2) معمل</li>
                                </ul>
                                <ul style="margin-top: 10px;"><h4 class="bg-primary"> : المكتبة </h4><h5  class="text-warning">مكيفة وتضم مايزيد عن 7000 كتاب(عربي+إنجليزى) يخدم كل التخصصات بالمعهد مع عدد أربع أجهزة كمبيوتر مزودة بخدمة الإنترنت بالإضافة لجهاز مسؤول المكتبة.</h5>
                                </ul>
                                <ul style="margin-top: 10px;"><h4 class="bg-primary">  عيادة طبية مجهزة </h4>
                                </ul>
                                <ul style="margin-top: 10px;"><h4 class="bg-primary">  شبكة إطفاء متكامله لكل دور بمبانى المعهد. </h4>
                                </ul>
                                <ul style="margin-top: 10px;"><h4 class="bg-primary">  الملاعب الرياضية </h4><h5  class="text-warning">يوجد ملعب كرة قدم خماسى.</h5>
                                </ul>
                                <ul style="margin-top: 10px;"><h4 class="bg-primary"> كافتيريا لبيع المشروبات والوجبات السريعة للطلاب بأسعار مناسبة. </h4>
                                </ul>
                                <ul style="margin-top: 10px;"><h4 class="bg-primary"> مركز تصوير خدمى للطلاب بأسعار مناسبة.</h4>
                                </ul>
                                <ul style="margin-top: 10px;"><h4 class="bg-primary"> مساحات خضراء وأماكن لاستراحات الطلاب. </h4>
                                </ul>
                                <ul style="margin-top: 10px;"><h4 class="bg-primary">المعهد مجهز للتعامل مع الطلاب ذوي الهمم. </h4>
                                </ul>
                            
                        <div class="col-12 text-center mt-50">
                            <h3 style="color: #b2bac5 ;"> <i class="fas fa-angle-double-down"></i> &nbsp  &nbsp المعامل والقاعات الدراسية</h3>
                        </div>
                        <br>  <br>  <br>
                        <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                                    <div class="course-content" >
                                        <h4>مكتبة المعهد</h4>
                                        <div class="border"><img src="layout/img/bg-img/sec-1.jpg" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Course Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                                    <div class="course-content">
                                        <h4>معامل الكمبيوتر</h4>
                                        <div class="border"><img src="layout/img/bg-img/sec-2.jpg" alt=""></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Course Area -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                                    <div class="course-content">
                                        <h4>قاعات المحاضرات</h4>
                                        <div class="border"><img src="layout/img/bg-img/sec-3.jpg" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ##### Testimonials Area End ##### -->
            <?php } ?>
            
                </div>
                <div class="col-sm-3 ">
                    <!-- <input type="text" id="mySearch" onkeyup="myFunction()" placeholder="Search.." title="Type in a category"> -->
                    <ul id="myMenu">
                        <li><a href="?do=About_us&page=hestory">تاريخ المعهد</a></li>
                        <li><a href="?do=About_us&page=Vision"> الرؤية و الرسالة والاهداف</a></li>
                        <li><a href="?do=About_us&page=The_founders">المؤسسون </a></li>
                        <li><a href="?do=About_us&page=Board_of-Directors">مجلس الادارة </a></li>
                        <li><a href="?do=About_us&page=Organizational_structure">الهيكل التنظيمي</a></li>
                        <li><a href="?do=About_us&page=Members"> اعضاء هيئة التدريس والهيئة المعاونة </a></li>
                        <li><a href="?do=About_us&page=halls">القاعات الدراسية و معامل الحاسب</a></li>
                    </ul>
            </div>
        </div>
    </div>

    <?php } ?>
    



<?php
	include $tbl ."footer.php"; 
	ob_end_flush();
		 
?>