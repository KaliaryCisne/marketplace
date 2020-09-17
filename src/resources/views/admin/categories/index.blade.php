@extends('layouts.app')


@section('content')

    <div class="row mt-5 mb-3">
        <div class="col">
            <a href="{{route('admin.categories.create')}}" class="btn btn-create float-right">Nova categoria &nbsp;<i class="fa fa-plus fa-lg" aria-hidden="true"></i></a>
        </div>
    </div>

    <table class="table" id="my-table">
        <thead class="table-red">
        <tr>
            <th class="th-no-border">Nome</th>
            <th class="th-no-border">Opções</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="td-no-border">{{$category->name}}</td>
                <td class="td-no-border">
                    <div class="row btn-options alinhar-icones">
                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="btn btn-edit alinhar-icones">Editar &nbsp;<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>

                        <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post">
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
@endsection
