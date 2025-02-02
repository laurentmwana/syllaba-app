<x-admin-layout>
    <x-slot name="header">Gestion des utilisateurs</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#user.create'),
                'countResult' => 12,
                'routeIndex' => route('#user.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Email</x-table.head>
                                <x-table.head>Email vérifié</x-table.head>
                                <x-table.head>Student</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($users as $user)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#user.show', ['id' => $user->id]) }}" class="hover:underline">
                                        {{ Str::limit($user->name, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#user.show', ['id' => $user->id]) }}" class="hover:underline">
                                        {{ Str::limit($user->email, 20) }}
                                    </a>
                                </x-table.cell>


                                <x-table.cell>
                                    @include('shared.badge', [
                                    'type' => 'outline',
                                    'content' => $user->email_verified_at !== null ? "Oui" : "Non"
                                    ])
                                </x-table.cell>

                                <x-table.cell>
                                    @if ($user->student_id !== null)
                                    <a href="{{ route('#student.show', ['id' => $user->student->id]) }}" class="hover:underline">
                                        {{ Str::limit($user->student->name, 20) }}
                                    </a>
                                    @else
                                    @include('shared.badge', [
                                    'type' => 'outline',
                                    'content' => "N'est pas associé"
                                    ])
                                    @endif
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#user.edit', ['id' => $user->id]),
                                    'routeShow' => route('#user.show', ['id' => $user->id]),
                                    'routeDelete' => route('#user.destroy', ['id' => $user->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>