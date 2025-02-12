<div class="w-full shadow-sm border rounded-md">
    <div>
        <img src="<?php echo e(getGenerateUrlToStorage($post->image)); ?>" alt="" class="block w-full">
    </div>
    <div class="p-3 space-y-3">
        <h2 class="text-base font-semibold  text-gray-600 dark:text-gray-300">
            <?php echo e(Str::limit($post->title, 60)); ?>

        </h2>
        <p class="text-description">
            <?php echo e(Str::limit($post->description, 100)); ?>

        </p>

        <div class="flex items-center justify-between gap-3">

            <div class="flex items-center gap-3">
                <a href="<?php echo e(route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)])); ?>#author">

                </a>

                <a href="<?php echo e(route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)])); ?>#author">

                </a>
            </div>

            <div>
                <a class="text-description text-[11px] " href="<?php echo e(route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)])); ?>#author">
                    Auteur : <span class="hover:underline"><?php echo e(Str::limit($post->user->name, 30)); ?></span>
                </a>
            </div>
        </div>

        <?php if($post->id % 2 === 0): ?>
        <?php if (isset($component)) { $__componentOriginal3b0e04e43cf890250cc4d85cff4d94af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b0e04e43cf890250cc4d85cff4d94af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.secondary-button','data' => ['isLink' => true,'href' => route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isLink' => true,'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)]))]); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['isLink' => true,'href' => route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)])]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isLink' => true,'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('post.show', ['id' => $post->id, 'slug' => Str::slug($post->title)]))]); ?>
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
</div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/post/_card.blade.php ENDPATH**/ ?>