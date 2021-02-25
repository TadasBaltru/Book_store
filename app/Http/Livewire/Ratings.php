<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rating;

class Ratings extends Component
{
    public $rating;
    public $rate;
    public $bookId;
    public function mount($bookId)
    {
        $this->rating =  Rating::where('book_id', '=', "$bookId")->get();
    }

    public function render()
    {
        $rating = $this->mount($this->bookId);
        return view('livewire.rating', compact('rating'));
    }

    public function submitRating(){


        $ratingg = Rating::where('user_id', auth()->user()->id)->where('book_id', "$this->bookId")->first();
      //  dd($ratingg);
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



        $this->rating =  Rating::where('book_id', '=', "$this->bookId")->get();



    }
}
