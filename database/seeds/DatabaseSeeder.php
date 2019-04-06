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
        \App\User::create([
            'login'=>'manager',
            'password' =>bcrypt('123456'),
            'role'=>'manager'
        ]);
        \App\User::create([
            'login'=>'Grimur',
            'password' =>bcrypt('123456'),
        ]);
    }
}
