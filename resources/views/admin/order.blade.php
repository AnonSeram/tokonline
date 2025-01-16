<!DOCTYPE html>
<html lang="en">
  <head>
  @include('admin.css')

  <style type='text/css'>
    /* Body Styling */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f6f9;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .title_deg {
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        padding-bottom: 40px;
        color: white;
    }

    /* Tabel Styling */
    .table_deg {
        border-collapse: collapse;
        width: 95%;
        margin: auto;
        padding-top: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .th_deg {
        background-color: #2a6eb6; /* Skyblue lebih gelap */
        color: #fff;
        font-size: 16px;
        padding: 12px 10px;
    }

    td {
        padding: 12px 10px;
        text-align: center;
        font-size: 14px;
    }

    /* Hover Effect on Rows */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #e1f5fe; /* Highlight when hovered */
        
    }

    /* Image Styling */
    td img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 5px;
        transition: transform 0.2s ease;
    }

    td img:hover {
        transform: scale(1.1);
    }

    /* Responsiveness */
    @media screen and (max-width: 768px) {
        .table_deg {
            width: 100%;
        }

        .title_deg {
            font-size: 24px;
        }

        td, th {
            font-size: 12px;
        }
    }
</style>

<body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      @include('admin.header')

      <div class="main-panel">
          <div class="content-wrapper">

          <h1 class="title_deg">All Orders</h1>

          <table class="table_deg">
            <tr class="th_deg">
                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Email</th>
                <th style="padding: 10px;">Address</th>
                <th style="padding: 10px;">Phone</th>
                <th style="padding: 10px;">Product Title</th>
                <th style="padding: 10px;">Quantity</th>
                <th style="padding: 10px;">Price</th>
                <!-- <th style="padding: 10px;">Kurir</th> -->
                <th style="padding: 10px;">Destinasi</th>
                <th style="padding: 10px;">Service Kurir</th>
                <th style="padding: 10px;">Ongkir</th>
                <th style="padding: 10px;">Payment Status</th>
                <th style="padding: 10px;">Delivery Status</th>
                <th style="padding: 10px;">Image</th>
                <th style="padding: 10px;">Delivered</th>
           
            </tr>

            @foreach($order as $order)
            <tr>
                <td>{{ $order->name }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->address }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->product_title }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->price }}</td>
                <!-- <td>{{ $order->courier }}</td> -->
                <td>{{ $order->destination_city_id }}</td>
                <td>{{ $order->service }}</td>
                <td>{{ $order->cost }}</td>
                <td>{{ $order->payment_status }}</td>
                <td>{{ $order->delivery_status }}</td>
                <td>
                    <img src="/product/{{$order->image}}">
                </td>
                <td>

                @if($order->delivery_status=='Processing')
                    <a href="{{ url('delivered',$order->id) }}" class="btn btn-primary">Delivered</a>
                
                @else

                <p style="color: green; font-weight: bold;">Delivered</p>
                
                    @endif
                </td>
            </tr>

            @endforeach
          </table>

          </div>
      </div>

    <!-- container-scroller -->
    @include('admin.script')
  </body>
</html>