@extends('app')

@section('content')





    <h1 style = "margin: 0 auto;">Book Shop</h1>








            <div class="row row-cols-lg-5 row-cols-md-3" style ="margin: 100px 0px 100px 0px;">



                @foreach($books as $book)




                <div class="col mb-4">
                    <div class="card h-100">

                        <a href="#"><img class="card-img-top"   src="{{ asset("storage/".$book->cover) }}" alt="cover">  </a>


                        <div class="card-body">
                            <h4 class="card-title">

                                <a href="{{route('show', $book->id)}}">{{$book->title}}</a>
                            </h4>
                            <h5> Normal price $ {{$book->price}}
                                @if($book->discount > 0)
                                    <span>Current price  $ {{$book->discountedPrice()}}</span>
                                @endif

                            </h5>


                            @if($book->isNew())
                                <h6>[New]
                                    @if($book->discount > 0)
                                  <span>  -{{$book->discount}}%</span>
                                        @endif
                                </h6>
                            @endif

                            <p class="card-text"><strong>Authors:</strong>
                                    {{$book->bookAuthors()}}
                            </p>



                            <p class="card-text"> <strong>Categories:</strong>
                                {{$book->bookCategories()}}
                           </p>

                        </div>
                        <div class="card-footer">

{{--                            {{dd($rating->where('book_id', '=',"$book->id")->average('rating'))}}--}}
{{--                            @if($review->where('book_id', '=',"$book->id")->average('rating') >  0.00)--}}
{{--                            <small class="text-muted">Average rating: {{number_format($revire->where('book_id', '=',"$book->id")->average('rating'), 2)}}</small>--}}

{{--                            @else--}}
{{--                                <small class="text-muted">This book havent been rated</small>--}}

{{--                                @endif--}}


                        </div>
                    </div>
                </div>
                @endforeach


                </div>



    <div class="container d-flex justify-content-center">
        {!! $books->links() !!}
    </div>

            <!-- /.row -->






@endsection
