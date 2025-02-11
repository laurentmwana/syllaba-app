<x-admin-layout>
    <x-slot name="header">Gestion des tomes</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#tome.create'),
                'countResult' => 12,
                'routeIndex' => route('#tome.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Support de cours</x-table.head>
                                <x-table.head>Cours</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($tomes as $tome)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#tome.show', ['id' => $tome->id]) }}" class="hover:underline">
                                        {{ Str::limit($tome->courseDocument->title, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#course.show', ['id' => $tome->courseDocument->course->id]) }}" class="hover:underline">
                                        {{ Str::limit($tome->courseDocument->course->name, 50) }}
                                    </a>
                                </x-table.cell>
                                
                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#tome.edit', ['id' => $tome->id]),
                                    'routeShow' => route('#tome.show', ['id' => $tome->id]),
                                    'routeDelete' => route('#tome.destroy', ['id' => $tome->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $tomes->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>