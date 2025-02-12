<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type' => 'default', 'content']));

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

foreach (array_filter((['type' => 'default', 'content']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php
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
?>


<div class="inline-flex items-center rounded-md border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 <?php echo e($types); ?>">
    <?php echo e($content); ?>

</div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/shared/badge.blade.php ENDPATH**/ ?>