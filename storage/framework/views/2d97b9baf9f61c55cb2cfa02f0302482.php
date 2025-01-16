<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <style type="text/css">

    .div_center
    {
        text-align: center;
        padding-top: 40px;
    }

    .font_size
    {
        font-size: 40px;
        padding-bottom: 40px;
    }

    .text_color
    {
        color: black;
        padding-bottom: 20px;
    }

    label
    {
        display: inline-block;
        width: 200px;
    }

    .div_design
    {
        padding-bottom: 15px;
        padding-top: 15px;
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

          <div class="div_center">

          <h1 class="font_size">Update Product</h1>

          <form action="<?php echo e(url('/update_product_confirm',$product->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

          <div class="div_design">
          <label>Product Title :</label>
          <input class="text_color" type="text" name="title" placeholder="Write a title" required="" value="<?php echo e($product->title); ?>">
          </div>

          <div class="div_design">
          <label>Product Description :</label>
          <input class="text_color" type="text" name="description" placeholder="Write a description" required="" value="<?php echo e($product->description); ?>">
          </div>

          <div class="div_design">
          <label>Product Price :</label>
          <input class="text_color" type="number" name="price" placeholder="Price" required="" value="<?php echo e($product->price); ?>">
          </div>

          <div class="div_design">
          <label>Discount Price :</label>
          <input class="text_color" type="number" name="dis_price" placeholder="Your discount" value="<?php echo e($product->discount_price); ?>">
          </div>

          <div class="div_design">
          <label>Product Quantity :</label>
          <input class="text_color" type="number" min="0" name="quantity" placeholder="Quantity" required="" value="<?php echo e($product->quantity); ?>">
          </div>

          <div class="div_design">
          <label>Product Category :</label>
          <select class="text_color" name="category"required="">
            <option value="<?php echo e($product->category); ?>" selected=""><?php echo e($product->category); ?></option>

            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <option value="<?php echo e($category->category_name); ?>"><?php echo e($category->category_name); ?></option>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
          </select>
          </div>

          <div class="div_design">
          <label>Current Product Image :</label>
          <img style="margin: auto;" height="100" widht="100" src="/product/<?php echo e($product->image); ?>">
          </div>


          <div class="div_design">
          <label>Change Product Image :</label>
          <input type="file" name="image">
          </div>

          <div class="div_design">
          <input type="submit" value="Update Product" class="btn btn-primary">
          </div>
          
            </form>

          </div>

          <div>
          </div>
    <!-- container-scroller -->
    <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html><?php /**PATH C:\xampp\htdocs\toko_online\resources\views/admin/update_product.blade.php ENDPATH**/ ?>