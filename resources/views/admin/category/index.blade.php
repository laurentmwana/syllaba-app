<x-admin-layout>
    <x-slot name="header">Gestion des categories</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                    'routeAction' => route('#category.create'),
                    'countResult' => 12,
                    'routeIndex' => route('#category.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Description</x-table.head>
                                <x-table.head>Articles</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($categories as $category)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#category.show', ['id' => $category->id]) }}" class="hover:underline">
                                        {{ Str::limit($category->name, 20) }}
                                    </a>
                                </x-table.cell>

                                

                                <x-table.cell>
                                    <a href="{{ route('#category.show', ['id' => $category->id]) }}" class="hover:underline">
                                        {{ Str::limit($category->description, 30) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                        'content' => $category->posts->count(),
                                        'type' => 'outline'
                                    ])
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                        'routeEdit' => route('#category.edit', ['id' => $category->id]),
                                        'routeShow' => route('#category.show', ['id' => $category->id]),
                                        'routeDelete' => route('#category.destroy', ['id' => $category->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $categories->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
