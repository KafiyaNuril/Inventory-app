@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card  shadow-sm">
                    <div class="card-body p-4">
                        <h4 class="card-title">Welcome to Dashboard, {{ Auth::user()->name }}!</h4>
                        <p class="card-text">This is your central hub for managing the inventory. You can use the navigation
                            on the left to access different sections of the application.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row mt-4">
            @if (auth()->user()->role == 'admin')
                <div class="col-md-4">
                    <div class="card text-white bg-primary  mb-3">
                        <div class="card-header">Users</div>
                        <div class="card-body">
                            <h5 class="card-title">Manage Users</h5>
                            <p class="card-text">Add, edit, and manage user accounts and roles.</p>
                            <a href="{{ route('user.index') }}" class="btn btn-light">Go to Users</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Items</div>
                        <div class="card-body">
                            <h5 class="card-title">Manage Items</h5>
                            <p class="card-text">Track and organize all inventory items.</p>
                            <a href="{{ route('item.index') }}" class="btn btn-light">Go to Items</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <h5 class="card-title">Manage Categories</h5>
                            <p class="card-text">Organize items into different categories.</p>
                            <a href="{{ route('category.index') }}" class="btn btn-light">Go to Categories</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-6">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Items</div>
                        <div class="card-body">
                            <h5 class="card-title">View Items</h5>
                            <p class="card-text">Browse through the list of available items.</p>
                            <a href="{{ route('item.index') }}" class="btn btn-light">Go to Items</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Lendings</div>
                        <div class="card-body">
                            <h5 class="card-title">Manage Lendings</h5>
                            <p class="card-text">Track items that have been lent out.</p>
                            <a href="{{ route('lending.index') }}" class="btn btn-light">Go to Lendings</a>
                        </div>
                    </div>
                </div>
            @endif
        </div> --}}
    </div>
@endsection
