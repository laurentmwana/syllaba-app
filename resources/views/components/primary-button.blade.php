@props(['isLink' => false, 'href' => ''])

@if ($isLink)
<a {{ $attributes->merge(['href' => $href, 'class' => 'inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-medium text-[10px] text-white uppercase tracking-widest hover:bg-primary/90 focus:bg-primary/90 active:bg-primary/70 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
@else
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-primary border border-transparent rounded-md font-medium text-[10px] text-white uppercase tracking-widest hover:bg-primary/90 focus:bg-primary/90 active:bg-primary/70 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
@endif