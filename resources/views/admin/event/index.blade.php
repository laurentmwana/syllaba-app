<x-admin-layout>
    <x-slot name="header">Gestion des évènements</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#event.create'),
                'countResult' => 12,
                'routeIndex' => route('#event.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Titre</x-table.head>
                                <x-table.head>Type</x-table.head>
                                <x-table.head>Débute</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($events as $event)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#event.show', ['id' => $event->id]) }}" class="hover:underline">
                                        {{ Str::limit($event->title, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', ['content' => $event->type, 'type' => 'outline'])
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', ['content' => $event->start_at, 'type' => 'outline'])
                                </x-table.cell>


                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#event.edit', ['id' => $event->id]),
                                    'routeShow' => route('#event.show', ['id' => $event->id]),
                                    'routeDelete' => route('#event.destroy', ['id' => $event->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $events->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>