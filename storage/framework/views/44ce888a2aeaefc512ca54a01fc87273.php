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
     <?php $__env->slot('header', null, []); ?> Nous contacter <?php $__env->endSlot(); ?>

    <div class="container py-12">
        <div class="container-center">
            <?php if(session('message')): ?>
            <div class="mb-3">
                <?php echo $__env->make('shared.alert', [
                'message' => session('message')
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                <div>
                    <?php echo $__env->make('contact._info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="col-span-2">
                    <div class="container-card">
                        <?php echo $__env->make('contact._form', ['contact' => $contact], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
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
<?php endif; ?><?php /**PATH F:\laravel-app\syllaba-app\resources\views/contact/index.blade.php ENDPATH**/ ?>