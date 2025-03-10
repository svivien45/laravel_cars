<?php $__env->startSection('content'); ?>
<h1>Karosszériák</h1>
<div>
    <a href="<?php echo e(route('bodies.create')); ?>">
        <button><i class="fa fa-new" title="Új"></i> Új</button>
    </a>
</div>

<table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
        <tr>
            <th style="border: 1px solid black;">ID</th>
            <th style="border: 1px solid black;">Név</th>
            <th style="border: 1px solid black;">Műveletek</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $bodies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $body): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="<?php echo e($loop->iteration % 2 == 0 ? 'even' : 'odd'); ?>">
                <td style="border: 1px solid black;"><?php echo e($body->id); ?></td>
                <td style="border: 1px solid black;"><?php echo e($body->name); ?></td>
                <td style="display: flex; gap: 10px; justify-content: center; border: 1px solid black;">
                    <a href="<?php echo e(route('bodies.show', $body->id)); ?>">
                        <button><i class="fa fa-binoculars" title="Mutat"></i> Mutat</button>
                    </a>
                    <a href="<?php echo e(route('bodies.edit', $body->id)); ?>">
                        <button><i class="fa fa-edit edit" title="Módosít"></i> Módosít</button>
                    </a>
                    <form action="<?php echo e(route('bodies.destroy', $body->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" name="btn-del-fuel">
                            <i class="fa fa-trash-can trash" title="Töröl"></i> Töröl
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_cars\resources\views/bodies/index.blade.php ENDPATH**/ ?>