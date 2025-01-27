<x-admin-layout>
    <x-slot name="header">Gestion des articles</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                    'routeAction' => route('#post.create')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Tiitre</x-table.head>
                                <x-table.head>Categorie</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($posts as $post)
                            <x-table.row>
                                <x-table.cell>
                            <a href="{{ route('#post.show', ['id' => $post->id]) }}" class="hover:underline">
                                {{ Str::limit($post->title, 50) }}
                            </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                        'content' => $post->categories->count(),
                                        'type' => 'outline'
                                    ])
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                        'routeEdit' => route('#post.edit', ['id' => $post->id]),
                                        'routeShow' => route('#post.show', ['id' => $post->id]),
                                        'routeDelete' => route('#post.destroy', ['id' => $post->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
