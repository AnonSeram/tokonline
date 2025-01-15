<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Stripe;
use App\Models\Order;
use App\Models\OrderShipping;

class HomeController extends Controller
{
    public function index()
    {
        $product=Product::paginate(6);
        return view('home.userpage',compact('product'));
    }

    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            $total_product=product::all()->count();
            $total_order=order::all()->count();
            $total_user=user::all()->count();

            $order=order::all();
            $total_revenue=0;

            foreach($order as $order)
            {
                $total_revenue=$total_revenue + $order->price;
            }

            $total_delivered=order::where('delivery_status', '=', 'delivered')->get()->count();
            $total_processing=order::where('delivery_status', '=', 'Processing')->get()->count();

            return view('admin.home',compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_delivered', 'total_processing'));
        }

        else
        {
            $product=Product::paginate(6);
            return view('home.userpage',compact('product'));
        }

    }

    public function product_details($id)
    {

        $product=product::find($id);
        return view('home.product_details',compact('product'));   
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;

            $product=product::find($id);

            $product_exist_id=cart::where('Product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id!=null)
            {

                $cart=cart::find($product_exist_id)->first();
                $quantity=$cart->quantity;
                $cart->quantity=$quantity + $request->quantity;

                if($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price * $cart->quantity;
                }
    
                else
                {
                    $cart->price=$product->price * $cart->quantity;
                }

                $cart->save();
                return redirect()->back()->with('message', 'Product Added Successfully');
            }

            else
            {
            $cart=new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->Product_title=$product->title;

            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price * $request->quantity;
            }

            else
            {
                $cart->price=$product->price * $request->quantity;
            }
            
           
            $cart->image=$product->image;
            $cart->Product_id=$product->id;
            $cart->quantity=$request->quantity;

            $cart->save();
            return redirect()->back()->with('message', 'Product Added Successfully');

            }
            
        }

        else
        {
            return redirect('login');
        }
    
    }

    public function show_cart()
{
    if (Auth::id()) {
        $id = Auth::user()->id;
        $cart = cart::where('user_id', '=', $id)->get();

        // Fetch data from RajaOngkir API
        $response = Http::withHeaders([
            'key' => 'ec0ee133f00da3542ddc65d73995c64c'
        ])->get('https://api.rajaongkir.com/starter/city');

        $cities = $response['rajaongkir']['results'];

        // Pass $cities along with $cart to the view
        return view('home.show_cart', compact('cart', 'cities'), ['cities' => $cities, 'ongkir' => '']);
    } else {
        return redirect('login');
    }
}

    public function remove_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create([
        "amount" => $totalprice * 100,
        "currency" => "usd",
        "source" => $request->stripeToken,
        "description" => "Thanks for payment",
    ]);

    $user = Auth::user();
    $userid = $user->id;

    // Ambil data ongkir dari session
    $shippingCost = session('shipping_cost', 0);
    $selectedService = session('selected_service', 'N/A');
    $estimatedTime = session('estimated_time', 'N/A');
    $destinationCityId = session('destination_city_id', null);
    $courier = session('courier', 'N/A');

    // Ambil nama kota tujuan
    if ($destinationCityId) {
        $responseCity = Http::withHeaders([
            'key' => env('RAJAONGKIR_API_KEY'),
        ])->get("https://api.rajaongkir.com/starter/city?id={$destinationCityId}");

        if ($responseCity->ok()) {
            $cityData = $responseCity['rajaongkir']['results'];
            $destinationCityName = $cityData['city_name'] ?? 'Unknown';
        } else {
            $destinationCityName = 'Unknown';
        }
    } else {
        $destinationCityName = 'Unknown';
    }

    // Simpan data ke tabel orders
    $data = Cart::where('user_id', '=', $userid)->get();
    foreach ($data as $cartItem) {
        $order = new Order();
        $order->name = $cartItem->name;
        $order->email = $cartItem->email;
        $order->phone = $cartItem->phone;
        $order->address = $cartItem->address;
        $order->user_id = $cartItem->user_id;
        $order->product_title = $cartItem->product_title;
        $order->price = $cartItem->price;
        $order->quantity = $cartItem->quantity;
        $order->image = $cartItem->image;
        $order->product_id = $cartItem->product_id;
        $order->payment_status = 'Paid';
        $order->delivery_status = 'Processing';
        $order->destination_city_id = $destinationCityId;
        $order->destination_city_name = $destinationCityName;
        $order->courier = $courier;
        $order->service = $selectedService;
        $order->cost = $shippingCost;

        $order->save();

        // Hapus item dari keranjang
        $cartItem->delete();
    }

    // Bersihkan session terkait ongkir
    session()->forget(['shipping_cost', 'selected_service', 'estimated_time', 'destination_city_id', 'courier']);

    Session::flash('success', 'Payment successful!');

    return back();
}



    public function product_search(Request $request)
    {
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->paginate(10);
        
        return view('home.userpage',compact('product'));
    }
    
    public function cekOngkir(Request $request)
    {
            // Validasi Input
            $request->validate([
                'destination' => 'required|integer',
                'weight' => 'required|integer|min:1',
                'courier' => 'required|string',
            ]);

    try {
        // Ambil data kota dari API RajaOngkir
        $responseCities = Http::withHeaders([
            'key' => 'ec0ee133f00da3542ddc65d73995c64c',
        ])->get('https://api.rajaongkir.com/starter/city');

        if ($responseCities->failed()) {
            return back()->withErrors('Gagal mengambil data kota dari API.');
        }

        $cities = $responseCities['rajaongkir']['results'];

        // Hitung Ongkir
        $responseCost = Http::withHeaders([
            'key' => 'ec0ee133f00da3542ddc65d73995c64c',
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => 419, // ID kota Sleman
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ]);

        if ($responseCost->failed()) {
            return back()->withErrors('Gagal menghitung ongkir dari API.');
        }

        $ongkir = $responseCost['rajaongkir'];

        // Hitung total harga barang
        $cart = Auth::check() ? Cart::where('user_id', Auth::id())->get() : [];
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item->price;
        }

        // Simpan total harga barang di session
        session(['total_price' => $totalPrice]);

        // Kembalikan data ke view
        return view('home.show_cart', compact('cart', 'cities', 'ongkir'));
    } catch (\Exception $e) {
        // Tangani error
        return back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
    }
}

    public function pilihService(Request $request)
{
    $selectedService = $request->input('service');
    [$service, $price, $etd] = explode('|', $selectedService);

    // Simpan data pilihan ke database atau proses lebih lanjut
    return redirect()->back()->with('success', "Layanan $service dipilih dengan harga Rp $price (estimasi $etd hari)");
}

    public function product()
    {
        $product=Product::paginate(15);
        return view('home.all_product',compact('product'));
    }

    public function search_product(Request $request)
    {
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->paginate(10);
        
        return view('home.all_product',compact('product'));
    }

    public function checkout(Request $request)
{
    try {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Silakan login terlebih dahulu.');
        }

        // Ambil data user
        $user = Auth::user();

        // Ambil data dari session
        $shippingCost = session('shipping_cost', 0);
        $selectedService = session('selected_service', null);
        $finalPrice = session('final_price', 0);
        $destinationCityId = $request->destination; // Atau simpan di session jika perlu

        // Ambil data keranjang
        $cartItems = Cart::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return back()->withErrors('Keranjang Anda kosong.');
        }

        // Simpan setiap item di keranjang ke dalam tabel orders
        foreach ($cartItems as $item) {
            Order::create([
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'address' => $user->address,
                'user_id' => $user->id,
                'product_title' => $item->product_title,
                'quantity' => $item->quantity,
                'price' => $item->price,
                'image' => $item->image,
                'product_id' => $item->product_id,
                'payment_status' => 'pending', // Status default
                'delivery_status' => 'pending', // Status default
                'destination_city_id' => $destinationCityId,
                'courier' => $request->courier,
                'service' => $selectedService,
                'cost' => $shippingCost,
            ]);
        }

        // Hapus keranjang setelah checkout
        Cart::where('user_id', $user->id)->delete();

        // Bersihkan session terkait ongkir
        session()->forget(['selected_service', 'shipping_cost', 'final_price', 'total_price']);

        return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat!');
    } catch (\Exception $e) {
        return back()->withErrors('Terjadi kesalahan: ' . $e->getMessage());
    }
}

}

