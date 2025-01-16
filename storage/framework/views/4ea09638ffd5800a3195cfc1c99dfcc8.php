<header class="header_section">

<style>
html {
    scroll-behavior: smooth;
}
</style>

            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img width="250" src="/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="<?php echo e(url('products')); ?>">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="https://wa.me/6285823559811">Contact</a>
                        </li>
                        <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('show_cart')); ?>">
        <i class="fas fa-shopping-cart"></i> <!-- Ikon keranjang dari Font Awesome -->
    </a>
</li>

                        
                        <?php if(Route::has('login')): ?>

                        <?php if(auth()->guard()->check()): ?>

                        <?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

                        
                        <?php else: ?>

                        <li class="nav-item">
                           <a class="btn btn-primary" style="border-radius: 60px" id="logincss" href="<?php echo e(route('login')); ?>">Login</a>
                        </li>

                        <li class="nav-item">
                           <a class="btn btn-success" style="border-radius: 60px"  href="<?php echo e(route('register')); ?>">Register</a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section --><?php /**PATH C:\xampp\htdocs\toko_online\resources\views/home/header.blade.php ENDPATH**/ ?>