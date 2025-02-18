<x-base-layout>
    <x-slot name="header">
        <x-slot name="header">Mon profil</x-slot>

        <div class="container py-12">
            <div class="container-center space-y-8">
                <div class="p-4 sm:p-8 bg-card border shadow-sm rounded-md">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-card border shadow-sm rounded-md">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-card border shadow-sm rounded-md">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
</x-base-layout>