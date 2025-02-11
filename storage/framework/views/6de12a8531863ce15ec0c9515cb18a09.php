<div class="container py-16">
    <div class="container-center">
        <?php echo $__env->make('shared.section-title', [
        'title' => 'Dernièrs articles',
        'size' => "xl",
        'align' => 'center',
        "separator" => false,
        "subtitle" => "Voici nos derniers articles publiés recensemment"
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($posts->count() > 0): ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('post._card', [
            'title' => $post->title,
            'description' => $post->content
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>

        <?php echo $__env->make('shared.alert', ['message' => "🌟 Les articles ne sont pas disponibles 🙏"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>
    </div>
</div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/welcome/_post.blade.php ENDPATH**/ ?>