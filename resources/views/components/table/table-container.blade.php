@props(['class' => ''])

<div class="relative w-full overflow-auto">
    <table {{ $attributes->merge(['class' => 'custom-response-table w-full caption-bottom text-sm ' . $class]) }}>
        {{ $slot }}
    </table>
</div>
