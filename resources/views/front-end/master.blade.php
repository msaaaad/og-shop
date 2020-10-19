<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('/')}}front-end/css/style.css" type="text/css">
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{asset('/')}}front-end/img/logo.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{asset('/')}}front-end/img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            @if(Session::get('customerId'))
                <a href="#" onclick="document.getElementById('customerLogoutForm').submit();"><i class="fa fa-user"></i>Logout</a>
                <form action="{{route('customer-logout')}}" method="POST" id="customerLogoutForm">
                    @csrf


                </form>
            @else
                <a href="{{route('new-customer-login')}}"><i class="fa fa-user"></i> Login</a>
            @endif
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="{{route('shop-grid')}}">Dhop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

@include('front-end.includes.header')

                @yield('body')
@include('front-end.includes.footer')

<!-- Js Plugins -->
<script src="{{asset('/')}}front-end/js/jquery-3.3.1.min.js"></script>
<script src="{{asset('/')}}front-end/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.nice-select.min.js"></script>
<script src="{{asset('/')}}front-end/js/jquery-ui.min.js"></script>
<script src="{{asset('/')}}front-end/js/jquery.slicknav.js"></script>
<script src="{{asset('/')}}front-end/js/mixitup.min.js"></script>
<script src="{{asset('/')}}front-end/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}front-end/js/main.js"></script>



</body>

</html>
