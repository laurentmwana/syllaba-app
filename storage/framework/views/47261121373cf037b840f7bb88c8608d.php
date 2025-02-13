<form action="<?php echo e(route('card.add', ['courseDocumentId' => $courseDocument->id])); ?>" method="post" onsubmit="return confirm('Voulez-vous vraimemtn ajouter ce support de cours dans le panier ? ')">
    <?php echo csrf_field(); ?>
    <?php if (isset($component)) { $__componentOriginalb9c23ec395060d8f12001cb6b3fc9e01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9c23ec395060d8f12001cb6b3fc9e01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.outline-button','data' => ['title' => 'ajouter ce support de cours dans le panier','type' => 'submit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('outline-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'ajouter ce support de cours dans le panier','type' => 'submit']); ?>
        Ajouter
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
</form><?php /**PATH F:\laravel-app\syllaba-app\resources\views/course-document/_card-add.blade.php ENDPATH**/ ?>