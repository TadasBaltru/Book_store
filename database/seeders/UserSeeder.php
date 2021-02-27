<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password' => bcrypt('password'),
            'role'=>'admin',
            'date'=>'2021-03-03'

        ]);
        DB::table('users')->insert([

            'name'=>'user',
            'email'=>'user@user.com',
            'password' => bcrypt('password'),
            'role'=>'user',
            'date'=>'2021-03-03'

        ]);


    }
}
