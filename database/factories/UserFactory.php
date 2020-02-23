<?php

use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
     	 	 	 	 
    return [
        'name' => 'admin',
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$mXwEFI/nQub9PmCejn59zuozRujElm4bu5D01y.wXpciRnKjHRWNm', // secret
        'remember_token' => str_random(10),
        'role' => 1 ,
    ];
});


$factory->define(App\Pref::class , function (Faker $faker){

    return[
        'arAddress'     =>'اسيوط - مركز اسيوط شارع الصحه',
        'arDescription' =>'لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج ',
        'phone'         =>'01079979798',
        'description' =>'
        يُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال
         المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. 
',
'about_us' =>'
يُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال
 المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من
  الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. 
',
        'mainEmail'     =>'contact@example.com',
        'facebook'      =>'https://www.facebook.com/',
        'twitter'       =>'https://www.twitter.com/',
        'youtube' => "https://www.youtube.com/",
        'serviceDescription'=>'<p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل 
                                ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او 
                                فلاير على سبيل المثال ... او نماذج <br></p><ul class="list"><li><span> وحدة اقامه فندقيه </span></li>
                                <li><span> وحدات اشعه مجهزة </span></li><li><span>معامل تحاليل على اعلى مستوى </span></li>
                                <li><span> وحدة العنايه المركزه </span></li><li><span> مركز رعاية الاطفال و حضانات الاطفال </span></li>
                                <li><span> عيادات خارجيه فى جميع التخصصات </span></li><li><span> العمليات والمناظير الجراحيه </span></li>
                                <li><span> وحدة جراحات التجميل </span> </li>
                                                    <li><span> وحدة علاج السمنه </span> </li></ul>' ,
        'video' =>'https://www.youtube.com/watch?v=dMuZf4mcjSU',

    ];
});


$factory->define(App\Clinic::class , function (Faker $faker){

    return[
        'name'  =>'عيادة الاطفال',
        'doctor'  =>'أ/احمد حسين',
        'postion'  =>'استاذ الروماتيزم وأمراض المناعة' ,
        'descriptionPoint'  =>' الروماتويد المفصلي
        أمراض المناعه الذاتيه ومتلازمه بهجت
        مرض تيبس الجلد المناعي
        روماتيزم العضلات والاعصاب
        التيبس الفقاري الالتهاب الصدفي المفصلي.
        روماتيزم والتهاب مفاصل الاطفال
        علاج خشونه الركبه والعمود الفقري باحدث الطرق
        الحقن الموضعي بالبلازما الغنيه بالصفائح
        حقن السائل الزلالي والجيلاتيني',
        'appointments'  =>'مواعيد العيادة: الخميس الاول من كل شهر من الساعة ١٠ص _ ٣ع ',
        "img" =>"resources/assets/admin/images/service2.jpg" ,
        'user_id' => 1 ,

    ];
});



$factory->define(App\Service::class , function (Faker $faker){

    return[
        'ar_title' => "قسم الاطفال والحضانات",
       'icon'  => "fa-baby",
      'description'=>"مستشفى طيبة رويال بسوهاج هى أحدى الموسسات الرائدة في المجال
       الطبي والصحي تأسست مستشفى طيبة رويال بسوهاج هى أحدى الموسسات الرائدة في المجال الطبي والصحي تأسست على يد نخبة كبيرة من الأساتذة و المتخصصين لتكون صرحا رائدا ومتميزا فى سوهاج خاصة في صعيد مصر عامة",
        'user_id' => 1 ,

    ];
});
$factory->define(App\Event::class , function (Faker $faker){

    return[ 

        
        
        'name' => "events",
        'description'  => " تتشرف مستشفى طيبة باستضافة نخبة من افضل الاطباء فى مصر بشكل دورى لاجراء العمليات المتخصصة والاشراف على الحالات الان يمكنك معرفة تخصصات وموعد الزياراة من خلال الموقع ",
       
        "img" => "resources/assets/admin/images/visits.png",
        'appointments'  => 'يوم الخميس 27 / 9 / 2018' ,
        'clinic_id' => rand(1,5),
        'user_id' => 1 ,
     
    ];
});
$factory->define(App\Doctor::class , function (Faker $faker){

    return[
        'name' => "د. محمود كمال",
        'job'  => "رئيس مجلس الاداره",
        "img" => "resources/assets/admin/images/doctor.png",
        'user_id' => 1 ,

    ];
});
$factory->define(App\News::class, function (Faker $faker) {

    return [
        'title' => "عنوان الخبر",
        'en_title' => $faker->name,
        'description' => " بدء حملة حملة الرواد من أجل صحة أفضل اعلنت مستشفى الرواد التخصصى عن بدء حملة حملة الرواد اعلنت مستشفى الرواد التخصصى عن بدء حملة حملة الرواد اعلنت مستشفى الرواد التخصصى عن بدء حملة حملة الرواد من أجل صحة أفضل بهدف رفع الوعى الطبى وتقديم ايسر طرق العلاج للمرضى فى التخصصات التالية : - المخ و الأعصاب - أمراض القلب - أمراض الجهاز الهضمي - أمراض الكلي - أمراض المسالك البولية - الجراحة العامة - جراحة العظام - الأورام تابعونا عبر صفحة مستشفي الرواد عب مواقع التواصل الاجتماعى للحصول على معلومات قيمة ورفع الوعى الطبى فى الامراض والاقسام سالفة الذكر مع توفير خدمات الرعاية الصحية الشاملة من خلال المستشفى وتقديم الاستشارات المطلوبة لكل حالة عند الحاجة",
        'vision_mission' => $faker->text ,
       'is_slider'=> rand(0,1),
        'user_id' =>1 ,
    ];
});

$factory->define(App\Video::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        "is_master"=> rand(0,1),
        'user_id' =>1 ,
    ];
});
