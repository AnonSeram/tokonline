<header class="header_section">

<style>
html {
    scroll-behavior: smooth;
}
</style>

            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="/images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{ url('products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="https://wa.me/6285823559811">Contact</a>
                        </li>
                        <li class="nav-item">
    <a class="nav-link" href="{{ url('show_cart') }}">
        <i class="fas fa-shopping-cart"></i> <!-- Ikon keranjang dari Font Awesome -->
    </a>
</li>

                        
                        @if (Route::has('login'))

                        @auth

                        <x-app-layout>

                        </x-app-layout>

                        
                        @else

                        <li class="nav-item">
                           <a class="btn btn-primary" style="border-radius: 60px" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>

                        <li class="nav-item">
                           <a class="btn btn-success" style="border-radius: 60px"  href="{{ route('register') }}">Register</a>
                        </li>
                        @endauth
                        @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->