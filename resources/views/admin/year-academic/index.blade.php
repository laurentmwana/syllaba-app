<x-admin-layout>
    <x-slot name="header">Gestion des années académiques</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                    'countResult' => 12,
                    'routeIndex' => route('#year-academic.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Année</x-table.head>
                                <x-table.head>Début</x-table.head>
                                <x-table.head>Fin</x-table.head>
                                <x-table.head>Status</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($years as $year)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#year-academic.show', ['id' => $year->id]) }}" class="hover:underline">
                                        {{ Str::limit("{$year->start}-{$year->end}", 20) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#year-academic.show', ['id' => $year->id]) }}" class="hover:underline">
                                        {{ Str::limit($year->start, 20) }}
                                    </a>
                                </x-table.cell>


                                <x-table.cell>
                                    <a href="{{ route('#year-academic.show', ['id' => $year->id]) }}" class="hover:underline">
                                        {{ Str::limit($year->end, 20) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                        'content' => $year->status,
                                        'type' => 'outline'
                                    ])
                                </x-table.cell>

                                <x-table.cell>
                                    <div class="flex items-center justify-start lg:justify-end gap-3">
                                        @include('shared.action-simple', [
                                        'routeShow' => route('#year-academic.show', ['id' => $year->id]),
                                        'routeDelete' => route('#year-academic.destroy', ['id' => $year->id]),
                                    ])

                                        @include('shared.action-single', [
                                            'title' => "Changer le status",
                                            'routeAction' => route('#year-academic.closed', ['id' => $year->id]),
                                        ])
                                    </div>
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $years->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
