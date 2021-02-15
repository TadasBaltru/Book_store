@extends('app')

@section('content')





    <h1 style = "margin: 0 auto;">Book Shop</h1>




        <div class="col-lg-12">



            <div class="row" style ="margin: 100px 0px 100px 0px;">



                @foreach($books as $book)

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">

                        <a href="#"><img class="card-img-top"  src="{{ asset("storage/".$book->cover) }}" alt="cover">  </a>


                        <div class="card-body">
                            <h4 class="card-title">

                                <a href="{{route('show', $book->id)}}">{{$book->title}}</a>
                            </h4>
                            <h5>$ {{$book->price}}</h5>
                            <p class="card-text">{{$book->author}}</p>


                        <p class="card-text"> Category: <a href="#">{{$book->category->category_name }}</a> </p>
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
