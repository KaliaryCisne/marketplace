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
                        <div class="card-body">
                            <p class="card-title">{{$product->name}}</p>
                            <p class="card-text">
                                {{$product->description}}
                            </p>
                            <p class="card-price">
                                R$ {{number_format($product->price, "2", ",", ".")}}
                            </p>
                            {{--                        <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn-detalhes">--}}
                            {{--                            see more--}}
                            {{--                        </a>--}}
                        </div>
                    </a>
                </div>
            </div>
            @if(($key + 1) % 3 == 0) </div><div class="row mt-3 mb-2"> @endif
        @endforeach
    </div>

@endsection
