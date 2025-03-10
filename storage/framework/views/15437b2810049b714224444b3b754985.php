<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
<?php $__env->startSection('content'); ?>
    <div>
        <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
        <?php echo $__env->make('error', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <form action="<?php echo e(route('bodies.update', $body->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <fieldset>
                <label for="name">Megnevezés</label>
                <input type="text" id="name" name="name" required value="<?php echo e(old('name', $body->name)); ?>">
            </fieldset>
            <button type="submit">Ment</button>
            <a href="<?php echo e(route('bodies.index')); ?>">Mégse</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_cars\resources\views/bodies/edit.blade.php ENDPATH**/ ?>