<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['backRoute' => null]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['backRoute' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if(null !== $backRoute): ?>
<div class="flex items-center gap-2 justify-start mb-3">
    <a href="<?php echo e($backRoute); ?>" class="inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium transition-colors rounded-md p-2 text-xs border border-indigo-400">
        Retour
    </a>
</div>
<?php endif; ?><?php /**PATH F:\laravel-app\syllaba-app\resources\views/shared/back-route.blade.php ENDPATH**/ ?>