@props(['message' => '', 'type' => 'outline'])

@php
$variants = [
"danger" => "border-destructive/50 text-destructive dark:border-destructive [&>svg]:text-destructive",
"outline" => "bg-background text-foreground"
][$type] ?? 'bg-background text-foreground';
@endphp

<div id="" class="relative w-full rounded-lg border px-4 py-3 text-sm [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg]:text-foreground [&>svg~*]:pl-7 {{ $variants }}">
    {{ $message }}
</div>