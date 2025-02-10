<?php $__env->startSection('content'); ?>
<h1>Gyártók</h1>
<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <a href="<?php echo e(route('makers.create')); ?>"><button><i class="fa fa-new" title="Új"></i>Új</button></a>
</div>
<?php $__currentLoopData = $makers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row <?php echo e($loop->iteration % 2 == 0 ? 'even' : 'odd'); ?>">
        <div class="col id"><?php echo e($maker->id); ?></div>
        <div class="col"><?php echo e($maker->name); ?></div>
        <div class="right" style="display: flex; gap: 10px;">
            <div class="col">
                <a href="<?php echo e(route('makers.show', $maker->id)); ?>">
                    <button><i class="fa fa-binoculars" title="Mutat"></i>Mutat</button>
                </a>
            </div>
            <!-- Bejelentkezett felhasználó ellenőrzése, csak ha a breeze csomagot telepítettük -->
            <div class="col">
                <a href="<?php echo e(route('makers.edit', $maker->id)); ?>">
                    <button><i class="fa fa-edit edit" title="Módosít"></i>Módosít</button>
                </a>
            </div>
            <div class="col">
                <form action="<?php echo e(route('makers.destroy', $maker->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" name="btn-del-fuel"><i class="fa fa-trash-can trash" title="Töröl"></i>Töröl</button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_cars\resources\views/makers/index.blade.php ENDPATH**/ ?>