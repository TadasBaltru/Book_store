@extends('app')

@section('content')

    <div class="col-lg-12">



        <h1 class="my-4">Change password or email</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('profiles.update', $user->id)}}" method="POST" enctype="multipart/form-data">
            @method('Put')

            @csrf


            <input  type="text" name="name" value="{{$user->name}} " class="form-control"hidden/>
            <input  type="text" name="id" value="{{$user->id}} " class="form-control"hidden/>


            Email:
            <br>
            <br>
            <input type="email" name="email" value="{{$user->email}} " class="form-control"/>

            <br>
            <br>

            Password:

            <br>
            <br>

            <input type="password" name="password" class="form-control" value="{{$user->password}}">



            <br>
            <br>

            <input type="text" name="role" class="form-control" value="{{$user->role}} "hidden>



            <input type="submit" value="Save" class="btn btn-primary"/>

        </form>
        <br>



    </div>
    <!-- /.col-lg-3 -->

@endsection
