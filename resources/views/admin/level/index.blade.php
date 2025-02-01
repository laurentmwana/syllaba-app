<x-admin-layout>
    <x-slot name="header">Gestion des promotions</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#level.create'),
                'countResult' => 12,
                'routeIndex' => route('#level.index')
                ])


                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Alias</x-table.head>
                                <x-table.head>Option</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($levels as $level)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#level.show', ['id' => $level->id]) }}" class="hover:underline">
                                        {{ Str::limit($level->name, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#level.show', ['id' => $level->id]) }}" class="hover:underline">
                                        {{ Str::limit($level->alias, 10) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#option.show', ['id' => $level->option_id]) }}" class="hover:underline">
                                        {{ Str::limit($level->option->name, 30) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#level.edit', ['id' => $level->id]),
                                    'routeShow' => route('#level.show', ['id' => $level->id]),
                                    'routeDelete' => route('#level.destroy', ['id' => $level->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $levels->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
