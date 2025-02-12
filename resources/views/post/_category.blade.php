<div>
    @foreach ($categories as $category)
    <a class="block w-full border-b px-1 py-3 text-sm text-muted-foreground hover:text-indigo-300" href="{{ route('post.index', ['category' => $category->id]) }}">
        {{ $category->name }}
    </a>
    @endforeach
</div>