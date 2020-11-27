
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>D-Kar ~ OS | @yield('title')</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('my_asset/img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('my_asset/css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('my_asset/style.css')}}">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form method="POST" class="searchdiv">
                            <input type="search" name="search" class="searchItem" id="search" placeholder="Type your keyword...">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="{{route('mainpage')}}"><img src="{{asset('my_asset/img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="{{route('mainpage')}}"><img src="{{asset('my_asset/img/core-img/logo.png')}}" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="{{route('mainpage')}}">Home</a></li>
                    <li><a href="{{route('shoppage')}}">Shop</a></li>
                    <li><a href="{{route('productpage')}}">Product</a></li>
                    @guest
                      <li><a href="{{ route('signinpage') }}">{{ __('Login') }}</a></li>
                      <li><a href="{{ route('signuppage') }}">{{ __('Register') }}</a></li>
                    @else
                      <li><a href="#">{{ Auth::user()->name }}</a></li>
                      <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </li>
                    @endguest
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="{{route('discountpage')}}" class="btn amado-btn mb-15">%Discount%</a>
                <a href="{{route('latestpage')}}" class="btn amado-btn active">Latest Products</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="{{ route('cartpage') }}" class="cart-nav"><img src="{{asset('my_asset/img/core-img/cart.png')}}" alt=""> Cart <span class="badge badge-pill badge-warning badge-notify CartAmount pt-1"></span></a>
                <a href="{{ route('favpage') }}" class="fav-nav"><img src="{{asset('my_asset/img/core-img/favorites.png')}}" alt=""> Favourite <span class="badge badge-pill badge-warning badge-notify FNoti pt-1"></span></a>
                <a href="#" class="search-nav"><img src="{{asset('my_asset/img/core-img/search.png')}}" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->

        <!-- Product Catagories Area Start -->
        <div class="Search"></div>
        @yield('content')
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <form action="#" method="post">
                            <input type="email" name="email" class="nl-email" placeholder="Your E-mail">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="{{route('mainpage')}}"><img src="{{asset('my_asset/img/core-img/logo2.png')}}" alt=""></a>
                        </div>
                        <!-- Copywrite Text -->
                        <p class="copywrite"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{route('mainpage')}}">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('shoppage')}}">Shop</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('productpage')}}">Product</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="{{ route('cartpage') }}">Cart <span class="badge badge-pill badge-warning badge-notify CartAmount amountitem pt-1"></span></a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="checkout.html">Checkout</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="{{asset('my_asset/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('my_asset/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('my_asset/js/bootstrap.min.js')}}"></script>
    <!-- Custom js -->
    <script src="{{ asset('my_asset/js/custom.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{asset('my_asset/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('my_asset/js/active.js')}}"></script>
    <!-- Sweetalert js -->
    <script src="{{asset('my_asset/js/sweetalert.min.js')}}"></script>
    @yield('script')

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.searchdiv').keyup(function(){
                var product = $('.searchItem').val();
                // console.log(product);
                $.post('{{ route('search')}}', {product:product}, function(response){
                    // console.log(response);
                    html = "";
                    for(item of response){
                        html += `<div>${item.name}</div>`;
                    }
                    $('.Search').html(html);
                })
            });
        })
    </script>

</body>

</html>