<x-base-layout>
    <x-slot name="header">Les articles</x-slot>

    <div class="container py-12">
        <div class="container-center">

            @include('shared.search-with-action', [
            'countResult' => 12,
            'routeIndex' => route('post.index')
            ])

            <div class="grid lg:grid-cols-4 gap-3 items-start my-5">
                <div class="container-card">
                    <h2 class="mb-3">
                        Categories
                    </h2>

                    @include('post._category', ['categories' => $categories])

                </div>

                <div class="lg:col-span-3">
                    <div class="grid  grid-cols-1 lg:grid-cols-2 gap-4">
                        @foreach ($posts as $post)
                        @include('post._card', ['post' => $post])
                        @endforeach
                    </div>
                </div>
            </div>

            {{ $posts->links() }}

        </div>
    </div>
</x-base-layout>