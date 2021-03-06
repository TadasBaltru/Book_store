<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;




class HomeController extends Controller
{

    public function index(){

        $categories=Category::all();
        $authors=Author::all();
        $search = request()->query('search');
        $review = Review::all();



        $books = Book::with('author')->where('status', 'approved')
            ->when(
                request('search'), function($query)
            {
                $search = request('search');

                $query->where( function($query) use ($search)
                {
                    $query->where('title','LIKE','%'.$search.'%');
                    $query->orWhereHas('author' ,function($query) use ($search)
                    {
                        $query->where('name', 'LIKE','%'.$search.'%');
                    });
                })->paginate(25);
            })

    ->paginate(25);

        return view('index', compact('categories', 'books', 'authors', 'review'));

    }


}
