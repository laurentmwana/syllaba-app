<x-admin-layout :backRoute="route('#tome.index')">
    <x-slot name="header">
        En savoir plus sur le tome #{{ $tome->id }}
    </x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 items-start">
                <div class="container-card lg:col-span-1">
                    <!--type document -->
                </div>
                <div class="container-card lg:col-span-2">
                    <h2 class="text-xl font-semibold mb-3">
                        {{ $tome->courseDocument->title }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>