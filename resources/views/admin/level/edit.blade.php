<x-admin-layout :backRoute="route('#option.index')">
    <x-slot name="header">Editer la promotion #{{ $level->id }}</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour editer une promotion
                </p>
                @include('admin.level._form', [
                    'level' => $level,
                    'options' => $options
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
