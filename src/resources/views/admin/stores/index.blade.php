@extends('layouts.app')

@section('content')

    <table class="table" id="my-table" style="margin-top: 7rem !important;">
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
                    <div class="row btn-options">

                            <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-edit mr-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                            <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </form>

                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    @if(!$store)
        <div class="mt-5 mb-5">
            <a href="{{route('admin.stores.create')}}" class="btn btn-create"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        </div>
    @endif
@endsection
