@extends('layouts.app')
@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card shadow-sm border-0 p-3">
        <div class="d-flex justify-content-between">
            <h2>Tabel Category</h2>
            <div>
                <a class="btn btn-success mb-3" href="{{ route('category.export') }}" role="button">Export Excel</a>
                <a class="btn btn-dark mb-3" href="{{ route('category.create') }}" role="button">+ add</a>
            </div>
        </div>
        <table class="card-body table">
            <thead>
                <tr class="table-active">
                    <th>#</th>
                    <th>Name</th>
                    <th>Division Pj</th>
                    <th>Total Items</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($categories) < 1)
                    <tr>
                        <td colspan="5" class="text-center">Category is Empty</td>
                    </tr>
                @else
                    @foreach ($categories as $index => $category)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->division_pj }}</td>
                            <td>{{ $category->items_count }}</td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-success" href="{{ route('category.edit', $category->id) }}" role="button"><i class="bi bi-pencil-square"></i> edit</a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Delete</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
