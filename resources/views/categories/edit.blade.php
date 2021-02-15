@extends('app')

@section('content')

    <div class="col-lg-12">

        <h1 class="my-4">Category edit</h1>
        <form action="{{route('categories.update', $category->id)}}" method="POST">
            @method('Put')

            @csrf
            Name:
            <br>
            <br>
            <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control"/>

            <br>
            <br>

            <input type="submit" value="Update" class="btn btn-primary"/>

        </form>
        <br>



    </div>
    <!-- /.col-lg-3 -->

@endsection
