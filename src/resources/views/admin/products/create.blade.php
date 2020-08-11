@extends('layouts.app')

@section('content')

    <h1 style="color: #7159c1">New Product</h1>

    <form action="{{route('admin.products.store')}}" method="post" class="p-4 mb-5 text-white" style="border: 2px solid #7159c1; border-radius: 25px ;" enctype="multipart/form-data">
        <div class="row d-flex justify-content-around">
            <div class="col-md-8" style="border-color: #7159c1;">
                @csrf()
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">

                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}">

                    @error('description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Content</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid @enderror">
                        {{old('body')}}
                    </textarea>

                    @error('body')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">

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
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="photos">Product Photos</label>
                    <input type="file" id="photos" name="photos[]" class="form-control @error('photos') is-invalid @enderror" multiple>
                    @error('photos')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-outline-success float-right font-weight-bold">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection
