@extends('layouts.app')

@section('content')

    <h1>Criar Produto</h1>

    <form action="{{route('admin.products.store')}}" method="post">
        @csrf()
        <div class="form-group">
            <label for="">Nome do produto</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Conteúdo</label>
            <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="">Preço</label>
            <input type="text" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Lojas</label>
            <select name="store" class="form-control">
                @foreach($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Salvar</button>
        </div>

    </form>
@endsection
