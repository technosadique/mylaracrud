@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">

                {{-- Card Header --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">User Dashboard</h5>

                    <div class="d-flex align-items-center gap-2">
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-success btn-sm">
                                Admin Dashboard
                            </a>
                        @endif

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

                    <h6 class="mb-3">User List</h6>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th width="15%">Role</th>
                                </tr>
                            </thead>
                            <tbody>
							    @php $sn = 1; @endphp
                                @foreach($users as $user)
                                    <tr>
                                         <td>{{ $sn++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <span class="badge bg-secondary">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
