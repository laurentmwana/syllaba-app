@props(['disabled' => false, 'value' => ""])

<textarea @disabled($disabled) {{ $attributes->merge(['class' => "flex min-h-[100px] w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:border-gray-200 focus-visible:dark:border-gray-500 focus-visible:ring-offset-2 focus-visible:ring-offset-background"]) }}>{{ $value }}</textarea>


