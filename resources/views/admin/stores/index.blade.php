@extends('layouts.app')

@section('content')

    <div class="mt-5 mb-5">
        <a href="{{route('admin.stores.create')}}" class="btn btn-lg btn-success">Criar loja</a>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Loja</th>
            <th>Ações</th>

        </tr>
        </thead>
        <tbody>
        @foreach($stores as $store)
            <tr>
                <td>{{$store->id}} </td>
                <td>{{$store->name}}</td>
                <td>
                    <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$stores->links()}}
@endsection
