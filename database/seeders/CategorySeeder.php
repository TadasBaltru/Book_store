<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([

            'category_name'=>'Action'
        ]);
        DB::table('categories')->insert([

            'category_name'=>'Horror'
        ]);
        DB::table('categories')->insert([

            'category_name'=>'Scifi'
        ]);
        DB::table('categories')->insert([

            'category_name'=>'Adventure'
        ]);
    }
}
