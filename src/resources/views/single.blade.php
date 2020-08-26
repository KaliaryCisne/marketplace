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
            <h2>{{$product->name}}</h2>
            <p>
                {{$product->description}}
            </p>

            <h3>
                R$ {{number_format($product->price, "2", ",", ".")}}
            </h3>

            <span>
                Store: {{$product->store->name}}
            </span>
        </div>
    </div>

    <div class="row single-body">
        <div class="col-12">
            <hr>
            {{$product->body}}
        </div>
    </div>

@endsection
