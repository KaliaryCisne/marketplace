@extends('layouts.app')

@section('content')

    <table class="table" id="my-table">
        <thead class="table-red">
        <tr>
            <th class="th-no-border">Name</th>
            <th class="th-no-border">Total products</th>
            <th class="th-no-border">Settings</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="td-no-border">{{$store->name}}</td>
                <td class="td-no-border">{{$store->products->count()}}</td>
                <td class="td-no-border">
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
