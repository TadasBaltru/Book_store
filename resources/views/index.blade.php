@extends('app')

@section('content')





    <h1 style = "margin: 0 auto;">Book Shop</h1>




        <div class="col-lg-12">



            <div class="row" style ="margin: 100px 0px 100px 0px;">



                @foreach($books as $book)

                <div class="col-lg-3 col-md-6 mb-4">
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

                            <p class="card-text">Authors:
                                @foreach($book->author as $writer)

                                    <a>{{$writer->name}} </a>

                                @endforeach

                            </p>



                        <p class="card-text"> Category:
                            @foreach($book->category as $categor)

                            <a href="#">{{$categor->category_name}}</a>
                            @endforeach
                        </p>

                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>
                @endforeach


                </div>



            </div>
            <!-- /.row -->




    </div>
    </div>

    <div class="d-flex justify-content-center">
        {!! $books->links() !!}
    </div>
@endsection
