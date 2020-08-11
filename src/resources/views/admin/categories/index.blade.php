@extends('layouts.app')


@section('content')

    <div class="row mt-5 mb-3">
        <div class="col">
            <a href="{{route('admin.categories.create')}}" class="btn btn-create float-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>
    </div>

    <table class="table" id="my-table">
        <thead class="table-red">
        <tr>
            <th class="th-no-border">Name</th>
            <th class="th-no-border">Settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="td-no-border">{{$category->name}}</td>
                <td class="td-no-border" width="15%">
                    <div class="row btn-options">
                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="btn btn-edit mr-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                        <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
