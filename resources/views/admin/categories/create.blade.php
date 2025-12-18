@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                {{-- Card Header --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Category</h5>

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

                    <form method="POST" action="{{ route('admin.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter category name"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Parent Category</label>
                            <select name="parent_id" class="form-select">
                                <option value="">— Parent Category —</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary btn-sm">
                                Save Category
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
