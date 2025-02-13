<?php if (isset($component)) { $__componentOriginal7442783a15dff2b0d32f2947a462c2e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7442783a15dff2b0d32f2947a462c2e2 = $attributes; } ?>
<?php $component = App\View\Components\BaseLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('base-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\BaseLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> Les syllabus <?php $__env->endSlot(); ?>

    <div class="container py-12">
        <div class="container-center">

            <?php echo $__env->make('shared.search-with-action', [
            'countResult' => 12,
            'routeIndex' => route('course-document.index')
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="grid lg:grid-cols-4 gap-3 items-start my-5">
                <div class="container-card">
                    <h2 class="mb-3">
                        Filtres
                    </h2>

                    <?php echo $__env->make('course-document._filter', [
                        'courses' => $courses,
                        'years' => $years,
                        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="lg:col-span-3">
                    <div class="grid  grid-cols-1 lg:grid-cols-2 gap-4">
                        <?php $__currentLoopData = $courseDocuments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseDocument): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('course-document._card', ['courseDocument' => $courseDocument], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <?php echo e($courseDocuments->links()); ?>


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
<?php endif; ?><?php /**PATH F:\laravel-app\syllaba-app\resources\views/course-document/index.blade.php ENDPATH**/ ?>