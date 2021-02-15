@extends('app')

@section('content')

    <div class="col-lg-12">

        <h1 class="my-4">New book</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">


            @csrf
            Author:
            <br>
            <br>
            <input type="text" name="author" value="" class="form-control"/>

            <br>
            <br>
            Title:
            <br>
            <br>
            <input type="text" name="title" value="" class="form-control"/>

            <br>

            <br>
            Description:
            <br>
            <br>

            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>

            <br>
            <br>
            status:
            <br>
            <br>
            <select name="status" class="form-control">
                <option value="approved">Approved</option>
                <option value="disapproved">Disapproved</option>

            </select>

            <br>
            <br>
            Cover:
            <br>
            <br>
            <input type="file" name="cover"  class="form-control"/>

            <br>
            <br>
            Categories:
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach

            </select>
            <br>
            <br>


            <br>
            <br>
            Price:
            <br>
            <br>
            <input type="text" name="price" value="" class="form-control"/>

            <br>
            <br>
            Discount:
            <br>
            <br>
            <input type="text" name="discount" value="0" class="form-control"/>

            <br>
            <br>

            <input type="submit" value="Save" class="btn btn-primary"/>

        </form>
        <br>



    </div>
    <!-- /.col-lg-3 -->

@endsection
