<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable =['author', 'title', 'cover','description','status', 'user_id', 'price', 'discount'];
    public $timestamps =false; //only want to used created_at column

    public function category(){

        return $this->belongsToMany(Category::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }

}
