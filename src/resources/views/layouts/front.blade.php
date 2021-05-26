<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BoComprar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url(mix('assets/css/styles.css')) }}" type="text/css" >
    <link rel="stylesheet" href="{{asset('assets/icons/css/font-awesome.min.css')}}">
    <link rel="sortcut icon" href="{{asset('assets/img/logo-marketplace-2.png')}}" type="image/png">
    @yield('stylesheets')
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-5">
{{--        <a class="navbar-brand" href="{{route('home')}}" id="logo_marketplace">Marketplace L6</a>--}}
        <img src="{{asset('assets/img/logo-marketplace-2.png')}}" width="80" alt="logo" id="logo_marketplace">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest()
                <ul class="navbar-nav mr-auto ul-home-visitante">
                    <li class="nav-item @if(request()->is('/')) active @endif">
                        <a class="nav-link" href="{{route('home')}}"><i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp; Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item @if(request()->is('cart*')) active @endif" id="cart-not-loged">
                        <a class="nav-link" href="{{route('cart.index')}}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;
                            @if(session()->has('cart'))
                                @if(count(session()->get('cart')) > 5)
                                    <span class="badge badge-danger alert-qtd-itens-carrinho">5+</span>
                                @elseif(count(session()->get('cart')) > 0 && count(session()->get('cart')) <= 5)
                                    <span class="badge badge-danger alert-qtd-itens-carrinho">{{count(session()->get('cart'))}}</span>
                                @endif
                            @endif
                            Carrinho
                        </a>
                    </li>

                    <li class="nav-item @if(request()->is('/login')) active @endif">
                        <a class="nav-link" href="{{route('login')}}"><i class="fa fa-sign-in fa-lg" aria-hidden="true"></i>&nbsp; Entrar <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            @endguest

            @auth
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(request()->is('/')) active @endif">
                        <a class="nav-link" href="{{route('home')}}"><i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp; Home<span class="sr-only" alt="home">(current)</span></a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                        <a class="nav-link" href="{{route('admin.stores.index')}}"><i class="fa fa-building" aria-hidden="true"></i>&nbsp; Loja <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                        <a class="nav-link" href="{{route('admin.products.index')}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp; Produtos</a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                        <a class="nav-link" href="{{route('admin.categories.index')}}"><i class="fa fa-tags" aria-hidden="true"></i>&nbsp; Categorias</a>
                    </li>
                    <li class="nav-item @if(request()->is('cart*')) active @endif">
                        <a class="nav-link" href="{{route('cart.index')}}">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;
                            @if(session()->has('cart'))
                                @if(count(session()->get('cart')) > 5)
                                    <span class="badge badge-danger alert-qtd-itens-carrinho">5+</span>
                                @elseif(count(session()->get('cart')) > 0 && count(session()->get('cart')) <= 5)
                                    <span class="badge badge-danger alert-qtd-itens-carrinho">{{count(session()->get('cart'))}}</span>
                                @endif
                            @endif
                            Carrinho
                        </a>
                    </li>
                </ul>

                <div class="my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto ul-infos-right-side">
                        <li class="nav-item mr-4">
                            <span class="nav-link btn-usuario"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>&nbsp; {{auth()->user()->name}}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-md btn-sair" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();"><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>&nbsp; Sair</a>
                            <form action="{{route('logout')}}" class="logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth

        </div>
    </nav>

    <div class="container-fluid main-container">
        <div class="container mt-5">
            @include('flash::message')
            @yield('content')
        </div>
    </div>
@yield('scripts')
</body>
</html>
