@props(['class' => ''])
<th {{ $attributes->merge(['class' => 'h-10 px-2 text-left align-middle font-medium text-muted-foreground ' . $class]) }}>
    {{ $slot }}
</th>
