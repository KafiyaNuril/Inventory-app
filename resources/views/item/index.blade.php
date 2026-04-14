@extends('layouts.app')
@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card shadow-sm border-0 p-3">
        <div class="d-flex justify-content-between">
            <h2>Tabel item</h2>
            <div>
                <a class="btn btn-success  mb-3" href="{{ route('item.export') }}" role="button">Export Excel</a>
                <a class="btn btn-dark  mb-3" href="{{ route('item.create') }}" role="button">+ add</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr class="table-active">
                    <th scope="col">#</th>
                    <th scoper="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">total</th>
                    <th scope="col">Repair</th>
                    <th scope="col">Lending</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if( count($items) < 1 )
                    <tr>
                        <td colspan="7" class="text-center">Item is Empty</td>
                    </tr>
                @else
                    @foreach( $items as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->total }}</td>
                            <td>{{ $item->repair }}</td>
                            <td>
                                @if ($item->total_lending > 0)
                                    <a href="{{ route('lending.show', $item->id) }}">
                                        {{ $item->total_lending }}
                                    </a>
                                @else
                                    0
                                @endif
                            </td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-success" href="{{ route('item.edit', $item->id) }}" role="button">edit</a>
                                <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
