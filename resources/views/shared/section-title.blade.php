{{-- resources/views/components/shared/section-title.blade.php --}}
@props([
    'subtitle' => null,
    'align' => 'left',
    'size' => 'sm',
    'separator' => true,
    'title' => null,
    'class' => ''
])

@php
    $alignmentClasses = [
        'left' => 'text-left',
        'center' => 'text-center',
        'right' => 'text-right',
    ][$align] ?? 'text-center';

    $sizeClasses = [
        'sm' => 'text-xl md:text-xl',
        'md' => 'text-3xl md:text-3xl',
        'lg' => 'text-4xl md:text-4xl',
    ][$size] ?? 'text-3xl md:text-3xl';

    $separatorClasses = match ($align) {
        'center' => 'mx-auto',
        'right' => 'ml-auto',
        default => '',
    };
@endphp

<div class="mb-6 {{ $alignmentClasses }} {{ $class }}">
    <h2 class="font-bold tracking-tight text-gray-800 dark:text-gray-200 {{ $sizeClasses }}">
        {{ $title ?? $slot }}
    </h2>
    
    @if($subtitle)
        <p class="mt-2 text-muted-foreground text-center mx-auto max-w-2xl">
            {{ $subtitle }}
        </p>
    @endif

    @if($separator)
        <div class="my-4 h-[1px] w-full bg-gray-300 dark:bg-gray-600 {{ $separatorClasses }}"></div>
    @endif
</div>
