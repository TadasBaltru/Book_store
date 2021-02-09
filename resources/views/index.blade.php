@extends('app')

@section('content')

        <div class="col-lg-3">

            <h1 class="my-4">Shop Name</h1>
            <div class="list-group">
                @foreach($categories as $category)
                <a href="/?category_id={{$category->id}}" class="list-group-item">{{$category->category_name}}</a>

                @endforeach
{{--                <a href="#" class="list-group-item">Category 2</a>--}}
{{--                <a href="#" class="list-group-item">Category 3</a>--}}
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">



            <div class="row" style ="margin: 100px 0px 100px 0px;">



                @foreach($books as $book)

                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{$book->title}}</a>
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
        <!-- /.col-lg-9 -->

@endsection
