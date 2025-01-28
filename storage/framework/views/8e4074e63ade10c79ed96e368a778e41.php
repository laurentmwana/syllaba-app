
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'subtitle' => null,
    'align' => 'left',
    'size' => 'sm',
    'separator' => true,
    'title' => null,
    'class' => ''
]));

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

foreach (array_filter(([
    'subtitle' => null,
    'align' => 'left',
    'size' => 'sm',
    'separator' => true,
    'title' => null,
    'class' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
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
?>

<div class="mb-6 <?php echo e($alignmentClasses); ?> <?php echo e($class); ?>">
    <h2 class="font-bold tracking-tight text-gray-800 dark:text-gray-200 <?php echo e($sizeClasses); ?>">
        <?php echo e($title ?? $slot); ?>

    </h2>

    <?php if($subtitle): ?>
        <p class="mt-2 text-muted-foreground text-center mx-auto max-w-2xl">
            <?php echo e($subtitle); ?>

        </p>
    <?php endif; ?>

    <?php if($separator): ?>
        <div class="my-4 h-[1px] w-full bg-gray-300 dark:bg-gray-600 <?php echo e($separatorClasses); ?>"></div>
    <?php endif; ?>
</div>
<?php /**PATH F:\laravel-app\syllaba-app\resources\views/shared/section-title.blade.php ENDPATH**/ ?>