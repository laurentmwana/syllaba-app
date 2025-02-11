<x-admin-layout :backRoute="route('#tome.index')">
    <x-slot name="header">Editer le tome #{{ $tome->id }}</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="container-card max-w-xl">
                <p class="text-description mb-3">
                    Remplissez ces champs pour editer un tome
                </p>
                @include('admin.tome._form', [
                'tome' => $tome,
                'courseDocuments' => $courseDocuments
                ])
            </div>
        </div>
    </div>
</x-admin-layout>