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

    <table class="table" id="my-table">
        <thead class="table-red">
        <tr>
            <th class="th-no-border">Name</th>
            <th class="th-no-border">Price</th>
            <th class="th-no-border">Store</th>
            <th class="th-no-border">Settings</th>

        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td class="td-no-border">{{$product->name}}</td>
                <td class="td-no-border">R$ {{number_format($product->price, 2, ',', '.')}}</td>
                <td class="td-no-border">{{$product->store->name}}</td>
                <td class="td-no-border">
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
