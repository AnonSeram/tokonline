<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">

      .center
      {
        margin: auto;
        width:50%;
        text-align: center;
        padding: 30px;
      }

      table,th,td
      {
        border: 1px solid grey;
      }

      .th_deg
      {
        font-size: 30px;
        padding: 5px;
        background: skyblue;
      }
      
      </style>
</head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <?php echo $__env->make('home.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="center">
        <table>
        <tr>
            <th class="th_deg">Product Title</th>
            <th class="th_deg">Product Quantity</th>
            <th class="th_deg">Price</th>
            <th class="th_deg">Image</th>
            <th class="th_deg">Action</th>


        </tr>
        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($cart->product_title); ?></td>
                <td><?php echo e($cart->quantity); ?></td>
                <td><?php echo e($cart->price); ?></td>
                <td><img class="img_deg" src="/product/<?php echo e($cart->image); ?>"></td>
                <td><?php echo e($cart->product_title); ?></td>

            </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
      </div>

      <?php echo $__env->make('home.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html><?php /**PATH C:\xampp\htdocs\toko_online\resources\views/home/showcart.blade.php ENDPATH**/ ?>