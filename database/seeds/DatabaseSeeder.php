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
        factory('App\Clinic',2)->create();
        factory('App\Service',2)->create();
        factory('App\Event',2)->create();
        factory('App\Doctor',2)->create();
       
        
        
       
    }
}
