<x-admin-layout>
    <x-slot name="header">Gestion des departments</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                    'routeAction' => route('#department.create'),
                    'countResult' => 12,
                    'routeIndex' => route('#department.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Alias</x-table.head>
                                <x-table.head>Faculté</x-table.head>
                                <x-table.head>Options</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($departments as $department)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#department.show', ['id' => $department->id]) }}" class="hover:underline">
                                        {{ Str::limit($department->name, 50) }}
                                    </a>
                                </x-table.cell>


                                <x-table.cell>
                                    <a href="{{ route('#department.show', ['id' => $department->id]) }}" class="hover:underline">
                                        {{ Str::limit($department->alias, 20) }}
                                    </a>
                                </x-table.cell>


                                <x-table.cell>
                                    <a href="{{ route('#faculty.show', ['id' => $department->faculty_id]) }}" class="hover:underline">
                                        {{ Str::limit($department->faculty->name, 30) }}
                                    </a>
                                </x-table.cell>


                                <x-table.cell>
                                    @include('shared.badge', [
                                        'content' => $department->options->count(),
                                        'type' => 'outline'
                                    ])
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                        'routeEdit' => route('#department.edit', ['id' => $department->id]),
                                        'routeShow' => route('#department.show', ['id' => $department->id]),
                                        'routeDelete' => route('#department.destroy', ['id' => $department->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $departments->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>
