<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(__('Laravel')); ?></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>"><?php echo e(__('Home')); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        <a href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs"><?php echo e(__('Documentation')); ?></a>
                    <a href="https://laracasts.com"><?php echo e(__('Laracasts')); ?></a>
                    <a href="https://laravel-news.com"><?php echo e(__('News')); ?></a>
                    <a href="https://forge.laravel.com"><?php echo e(__('Forge')); ?></a>
                    <a href="https://github.com/laravel/laravel"><?php echo e(__('GitHub')); ?></a>
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\laragon\www\magic\magic.exportica.in\resources\views\welcome.blade.php ENDPATH**/ ?>