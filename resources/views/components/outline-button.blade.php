@props(['isLink' => false, 'href' => ''])

@if ($isLink)
<a {{ $attributes->merge(['href' => $href, 'class' => 'inline-flex items-center px-4 py-2 gap-1 bg-gray-700 text-gray-50 dark:text-gray-100 border border-gray-600 rounded-md font-medium text-[10px]  uppercase tracking-widest shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
@else
<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 gap-1 py-2 bg-gray-700 text-gray-50 dark:text-gray-100 border border-gray-600 rounded-md font-medium text-[10px]  uppercase tracking-widest shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
@endif