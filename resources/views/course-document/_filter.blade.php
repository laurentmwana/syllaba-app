<form class="space-y-3" action="" method="get">
    <div>
        <x-input-label for="courses">Cours</x-input-label>
        <x-select.single class="block w-full" :options="$courses" :value="old('courses')" id="courses" name="courses" />
    </div>

    <div>
        <x-input-label for="years">Année académique</x-input-label>
        <x-select.single class="block w-full" :options="$years" :value="old('years')" id="years" name="years" />
    </div>


    <x-primary-button class="w-full">
        <div class="flex items-center gap-3 justify-center w-full">
            <i class="bi bi-filter"></i>
            <span>
                Filtrer
            </span>
        </div>
    </x-primary-button>
</form>