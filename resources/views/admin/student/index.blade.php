<x-admin-layout>
    <x-slot name="header">Gestion des étudiants</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#student.create'),
                'countResult' => 12,
                'routeIndex' => route('#student.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Postnom</x-table.head>
                                <x-table.head>Token</x-table.head>
                                <x-table.head>Sexe</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($students as $student)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#student.show', ['id' => $student->id]) }}" class="hover:underline">
                                        {{ Str::limit($student->name, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#student.show', ['id' => $student->id]) }}" class="hover:underline">
                                        {{ Str::limit($student->firstname, 10) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    {{ $student->token }}
                                </x-table.cell>


                                <x-table.cell>
                                    {{ $student->gender }}
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#student.edit', ['id' => $student->id]),
                                    'routeShow' => route('#student.show', ['id' => $student->id]),
                                    'routeDelete' => route('#student.destroy', ['id' => $student->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $students->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>