@props(['backRoute' => null])

@if (null !== $backRoute)
<div class="flex items-center gap-2 justify-start mb-3">
    <a href="{{$backRoute}}" class="inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium transition-colors rounded-md p-2 text-xs border">
        Back
    </a>
</div>
@endif
