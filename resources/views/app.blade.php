<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/shop-homepage.css')}}" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>


                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">login</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">register</a>
                    </li>
                @endguest
                @auth
                    @if (Auth::user()->role == 'admin')

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.index')}}"> Categories</a>
                    </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users.index')}}">Users</a>
                        </li>
                    @endif
                        <li class="nav-item">

                            <a class="nav-link" href="{{route('books.index')}}">Books</a>
                        </li>

                    <li class="nav-item">           <a href="{{route('profile', Auth::user()->id)}}" class="nav-link">Profile</a></li>

                    <form action="{{route('logout')}}" method="POST" id="logout-form">
                        @csrf                    <li class="nav-item">
                            <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit()">Log out</a>
                        </li>
                    </form>
                @endauth

                <li>  <form action="{{route('home')}}" method="GET">
                        <div class="input-group">
                            <input name ="search" type="text" class="form-control" placeholder="search">




                        </div>
                    </form></li>

            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container mt-5">


    <div class="row">
        @yield('content')
        @livewireStyles

    </div>



</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    $('#reportModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })

</script>
@livewireScripts

</body>

</html>
