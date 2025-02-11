<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> Tableau de bord <?php $__env->endSlot(); ?>

    <div class="container py-12">
        <div class="container-center">
            <div class="mb-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="container-card">
                    <h2 class="text-base font-medium text-gray-900 dark:text-gray-100">
                        <?php echo e($countPosts > 1 ? "Articles" : "Article"); ?>

                    </h2>
                    <p class="mt-1 text-sm text-description">
                        <?php echo e($countPosts); ?>

                    </p>
                </div>
                <div class="container-card">
                    <h2 class="text-base font-medium text-gray-900 dark:text-gray-100">
                        Support de cours
                    </h2>
                    <p class="mt-1 text-sm text-description">
                        <?php echo e($countCourseDocuments); ?>

                    </p>
                </div>
                <div class="container-card">
                    <h2 class="text-base font-medium text-gray-900 dark:text-gray-100">
                        <?php echo e($countPayments > 1 ? "Paiements" : "Paiement"); ?>

                    </h2>
                    <p class="mt-1 text-sm text-description">
                        <?php echo e($countPayments); ?>

                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div>
                </div>

                <div>
                </div>

                <div>
                    <div class="container-card">
                        <h2 class="text-base font-medium text-gray-900 dark:text-gray-100 mb-3">
                            Notification
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?><?php /**PATH F:\laravel-app\syllaba-app\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>