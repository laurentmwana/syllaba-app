@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-muted-foreground my-2']) }}>
    {{ $value ?? $slot }}
</label>
