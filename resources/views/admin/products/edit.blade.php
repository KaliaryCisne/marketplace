@extends('layouts.app')

@section('content')

    <h1 class="text-white">Editar loja</h1>

    <form action="{{route('admin.products.update', ['product' => $product->id])}}" method="post" class="p-4 mb-5 rounded text-white" style="background: #7159c1;">

        <div class="row d-flex justify-content-around">
            <div class="col-md-6">

                @csrf()
                @method("PUT")

                <div class="form-group">
                    <label for="">Nome do produto</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">

                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Descrição</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$product->description}}">

                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Conteúdo</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{$product->body}}</textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Preço</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{$product->price}}">

                    @error('price')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="categories">Categories</label>
                    <select name="categories[]" id="categories" class="form-control" multiple>
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}"
                                @if($product->categories->contains($category))
                                    selected
                                @endif
                            >
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-success float-right font-weight-bold">Atualizar</button>
                </div>

            </div>
        </div>
    </form>
@endsection
