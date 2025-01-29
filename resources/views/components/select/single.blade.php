@props(['disabled' => false, 'value' => "", 'options' => [], 'placeholder' => 'Selectionnez une option', 'name' => ''])

<select
    name="{{ $name }}"
    @disabled($disabled) {{ $attributes->merge(['class' => 'flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:border-gray-200 focus-visible:dark:border-gray-500 focus-visible:ring-offset-2 focus-visible:ring-offset-backgrounde']) }}>

    <option value="">
        {{ $placeholder }}
    </option>


    @foreach ($options as $option)
        @if (!empty($value))
        <option value="{{ $option->id }}" @selected($option->id == $value)>
            {{ Str::limit($option->name, 50) }}
        </option>
        @elseif ($value instanceof \Illuminate\Database\Eloquent\Collection)
        <option value="{{ $option->id }}" @selected($value->contains($option->id))>
            {{ Str::limit($option->name, 50) }}
        </option>
        @else
        <option value="{{ $option->id }}">
            {{ Str::limit($option->name, 50) }}
        </option>
        @endif
    @endforeach
</select>
