@extends('layouts.app')

@section('content')

    @if(!$store)
        <div class="mt-5 mb-5">
            <a href="{{route('admin.stores.create')}}" class="btn float-right btn-create">Adicionar loja &nbsp;<i class="fa fa-plus fa-lg" aria-hidden="true"></i></a>
        </div>
    @else
        <table class="table" id="my-table" style="margin-top: 7rem !important;">
            <thead class="table-red">
            <tr>
                <th class="th-no-border">Nome</th>
                <th class="th-no-border">Qtd. produtos</th>
                <th class="th-no-border">Opções</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="td-no-border">{{$store->name}}</td>
                <td class="td-no-border">{{$store->products->count()}}</td>
                <td class="td-no-border">
                    <div class="row btn-options alinhar-icones">

                        <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-edit alinhar-icones">Editar &nbsp;<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>

                        <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-delete alinhar-icones">Excluir &nbsp;<i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
                        </form>

                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    @endif
@endsection
