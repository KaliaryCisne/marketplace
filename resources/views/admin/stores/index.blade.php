@extends('layouts.app')

@section('content')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Total products</th>
            <th>Settings</th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$store->id}} </td>
                <td>{{$store->name}}</td>
                <td>{{$store->products->count()}}</td>
                <td>
                    <div class="row">
                        <div class="col">
                            <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-primary">Edit</a>
                        </div>
                        <div class="col">
                            <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    @if(!$store)
        <div class="mt-5 mb-5">
            <a href="{{route('admin.stores.create')}}" class="btn btn-lg btn-success">Create store</a>
        </div>
    @endif
@endsection
