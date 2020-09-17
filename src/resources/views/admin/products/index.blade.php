@extends('layouts.app')

@section('content')

    @if($products)
        <div class="row mt-5">
            <div class="col-md-6">
                {{$products->links()}}
            </div>
            <div class="col-md-6">
                <a href="{{route('admin.products.create')}}" class="btn float-right mb-3 btn-create">Novo produto &nbsp;<i class="fa fa-plus fa-lg" aria-hidden="true"></i></a>
            </div>
        </div>

        <table class="table" id="my-table">
            <thead class="table-red">
            <tr>
                <th class="th-no-border">Nome</th>
                <th class="th-no-border">preço</th>
                <th class="th-no-border">Loja</th>
                <th class="th-no-border">Opções</th>

            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td class="td-no-border">{{$product->name}}</td>
                    <td class="td-no-border">R$ {{number_format($product->price, 2, ',', '.')}}</td>
                    <td class="td-no-border">{{$product->store->name}}</td>
                    <td class="td-no-border">
                        <div class="row btn-options alinhar-icones">
                            <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-edit alinhar-icones">Editar &nbsp;<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>

                            <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-delete alinhar-icones">Excluir &nbsp;<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
