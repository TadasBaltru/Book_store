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

        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-6">
                <form action="{{route('profiles.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @method('Put')

                    @csrf





                    Email:
                    <br>
                    <br>
                    <input type="text" name="email" value="{{$user->email}} " class="form-control"/>

                    <br>
                    <br>

                    Password:

                    <br>
                    <br>

                    <input type="password" name="password" class="form-control">



                    <br>
                    <br>

                    <input type="text" name="role" class="form-control" value="{{$user->role}} "hidden>



                    <input type="submit" value="Change email" class="btn btn-primary"/>

                </form>
            </div>
            <div class="col-lg-6">

                <form action="{{route('changePassword', $user->id)}}" method="POST" enctype="multipart/form-data">
                    @method('Put')

                    @csrf


                    <input  type="text" name="name" value="{{$user->name}} " class="form-control"hidden/>
                    <input  type="text" name="id" value="{{$user->id}} " class="form-control"hidden/>




                  Current Password:

                    <br>
                    <br>

                    <input type="password" name="oldPassword" class="form-control">



                    <br>
                    <br>
                    New Password:

                    <br>
                    <br>

                    <input type="password" name="newPassword" class="form-control">



                    <br>
                    <br>
                    Repeat new Password:

                    <br>
                    <br>

                    <input type="password" name="repeatPassword" class="form-control">



                    <br>
                    <br>

                    <input type="text" name="role" class="form-control" value="{{$user->role}} "hidden>



                    <input type="submit" value="Change password" class="btn btn-primary"/>

                </form>
            </div>
        </div>

    </div>
    <!-- /.col-lg-3 -->

@endsection
