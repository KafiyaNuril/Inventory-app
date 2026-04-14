@extends('layouts.app')
@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card shadow-sm border-0 p-3">
        <div class="d-flex justify-content-between">
            <h3>Tabel User {{ ucfirst(request('role') ?? 'All ') }}</h3>
            <div>
                <a class="btn btn-success mb-3" href="{{ route('user.export', ['role' => request('role') ?? 'all']) }}"
                    role="button">Export Excel</a>
                <a class="btn btn-dark mb-3" href="{{ route('user.create') }}" role="button">+ add</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr class="table-active">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) < 1)
                    <tr>
                        <td colspan="5" class="text-center">User is Empty</td>
                    </tr>
                @else
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex gap-2">
                                @if ($user->role == 'admin')
                                    <a class="btn btn-success" href="{{ route('user.edit', $user->id) }}"
                                        role="button">edit</a>
                                @else
                                    <form action="{{ route('user.reset', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-warning">Reset Password</button>
                                    </form>
                                @endif
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal-{{ $user->id }}">
                                    Delete
                                </button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal-{{ $user->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel">Confirm Deletion</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete the user <strong>{{ $user->name }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@endsection
