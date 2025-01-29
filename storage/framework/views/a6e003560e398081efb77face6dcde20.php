<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['disabled' => false, 'value' => "", 'options' => [], 'placeholder' => 'Selectionnez une option', 'name' => '']));

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

foreach (array_filter((['disabled' => false, 'value' => "", 'options' => [], 'placeholder' => 'Selectionnez une option', 'name' => '']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<select
    name="<?php echo e($name); ?>"
    <?php if($disabled): echo 'disabled'; endif; ?> <?php echo e($attributes->merge(['class' => 'flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground disabled:cursor-not-allowed disabled:opacity-50 md:text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:border-gray-200 focus-visible:dark:border-gray-500 focus-visible:ring-offset-2 focus-visible:ring-offset-backgrounde'])); ?>>

    <option value="">
        <?php echo e($placeholder); ?>

    </option>


    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!empty($value)): ?>
        <option value="<?php echo e($option->id); ?>" <?php if($option->id == $value): echo 'selected'; endif; ?>>
            <?php echo e(Str::limit($option->name, 50)); ?>

        </option>
        <?php elseif($value instanceof \Illuminate\Database\Eloquent\Collection): ?>
        <option value="<?php echo e($option->id); ?>" <?php if($value->contains($option->id)): echo 'selected'; endif; ?>>
            <?php echo e(Str::limit($option->name, 50)); ?>

        </option>
        <?php else: ?>
        <option value="<?php echo e($option->id); ?>">
            <?php echo e(Str::limit($option->name, 50)); ?>

        </option>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH F:\laravel-app\syllaba-app\resources\views/components/select/single.blade.php ENDPATH**/ ?>