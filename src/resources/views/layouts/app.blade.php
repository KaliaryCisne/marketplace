<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url(mix('assets/css/styles.css')) }}" type="text/css" >
    <link rel="stylesheet" href="{{asset('assets/icons/css/font-awesome.min.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-5 container">

        <a class="navbar-brand" href="#" id="logo_marketplace">Marketplace L6</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            @auth

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(request()->is('/')) active @endif">
                        <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                        <a class="nav-link" href="{{route('admin.stores.index')}}">Stores <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                        <a class="nav-link" href="{{route('admin.products.index')}}">Products</a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                        <a class="nav-link" href="{{route('admin.categories.index')}}">Categories</a>
                    </li>
                </ul>
                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <span class="nav-link">{{auth()->user()->name}}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-md" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                            <form action="{{route('logout')}}" class="logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            @guest

                <ul class="navbar-nav float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register<span class="sr-only">(current)</span></a>
                    </li>
                </ul>

            @endguest
        </div>
    </nav>
    <div class="container mt-5">
        @include('flash::message')
        @yield('content')
    </div>
</body>
</html>
