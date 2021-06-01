@extends('layouts.front')

@section('content')

    <div class="row row-cards mt-2 mb-2">
        <div class="col-4">
            @if($store->logo)
                <img src="{{asset('storage/' . $store->logo)}}" alt="Logo da Loja {{$store->name}}" class="img-fluid">
            @else
                <img src="https://via.placeholder.com/250X100.png?text=logo" alt="Loja sem logo" class="img-fluid">
            @endif
        </div>
        <div class="col-8">
            <h2>{{$store->name}}</h2>
            <p>{{$store->description}}</p>
            <p>
                <strong>Contatos:</strong>
                <span>{{$store->phone}}</span> | <span>{{$store->mobile_phone}}</span>
            </p>
        </div>

        <div class="col-12">
            <hr>
            <h3 style="margin-bottom: 30px;">Produtos desta loja:</h3>
        </div>
        @forelse($store->products as $key => $product)
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
        @empty
            <div class="col-12">
                <h3 class="alert alert-warning">Nenhum produto encontrado para essa loja!</h3>
            </div>
        @endforelse
    </div>
@endsection
