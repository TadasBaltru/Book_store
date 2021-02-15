<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([

            'author'=>'Tadas Baltrusaitis',
            'title'=>'Testavimo pagrindas',
            'cover'=> '',
            'status'=>'approved',
            'category_id'=>'2',
            'description'=>'test pagrindas',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([

            'author'=>'Tadas Baltrusaitis',
            'title'=>'Testavimo pagrindas',
            'cover'=> '',
            'status'=>'approved',
            'category_id'=>'2',
            'description'=>'test pagrindas',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([

            'author'=>'Tadas Baltrusaitis',
            'title'=>'Testavimo pagrindas',
            'cover'=> '',
            'status'=>'approved',
            'category_id'=>'2',
            'description'=>'test pagrindas',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([

            'author'=>'Tadas Baltrusaitis',
            'title'=>'Testavimo pagrindas',
            'cover'=> '',
            'status'=>'unapproved',
            'category_id'=>'2',
            'description'=>'test pagrindas',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([

            'author'=>'Tadas Baltrusaitis',
            'title'=>'Testavimo pagrindas',
            'cover'=> '',
            'status'=>'unapproved',
            'category_id'=>'2',
            'description'=>'test pagrindas',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([

            'author'=>'Tadas Baltrusaitis',
            'title'=>'Testavimo pagrindas',
            'cover'=> '',
            'status'=>'unapproved',
            'category_id'=>'2',
            'description'=>'test pagrindas',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([

            'author'=>'Tadas Baltrusaitis',
            'title'=>'Testavimo pagrindas',
            'cover'=> '',
            'status'=>'unapproved',
            'category_id'=>'2',
            'description'=>'test pagrindas',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([

            'author'=>'Tadas Baltrusaitis',
            'title'=>'Testavimo pagrindas',
            'cover'=> '',
            'status'=>'unapproved',
            'category_id'=>'2',
            'description'=>'test pagrindas',
            'price'=>'20',
            'discount'=>'0'

        ]);
    }
}
