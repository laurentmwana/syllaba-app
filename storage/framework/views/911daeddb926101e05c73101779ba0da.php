<div class="container py-16">
    <div class="container-center">

        <?php echo $__env->make('shared.section-title', [
        'title' => 'Dernièrs documents',
        'size' => "xl",
        'align' => 'center',
        "separator" => false,
        "subtitle" => "Voici nos derniers articles publiés recensemment"
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($courseDocuments->count() > 0): ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php $__currentLoopData = $courseDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseDocument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('course-document._card', ['courseDocument' => $courseDocument], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>

        <div class="text-center">
            <?php echo $__env->make('shared.alert', ['message' => "🌟 Les documents ne sont pas disponibles 🙏"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/welcome/_document.blade.php ENDPATH**/ ?>