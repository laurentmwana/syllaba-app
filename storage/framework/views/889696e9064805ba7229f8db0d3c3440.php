<form class="space-y-3" action="" method="get">
    <div>
        <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'courses']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'courses']); ?>Cours <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal179c5e0c6f2a7fd668d13a6479179ee5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal179c5e0c6f2a7fd668d13a6479179ee5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select.single','data' => ['class' => 'block w-full','options' => $courses,'value' => old('courses'),'id' => 'courses','name' => 'courses']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select.single'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block w-full','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($courses),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('courses')),'id' => 'courses','name' => 'courses']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal179c5e0c6f2a7fd668d13a6479179ee5)): ?>
<?php $attributes = $__attributesOriginal179c5e0c6f2a7fd668d13a6479179ee5; ?>
<?php unset($__attributesOriginal179c5e0c6f2a7fd668d13a6479179ee5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal179c5e0c6f2a7fd668d13a6479179ee5)): ?>
<?php $component = $__componentOriginal179c5e0c6f2a7fd668d13a6479179ee5; ?>
<?php unset($__componentOriginal179c5e0c6f2a7fd668d13a6479179ee5); ?>
<?php endif; ?>
    </div>

    <div>
        <?php if (isset($component)) { $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-label','data' => ['for' => 'years']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => 'years']); ?>Année académique <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $attributes = $__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__attributesOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581)): ?>
<?php $component = $__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581; ?>
<?php unset($__componentOriginale3da9d84bb64e4bc2eeebaafabfb2581); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal179c5e0c6f2a7fd668d13a6479179ee5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal179c5e0c6f2a7fd668d13a6479179ee5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select.single','data' => ['class' => 'block w-full','options' => $years,'value' => old('years'),'id' => 'years','name' => 'years']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('select.single'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'block w-full','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($years),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('years')),'id' => 'years','name' => 'years']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal179c5e0c6f2a7fd668d13a6479179ee5)): ?>
<?php $attributes = $__attributesOriginal179c5e0c6f2a7fd668d13a6479179ee5; ?>
<?php unset($__attributesOriginal179c5e0c6f2a7fd668d13a6479179ee5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal179c5e0c6f2a7fd668d13a6479179ee5)): ?>
<?php $component = $__componentOriginal179c5e0c6f2a7fd668d13a6479179ee5; ?>
<?php unset($__componentOriginal179c5e0c6f2a7fd668d13a6479179ee5); ?>
<?php endif; ?>
    </div>


    <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-full']); ?>
        <div class="flex items-center gap-3 justify-center w-full">
            <i class="bi bi-filter"></i>
            <span>
                Filtrer
            </span>
        </div>
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
</form><?php /**PATH F:\laravel-app\syllaba-app\resources\views/course-document/_filter.blade.php ENDPATH**/ ?>