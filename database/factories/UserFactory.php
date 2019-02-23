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
        'arAddress'     =>'arAddress',
        'arDescription' =>'arDescription',
        'phone'         =>'01079979798',
        'descriptionPoint' =>'descriptionPoint',
        'mainEmail'     =>'contact@alkayantrading.com',
        'facebook'      =>'https://www.facebook.com/',
        'twitter'       =>'https://www.twitter.com/',
        'video' =>'https://www.youtube.com/watch?v=dMuZf4mcjSU',

    ];
});


$factory->define(App\Clinic::class , function (Faker $faker){

    return[
        'name'  =>'arAddress',
        'description'  =>'description' ,
        'descriptionPoint'  =>'descriptionPoint',
        'appointments'  =>'appointments',
        'user_id' => 1 ,

    ];
});



$factory->define(App\Service::class , function (Faker $faker){

    return[
        'ar_title' => "title2",
        'icon'  => "fas fa-user-md fa-5x",
        'user_id' => 1 ,

    ];
});
$factory->define(App\Event::class , function (Faker $faker){

    return[
        'name' => "events",
        'description'  => "description",
        'date' => 'يوم الخميس 02/03/2018',
        'user_id' => 1 ,
     
    ];
});
$factory->define(App\Doctor::class , function (Faker $faker){

    return[
        'name' => $faker->name,
        'job'  => "رئيس مجلس الاداره",
        'user_id' => 1 ,

    ];
});