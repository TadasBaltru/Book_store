@extends('app')

@section('content')

    <div class="col-lg-9">

        <div class="card mt-4">
            <img class="card-img-top img-fluid" src="{{asset("storage/".$book->cover)}}" alt="cover">
            <div class="card-body">
                <h3 class="card-title">{{$book->title}}</h3>
                <p class="card-text">{{$book->author}}</p>
                <h4>$24.99</h4>
                <p class="card-text">{{$book->description}}</p>
                <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                4.0 stars
            </div>
        </div>
        <!-- /.card -->


            @auth
            <div class="well" style ="margin-top:80px; margin-bottom: 80px">
                <h4>Leave review:</h4>
                <form action="{{route('reviews.store')}}" method="post" role="form">
                    @csrf


                    <div class="form-group">
                        <label for="comment_content">Your review</label>
                        <textarea class="form-control" name="content" class="form-control" rows="3"></textarea>
                    </div>

                    <input type="text" hidden name="book_id" id="" value="{{$book->id}}">
                    <input type="text" hidden name="user_id" id="" value="{{Auth::user()->id}}">



                    <button type="submit" name="save" class="btn btn-primary">Submit</button>
                </form>
            </div>
            @endauth
        
            @guest

            <div class="well">

                <h4>If you want to comment press <a href="{{route('login')}}">here</a> to login</h4>
            </div>


            @endguest



        <div class="card card-outline-secondary my-4">
            <div class="card-header">
                Product Reviews
            </div>
            <div class="card-body">
                @foreach($reviews as $review)

                <p>{{$review->content}}</p>
                <small class="text-muted">Posted by {{$review->user->name}} on {{$review->created_at}}</small>
                <hr>

                @endforeach
            </div>
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col-lg-9 -->
@endsection
