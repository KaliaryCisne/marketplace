@extends('layouts.app')

@section('content')

    <h1 class="text-white text-center form-title-customized">New Product</h1>

    <div class="row form-row-customized justify-content-center">
        <form
            action="{{route('admin.products.store')}}"
            method="post"
            class="mb-5 text-white form-customized col-md-8"
            enctype="multipart/form-data"
        >

            @csrf()
            <div class="form-group">
                <input type="text" autocomplete="off" placeholder="name" name="name" class="form-imput-customized @error('name') is-invalid @enderror" value="{{old('name')}}" autocomplete="off">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" placeholder="Description" name="description" class="form-imput-customized @error('description') is-invalid @enderror" value="{{old('description')}}" autocomplete="off">

                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <textarea name="body" placeholder="Content" cols="30" rows="5" class="form-textarea-customized @error('body') is-invalid @enderror" autocomplete="off">
                    {{old('body')}}
                </textarea>

                @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" placeholder="Price" name="price" class="form-imput-customized @error('price') is-invalid @enderror" value="{{old('price')}}" autocomplete="off">

                @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="categories" class="mt-3 mb-3">Categories</label>
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-3 mb-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="categories[]" type="checkbox" id="{{$category->id}}" value="{{$category->id}}">
                                <label class="form-check-label" for="{{$category->id}}">{{$category->name}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="input-group mb-5">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('photos.*') is-invalid @enderror" id="photos" name="photos[]" multiple>
                    <label class="custom-file-label" for="photos">Choose a file</label>
                </div>
                @error('photos.*')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-create float-right" title="save"><i class="fa fa-save" aria-hidden="true"></i></button>

            </div>

        </form>
    </div>
@endsection
