<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
         // Ambil data service yang dipilih
         $serviceData = explode('|', $request->service);
         $serviceName = $serviceData[0];
         $shippingCost = (int) $serviceData[1];
         $estimatedTime = $serviceData[2];
 
         // Ambil total harga barang dari session atau data lain
         $totalPrice = session('total_price', 0); // Asumsi total harga barang disimpan di session
         $finalPrice = $totalPrice + $shippingCost;
 
         // Simpan data ke session (atau database jika diperlukan)
         session([
             'selected_service' => $serviceName,
             'shipping_cost' => $shippingCost,
             'final_price' => $finalPrice,
             'estimated_time' => $estimatedTime,
             'destination_city_id' => $request->destination, // ID kota tujuan
             'courier' => $request->courier, // Nama kurir
         ]);
 
         // Redirect ke halaman keranjang atau checkout
         return redirect()->route('show_cart')->with('success', 'Layanan berhasil dipilih! Ongkir telah ditambahkan ke total harga.');
    }
}
