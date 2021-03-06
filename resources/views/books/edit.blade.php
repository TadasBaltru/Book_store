@extends('app')

@section('content')


    <div class="col-lg-12">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="my-4">Edit Book</h1>
        <H2 class="my-3 bg-danger">All authors and categories must be sepparated by commas </H2>


        <form action="{{route('books.update', $book->id)}}" method="POST" enctype="multipart/form-data">
            @method('Put')

            @csrf

            Authors:
            <br>
            <br>
            <p class="form control"></p>
            <br>
            <input type="text" name="author" value="{{$book->bookAuthors()}}" class="form-control"/>

            <br>
            <br>
            Title:
            <br>
            <br>
            <input type="text" name="title" value="{{$book->title}}" class="form-control"/>

            <br>
            <br>
            Description:
            <br>
            <br>

            <textarea name="description" cols="30" rows="10" class="form-control">{{$book->description}} </textarea>

            <br>
            <br>
            status:
            <br>
            <br>
            <select name="status" class="form-control">

                @if(Auth::user()->role != 'admin')
                <option value="Waiting for approval">Waiting for approval</option>
                @else
                @if($book->status === 'Approved')
                <option value="approved">Approved</option>
                <option value="disapproved">Disapproved</option>
                    @elseif($book->status === 'Rejected')
                    <option value="disapproved">Disapproved</option>
                    <option value="approved">Approved</option>
                    @else
                        <option value="disapproved">Disapproved</option>
                        <option value="approved">Approved</option>
                        <option value="Waiting for approval">Waiting for approval</option>

                @endif
                    @endif

            </select>

            <br>
            <br>
            {{--            Cover:--}}
            {{--            <br>--}}
            {{--            <br>--}}
            {{--            <input type="file" name="cover" value="" class="form-control"/>--}}

            <br>
            <br>
            Categories:

            <input type="text" name="category" value="{{$book->bookCategories()}}" class="form-control"/>

            <br>
            <br>
            Cover:
            <br>
            <br>
            <input type="file" name="cover" value="{{asset("storage/".$book->cover) }}" class="form-control-file">
            <img src="{{asset("storage/".$book->cover) }}" alt="book cover">



            <br>
            <br>
            Price:
            <br>
            <br>
            <input type="number" name="price" value="{{$book->price}}" class="form-control"/>

            <br>
            <br>
            Discount:
            <br>
            <br>
            <input type="number" name="discount" value="{{$book->discount}}" class="form-control"/>

            <br>
            <br>

            <input type="submit" value="Save" class="btn btn-primary"/>

        </form>
        <br>



    </div>
    <!-- /.col-lg-3 -->

@endsection
