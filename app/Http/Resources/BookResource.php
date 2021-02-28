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




                return [
                    'id'=>$this->id,
                    'title'=>$this->title,
              //      'authors' => AuthorResource::collection($this->whenLoaded('author')),
             //       'categories' => CategoryResource::collection($this->whenLoaded('category')),
                    'categories' => $this->category->implode('category_name', ', '),
                     'authors'=> $this->author->implode('name', ', '),


                    'cover'=>  route('books.show', $this).'/'.$this->cover,
                    'description'=>$this->when($request->book, $this->description),
                    'price'=>$this->price
                ];

       // return parent::toArray($request);
    }
}
