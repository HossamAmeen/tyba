<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User',1)->create();
        factory('App\Pref',1)->create();
        factory('App\Clinic',8)->create();
        factory('App\Service',8)->create();
        factory('App\VisitCategory',5)->create();
        factory('App\Event',20)->create();
        factory('App\Doctor',8)->create();
        factory('App\Video',8)->create();
        factory('App\News',20)->create();
        
        
       
    }
}
