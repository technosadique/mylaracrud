<li>
    {{ $category->name }}

    @if($category->children->count())
        <ul>
            @foreach($category->children as $child)
                @include('admin.categories.partials.category', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
