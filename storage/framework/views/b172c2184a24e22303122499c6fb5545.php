<?php if (isset($component)) { $__componentOriginal7442783a15dff2b0d32f2947a462c2e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7442783a15dff2b0d32f2947a462c2e2 = $attributes; } ?>
<?php $component = App\View\Components\BaseLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\BaseLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['backRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('welcome'))]); ?>
     <?php $__env->slot('header', null, []); ?> Service de NewsLetter <?php $__env->endSlot(); ?>

    <div class="container py-12">
        <div class="container-center">

            <div class="container-card">
                <?php if($newLetter->unsubscribe_at !== null): ?>
                <h2 class="mb-3 text-xl text-gray-700 dark:text-gray-400 font-semibold">
                    Vous n'êtes pas inscrit(e) au service de news-letter
                </h2>

                <p class="text-description">
                    Déscrist(e) le <?php echo e($newLetter->unsubscribe_at); ?>

                </p>
                <?php else: ?>
                <h2 class="mb-3 text-xl text-gray-700 dark:text-gray-400 font-semibold">
                    Vous êtes inscrit(e) au service de news-letter
                </h2>

                <p class="text-description">
                    Dernière modification le <?php echo e($newLetter->updated_at->format('d/m/Y à H:i:s')); ?>

                </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7442783a15dff2b0d32f2947a462c2e2)): ?>
<?php $attributes = $__attributesOriginal7442783a15dff2b0d32f2947a462c2e2; ?>
<?php unset($__attributesOriginal7442783a15dff2b0d32f2947a462c2e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7442783a15dff2b0d32f2947a462c2e2)): ?>
<?php $component = $__componentOriginal7442783a15dff2b0d32f2947a462c2e2; ?>
<?php unset($__componentOriginal7442783a15dff2b0d32f2947a462c2e2); ?>
<?php endif; ?><?php /**PATH F:\laravel-app\syllaba-app\resources\views/news-letter/index.blade.php ENDPATH**/ ?>