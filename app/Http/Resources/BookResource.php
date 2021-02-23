<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {


  //    dd($this->author());

                return [
                    'id'=>$this->id,
                    'title'=>$this->title,
                    'authors' => AuthorResource::collection($this->whenLoaded('author')),
                    'categories' => CategoryResource::collection($this->whenLoaded('category')),


                    'cover'=>$this->cover,
                    'description'=>$this->description,
                    'price'=>$this->price
                ];

       // return parent::toArray($request);
    }
}
