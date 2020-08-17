@extends('layouts.app')


@section('content')
    <h1 class="text-white text-center form-title-customized">Edit category</h1>

    <div class="row form-row-customized justify-content-center">
        <form
            action="{{route('admin.categories.update', ['category' => $category->id])}}"
            method="post"
            class="mb-5 text-white form-customized col-md-8"
        >
            @csrf
            @method("PUT")

            <div class="form-group">
                <input type="text" placeholder="name" name="name" class="form-imput-customized @error('name') is-invalid @enderror" value="{{$category->name}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <input type="text" name="description" placeholder="description" class="form-imput-customized  @error('description') is-invalid @enderror" value="{{$category->description}}">
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-edit float-right" title="update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
@endsection
