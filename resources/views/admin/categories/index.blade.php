@extends('layouts.app')


@section('content')

    <table class="table table-dark">
        <thead style="background: #7159c1;">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Settings</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td width="15%">
                    <div class="row">
                        <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="btn btn-sm btn-outline-primary mr-2">EDIT</a>

                        <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-outline-danger">REMOVE</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-5 float-right">
        <a href="{{route('admin.categories.create')}}" class="btn btn-md btn-outline-success">add category</a>
    </div>
@endsection
