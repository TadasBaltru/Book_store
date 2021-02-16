<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => array('index', 'show') ]);

    }
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //    $categories = Category::all();

        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {

        $path = $request->file('cover')->store('covers', 'public');


        Book::create([
                'author'=>$request->author,
                'title'=>$request->title,
                'cover'=>$path,
                'description'=>$request->description,
                'status'=>$request->status,
                'category_id'=>$request->category_id,
                'price'=>$request->price,
                'discount'=>$request->discount

         ]);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
      //  dd($book);

        $reviews = Review::all()->where('book_id', '=', "$book->id");



        $categories = Category::all();
        return view('show', compact('book', 'categories', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();

        return view('books.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBookRequest $request, $id)
    {
        $book = Book::find($id);
        $path = $request->file('cover')->store('covers', 'public');



        $book->update([
            'author'=>$request->author,
            'title'=>$request->title,
            'cover'=>$path,
            'status'=>$request->status,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'discount'=>$request->discount


        ]);


        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');

    }

}