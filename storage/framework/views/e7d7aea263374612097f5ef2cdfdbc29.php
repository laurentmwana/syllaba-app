<div>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a class="block w-full border-b px-1 py-3 text-sm text-muted-foreground hover:text-indigo-300" href="<?php echo e(route('post.index', mergeQueriesParams(['category' => $category->id]))); ?>">
        <?php echo e($category->name); ?>

    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/post/_category.blade.php ENDPATH**/ ?>