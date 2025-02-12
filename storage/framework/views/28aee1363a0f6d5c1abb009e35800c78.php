<div class="w-full shadow-sm border rounded-md">
    <div class="p-3 space-y-3">
        <h2 class="text-base font-semibold  text-gray-600 dark:text-gray-300">
            <?php echo e(Str::limit($courseDocument->title, 60)); ?>

        </h2>
        <p class="text-description mb-3">
            <?php echo e(Str::limit($courseDocument->description, 150)); ?>

        </p>

        <div class="flex justify-between gap-2 items-center">
            <?php echo $__env->make('shared.badge', [
            'content' => formatAmount($courseDocument->price) . "$"
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php echo $__env->make('shared.badge', [
            'type' => 'outline',
            'content' => "Tome : {$courseDocument->tomes->count()}"
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        <p class="text-description">
            Cours : <?php echo e($courseDocument->course->name); ?>

        </p>
        <p class="text-description">
            Année académique : <?php echo e($courseDocument->yearAcademic->start); ?>-<?php echo e($courseDocument->yearAcademic->end); ?>

        </p>
        <div class="flex items-center gap-3 mb-4">
            <?php if (isset($component)) { $__componentOriginalb9c23ec395060d8f12001cb6b3fc9e01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9c23ec395060d8f12001cb6b3fc9e01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.outline-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('outline-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5z" />
                </svg>
                <span>Ajouter</span>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9c23ec395060d8f12001cb6b3fc9e01)): ?>
<?php $attributes = $__attributesOriginalb9c23ec395060d8f12001cb6b3fc9e01; ?>
<?php unset($__attributesOriginalb9c23ec395060d8f12001cb6b3fc9e01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9c23ec395060d8f12001cb6b3fc9e01)): ?>
<?php $component = $__componentOriginalb9c23ec395060d8f12001cb6b3fc9e01; ?>
<?php unset($__componentOriginalb9c23ec395060d8f12001cb6b3fc9e01); ?>
<?php endif; ?>

            <?php if($courseDocument->id % 2 === 0): ?>
            <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['isLink' => true,'href' => route('course-document.index', ['id' => $courseDocument->id, 'slug' => Str::slug($courseDocument->title)])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isLink' => true,'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('course-document.index', ['id' => $courseDocument->id, 'slug' => Str::slug($courseDocument->title)]))]); ?>
                En savoir plus
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $attributes = $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af)): ?>
<?php $component = $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af; ?>
<?php unset($__componentOriginal3b0e04e43cf890250cc4d85cff4d94af); ?>
<?php endif; ?>
            <?php else: ?>
            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['isLink' => true,'href' => route('course-document.index', ['id' => $courseDocument->id, 'slug' => Str::slug($courseDocument->title)])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isLink' => true,'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('course-document.index', ['id' => $courseDocument->id, 'slug' => Str::slug($courseDocument->title)]))]); ?>
                En savoir plus
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
            <?php endif; ?>

        </div>

    </div>
</div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/course-document/_card.blade.php ENDPATH**/ ?>