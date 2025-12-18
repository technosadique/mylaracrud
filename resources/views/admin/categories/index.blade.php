@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">

                {{-- Card Header --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Category List</h5>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.users') }}" class="btn btn-success btn-sm">
                            Users
                        </a>

                        <a href="{{ route('admin.categories') }}" class="btn btn-primary btn-sm">
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

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success text-center mb-0">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Card Body --}}
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">All Categories</h6>

                        <a href="{{ route('admin.create') }}" class="btn btn-success btn-sm">
                            + Add Category
                        </a>
                    </div>

                    {{-- Category Table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="10%">Sl No</th>
                                    <th>Name</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
							    @php $sn = 1; @endphp
                                @foreach($allcategories as $category)
                                    <tr>
                                        <td>{{ $sn++ }}</td>                                       
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                <a href="{{ route('admin.edit', $category->id) }}"
                                                   class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>

                                                <form method="POST"
                                                      action="{{ route('admin.destroy', $category->id) }}"
                                                      onsubmit="return confirm('Are you sure you want to delete?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Tree View --}}
                    <hr>

                    <h6>Category Tree View</h6>

                    <ul class="list-group">
                        @foreach($categories as $category)
                            @include('admin.categories.partials.category', ['category' => $category])
                        @endforeach
                    </ul>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
