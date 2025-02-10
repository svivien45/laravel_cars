
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autók</title>
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/jquery-3.7.1.js')); ?>"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('fontawesome/css/all.css')); ?>" >

    <link rel="shortcut icon" href="<?php echo e(asset('favicon.png')); ?>" type="image/x-icon">
</head>

<body>
    <header>
            <nav>
                <ul>
                <li><a href="<?php echo e(route('makers.index')); ?>">Gyártók</a></li>
                    <!-- Login: csak ha sikerült feltenni a breeze csomagot -->

                </ul>
            </nav>
         </header>
    <main>
	<!-- ide fogja behúzni a view-kat -->
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer>
        <p>&copy; 2024 Savanyú Vivien</p>
    </footer>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\laravel_cars\resources\views/layout.blade.php ENDPATH**/ ?>