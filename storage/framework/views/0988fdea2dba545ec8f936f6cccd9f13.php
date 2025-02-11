<?php $__env->startSection('content'); ?>
<h1>Karosszériák</h1>
<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <?php echo $__env->make('success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <a href="<?php echo e(route('bodies.create')); ?>" title="Új">Új hozzáadása</a>
	<?php $__currentLoopData = $bodies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $body): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="row <?php echo e($loop->iteration % 2 == 0 ? 'even' : 'odd'); ?>">
			<div class="col id"><?php echo e($body->id); ?></div>
			<div class="col"><?php echo e($body->name); ?></div>
			<div class="right">
				<div class="col"><a href="<?php echo e(route('bodies.show', $body->id)); ?>"><button><i class="fa fa-binoculars" title="Mutat"></i></button></a></div>
				<!-- Bejelentkezett felhasználó ellenőrzése, csak ha a breeze csomagot telepítettük -->
				<?php if(auth()->check()): ?>
					<div class="col"><a href="<?php echo e(route('bodies.edit', $body->id)); ?>"><button><i class="fa fa-edit edit" title="Módosít"></i></button></a></div>
					<div class="col">
						<form action="<?php echo e(route('bodies.destroy', $body->id)); ?>" method="POST">
							<?php echo csrf_field(); ?>
							<?php echo method_field('DELETE'); ?>
							<button type="submit" name="btn-del-fuel"><i class="fa fa-trash-can trash" title="Töröl"></i></button>
						</form>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel_cars\resources\views/bodies/index.blade.php ENDPATH**/ ?>