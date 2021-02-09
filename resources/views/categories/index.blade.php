@extends('app')

@section('content')

    <div class="col-lg-12">

        <h1 class="my-4">Services</h1>
        <a href="{{route('categories.create')}}" class="btn btn-info">New Category</a>
        <br><br>

        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Category Title</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>



            @foreach($categories as $category)

             <tr>

                 <th>{{$loop->index+1}}</th>
                 <th>{{$category->category_name}}</th>

                 <th>
                     <form action="{{route('categories.destroy', $category->id) }}" method="POST">
                         @method('DELETE')
                         @csrf
                         <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">

                     </form>

                 </th>
                 <th> <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary">Edit</a></th>



             </tr>

            @endforeach
            </thead>
            <tbody>



            </tbody>
        </table>

    </div>
    <!-- /.col-lg-3 -->

@endsection
