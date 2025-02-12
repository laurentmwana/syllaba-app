<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Lopango')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <link rel="shortcut icon" href="/images/logo.svg" type="image/x-icon">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">

        <?php echo $__env->make('shared.navigation-base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page Heading -->
        <?php if(isset($header)): ?>
        <div class="container mt-11">
            <div class="container-center">
                <?php echo $__env->make('shared.section-title', [
                'title' => $header
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->make('shared.back-route', [
                'backRoute' => isset($backRoute) ? $backRoute : null
                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Page Content -->
        <main>
            <?php echo e($slot); ?>

        </main>


        <div class="container pt-[100px]">
            <footer class="py-8" id="footer">
                <div class="container-center">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 container-center">
                        <div>
                            <h2 class="text-xl font-semibold mb-4 text-gray-700 dark:text-gray-100">
                                Syllaba
                            </h2>
                            <p class="mb-4 text-description">
                                Syllaba est une entreprise
                                spécialisée en business intelligence,
                                offrant aux entrepreneurs et à ceux désirant
                                le devenir l’opportunité de concrétiser
                                leurs projets sur le plan socio-économique
                                grâce à son expertise en business
                                intelligence.
                            </p>

                            <?php echo $__env->make('shared.network-social', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="flex md:justify-end">
                            <div>
                                <h2 class="text-xl font-semibold mb-4">
                                    Nous contacter
                                </h2>
                                <ul class="space-y-2">
                                    <li>
                                        <Link
                                            href=""
                                            class="hover:underline flex gap-x-2">
                                        <i class="bi bi-envelope text-blue-500 hover:text-blue-600"></i>
                                        <span class="text-muted-foreground">
                                            Par e-mail
                                        </span>
                                        </Link>
                                    </li>
                                    <li>
                                        <a
                                            href="https://api.whatsapp.com/send/?phone=243829760292&text&type=phone_number&app_absent=0"
                                            class="hover:underline flex gap-x-2">
                                            <i class="bi bi-whatsapp text-green-500 hover:text-green-600"></i>
                                            <span class="text-muted-foreground">
                                                Par Whatsapp
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <Link
                                            href=""
                                            class="hover:underline flex gap-x-2">
                                        <i class="bi bi-lock text-red-500 hover:text-red-600"></i>
                                        <span class="text-muted-foreground">
                                            Politique de confidentialité
                                        </span>
                                        </Link>
                                    </li>
                                </ul>
                                <div class="mt-3 text-start text-description pl-2">
                                    <span>développé par </span>
                                    <a
                                        target="_blank"
                                        href="https://github.com/laurentmwana"
                                        class="text-slate-900 dark:text-gray-300 underline">
                                        Labeya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="mt-8 text-center text-sm text-gray-600">
                    &copy; Syllaba <?php echo e(date('Y')); ?>

                </p>
            </footer>
        </div>


        <div id="preloader" class="fixed top-0 ring-0 bottom-0 left-0 z-50 flex w-full items-center  justify-center bg-gray-50 gap-6">
            <div class="w-3 h-3 bg-indigo-300 broder border-indigo-400 shadow-sm shadow-indigo-700 rounded animate-spin">
            </div>
        </div>



    </div>
</body>

</html><?php /**PATH F:\laravel-app\syllaba-app\resources\views/layouts/base.blade.php ENDPATH**/ ?>