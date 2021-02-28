<?php

namespace App\Http\Livewire;

use Livewire\Component;
//use App\Models\User;
use App\Models\Review;
use App\Models\Book;

class Reviews extends Component
{

    public $content;
    public $reviews;
    public $bookId;




    public function mount($bookId)
    {
        $this->reviews =  Review::where('book_id', '=', "$bookId")->orderBy('created_at', 'desc')->get();
    }


    public function render()
    {

            $reviews = $this->mount($this->bookId);


        return view('livewire.review', compact('reviews'));

    }

    public function submitComment(){


        $this->validate(['content'=>'required']);

         Review::create([

            'content'=> $this->content,
            'book_id'=> $this->bookId,
            'user_id'=> auth()->user()->id
        ]);
        $this->reviews =  Review::where('book_id', '=', "$this->bookId")->orderBy('created_at', 'desc')->get();



    }
}
