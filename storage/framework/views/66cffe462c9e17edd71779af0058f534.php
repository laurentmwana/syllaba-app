<div class="container-center">
    <div class="mt-16">

        <?php echo $__env->make('shared.section-title', [
        'title' => 'Dernièrs articles', 'align' => 'center'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($posts->count() > 0): ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

        </div>
        <?php else: ?>

        <?php echo $__env->make('shared.alert', ['message' => "🌟 Les formations ne sont pas disponibles 🙏"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php endif; ?>

    </div>
</div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/welcome/post.blade.php ENDPATH**/ ?>