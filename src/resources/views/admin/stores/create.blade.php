@extends('layouts.app')

@section('content')

    <h1 class="text-center form-title-customized">Register</h1>

    <div class="row form-row-customized justify-content-center">
        <form action="{{route('admin.stores.store')}}" class="mb-5 text-white form-customized col-md-8" method="post" enctype="multipart/form-data">

            @csrf()

            <div class="form-group">
                <input type="text" placeholder="name" name="name" class="form-imput-customized @error('name') is-invalid @enderror" value="{{old('name')}}" autocomplete="off">
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
                <input type="text" id="celular" placeholder="Phone" name="phone" class="form-imput-customized @error('phone') is-invalid @enderror" value="{{old('phone')}}" autocomplete="off">
                @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <input type="text" id="whatsapp" placeholder="cell phone/Whatsapp" name="mobile_phone" class="form-imput-customized @error('mobile_phone') is-invalid @enderror" value="{{old('mobile_phone')}}" autocomplete="off">
                @error('mobile_phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="input-group mb-5">
                <div class="custom-file">
                    <label class="custom-file-label" for="logo_id">Choose a file</label>
                    <input type="file" class="custom-file-input @error('logo.*') is-invalid @enderror" id="logo_id" name="logo" multiple>
                </div>
                @error('logo.*')
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
