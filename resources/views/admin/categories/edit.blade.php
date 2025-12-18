@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                {{-- Card Header --}}
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Category</h5>

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

                    <form method="POST" action="{{ route('admin.update', $category->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ $category->name }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Parent Category</label>
                            <select name="parent_id" class="form-select">
                                <option value="">— None (Root) —</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ $category->parent_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.categories') }}"
                               class="btn btn-secondary btn-sm">
                                Cancel
                            </a>

                            <button class="btn btn-success btn-sm">
                                Update Category
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
