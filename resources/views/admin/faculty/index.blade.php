<x-admin-layout>
    <x-slot name="header">Gestion des facultés</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                    'routeAction' => route('#faculty.create'),
                    'countResult' => 12,
                    'routeIndex' => route('#faculty.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Départements</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($faculties as $faculty)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#faculty.show', ['id' => $faculty->id]) }}" class="hover:underline">
                                        {{ Str::limit($faculty->name, 70) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                        'content' => $faculty->departments->count(),
                                        'type' => 'outline'
                                    ])
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                        'routeEdit' => route('#faculty.edit', ['id' => $faculty->id]),
                                        'routeShow' => route('#faculty.show', ['id' => $faculty->id]),
                                        'routeDelete' => route('#faculty.destroy', ['id' => $faculty->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $faculties->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
