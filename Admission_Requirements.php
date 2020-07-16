<?php
	session_start();
    ob_start();
	$pageTitle = 'عن المعهد';
    include "init.php";
    
    $do = isset($_GET['do']) ? $_GET['do'] :'';
    if($do = "Admission_Requirements"){
?>
    
    <div class="container" >
    
        <div class="row"style="margin-top: 60px;">
            <div class="col-sm-9 item-info">
            <?php if(isset($_GET['page']) && $_GET['page'] == "Admission_Requirements"){ ?>
                <h3  id="edit" class="bg-success" >شروط الإلتحاق</h3>
                <ul  class="list-unstyled" style="font-weight: bold;"> 
                    <ul>يتم ترشيح الطلاب عن طريق مكتب تنسيق القبول بالجامعات و المعاهد
                        <li>شعبة الادارة والمحاسبة (طابع تنسيق رقم 981/4).</li>
                        <li>شعبة نظم المعلومات الادارية (طابع تنسيق رقم 373/3).</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> أولا:- للقبول بشعبة الادارة والمحاسبة</h4><h5  class="text-success">يشترط حصول الطالب على إحدى الشهادات الآتية:-</h5>
                        <li>الثانوية العامة بشعبتيها العلمى و الأدبى وما يعادلها من الشهادات العربية و الأجنبية.</li>
                        <li>الثانوية التجارية نظام 3 سنوات.</li>
                        <li>الثانوية الفنية للادارة والخدمات ومدارس الأورمان نظام 3 سنوات.</li>
                        <li>دبلوم المعاهد الفنية التجارية ومعاهد السكرتارية الفوق متوسطة والثانوية التجارية نظام 5 سنوات (للالتحاق بالفرقة الثانية مباشرة).</li>
                    </ul> 
                    <ul style="margin-top: 10px;"><h4 style=" font-style: italic;">تنقسم هذه الشعبة إبتداء من الفصل الدراسى الخامس (الفرقة الثالثة) إلى ثلاث شعب:</h4>
                        <li class="text-info">شعبة المحاسبة والمراجعة.</li>
                        <li class="text-info">شعبة الادارة.</li>
                        <li class="text-info">شعبة المؤسسة المالية.</li>
                        <h5  class="text-danger">ويتم تحديد رغبة الطالب فى الانضمام إلى الشعبة التى يرغبها بدءا من العام الدراسى بالفرقة الثالثة.</h5>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 style=" font-style: italic;">بالنسبة للدراسة باللغة الإنجليزية:-</h4>
                        <li class="text-success">يقبل خريجي مدارس الثانوية العامة (اللغات وغير اللغات) بحد أدنى 75 ٪ في اللغة الإنجليزية.</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary">ثانيا :- للقبول بشعبة نظم المعلومات الادارية</h4><h5  class="text-success">يشترط حصول الطالب على إحدى الشهادات الآتية:-</h5>
                        <li>الثانوية العامة بشعبتيها العلمى والأدبى وما يعادلها من الشهادات العربية والأجنبية.</li>
                        <li>الثانوية التجارية نظام 5 سنوات أو 3 سنوات.</li>
                        <li>الثانوية الصناعية نظام 3 أو 5 سنوات.</li>
                        <li>دبلوم المعاهد الفنية الصناعية.</li>
                        <li>دبلوم المعاهد الفنية التجارية.</li>
                        <li>دبلوم المعاهد الفنية التجارية شعبة الحاسب الآلى للالتحاق بالفرقة الثانية مباشرة.</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary">ملاحظات عامة:</h4>
                        <li>يقبل المعهد حالات استنفاذ مرات الرسوب للفرقة الأولى من الكليات غير المناظرة.</li>
                        <li>يقبل المعهد التحويلات من الكليات والمعاهد المناظرة والغير مناظرة لراغبى التحويل</li>
                    </ul>
                </ul>
            <?php }elseif(isset($_GET['page']) && $_GET['page'] == "system"){ ?>
                <h3  id="edit" class="bg-success" >نظام الدراسة بالمعهد</h3>
                <ul  class="list-unstyled" style="font-weight: bold;"> 
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : مدة الدراسة</h4>
                        <li>مدة الدراسة بالمعهد أربع سنوات جامعية وذلك للحصول على درجة البكالوريوس.</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : لغة الدراسة </h4>
                        <li>اللغتان العربية والإنجليزية هما لغتا التعليم بالمعهد ويوجد شعبتان للدراسة، شعبة باللغة العربية وشعبة باللغة الإنجليزية بالنسبة لشعبة المحاسبة والمراجعة، ويكون أداء الامتحان باللغة التي يدرس بها الطالب المقرر.</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : العام الجامعي والفصول الدراسية </h4>
                        <li>توزع الدراسة بالمعهد في كل عام جامعيعلى فصلين دراسيين مدة كل منهما مابين ( 16 – 18) أسبوعاً دراسياً بما فيها الامتحانات.</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : الجدول الدراسي </h4>
                        <li>يلتزم الطالب بجدوله الدراسي المعلن للفصل الدراسي طوال الأسبوع من السبت إلى الخميس و ذلك بمعدل محاضرة و تمرين أو معمل أسبوعياً لكل مادة عملية أو محاضرة فقط للمواد النظرية.</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : قواعد الحضور والغياب </h4>
                        <li> يجب أن لا تقل نسبة مرات حضور الطالب في أي مقرر عن 75% من عدد المحاضرات خلال الفصل الدراسي . وفي حالة تجاوز الطالب لنسبة غياب 25 % من إجمالي عدد المحاضرات أي بواقع (3) محاضرات للمادة يرسل للطالب إنذار بالحرمان من دخول امتحان المادة سواء المنتصف أو النهائي، إلا إذا كان هذا التغيب بعذر (يقدم الطالب ما يثبت العذر) و تقبله إدارة المعهد.</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : نظام تقويم الطالب في المقرر </h4>
                        <li>يتم تقييم الطالب بصفة مستمرة خلال الفصل الدراسي بالإضافة لامتحان نهاية الفصل الدراسي، وتمثل أعمال الفصل الدراسي جزءا من الدرجة النهائية وتتمثل في الامتحانات الدورية و التمارين العملية والبحوث.</li>
                        <li>يتم تقييم درجة الطالب في المقررات التطبيقية مثل المشروع بدون عقد اختبار تحريري لنهاية الفصل الدراسي، ويتم عقد اختبار شفوى يتضمن تقييم التقرير المقدم من الطالب والأعمال العلمية المنفذة من خلال لجنة مناقشة تتكون من عضوين من هيئة التدريس بالمعهد بالإضافة إلى مشرف المشروع.</li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : يتم توزيع الدرجات في البرامج الدراسية المختلفة طبقاً للجدول الآتي </h4>
                    <li>
                    <table class="table table-bordered ">
                    <thead>
                        <tr class="table-active">
                        <th scope="col">اجمالي الدرجات</th>
                        <th scope="col">نهاية الفصل</th>
                        <th scope="col">امتحان عملي</th>
                        <th scope="col">اعمال السنة</th>
                        <th scope="col">منتصف الفصل</th>
                        <th scope="col">نوع المقرر</th>
                        <th scope="col">الشعبة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">100</th>
                        <td>40</td>
                        <td>–</td>
                        <td>30</td>
                        <td>30</td>
                        <td>نظرى</td>
                        <td rowspan="2" class="table-active">المحاسبة والإدارة</td>
                        </tr>
                        <tr>
                        <th scope="row">100</th>
                        <td>40</td>
                        <td>10</td>
                        <td>20</td>
                        <td>30</td>
                        <td>عملى</td>
                        </tr>
                        <tr>
                        <th scope="row">100</th>
                        <td>75</td>
                        <td>–</td>
                        <td>15</td>
                        <td>10</td>
                        <td>نظرى</td>
                        <td rowspan="2" class="table-active">نظم المعلومات الإدارية</td>
                        </tr>
                        <tr>
                        <th scope="row">100</th>
                        <td>65</td>
                        <td>10</td>
                        <td>10</td>
                        <td>15</td>
                        <td>عملى</td>
                        </tr>
                        
                    </tbody>
                    </table>
                    </li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : تقديرات أداء الطالب في المقرر</h4>
                        <li>
                        <table class="table table-bordered ">
                        <thead>
                            <tr class="table-active">
                            <th scope="col">ضعيف جداً</th>
                            <th scope="col">ضعيف</th>
                            <th scope="col">مقبول</th>
                            <th scope="col">جيد</th>
                            <th scope="col">جيد جداً</th>
                            <th scope="col">ممتاز</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td class="table-danger">29- صفر</td>
                            <td class="table-warning">30-49</td>
                            <td class="table-secondary">50-64</td>
                            <td class="table-info">65 -74</td>
                            <td class="table-primary">75 -84</td>
                            <td class="table-success">85 -100</td>
                            </tr>
                        </tbody>
                        </table>
                        </li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : التقديرات العامة لتخرج الطالب</h4>
                        <li>
                        <table class="table table-bordered ">
                        <thead>
                            <tr class="table-active">
                            <th>مقبول</th>
                            <th>جيد</th>
                            <th>جيد جداً</th>
                            <th>جيد جداً مع مرتبة الشرف</th>
                            <th>ممتاز</th>
                            <th>ممتاز مع مرتبة الشرف</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td >50-64</td>
                            <td >65 -74</td>
                            <td>75 -84</td>
                            <td class="table-info w-25">75 -84<br>دون الرسوب في أي مادة خلال فترة دراسته بالمعهد</td>
                            <td class="table-primary">85 -100</td>
                            <td class="table-success w-25">85 -100<br>دون الرسوب في أي مادة خلال فترة دراسته بالمعهد</td>
                            </tr>
                        </tbody>
                        </table>
                        </li>
                    </ul>
                    <ul style="margin-top: 10px;"><h4 class="bg-primary"> : ملاحظات هامة </h4>
                        <li>حضور الطالب الامتحان النهائي شرط أساسي للنجاح في المقرر ، حتى ولو حصل الطالب على درجة النجاح في امتحان المنتصف وأعمال السنة.</li>
                        <li>إذا رسب الطالب في ثلاث مقررات أو أكثر سيظل في نفس السنة (باقي للإعادة) وسيمتحن في المقررات التي رسب فيها فقط مع تخفيض التقدير لمقبول، ماعدا مقرر “حقوق الإنسان” .</li>
                        <li>طالب السنة الأولى لديه فرصتين فقط للانتقال للسنة الثانية وإما سيعرض نفسه للفصل أو إعادة قيده كطالب من الخارج.</li>
                    </ul>
                </ul>
            <?php }elseif(isset($_GET['page']) && $_GET['page'] == "Student_rights"){ ?>
                <h3  id="edit" class="bg-success" >حقوق الطالب ومسؤولياته  </h3>
                <ul  class="list-unstyled" style="font-weight: bold;"> 
                    <ul style="margin-top: 10px;" ><h4 class="bg-primary"> : حقوق الطالب ومسؤولياته</h4><h5  class="text-secondary">يتمتع الطلبة الملتحقون بالمعهد المصرى لأكاديمية الإسكندرية بمجموعة من الحقوق نوجزها بالآتى:</h5>
                        <li>الحصول على خبرات، ومهارات تعليمية وتفكيرية تساعد على بناء الذات والنجاح، والتفوق في المسيرة الجامعية.</li>
                        <li>المساواة في المعاملة والاستفادة من الخدمات وعدم التمييز بين الطلبة على أساس الجنس أو الانتماء العرقيً.</li>
                        <li>الحق في رفع الشكاوى، والتطلمات في أي قضية جامعية عبر مكتب شؤون الطلبة بالمعهد.</li>
                        <li>الحق في تقديم الاقتراحات، والأفكار التي من شأنها تطوير عملية التعليم، أو الخدمات، أو الأنشطة.</li>
                        <li>توفير الفرص المناسبة للمارسة الأنشطة اللاصفية، والتعبير عن الإمكانيات والقدرات الكامنة.</li>
                        <li>الحيادية، والموضوعية في التقويم الدراسي، والتأديب، وتوزيع الفرص.</li>
                        <li>توفر الحصول على المعلومات واللوائح والقوانين الخاصة بالعملية التعليمية والتجنيد.</li>
                        <li>عدم التدخل في الشؤون الشخصية للطالب، والحفاظ على خصوصياته، وسرية معلوماته الشخصية.</li>
                    </ul>
                    <ul style="margin-top: 10px;" ><h4 class="bg-primary"> : المسؤوليات والواجبات</h4><h5  class="text-secondary">وفي مقابل تلك الحقوق فإن هناك العديد من المسؤوليات، والواجبات التي ينبغى على الطالب الالتزام بها وتحملها؛ ذلك لأن الإخلال بها يؤدى إلى إعاقة مسيرة الطالب التعليمية في المعهد، أو تؤدى إلى تعرصه لعقوبات تأديبية تصل إلى حد الفصل من المعهد، ومن أهم المسؤوليات:</h5>
                        <li>الالتزام بالأمانة العلمية والاستقامة التعليمية وتشمل <span>.1</span>
                            <ul>
                                <li>عدم ممارسة الغش بكافة أنواعة؛ مثل طلب أو تقديم المساعدة للأخرين في أثناء الامتحانات، أو حيازة مذكرات أو قصاصات ورقية، أو اصطحاب آلات حاسبة مبرمجة تختزن معلومات عن مادة الامتحان، أو استخدام الهواتف المتحركة وغيرها من الأساليب والوسائل.</li>
                                <li>الامتناع عن تكليف آخرين بالقيام نيابة عن الطالب بأي عمل أو نشاط تعليمي، مثل التوقيع نيابة عنه في المحاضرة أو السكشن أو الحصول على النتيجة أو غيرها من خدمات.</li>
                                <li>عدم انتحال أو سرقة أعمال الغير دون وجه حق، مثل اقتباس أفكار وأعمال الآخرين دون الإشارة إليهم في الأبحاث، أو تقديم أبحاث علمية تم إعدادها من قبل مكاتب الطباعة، أو تقديم أبحاث طلبة آخرين من الكلية أو خارجها.</li>
                            </ul>
                        </li>
                        <li> الامتناع عن السلوكيات العدوانية التي قد تهدد، أو تعرض الصحة النفسية، أو الجسدية ، أو سلامة الآخرين للخطر. <span>.2</span></li>
                        <li>الالتزام باللوائح والأنظمة والسياسيات الصادرة عن إدارة المعهد.<span>.3</span></li>
                        <li> الحفاظ على الممتلكات بالمعهد وعدم العبث بها، أو استخدامها في غير المجال الذي خصصت له، أو إساءة استخدامها، وكذلك الإمتناع عن الكتابة على الجدران، أو الطاولات، وغيرها. <span>.4</span></li>
                        <li> احترام حريات وخصوصيات الآخرين، وعدم الإساءة إليهم، أو التشهير بهم. <span>.5</span></li>
                        <li> استثمار الحياة الجامعية في الاستزادة من العلم، والمعرفة، ويناء الذات. <span>.6</span></li>
                        <li>احترام سلطة المحاضر في القاعة الدراسية، وعدم الاعتداء على حرمة المحاضرات من خلال التشويش، أو الدخول دون إستئذان، أو الاعتراض على قرارات المدرس على نحو يقلل من هيبة المحاضر، ومكانته. <span>.7</span></li>
                        <li>المواظبة على قراءة، ومتابعة اللوائح، والقوانين، والإعلانات، والنشرات الصادرة من الإدارة، والابتعاد عن السلبية والاتكالية في الحصول على المعلومات المختلفة، والتحقق من صحة المعلومات من مصدرها الرسمي. <span>.8</span></li>
                    </ul>
                    
                </ul>
            <?php }elseif(isset($_GET['page']) && $_GET['page'] == "Irregularities"){ ?>
                <h3  id="edit" class="bg-success" >المخالفات و الجزاءات التأديبية</h3>
                <ul  class="list-unstyled" style="font-weight: bold;"> 
                    <ul style="margin-top: 10px;" ><h4 class="bg-primary"> :المخالفات التي يحال الطالب بسببها إلى مجلس التأديب</h4>
                        <li>الأعمال المخلة بنظام المعهد أو تعطيل الدراسة.</li>
                        <li>كل فعل أو قول مخل بالشرف والكرامة أو مخل بحسن السير والسلوك.</li>
                        <li>كل إتلاف للمنشآت والأجهزة أو المواد أو الكتب الجامعية.</li>
                        <li>كل إخلال بنظام الامتحان أو الهدوء الواجب له.</li>
                        <li>الاعتصام داخل مباني المعهد مخالفاً للنظام العام.</li>
                        <li>تعاطي المواد الممنوعة أو توزيعها داخل المعهد</li>
                        <li>تواجد الطلاب في الأماكن المخصصة للطالبات أو العكس.</li>
                        <li>عدم الإمتثال لتعليمات رجال الأمن أو مسئولي المعهد أثناء تأدية مهام عملهم الرسمي.</li>
                        <li>كل غش في امتحان أو الشروع فيه.</li>
                        <li>كل طالب يضبط متلبساً بالغش في الامتحان أو الشروع فيه يخرج من قاعة الامتحان ويحرم من دخول الامتحان في باقي المقررات ويعتبر الطالب راسباً في جميع مواد هذا الامتحان ويحال إلى مجلس التأديب.</li>
                        <li>أما في الأحوال الأخرى فيبطل الامتحان الخاص بالمقرر.</li>
                    </ul>
                    <ul style="margin-top: 10px;" ><h4 class="bg-primary"> : الإجراءات التأديبية:</h4><h3  class="text-secondary">يخضع الطلاب المقيدون بالمعهد للقانون رقم 52 لسنة 1970 ولائحته الصادرة بقرار وزير التعليم العالى رقم 1088 لسنة 1987</h3>
                       <p class="border" style="font-size: larger; font-weight: bold;">في حالة ارتكاب الطالب سلوكاً غير سوي، فإنه يتعرض للمساءلة القانونية، واتخاذ الاجراءات التأديبية المناسبة بحقه وقد تتراوح تلك الإجراءات بين وضع ملحوظة دائمة في ملف الطالب، ورسوبه في المادة، وفصله من المعهد، وذلك وفقاً للوائح المعمول بها في المعهد، ولا يعتبر عدم علمه مبرراً للتخلى عن هذه العقوبات.</p>
                    </ul>
                    <ul style="margin-top: 10px;" ><h4 class="bg-primary"> :العقوبات والجزاءات التأديبية التي توقع على الطلاب وفقاً للوائح المعمول بها في المعهد هي</h4>
                        <li>التنبيه شفاهة أو كتابة.</li>
                        <li>الإنذارويحفظ في ملف الطالب.</li>
                        <li>الحرمان من حضور دروس أحد المقررات أو أكثر لمدة لا تجاوز شهراً.</li>
                        <li>الفصل من المعهد لمدة لا تجاوز شهراً.</li>
                        <li>إلغاء امتحان الطالب في مقرر أو أكثر.</li>
                        <li>الفصل من المعهد لمدة عام دراسى أو أكثر.</li>
                        <li>الحرمان من تأدية الامتحان في جميع المواد لمدة سنة دراسية أو أكثر.</li>
                        <li>الفصل النهائي من المعهد، ويترتب عليه إلقاء قيد الطالب بالمعهد وحرمانه من التقدم للامتحان ويبلغ هذا القرار إلى المعاهد الأخرى.</li>
                        <h4  class="text-info">يعلن القرار الصادر بالعقوبة التأديبية داخل المعهد، ويبلغ القرار إلى ولي أمره وتحفظ القرارا الصادرة بالعقوبات التأديبية في ملف الطالب</h4>
                    </ul>
                    
                </ul>
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
                        <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=Admission_Requirements">شروط الالتحاق بالمعهد</a></li>
                        <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=system">نظام الدراسة بالمعهد</a></li>
                        <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=Student_rights">حقوق الطالب ومسؤولياته</a></li>
                        <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=Irregularities">المخالفات والجزاءات التأديبية</a></li>
                        <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=">تحميل نماذج شئون الطلاب</a></li>
                        <li><a href="Admission_Requirements.php?do=Admission_Requirements&page=">المصروفات الدراسية</a></li>
                    </ul>
            </div>
        </div>
    </div>

    <?php } ?>
    



<?php
	include $tbl ."footer.php"; 
	ob_end_flush();
		 
?>