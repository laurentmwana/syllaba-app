<x-admin-layout>
    <x-slot name="header">Tableau de bord</x-slot>

    <div class="container py-12">
        <div class="container-center">
            <div class="mb-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="container-card">
                    <h2 class="text-base font-medium text-gray-900 dark:text-gray-100">
                        {{$countPosts > 1 ? "Articles" : "Article"}}
                    </h2>
                    <p class="mt-1 text-sm text-description">
                        {{$countPosts}}
                    </p>
                </div>
                <div class="container-card">
                    <h2 class="text-base font-medium text-gray-900 dark:text-gray-100">
                        Support de cours
                    </h2>
                    <p class="mt-1 text-sm text-description">
                        {{$countCourseDocuments}}
                    </p>
                </div>
                <div class="container-card">
                    <h2 class="text-base font-medium text-gray-900 dark:text-gray-100">
                        {{$countPayments > 1 ? "Paiements" : "Paiement"}}
                    </h2>
                    <p class="mt-1 text-sm text-description">
                        {{$countPayments}}
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                </div>

                <div>
                </div>

                <div>
                    <div class="container-card">
                        <h2 class="text-base font-medium text-gray-900 dark:text-gray-100 mb-3">
                            Notification
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>