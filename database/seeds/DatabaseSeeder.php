<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User',1)->create();
        factory('App\Pref',1)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
