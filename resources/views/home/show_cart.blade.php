<!DOCTYPE html>
<html>
   <head>
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
      <link rel="shortcut icon" href="/images/favicon.png" type="">
      <title>Tokonline</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css" rel="stylesheet') }}" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


      <style type="text/css">
         .center {
            margin: auto;
            width: 80%;
            text-align: center;
            padding: 30px;
         }
         table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
         }
         table, th, td {
            border: 1px solid grey;
         }
         th, td {
            padding: 10px;
            text-align: center;
         }
         th {
            background-color: #f8f9fa;
            font-size: 16px;
         }
         .summary-card {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
         }
         .summary-card h2 {
            font-size: 20px;
            margin-bottom: 20px;
         }
         .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            padding: 10px 20px;
         }
         .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
         }
         .btn-danger {
            padding: 5px 10px;
         }
         .cart-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
         }
         .cart-table {
            flex: 2;
         }
         .summary-container {
            flex: 1;
            margin-left: 20px;
         }

         .container h2.text-center {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
         }

         .w-50 {
            margin: auto;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
         }

         .w-50 label {
            font-weight: 500;
            margin-bottom: 5px;
            display: inline-block;
         }

         .w-50 .form-control {
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
         }

         .w-50 input[type="number"] {
            -moz-appearance: textfield; /* Hides spinners on Firefox */
         }

         .w-50 input[type="submit"] {
            width: 100%;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 15px;
            padding: 10px 20px;
            border-radius: 5px;
         }

         .mt-3 {
            margin-top: 15px !important;
         }

         .container h2.text-center {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
         }

         .form-container {
            margin: auto;
            background-color: #f8f9fa;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
         }

         .form-container .form-group {
            margin-bottom: 15px;
         }

         .form-container label {
            font-weight: 500;
            margin-bottom: 5px;
            display: inline-block;
         }

         .form-container .form-control {
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
         }

         .form-container input[type="submit"] {
            font-weight: 600;
            text-transform: uppercase;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
            cursor: pointer;
         }

         .form-container input[type="submit"]:hover {
            background-color: #218838;
            border-color: #1e7e34;
         }
         
         .containerOngkir {
            padding-bottom: 100px;
            padding-left: 50px;
            padding-right: 50px;
         }

         .text-center {
            font-size: 24px;
            font-weight: 700;
         }

         .summary-card {
            margin-top: 20px; /* Jarak ke atas */
            margin-left: 30px; /* Jarak ke kiri */
            margin-bottom: 20px; /* Jarak ke bawah */
         }

         .cart-table {
            margin-bottom: 20px;
         }

      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section starts -->
         @include('home.header')

         <div class="center">
            <div class="cart-container">
               <!-- Cart Table -->
               <div class="cart-table">
                  <table>
                     <tr>
                        <th>Product Title</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                     </tr>
                     <?php $totalprice = 0; ?>
                     @foreach($cart as $cart)
                     <tr>
                        <td>{{ $cart->product_title }}</td>
                        <td>{{ $cart->quantity }}</td>
                        <td>Rp {{ number_format($cart->price) }}</td>
                        <td><img class="img_deg" src="/product/{{ $cart->image }}" style="width: 50px; height: 50px; object-fit: cover;"></td>
                        <td>
                           <a class="btn btn-danger" onclick="return confirm('Are You Sure to Remove this Product?')" href="{{ url('/remove_cart/' . $cart->id) }}">
                           Remove Product
                           </a>
                        </td>
                     </tr>
                     <?php $totalprice += $cart->price; ?>
                     @endforeach
                  </table>
               </div>
               <!-- Summary Section -->
               <div class="summary-card">
               <h2>Order Summary</h2>
               <h3 style="padding-bottom: 15px; font-size: 16px; font-weight:600;">
                  Products Price: Rp {{ number_format($totalprice) }}
               </h3>
               @if(session('shipping_cost'))
               <h3 style="padding-bottom: 15px; font-size: 16px; font-weight:600;">
                  Shipping Cost: Rp {{ number_format(session('shipping_cost'), 2) }}
               </h3>
               <h3 style="padding-bottom: 15px; font-size: 20px; font-weight:600;">
                  Grand Total: Rp {{ number_format($totalprice + session('shipping_cost'), 2) }}
               </h3>
               @else
               <h3 style="padding-bottom: 15px; font-size: 20px; font-weight:600;">
                  Grand Total: Rp {{ number_format($totalprice, 2) }}
               </h3>
               @endif
               @if(session('shipping_cost'))
               <a class="btn btn-primary btn-block" href="{{ url('stripe', $totalprice + session('shipping_cost', 0)) }}">
                  Go to Checkout
               </a>
               @else
               <p class="text-danger text-center">Pilih layanan kiriman terlebih dahulu</p>
               @endif

            </div>
      </div>
         <div class="containerOngkir">
   <h2 class="text-center">Tambahkan Pengiriman</h2>

   <div class="form-container w-50">
      <form action="{{ route('cek.ongkir') }}" method="POST" id="cek-ongkir-form">
         @csrf
         <!-- Lokasi Asal: Hidden -->
         <input type="hidden" name="origin" value="{{ 419 }}" />

         <div class="form-group mt-3">
            <label for="destination">Kota Tujuan</label>
            <select name="destination" id="destination" class="form-control" required>
               <option value="">Pilih Kota Tujuan</option>
               @foreach ($cities as $city)
               <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
               @endforeach
            </select>
         </div>

            <!-- Input berat tersembunyi -->
    <input type="hidden" name="weight" value="2000">

         <div class="form-group mt-3">
            <label for="courier">Kurir</label>
            <select name="courier" id="courier" class="form-control" required>
               <option value="">Pilih Jasa Pengiriman</option>
               <option value="jne">JNE</option>
               <option value="tiki">TIKI</option>
               <option value="pos">POS Indonesia</option>
            </select>
         </div>

         <div class="mt-3">
            <input type="submit" class="btn btn-primary w-100" value="Cek Ongkir">
         </div>
      </form>

      <!-- Tampilkan Layanan dan Harga -->
      <div class="mt-5">
         @if(!empty($ongkir))
         <h3 style="font-size: 22px; font-weight:600; padding-bottom: 15px;">Pilih Layanan</h3>
         <form action="{{ route('pilih.service') }}" method="POST">
            @csrf
            <input type="hidden" name="origin" value="{{ $ongkir['origin_details']['city_id'] }}">
            <input type="hidden" name="destination" value="{{ $ongkir['destination_details']['city_id'] }}">
            <input type="hidden" name="weight" value="{{ $ongkir['query']['weight'] }}">

            @foreach ($ongkir['results'] as $item)
            <h4>{{ $item['name'] }}</h4>
            @foreach ($item['costs'] as $cost)
            <div class="form-check">
               <input class="form-check-input" type="radio" name="service" id="service-{{ $cost['service'] }}" value="{{ $cost['service'] }}|{{ $cost['cost'][0]['value'] }}|{{ $cost['cost'][0]['etd'] }}">
               <label class="form-check-label" for="service-{{ $cost['service'] }}">
                  {{ $cost['service'] }} - Rp {{ number_format($cost['cost'][0]['value'], 0, ',', '.') }} (Estimasi {{ $cost['cost'][0]['etd'] }} hari)
               </label>
            </div>
            @endforeach
            @endforeach

            <div class="mt-3">
               <button type="submit" class="btn btn-success w-100">Pilih Layanan</button>
            </div>
         </form>
         @endif
      </div>
   </div>
</div>

         </div>
         
         <div class="cpy_">
         <p class="mx-auto">© 2025 All Rights Reserved By Muhammad Syamsudhuha Abdullah</a><br>
            </p>
         </div>
      </div>

      <!-- jQuery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- Popper JS -->
      <script src="home/js/popper.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="home/js/bootstrap.js"></script>
      <!-- Custom JS -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
