@if (null !== $event)
<div class="bg-gradient-to-br from-blue-100 to-indigo-100  flex items-center justify-center px-4 py-10 flex-col gap-5">
    <div class="container">

        <div class="bg-card border border-indigo-200 mb-4 rounded-2xl shadow-xl overflow-hidden max-w-4xl w-full mx-auto">
            <div class="md:flex">
                <div id="subscribeSection" class="md:w-1/2 p-8 fade-in">
                    <div class="mb-2">
                        @include('shared.badge', [
                        'content' => $event->type
                        ])
                    </div>
                    <h2 class="text-3xl font-bold text-indigo-800 mb-4">
                        {{ Str::limit($event->title, 120) }}
                    </h2>
                    <p class="text-gray-600 mb-6">
                        {{ Str::limit($event->description, 200) }}
                    </p>

                    <a href=""
                        class="w-full bg-indigo-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-indigo-700 transition duration-300 transform hover:scale-105">
                        En savoir plus
                    </a>
                    <p class="text-description mt-6">
                        publié le {{ $event->created_at->format('d/m/Y') }}
                    </p>
                </div>

                <img class="w-full h-full md:w-1/2 bg-cover hidden md:block" src="{{getGenerateUrlToStorage($event->image)}}" alt="event image">
            </div>
        </div>

        <div class="mx-auto max-w-4xl">
            <div class="flex items-center justify-center gap-4">
                <div class="p-2 lg:p-3 w-[90px] h-[70px] border  shadow-sm shadow-indigo-300 rounded-md bg-white dark:bg-gray-300 text-center">
                    <h2 class="text-xl text-gray-600 dark:text-gray-300 font-semibold">
                        12
                    </h2>
                    <p class="text-xs text-muted-foregroun">
                        Jours
                    </p>
                </div>

                <div class="p-2 lg:p-3 w-[90px] h-[70px] border  shadow-sm shadow-indigo-300 rounded-md bg-white dark:bg-gray-300 text-center">
                    <h2 class="text-xl text-gray-600 dark:text-gray-300 font-semibold">
                        12
                    </h2>
                    <p class="text-xs text-muted-foregroun">
                        Heures
                    </p>
                </div>


                <div class="p-2 lg:p-3 w-[90px] h-[70px] border  shadow-sm shadow-indigo-300 rounded-md bg-white dark:bg-gray-300 text-center ">
                    <h2 class="text-xl text-gray-600 dark:text-gray-300 font-semibold">
                        40
                    </h2>
                    <p class="text-xs text-muted-foregroun">
                        Minutes
                    </p>
                </div>


                <div class="p-2 lg:p-3 w-[90px] h-[70px] border  shadow-sm shadow-indigo-300 rounded-md bg-white dark:bg-gray-300 text-center">
                    <h2 class="text-xl text-gray-600 dark:text-gray-300 font-semibold">
                        50
                    </h2>
                    <p class="text-xs text-muted-foregroun">
                        Secondes
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


@endif