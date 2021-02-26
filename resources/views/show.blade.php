@extends('app')

@section('content')

    <div class="col-lg-9">



        <div class="card mt-4">
            <img class="card-img-top img-fluid" src="{{asset("storage/".$book->cover)}}" alt="cover">
            <div class="card-body">
                <h3 class="card-title">{{$book->title}}</h3>
                <p class="card-text"> @foreach($book->author as $writer)

                        {{$writer->name ." "}}

                    @endforeach</p>
                <h4>$24.99</h4>
                <p class="card-text">{{$book->description}}</p>

        </div>
        <!-- /.card -->

            @guest
                <p>Press <a href="{{route('login')}}">here</a> to login if you want to rate or comment</p>

            @endguest



            @auth
                <a href="{{route('books.report', $book)}}">Press here to report</a>
                @livewire('ratings', ['bookId'=> $book->id])


              @endauth
            @livewire('reviews', ['bookId'=> $book->id])




    </div>
    <!-- /.col-lg-9 -->
@endsection
