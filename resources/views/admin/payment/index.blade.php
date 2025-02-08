<x-admin-layout>
    <x-slot name="header">Gestion des paiements</x-slot>

    <div class="container py-12">
        <div class="container-center">

            <div class="mb-4">
                @include('shared.search-with-action', [
                'routeAction' => route('#payment.create'),
                'countResult' => 12,
                'routeIndex' => route('#payment.index')
                ])

                <div class="my-5">
                    <x-table.container>
                        <x-table.header>
                            <x-table.row>
                                <x-table.head>Etudiant</x-table.head>
                                <x-table.head>Document</x-table.head>
                                <x-table.head>Status</x-table.head>
                                <x-table.head class="text-end">Actions</x-table.head>
                            </x-table.row>
                        </x-table.header>
                        <x-table.body>
                            @foreach ($payments as $payment)
                            <x-table.row>
                                <x-table.cell>
                                    <a href="{{ route('#student.show', ['id' => $payment->student->id]) }}" class="hover:underline">
                                        {{ Str::limit($payment->student->name . " " . $payment->student->firstname, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#document.show', ['id' => $payment->document->id]) }}" class="hover:underline">
                                        {{ Str::limit($payment->document->title, 50) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    <a href="{{ route('#payment.show', ['id' => $payment->id]) }}" class="hover:underline">
                                        {{ Str::limit($payment->alias, 10) }}
                                    </a>
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.badge', [
                                    'type' => 'outline',
                                    'content' => $payment->status
                                    ])
                                </x-table.cell>

                                <x-table.cell>
                                    @include('shared.action-simple', [
                                    'routeEdit' => route('#payment.edit', ['id' => $payment->id]),
                                    'routeShow' => route('#payment.show', ['id' => $payment->id]),
                                    'routeDelete' => route('#payment.destroy', ['id' => $payment->id]),
                                    ])
                                </x-table.cell>
                            </x-table.row>
                            @endforeach
                        </x-table.body>
                    </x-table.container>
                </div>

                {{ $payments->links() }}
            </div>
        </div>
    </div>
</x-admin-layout>