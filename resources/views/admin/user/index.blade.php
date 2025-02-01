<x-admin-layout>
    <x-slot name="header">Gestion des options</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                    'routeAction' => route('#option.create'),
                    'countResult' => 12,
                    'routeIndex' => route('#option.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Alias</x-table.head>
                                <x-table.head>Départment</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($options as $option)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#option.show', ['id' => $option->id]) }}" class="hover:underline">
                                        {{ Str::limit($option->name, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#option.show', ['id' => $option->id]) }}" class="hover:underline">
                                        {{ Str::limit($option->alias, 10) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#department.show', ['id' => $option->department_id]) }}" class="hover:underline">
                                        {{ Str::limit($option->department->name, 30) }}
                                    </a>
                                </x-table.cell>
                                
                                <x-table.cell>
                                    @include('shared.action-simple', [
                                        'routeEdit' => route('#option.edit', ['id' => $option->id]),
                                        'routeShow' => route('#option.show', ['id' => $option->id]),
                                        'routeDelete' => route('#option.destroy', ['id' => $option->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $options->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
