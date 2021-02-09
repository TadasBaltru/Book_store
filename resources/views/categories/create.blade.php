@extends('app')

@section('content')

    <div class="col-lg-12">

        <h1 class="my-4">New category</h1>
        <form action="{{route('categories.store')}}" method="POST">


            @csrf
            Name:
            <br>
            <br>
            <input type="text" name="category_name" value="" class="form-control"/>

            <br>
            <br>

            <input type="submit" value="Save" class="btn btn-primary"/>

        </form>
        <br>



    </div>
    <!-- /.col-lg-3 -->

@endsection
