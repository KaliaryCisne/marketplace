@extends('layouts.front')

@section('content')

    <div class="row single-infos">
        <div class="col-4"></div>
        <div class="col-8">
            <h2>{{$product->name}}</h2>
            <p>
                {{$product->description}}
            </p>

            <h3>
                {{$product->price}}
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
