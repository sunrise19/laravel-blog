<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('CSS/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('CSS/style.css')}}" rel="stylesheet">

</head>
<body>
    <div class="div">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home')}}">Awesome Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.create')}}">Posts</a>
                    </li>
                </ul>
            </div>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>
            </div>
        </div>
        </nav>


        @yield('content')
        @yield('posts')

        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="{{ route('home')}}" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="{{ route('blog.create')}}" class="nav-link px-2 text-muted">Posts</a></li>
                <li class="nav-item"><a href="" class="nav-link px-2 text-muted">Categories</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
            <p class="text-center text-muted">&copy; 2022 Awesome Blogs</p>
        </footer>
    </div>

    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
</body>
</html>
