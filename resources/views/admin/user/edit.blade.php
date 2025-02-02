<x-admin-layout :backRoute="route('#user.index')">
    <x-slot name="header">Editer l'utilisateur #{{ $user->id }}</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour editer un utilisateur
                </p>
                @include('admin.user._form', [
                    'user' => $user,
                    'students' => $students
                ])
            </div>
        </div>
    </div>
</x-admin-layout>
