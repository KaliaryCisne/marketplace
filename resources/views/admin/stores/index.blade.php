@extends('layouts.app')

@section('content')

    <table class="table table-dark">
        <thead style="background: #7159c1;">
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

                            <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-outline-primary mr-2">EDIT</a>
                            <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-outline-danger">DELETE</button>
                            </form>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    @if(!$store)
        <div class="mt-5 mb-5">
            <a href="{{route('admin.stores.create')}}" class="btn btn-md btn-success">Create store</a>
        </div>
    @endif
@endsection
