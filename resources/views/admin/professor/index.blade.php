<x-admin-layout>
    <x-slot name="header">Gestion des professeurs</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#professor.create'),
                'countResult' => 12,
                'routeIndex' => route('#professor.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Postnom</x-table.head>
                                <x-table.head>Sexe</x-table.head>
                                <x-table.head>Départements</x-table.head>
                                <x-table.head>Cours</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($professors as $professor)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#professor.show', ['id' => $professor->id]) }}" class="hover:underline">
                                        {{ Str::limit($professor->name, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#professor.show', ['id' => $professor->id]) }}" class="hover:underline">
                                        {{ Str::limit($professor->firstname, 10) }}
                                    </a>
                                </x-table.cell>



                                <x-table.cell>
                                    {{ $professor->gender }}
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                    'type' => 'outline',
                                    'content' => $professor->departments->count()])
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                    'type' => 'outline',
                                    'content' => $professor->courses->count()])
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#professor.edit', ['id' => $professor->id]),
                                    'routeShow' => route('#professor.show', ['id' => $professor->id]),
                                    'routeDelete' => route('#professor.destroy', ['id' => $professor->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $professors->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>