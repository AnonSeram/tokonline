

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Checkout</h2>
    
    <!-- Tabel Keranjang -->
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->Product_title); ?></td>
                <td><?php echo e($item->price); ?></td>
                <td><?php echo e($item->quantity); ?></td>
                <td><?php echo e($item->price * $item->quantity); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Form Pengiriman -->
    <h4>Informasi Pengiriman</h4>
    <form id="shippingForm">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="province">Provinsi</label>
            <select id="province" class="form-control">
                <option value="">Pilih Provinsi</option>
                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($province['province_id']); ?>"><?php echo e($province['province']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group">
            <label for="city">Kota/Kabupaten</label>
            <select id="city" class="form-control">
                <option value="">Pilih Kota/Kabupaten</option>
            </select>
        </div>
        <div class="form-group">
            <label for="courier">Kurir</label>
            <select id="courier" class="form-control">
                <option value="jne">JNE</option>
                <option value="tiki">TIKI</option>
                <option value="pos">POS Indonesia</option>
            </select>
        </div>
        <button type="button" id="calculateShipping" class="btn btn-primary">Hitung Ongkir</button>
    </form>

    <!-- Hasil Ongkir -->
    <h4>Ongkos Kirim</h4>
    <div id="shippingResult"></div>
</div>

<script>
    document.getElementById('province').addEventListener('change', function() {
        const provinceId = this.value;

        fetch(`/get-cities/${provinceId}`)
            .then(response => response.json())
            .then(data => {
                const citySelect = document.getElementById('city');
                citySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
                data.forEach(city => {
                    citySelect.innerHTML += `<option value="${city.city_id}">${city.city_name}</option>`;
                });
            });
    });

    document.getElementById('calculateShipping').addEventListener('click', function() {
        const formData = new FormData(document.getElementById('shippingForm'));
        formData.append('origin', '501'); // Ganti dengan ID kota asal Anda
        formData.append('weight', '1000'); // Berat dalam gram

        fetch('/calculate-shipping', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                const resultDiv = document.getElementById('shippingResult');
                resultDiv.innerHTML = '';
                data.forEach(result => {
                    result.costs.forEach(cost => {
                        resultDiv.innerHTML += `
                            <p>${cost.service}: Rp ${cost.cost[0].value} (${cost.cost[0].etd} hari)</p>
                        `;
                    });
                });
            });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\toko_online\resources\views/home/checkout.blade.php ENDPATH**/ ?>