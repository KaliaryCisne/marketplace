<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BoComprar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url(mix('assets/css/styles.css')) }}" type="text/css" >
    <link rel="stylesheet" href="{{asset('assets/icons/css/font-awesome.min.css')}}">

    <link rel="sortcut icon" href="{{asset('assets/img/logo-marketplace-2.png')}}" type="image/png">
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-5 container-fluid">

        <img src="{{asset('assets/img/logo-marketplace-2.png')}}" width="80" alt="logo" id="logo_marketplace">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            @auth

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(request()->is('/')) active @endif">
                        <a class="nav-link" href="{{route('home')}}"><i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp; Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item @if(request()->is('admin/orders/my')) active @endif">
                        <a class="nav-link" href="{{route('admin.orders.my')}}">Meus Pedidos</a>
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
                                <span class="badge badge-danger alert-qtd-itens-carrinho">{{count(session()->get('cart'))}}</span>
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
            @guest

                <ul class="navbar-nav ul-botao-registrar">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}"><i class="fa fa-user-plus fa-lg" aria-hidden="true"></i>&nbsp; Register<span class="sr-only">(current)</span></a>
                    </li>
                </ul>

            @endguest
        </div>
    </nav>

    <div class="container-fluid main-container">
        <div class="container mt-5">
            @include('flash::message')
            @yield('content')

            <script src="{{asset('js/inputmask.js')}}"></script>
            <script src="{{asset('js/jquery.maskMoney.min.js')}}"></script>

            <script src="{{asset('js/form.js')}}"></script>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </div>
</body>
</html>
