@extends('layouts.app')

@section('content')

    <div class="row mt-5">
        <div class="col-md-6">
            {{$products->links()}}
        </div>
        <div class="col-md-6">
            <a href="{{route('admin.products.create')}}" class="btn btn-md btn-outline-success float-right mb-3">add product</a>
        </div>
    </div>

    <table class="table table-dark">
        <thead style="background: #7159c1;">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Store</th>
            <th>Settings</th>

        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}} </td>
                <td>{{$product->name}}</td>
                <td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
                <td>{{$product->store->name}}</td>
                <td>
                    <div class="row">
                        <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-sm btn-outline-primary mr-2" >EDIT</a>

                        <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-outline-danger">REMOVE</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
