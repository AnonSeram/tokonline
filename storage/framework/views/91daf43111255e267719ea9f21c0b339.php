<!-- product section -->
<section id="our_products" class="product_section layout_padding">

<style type="text/css">
   /* Container Pagination */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
    padding: 10px 0;
    margin: 0;
}

/* Setiap Item Pagination */
.pagination li {
    margin: 0 5px;
}

.pagination li a,
.pagination li span {
    display: inline-block;
    padding: 10px 15px;
    font-size: 14px;
    color: #007bff;
    text-decoration: none;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: all 0.3s;
}

/* Hover Effect */
.pagination li a:hover,
.pagination li span:hover {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

/* Aktifkan Halaman */
.pagination li.active span {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
    pointer-events: none;
}

/* Nonaktifkan Tombol */
.pagination li.disabled span {
    color: #ccc;
    pointer-events: none;
    background-color: #f8f9fa;
}

</style>
<div class="container">
        <div class="heading_container heading_center">
            <h2>Our <span>products</span></h2>
        </div>
        <div class="text-center">
            <form action="<?php echo e(url('product_search')); ?>" method="GET">
                <?php echo csrf_field(); ?>
                <input style="width: 500px;" type="text" name="search" placeholder="Search for something">
                <input type="submit">
            </form>
        
            </div>

            <?php if(session()->has('message')): ?>

            <div class="alert alert-success" style="padding-top: 20px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x<button>

            <?php echo e(session()->get('message')); ?>


            </div>
            <?php endif; ?>    

            <div class="row g-3">

            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="<?php echo e(url('product_details', $products->id)); ?>" class="option1">
                           Product Details
                           </a>
                           <form action="<?php echo e(url('add_cart', $products->id)); ?>" method="POST">

                           <?php echo csrf_field(); ?>

                           <div class="row" style="padding-top: 20px;">
                              <div class="col-md-4">
                              <input type="number" name="quantity" value="1" min="1" style="width: 100px; border-radius: 25px;">
                              </div>
                              <div class="col-md-4">
                              <input type="submit" value="Add to Cart" style="border-radius: 25px;">
                              </div>
                           </div>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/<?php echo e($products->image); ?>" alt="">
                     </div>
                        <h5 style="text-align: center; font-size: 20px; font-family: 'Montserrat'; font-weight: 700;">
                           <?php echo e($products->title); ?>

                        </h5>
                     <div style="text-align: center; padding-top: 10px; font-family: 'Montserrat'; font-weight: 500;">
                        <?php if($products->discount_price!=null): ?>
                        <h6 style="color: red; font-size: 18px;">
                          Rp <?php echo e(number_format($products->discount_price)); ?>

                        </h6>

                        <h6 style="text-decoration: line-through; color: black; font-family: 'Montserrat'; font-weight: 500;">
                           Rp <?php echo e(number_format($products->price)); ?>

                        </h6>

                        <?php else: ?>

                        <h6 style="color: black; font-family: 'Montserrat'; font-weight: 500;">
                           Rp <?php echo e(number_format($products->price)); ?>

                        </h6>
            
                        <?php endif; ?>

                        
                     </div>
                  </div>
               </div>

               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

               <span style="padding-top: 20px;">
               
               <?php echo $product->withQueryString()->links('pagination::bootstrap-5'); ?>


               </span>
               
         </div>
      </section>
      <!-- end product section --><?php /**PATH C:\xampp\htdocs\toko_online\resources\views/home/product.blade.php ENDPATH**/ ?>