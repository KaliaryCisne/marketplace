@extends('layouts.app')

@section('content')

    <h1 class="text-center form-title-customized">Edit</h1>

    <div class="row form-row-customized justify-content-center">
        <form
            action="{{route('admin.products.update', ['product' => $product->id])}}"
            method="post"
            class="mb-5 form-customized col-md-8"
            enctype="multipart/form-data"
        >

            @csrf()
            @method("PUT")

            <div class="form-group">
                <input type="text" placeholder="name" name="name" class="form-imput-customized @error('name') is-invalid @enderror" value="{{$product->name}}">

                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" placeholder="description" name="description" class="form-imput-customized @error('description') is-invalid @enderror" value="{{$product->description}}">

                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <textarea name="body" placeholder="Content" id="" cols="30" rows="5" class="form-textarea-customized @error('body') is-invalid @enderror">{{$product->body}}</textarea>
                @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" placeholder="price" name="price" class="form-imput-customized @error('price') is-invalid @enderror" value="{{$product->price}}">

                @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="categories" class="mt-3 mb-3">Categories</label>
                <div class="row pl-3">
                    @foreach($categories as $category)
                        <div class="col-md-3 mb-2">
                            <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    name="categories[]"
                                    type="checkbox"
                                    id="{{$category->id}}"
                                    value="{{$category->id}}"
                                    @if($product->categories->contains($category)) checked @endif
                                    >
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
                <button type="submit" class="btn btn-edit float-right" title="update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>

    <hr style="border: 1px solid #ccc; border-radius: 25px ;">

    <div class="row">
        @foreach($product->photos as $photo)
            <div class="col-4 text-center mb-5">
                <img src="{{asset('storage/' . $photo->image)}}" alt="photo" class="img-fluid" style="border-radius: 25px">

                <form action="{{route('admin.photo.remove')}}" method="POST">
                    @csrf
                    <input type="hidden" name="photoName" value="{{$photo->image}}">

                    <button type="submit" class="btn btn-md btn-danger mt-2">Remove</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
