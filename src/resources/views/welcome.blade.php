@extends('layouts.front')

@section('content')

    <div class="row row-cards mt-2 mb-2">
        @foreach($products as $key => $product)

            <div class="col-md-3">
                <div class="card" style="width: 100%;">
                    <a href="{{route('product.single', ['slug' => $product->slug])}}" class="card-customized">
                        @if($product->photos->count())
                            <img src="{{asset('storage/' . $product->photos->first()->image)}}" alt="" class="card-img-top card-photo">
                        @else
                            <img src="{{asset('assets/img/no-photo.jpg')}}" alt="" class="card-img-top card-photo">
                        @endif
                        <hr>
                        <div class="card-body">
                            <p class="card-price">
                                R$ {{number_format($product->price, "2", ",", ".")}}
                            </p>
                            <p class="card-text">
                                {{$product->description}}
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            @if(($key + 1) % 3 == 0) </div><div class="row row-cards mt-2 mb-2"> @endif
        @endforeach
    </div>

    <div class="row">
        <div class="col-12">
            <h2>Lojas Destaque</h2>
            <hr>
        </div>
        @foreach($stores as $store)
            <div class="col-4">
                @if($store->logo)
                    <img src="{{asset('storage/' . $store->logo)}}" alt="Logo da Loja {{$store->name}}" class="img-fluid">
                @else
                    <img src="https://via.placeholder.com/250X100.png?text=logo" alt="Loja sem logo" class="img-fluid">
                @endif
                <h3>{{$store->name}}</h3>
                <p>{{$store->description}}</p>
                    <a href="{{route('store.single', ['slug' => $store->slug])}}" class="btn btn-sm btn-success">Ver loja</a>
            </div>
        @endforeach
    </div>
@endsection
