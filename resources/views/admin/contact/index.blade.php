<x-admin-layout>
    <x-slot name="header">Nous contacter</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'countResult' => 12,
                'routeIndex' => route('#contact.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Nom</x-table.head>
                                <x-table.head>Adresse e-mail</x-table.head>
                                <x-table.head>Sujet</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($contacts as $contact)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#contact.show', ['id' => $contact->id]) }}" class="hover:underline">
                                        {{ Str::limit($contact->name, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#contact.show', ['id' => $contact->id]) }}" class="hover:underline">
                                        {{ Str::limit($contact->email, 50) }}
                                    </a>
                                </x-table.cell>


                                <x-table.cell>
                                    <a href="{{ route('#contact.show', ['id' => $contact->id]) }}" class="hover:underline">
                                        {{ Str::limit($contact->subject, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeShow' => route('#contact.show', ['id' => $contact->id]),
                                    'routeDelete' => route('#contact.destroy', ['id' => $contact->id])
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>