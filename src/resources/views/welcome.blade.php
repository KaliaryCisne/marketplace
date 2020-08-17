@extends('layouts.front')

@section('content')

    <div class="row mt-2 mb-2">
        @foreach($products as $key => $product)

            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    @if($product->photos->count())
                        <img src="{{asset('storage/' . $product->photos->first()->image)}}" alt="" class="card-img-top">
                    @else
                        <img src="{{asset('assets/img/no-photo.jpg')}}" alt="" class="card-img-top">
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{$product->name}}</h2>
                        <p class="card-text">
                            {{$product->description}}
                        </p>
                        <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn btn-success">
                            see more
                        </a>
                    </div>
                </div>
            </div>
            @if(($key + 1) % 3 == 0) </div><div class="row mt-3 mb-2"> @endif
        @endforeach
    </div>

@endsection