<div class="container py-16">
    <div class="container-center">
        <?php echo $__env->make('shared.section-title', [
        'title' => 'Questions fréquemment posées',
        'size' => "xl",
        'align' => 'center',
        "separator" => false,
        "subtitle" => "Voici nos derniers articles publiés recensemment"
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($quizzes->count() > 0): ?>

        <div class="mx-auto max-w-3xl" id="accordion">
            <div class="flex flex-col gap-4">
                <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div id="accordion-item" class="border shadow-sm rounded-md p-3">
                    <h2 class="mb-3 text-base font-medium text-gray-700 dark:text-gray-200">
                        <?php echo e($quiz->question); ?>

                    </h2>
                    <p class="text-description">
                        <?php echo e($quiz->answer); ?>

                    </p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php else: ?>

        <?php echo $__env->make('shared.alert', ['message' => "🌟 Les quiz ne sont pas disponibles 🙏"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>
    </div>
</div>
</div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/welcome/_quiz.blade.php ENDPATH**/ ?>