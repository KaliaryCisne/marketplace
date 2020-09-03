@extends('layouts.front')

@section('content')

    <div class="row single-infos">
        <div class="col-4">
            @if($product->photos->count())
                <img src="{{asset('storage/' . $product->photos->first()->image)}}" alt="" class="card-img-top">
                <div class="row mt-4">
                    @foreach($product->photos as $photo)
                        <div class="col-4">
                            <img src="{{asset('storage/' . $photo->image)}}" alt="" class="img-fluid">
                        </div>
                    @endforeach
                </div>
            @else
                <img src="{{asset('assets/img/no-photo.jpg')}}" alt="" class="card-img-top">
            @endif
        </div>
        <div class="col-8">
            <div class="col-md-12">
                <h2>{{$product->name}}</h2>
                <p>{{$product->description}}</p>
                <h3>R$ {{number_format($product->price, "2", ",", ".")}}</h3>
                <span>Store: {{$product->store->name}}</span>
            </div>

            <div class="product-add col-md-12">
                <hr>

                <form action="{{route(cart.add)}}" method="post">
                    <input type="hidden" name="product[name]" value="{{$product->name}}">
                    <input type="hidden" name="product[price]" value="{{$product->price}}">
                    <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                    <div class="form-group">
                        <label>Quantidade</label>
                        <input type="number" name="product[amount]" class="form-control col-md-1" value="1">
                    </div>
                    <button class="btn btn-comprar">Comprar agora</button>
                </form>
            </div>

        </div>
    </div>

    <div class="row single-body">
        <div class="col-12">
            <hr>
            <p>
                {{$product->body}}
            </p>
        </div>
    </div>

@endsection
