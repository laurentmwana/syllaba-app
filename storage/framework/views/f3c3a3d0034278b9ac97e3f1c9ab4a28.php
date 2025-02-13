<div class="container-card">
    <h2 class="mb-2 text-xl font-semibold text-gray-700 dark:text-gray-200">
        <?php echo e($card->courseDocument->title); ?>

    </h2>
    <div class="bg-gray-200 border shadow-sm inline-flex rounded-md p-3 font-semibold">
        <?php echo e(formatAmount($card->prices)); ?>$
    </div>
</div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/card/_card.blade.php ENDPATH**/ ?>