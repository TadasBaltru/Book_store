<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([

            'name'=>'Balys Sruoga'
        ]);
        DB::table('authors')->insert([

            'name'=>'Janina Zemaite'
        ]);
        DB::table('authors')->insert([

            'name'=>'Chakas Norisas'
        ]);
        DB::table('authors')->insert([

            'name'=>'Janina Kraujutaitiene'
        ]);

    }
}
