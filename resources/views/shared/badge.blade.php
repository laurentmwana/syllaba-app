@props(['type' => 'default', 'content'])

@php
$types = [
'default' => "border-transparent bg-indigo-400 text-primary-foreground shadow hover:bg-primary/80",
'secondary' =>
"border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80",
'destructive' =>
"border-transparent bg-destructive text-destructive-foreground shadow hover:bg-destructive/80",
'outline' => "text-foreground",
'success' =>
"bg-green-100 text-green-800 dark:text-green-400 border border-green-400",
'warning' =>
"bg-yellow-100 text-yellow-800 dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300",
][$type] ?? "border-transparent bg-primary text-primary-foreground shadow hover:bg-primary/80";
@endphp


<div class="inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 {{ $types }}">
    {{ $content }}
</div>