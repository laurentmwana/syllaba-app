@props(['class' => ''])
<td {{ $attributes->merge(['class' => 'p-2 align-middle ' . $class]) }}>
    {{ $slot }}
</td>
