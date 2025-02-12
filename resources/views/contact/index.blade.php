<x-base-layout :backRoute="route('welcome')">
    <x-slot name="header">Nous contacter</x-slot>

    <div class="container py-12">
        <div class="container-center">
            @if (session('message'))
            <div class="mb-3">
                @include('shared.alert', [
                'message' => session('message')
                ])
            </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                <div>
                    @include('contact._info')
                </div>
                <div class="col-span-2">
                    <div class="container-card">
                        @include('contact._form', ['contact' => $contact])
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-base-layout>