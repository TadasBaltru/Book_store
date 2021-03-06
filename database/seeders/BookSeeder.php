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


            'title'=>'Testavimo pagrindas',
            'cover'=> 'covers/defaultImage.png',
            'status'=>'approved',

            'description'=>'test pagrindas',
            'user_id'=>'1',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([


            'title'=>'Testavimo pagrindas',
            'cover'=> 'covers/defaultImage.png',
            'status'=>'approved',

            'description'=>'test pagrindas',
            'user_id'=>'1',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([


            'title'=>'Testavimo pagrindas',
            'cover'=> 'covers/defaultImage.png',
            'status'=>'approved',

            'description'=>'test pagrindas',
            'user_id'=>'1',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([


            'title'=>'Testavimo pagrindas',
            'cover'=> 'covers/defaultImage.png',
            'status'=>'unapproved',

            'description'=>'test pagrindas',
            'user_id'=>'1',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([


            'title'=>'Testavimo pagrindas',
            'cover'=> 'covers/defaultImage.png',
            'status'=>'unapproved',

            'description'=>'test pagrindas',
            'user_id'=>'1',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([


            'title'=>'Testavimo pagrindas',
            'cover'=> 'covers/defaultImage.png',
            'status'=>'unapproved',

            'description'=>'test pagrindas',
            'user_id'=>'1',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([


            'title'=>'Testavimo pagrindas',
            'cover'=> 'covers/defaultImage.png',
            'status'=>'unapproved',

            'description'=>'test pagrindas',
            'user_id'=>'2',
            'price'=>'20',
            'discount'=>'0'

        ]);
        DB::table('books')->insert([


            'title'=>'Testavimo pagrindas',
            'cover'=> 'covers/defaultImage.png',
            'status'=>'unapproved',

            'user_id'=>'1',
            'description'=>'test pagrindas',
            'price'=>'20',
            'discount'=>'0'

        ]);
    }
}
