@extends('app')

@section('content')

    <div class="col-lg-12">



        <h1 class="my-4">Edit Book</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('books.update', $book->id)}}" method="POST" enctype="multipart/form-data">
            @method('Put')

            @csrf

            Author:
            <br>
            <br>
            <input type="text" name="author" value="{{$book->author}}" class="form-control"/>

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

            <textarea name="description" value="{{$book->description}}" id="" cols="30" rows="10" class="form-control"></textarea>

            <br>
            <br>
            status:
            <br>
            <br>
            <select name="status" class="form-control">
                @if($book->status === 'Approved')
                <option value="approved">Approved</option>
                <option value="disapproved">Disapproved</option>
                @else
                    <option value="disapproved">Disapproved</option>
                    <option value="approved">Approved</option>
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

                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @if ($category->id == $book->category_id) selected @endif>{{$category->category_name}}</option>
                    @endforeach
            </select>
            <br>
            <br>
            Cover:
            <br>
            <br>
            <input type="file" name="cover" {{asset("storage/".$book->cover) }}>



            <br>
            <br>
            Price:
            <br>
            <br>
            <input type="text" name="price" value="{{$book->price}}" class="form-control"/>

            <br>
            <br>
            Discount:
            <br>
            <br>
            <input type="text" name="discount" value="{{$book->discount}}" class="form-control"/>

            <br>
            <br>

            <input type="submit" value="Save" class="btn btn-primary"/>

        </form>
        <br>



    </div>
    <!-- /.col-lg-3 -->

@endsection
