@extends('layouts.app')

@section('content')

    <h1 class="text-white">Edit</h1>

    <form action="{{route('admin.products.update', ['product' => $product->id])}}" method="post" class="p-4 mb-5 rounded text-white" style="border: 2px solid #7159c1; border-radius: 25px ;" enctype="multipart/form-data">

        <div class="row d-flex justify-content-around">
            <div class="col-md-6">

                @csrf()
                @method("PUT")

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$product->name}}">

                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{$product->description}}">

                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">{{$product->body}}</textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Price</label>
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
                    <label for="photos">Photos</label>
                    <input type="file" id="photos" name="photos[]" class="form-control @error('photos.*') is-invalid @enderror" multiple>
                    @error('photos.*')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-outline-success float-right font-weight-bold">Save</button>
                </div>
            </div>
        </div>
    </form>

    <hr style="border: 2px solid #7159c1; border-radius: 25px ;">

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
