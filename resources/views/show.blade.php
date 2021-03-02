@extends('app')

@section('content')


    <div class="container">

        @if(Session::has('message'))

            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        @if ($errors->any())
            <div class="col-lg-12">

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        @endif




        <div class="card mt-4">
            <img class="card-img-top img-fluid" src="{{asset("storage/".$book->cover)}}" alt="cover">
            <div class="card-body">
                <h3 class="card-title">{{$book->title}}</h3>
                <p class="card-text">{{$book->bookAuthors()}}</p>
                <h4>$24.99</h4>
                <p class="card-text">{{$book->description}}</p>

        </div>
        <!-- /.card -->

            @guest
                <p>Press <a href="{{route('login')}}">here</a> to login if you want to rate or comment</p>

            @endguest



            @auth
                <button style="width:10%" type="button" class="btn btn-primary" data-toggle="modal" data-target="#reportModal">
                    Report this book
                </button>

                <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Report book form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                <div class="modal-body">

                    <form action="{{route('report', $book)}}">

                        <div class="form-group">

                            <label for="complain">Type here your complain</label>
                            <textarea name="complain" cols="15" rows="10" class="form-control"></textarea>
                        </div>



                        <br>
                        <br>


                        <button type="submit" name="Submit" class="btn btn-primary">Report</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>

                </div>
                </div>
                    </div>
                </div>


                @livewire('ratings', ['bookId'=> $book->id])


              @endauth
            @livewire('reviews', ['bookId'=> $book->id])



        </div>


    <!-- /.col-lg-9 -->
@endsection
