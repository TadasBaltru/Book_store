<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Author_bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author_book')->insert([

            'book_id'=>'1',
            'author_id'=>'1'
        ]);
        DB::table('author_book')->insert([

            'book_id'=>'1',
            'author_id'=>'2'
        ]);
        DB::table('author_book')->insert([

            'book_id'=>'2',
            'author_id'=>'1'
        ]);
        DB::table('author_book')->insert([

            'book_id'=>'2',
            'author_id'=>'2'
        ]);
        DB::table('author_book')->insert([

            'book_id'=>'1',
            'author_id'=>'3'
        ]);

    }
}
