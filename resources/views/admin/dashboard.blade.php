@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">

                {{-- Card Header --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Admin Dashboard</h5>

                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('admin.users') }}" class="btn btn-primary btn-sm">
                            Users
                        </a>

                        <a href="{{ route('admin.categories') }}" class="btn btn-success btn-sm">
                            Categories
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="mb-0">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Card Body --}}
                <div class="card-body">
                    <p class="mb-0 text-muted">
                        This is the admin dashboard.
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
