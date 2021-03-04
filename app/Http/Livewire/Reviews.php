<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Review;


class Reviews extends Component
{

    public $content;
    public $reviews;
    public $bookId;
    public $rate;
    public $average;



    public function render()
    {

            $reviews =  $this->reviews =  Review::with('user', 'book')->where('book_id', '=', "$this->bookId")->orderBy('created_at', 'desc')->get();
            $average= $this->average = Review::with('user', 'book')->where('book_id', '=',"$this->bookId")->average('rating');


        return view('livewire.review', compact('reviews', 'average'));

    }

    public function submitComment(){


        $this->validate(['content'=>'required', 'rate'=>'required']);

         Review::create([

            'content'=> $this->content,
            'book_id'=> $this->bookId,
            'rating'=> $this->rate,
            'user_id'=> auth()->user()->id
        ]);
        $this->render();

        $this->reset(['content', 'rate']);



    }
}
