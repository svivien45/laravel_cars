<div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
</div>
<?php $__env->startSection('content'); ?>
    <div>
        <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
        <?php echo $__env->make('error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('makers.update', $maker->id)); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <fieldset>
                <label for="name">Megnevezés</label>
                <input type="text" id="name" name="name" required value="<?php echo e(old('name', $maker->name)); ?>">
            </fieldset>
            <button type="submit">Ment</button>
            <a href="<?php echo e(route('makers.index')); ?>">Mégse</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_cars\resources\views/makers/edit.blade.php ENDPATH**/ ?>