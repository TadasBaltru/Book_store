<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;




class HomeController extends Controller
{

    public function index(){

        $categories=Category::all();
        $search = request()->query('search');
        $books = Book::with('category')->where('status', 'approved');
        if ($search) {
            $books = $books->where('title', 'like', "%{$search}%")->orwhere('author', 'like', "%{$search}%");
        }
        $books = $books->paginate(20);

        return view('index', compact('categories', 'books'));

    }


}
