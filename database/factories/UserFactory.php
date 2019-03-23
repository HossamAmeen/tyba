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
        'descriptionPoint' =>'
    وحدة اقامه فندقيه
    وحدات اشعه مجهزة
    معامل تحاليل على اعلى مستوى
    وحدة العنايه المركزه
    مركز رعاية الاطفال و حضانات الاطفال
    عيادات خارجيه فى جميع التخصصات
    العمليات والمناظير الجراحيه
    وحدة جراحات التجميل
    وحدة علاج السمنه
',
        'mainEmail'     =>'contact@example.com',
        'facebook'      =>'https://www.facebook.com/',
        'twitter'       =>'https://www.twitter.com/',
        'video' =>'https://www.youtube.com/watch?v=dMuZf4mcjSU',

    ];
});


$factory->define(App\Clinic::class , function (Faker $faker){

    return[
        'name'  =>'عيادة الاطفال',
        'description'  =>'' ,
        'descriptionPoint'  =>'descriptionPoint',
        'appointments'  =>'مواعيد العيادة: الخميس الاول من كل شهر من الساعة ١٠ص _ ٣ع ',
        "img" =>"resources/assets/admin/images/service2.jpg" ,
        'user_id' => 1 ,

    ];
});



$factory->define(App\Service::class , function (Faker $faker){

    return[
        'ar_title' => "قسم الاطفال والحضانات",
        'icon'  => "fa-baby",
        'user_id' => 1 ,

    ];
});
$factory->define(App\Event::class , function (Faker $faker){

    return[
        'name' => "events",
        'description'  => " تتشرف مستشفى طيبة باستضافة نخبة من افضل الاطباء فى مصر بشكل دورى لاجراء العمليات المتخصصة والاشراف على الحالات الان يمكنك معرفة تخصصات وموعد الزياراة من خلال الموقع ",
        'date' => 'يوم الخميس 02/03/2018',
        "img" => "resources/assets/admin/images/services-img2.jpg",
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