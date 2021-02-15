@extends('app')

@section('content')
    <table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>role</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>

    </thead>
        <tbody>
        @foreach($users as $user)
            <tr>

            <th>{{$loop->index+1}}</th>

            <th>{{$user->name}}</th>

            <th>{{$user->email}}</th>

            <th>{{$user->password}}</th>

            <th>{{$user->role}}</th>

            <th> <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a></th>
            <th>
                    <form action="{{route('users.destroy', $user->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    </form>
            </th>




        @endforeach
        </tbody>
</table>
@endsection
