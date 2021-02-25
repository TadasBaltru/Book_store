<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Book_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_category')->insert([

            'book_id'=>'1',
            'category_id'=>'1'
        ]);
        DB::table('book_category')->insert([

            'book_id'=>'1',
            'category_id'=>'2'
        ]);
        DB::table('book_category')->insert([

            'book_id'=>'2',
            'category_id'=>'1'
        ]);
        DB::table('book_category')->insert([

            'book_id'=>'2',
            'category_id'=>'2'
        ]);
        DB::table('book_category')->insert([

            'book_id'=>'1',
            'category_id'=>'3'
        ]);
    }
}
