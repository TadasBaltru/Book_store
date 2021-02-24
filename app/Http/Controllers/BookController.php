<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Mail\ReportMail;
use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use App\Models\Author;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

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
    public function index(User $user)
    {
        $books = Book::with('author', 'category')->get()->sortBy('status');
        $user = auth()->user();

        if(auth()->user()->role != 'admin')
        {
            $books= Book::with('author', 'category')->where('user_id', '=', "$user->id")->get()->sortBy('status');
        }




        return view('books.index', compact('books', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {


        //    $path = $request->file('cover')->store('covers', 'public');
        if($request->hasFile('cover'))
        {
            $file = $request->file('cover')->store('covers', 'public');
            $resizedImage = Image::make( public_path('storage/' . $file))
                ->fit(400,400)->save();


        }else{
            $file = 'covers/defaultImage.jpg';
        }


     $book=   Book::create([
                'title'=>$request->title,
                'cover'=>$file,
                'description'=>$request->description,
                'status'=>$request->status,

                'user_id'=>auth()->user()->id,
                'price'=>$request->price,
                'discount'=>$request->discount

         ]);

        $categories = explode(',', $request->category);
        foreach($categories as $category)
        {
            $categoryCheck = Category::where('category_name', $category)->firstOrCreate(['category_name' => $category]);

            $categoryCheck->books()->attach($book);
        }
        $authors = explode(',', $request->author);
        foreach($authors as $author)
        {
            $authorCheck = Author::where('name', $author)->firstOrCreate(['name' => $author]);

            $authorCheck->books()->attach($book);
        }




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
        if(isset(auth()->user()->id)){
            $user = auth()->user()->id;
            $rating = Rating::all()->where('user_id', '=' ,"$user")->where('book_id', '=', "$book->id");
       //     dd($rating);
            $reviews = Review::all()->where('book_id', '=', ".$book->id.");
            $categories = Category::all();
            return view('show', compact('book', 'categories', 'reviews', 'rating'));



        }
        else{
            $reviews = Review::all()->where('book_id', '=', "$book->id");
            $categories = Category::all();
            return view('show', compact('book', 'categories', 'reviews'));
        }

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
    //    $path = $request->file('cover')->store('covers', 'public');
        if($request->hasFile('cover'))
        {
            if(File::exists( public_path('storage/'.$book->cover)) )
            {
                File::delete(public_path('storage/'.$book->cover));
            }
            $file = $request->file('cover')->store('covers', 'public');
            $resizedImage = Image::make( public_path('storage/' . $file))
                ->fit(400,400)->save();


        }else{
            $file = $book->id;
        }
    $book->Update([
        'title'=>$request->title,
        'cover'=> $file,
        'description'=>$request->description,
        'status'=>$request->status,

        'user_id'=>auth()->user()->id,
        'price'=>$request->price,
        'discount'=>$request->discount

    ]);





        $categories = explode(',', $request->category);
        $authors = explode(',', $request->author);

        $book->author()->detach();
        $book->category()->detach();

        foreach($categories as $category)
        {
            $categoryCheck = Category::where('category_name', $category)->firstOrCreate(['category_name' => $category]);

            $categoryCheck->books()->attach($book);
        }

        foreach($authors as $author)
        {
            $authorCheck = Author::where('name', $author)->firstOrCreate(['name' => $author]);

            $authorCheck->books()->attach($book);

        }


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
   //     dd($book->author()->count());
//        if($book->author()->count() || $book->category()->count() || $book->author()->count() && $book->category()->count() )
//        {
//            return back()->withErrors(['error'=>'Cannot delete, book has author or category records']);
//        }
        $book->author()->detach();
        $book->category()->detach();

        if($book->cover != 'storage/covers/default.png'){
            if(File::exists( public_path('storage/'.$book->cover)) )
            {
                File::delete(public_path('storage/' .$book->cover));
            }
        }


        $book->delete();
        return redirect()->route('books.index')->with('message', 'Success');

    }
    public function report(Request $request, Book $book)
    {




        $details = [
            'title' => $book->title,
            'user_name' => auth()->user()->name,
            'user_email' => auth()->user()->email,
            'complaint' => $request->input('complaint')

        ];

        Mail::to('tadasbaltru@gmail.com')->send(new ReportMail($details));


        return redirect()->route('show', compact('book'))
            ->with('status', 'Book reported!');

    }

}
