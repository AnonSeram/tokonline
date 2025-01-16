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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')

         <section class="breadcrumb-section pb-4 pb-md-4 pt-4 pt-md-4">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
            </ol>
        </nav>
    </div>
</section>
<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="product-images">
                    <!-- slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active"> <img class="img_size" src="/product/{{$product->image}}"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-detail mt-6 mt-md-0">
                    <h1 class="mb-1" style="font-family: 'Montserrat'; font-weight: 700; font-size: 32px;">{{ $product->title }}</h1>
                    <div class="mb-3 rating">
                        <small class="text-warning">
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star-half"></i>
                        </small>
                    </div>
                    <div class="price">
                    @if($product->discount_price!=null)
                        <h6 style="color: red; font-family: 'Montserrat'; font-weight: 500; font-size: 28;">
                          Rp {{ number_format($product->discount_price) }}
                        </h6>

                        <h6 style="text-decoration: line-through; color: black; font-family: 'Montserrat'; font-weight: 500; font-size: 26;">
                           Rp {{ number_format($product->price) }}
                        </h6>

                        @else

                        <h6 style="color: black; font-family: 'Montserrat'; font-weight: 500; font-size: 28;">
                           Rp {{ nummber_format($product->price) }}
                        </h6>
            
                        @endif
                    </div>

                        <form action="{{ url('add_cart', $product->id) }}" method="POST">
                            @csrf
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
                    <hr style="padding-top: 20px;"class="my-6">
                    <div class="product-info">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Category:</td>
                                    <td>{{ $product->category}}</td>
                                </tr>
                                <tr>
                                    <td>Availability:</td>
                                    <td>{{ $product->quantity }}</td>
                                </tr>
                                <!-- <tr>
                                    <td>Shipping:</td>
                                    <td><small>01 day shipping.<span class="text-muted">( Free pickup today)</span></small></td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                    <hr class="my-6">
                    <br>
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </div>
    </div>

      @include('home.footer')
      <div class="cpy_">
         <p class="mx-auto">© 2025 All Rights Reserved By Muhammad Syamsudhuha Abdullah</a><br>
         
         
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
</html>