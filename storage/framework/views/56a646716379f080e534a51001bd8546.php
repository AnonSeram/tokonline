<!DOCTYPE html>
<html lang="en">
  <head>
  <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <style type="text/css">
    /* Body Styling */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .font_size {
        text-align: center;
        font-size: 35px;
        font-weight: bold;
        padding-top: 20px;
        color: white;
    }

    .center {
        margin: auto;
        width: 90%;
        border: 1px solid #ddd;
        text-align: center;
        margin-top: 40px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .th_color {
        background-color: #2a6eb6;
        color: #fff;
        padding: 15px;
        font-size: 16px;
        text-align: center;
    }

    .th_deg {
        padding: 15px 20px;
        font-size: 14px;
    }

    td {
        padding: 10px 20px;
        font-size: 14px;
        border-bottom: 1px solid #ddd;
    }

    /* Hover effect for table rows */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    /* Styling for Image */
    .img_size {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
        transition: transform 0.2s ease;
    }

    .img_size:hover {
        transform: scale(1.1);
    }

    /* Button Styling */
    .btn {
        display: inline-block;
        padding: 8px 16px;
        font-size: 14px;
        border-radius: 5px;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-danger {
        background-color: #f44336;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #e53935;
    }

    .btn-success {
        background-color: #4CAF50;
        color: #fff;
    }

    .btn-success:hover {
        background-color: #388e3c;
    }

    /* Responsive adjustments */
    @media screen and (max-width: 768px) {
        .center {
            width: 100%;
            padding: 10px;
        }

        .font_size {
            font-size: 28px;
        }

        td, th {
            font-size: 12px;
        }

        .img_size {
            width: 80px;
            height: 80px;
        }
    }
</style>
  
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="main-panel">
          <div class="content-wrapper">

          
          <?php if(session()->has('message')): ?>

          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x<button>

            <?php echo e(session()->get('message')); ?>

        
        </div>
          <?php endif; ?>

          <h2 class="font_size">All Products</h2>


          <table class="center">

          <tr class="th_color">
            <th class="th_deg">Product Title</th>
            <th class="th_deg">Description</th>
            <th class="th_deg">Quantity</th>
            <th class="th_deg">Category</th>
            <th class="th_deg">Price</th>
            <th class="th_deg">Discount</th>
            <th class="th_deg">Product Image</th>
            <th class="th_deg">Delete</th>
            <th class="th_deg">Edit</th>
          </tr>

        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <tr>
            <td><?php echo e($product->title); ?></td>
            <td><?php echo e($product->description); ?></td>
            <td><?php echo e($product->quantity); ?></td>
            <td><?php echo e($product->category); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->discount_price); ?></td>
            <td>
                <img class="img_size" src="/product/<?php echo e($product->image); ?>">
            </td>

            <td>
                <a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete this Product?')" href="<?php echo e(url('delete_product',$product->id)); ?>">Delete</a>
            </td>

            <td>
                <a class="btn btn-success" href="<?php echo e(url('update_product',$product->id)); ?>">Edit</a>
            </td>
          </tr>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </table>
    <!-- container-scroller -->
    <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html><?php /**PATH C:\xampp\htdocs\toko_online\resources\views/admin/show_product.blade.php ENDPATH**/ ?>