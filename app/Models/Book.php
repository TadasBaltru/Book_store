<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable =['title', 'cover','description','status', 'user_id', 'price', 'discount'];
    public $timestamps =false; //only want to used created_at column

    public function category(){

        return $this->belongsToMany(Category::class);
    }
    public function author(){

        return $this->belongsToMany(Author::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function isNew(){

        return $this->created > now()->subWeek();

    }
    public function avarageRating(){

            return round( $this->reviews()->average('stars'), 1 );
    }

    public function discountedPrice()
    {
        $priceAfterDiscount =$this->price  / ($this->discount / 100 + 1) ;
        return number_format($priceAfterDiscount, 2, '.', '');
    }



}
