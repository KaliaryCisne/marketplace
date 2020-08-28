@extends('layouts.app')

@section('content')

    <h1 class="text-center form-title-customized">Edit</h1>

    <div class="row form-row-customized justify-content-center">
        <form
            action="{{route('admin.stores.update', ['store' => $store->id])}}"
            class="mb-5 text-white form-customized col-md-8"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf()
            @method("PUT")

            <div class="form-group">
                <input type="text" placeholder="name" name="name" class="form-imput-customized" value="{{$store->name}}" autocomplete="off">
            </div>

            <div class="form-group">
                <input type="text" placeholder="description" name="description" class="form-imput-customized" value="{{$store->description}}" autocomplete="off">
            </div>

            <div class="form-group">
                <input type="text" id="celular" placeholder="phone" name="phone" class="form-imput-customized @error('phone') is-invalid @enderror" value="{{$store->phone}}" autocomplete="off">
                @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <input type="text" id="whatsapp" placeholder="Cell phone/Whatsapp" name="mobile_phone" class="form-imput-customized" value="{{$store->mobile_phone}}" autocomplete="off">
            </div>

            <div class="input-group mt-5 mb-5">

                <p>
                    <img class="logo-stores" src="{{asset('storage/' . $store->logo)}}" alt="">
                </p>

                <div class="custom-file" style="width: 100%">
                    <input
                        type="file"
                        class="custom-file-input @error('logo.*') is-invalid @enderror"
                        id="logo_id"
                        name="logo"
                    >
                    <label class="custom-file-label" for="logo_id">Logo</label>
                </div>

                @error('logo.*')
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
