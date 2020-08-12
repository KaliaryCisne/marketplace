@extends('layouts.app')

@section('content')

    <h1>Edit</h1>

    <form action="{{route('admin.stores.update', ['store' => $store->id])}}" method="post" enctype="multipart/form-data">
        @csrf()
        @method("PUT")
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" value="{{$store->name}}">
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <input type="text" name="description" class="form-control" value="{{$store->description}}">
        </div>

        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{$store->phone}}">
        </div>

        <div class="form-group">
            <label for="">Cell phone/Whatsapp</label>
            <input type="text" name="mobile_phone" class="form-control" value="{{$store->mobile_phone}}">
        </div>

        <div class="form-group">
            <p>
                <img src="{{asset('storage/' . $store->logo)}}" alt="">
            </p>
            <label for="logo_id">Logo</label>
            <input type="file" id="logo_id" name="logo" class="form-control @error('logo.*') is-invalid @enderror">

            @error('logo.*')
               <div class="invalid-feedback">
                   {{$message}}
               </div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-success">Save</button>
        </div>

    </form>
@endsection
