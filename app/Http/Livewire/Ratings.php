<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rating;

class Ratings extends Component
{
    public $rating;
    public $rate;
    public $bookId;
    public $average;
    public function mount($bookId)
    {
        $this->rating =  Rating::where('book_id', '=', "$bookId")->where('user_id', '=', auth()->user()->id)->get();

    }

    public function render()
    {
        $rating = $this->mount($this->bookId);
        $average= $this->average = Rating::where('book_id', '=',"$this->bookId")->average('rating');

        return view('livewire.rating', compact('rating', 'average'));
    }

    public function submitRating(){


        $this->validate(['rate'=>'required']);


        $ratingg = Rating::where('user_id', auth()->user()->id)->where('book_id', "$this->bookId")->first();

        if($ratingg !== null)
        {
          $ratingg->update(['rating'=> $this->rate]);
        }
        else{

            Rating::create([

                'rating'=> $this->rate,
                'book_id'=> $this->bookId,
                'user_id'=> auth()->user()->id
            ]);
        }



        $this->rating =  Rating::where('book_id', '=', "$this->bookId")->where('user_id', '=', auth()->user()->id)->get();
        $this->average = Rating::where('book_id', '=',"$this->bookId")->average('rating');



    }
}
