<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['backRoute' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('#post.index'))]); ?>
     <?php $__env->slot('header', null, []); ?> 
        En savoir plus sur l"article #<?php echo e($post->id); ?>

     <?php $__env->endSlot(); ?>

    <div class="container py-12">
        <div class="container-center">
           <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 items-start">
            <div class="container-card lg:col-span-1">
                <img class="block w-full" src="/storage/<?php echo e($post->image); ?>" alt="image de l'article #<?php echo e($post->id); ?>">
            </div>
            <div class="container-card lg:col-span-2">
                <h2 class="text-xl font-semibold mb-3">
                    <?php echo e($post->title); ?>

                </h2>

                <p class="text-description">
                    <?php echo e($post->content); ?>

                </p>
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
<?php endif; ?>
<?php /**PATH F:\laravel-app\syllaba-app\resources\views/admin/post/show.blade.php ENDPATH**/ ?>