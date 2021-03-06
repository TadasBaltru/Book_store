@extends('app')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="col-lg-12" style="text-align: center!important;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <h1 class="my-4">Books</h1>
        <a href="{{route('books.create')}}" class="btn btn-info">New Book</a>
        <br><br>

        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Created</th>
                <th>Author</th>
                <th>Title</th>
                <th>Status</th>
                <th>Cover</th>
                <th>Categories</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>

            </thead>

            @foreach($books as $book)

             <tr>

                 <th>{{$loop->index+1}}</th>
                 <th>{{$book->created}}</th>
                 <th>
                    {{$book->bookAuthors()}}

                 </th>
                 <th>{{$book->title}}</th>
                 <th>{{$book->status}}</th>
                 <th><img src="{{ asset("storage/".$book->cover) }}" style="width:200px; height:150px" alt="cover"></th>
{{--                      src="{{ asset("storage/".$book->cover) }}" alt="cover">  </a>--}}

                 <th>
                     {{$book->bookCategories()}}
                 </th>
                 <th>{{$book->price}}</th>
                 <th>{{$book->discount}}</th>



                 <th>
                     <form action="{{route('books.destroy', $book->id) }}" method="POST">
                         @method('DELETE')
                         @csrf
                         <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">

                     </form>

                 </th>
                 <th> <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary">Edit</a></th>



             </tr>

            @endforeach

            <tbody>



            </tbody>
        </table>

            <div class="d-flex justify-content-center">
                {!! $books->links() !!}
            </div>

    </div>


@endsection
