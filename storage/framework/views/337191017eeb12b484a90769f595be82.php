<div class="containerOngkir">
   <h2 class="text-center">Cek Ongkir</h2>

   <div class="form-container w-50">
      <form action="" method="POST">
         <?php echo csrf_field(); ?>
         <div class="form-group mt-3">
            <label for="origin">Asal Kota</label>
            <select name="origin" id="origin" class="form-control" required>
               <option value="">Pilih Kota Asal</option>
               <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($city['city_id']); ?>"><?php echo e($city['city_name']); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
         </div>

         <div class="form-group mt-3">
            <label for="destination">Kota Tujuan</label>
            <select name="destination" id="destination" class="form-control" required>
               <option value="">Pilih Kota Tujuan</option>
               <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <option value="<?php echo e($city['city_id']); ?>"><?php echo e($city['city_name']); ?></option>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
         </div>

         <div class="form-group mt-3">
            <label for="weight">Berat Produk</label>
            <input type="number" name="weight" id="weight" class="form-control" placeholder="Masukkan berat produk (gram)" required>
         </div>

         <div class="form-group mt-3">
            <label for="courier">Kurir</label>
            <select name="courier" id="courier" class="form-control" required>
               <option value="">Pilih Jasa Pengiriman</option>
               <option value="jne">JNE</option>
               <option value="tiki">TIKI</option>
               <option value="pos">POS Indonesia</option>
            </select>
         </div>

         <div class="form-group mt-4">
            <input type="submit" name="cekOngkir" class="btn btn-primary btn-block" value="Cek Ongkir">
         </div>
      </form>
      <div class="mt-5">
      </div>
   </div>
</div><?php /**PATH C:\xampp\htdocs\toko_online\resources\views/home/cek_ongkir.blade.php ENDPATH**/ ?>