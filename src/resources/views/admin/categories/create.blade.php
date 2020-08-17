@extends('layouts.app')


@section('content')
    <h1 class="text-white text-center form-title-customized">New Category</h1>

    <div class="row form-row-customized justify-content-center">
        <form action="{{route('admin.categories.store')}}" class="mb-5 text-white form-customized col-md-8" method="post">

            @csrf()

            <div class="form-group">

                <input type="text" placeholder="Name" name="name" class="form-imput-customized @error('name') is-invalid @enderror" value="{{old('name')}}" autocomplete="off">

                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <input type="text" placeholder="Description" name="description" class="form-imput-customized @error('description') is-invalid @enderror" value="{{old('description')}}" autocomplete="off">

                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-create float-right"><i class="fa fa-save" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
@endsection
