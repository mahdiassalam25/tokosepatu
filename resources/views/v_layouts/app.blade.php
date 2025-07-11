<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/icon_univ_bsi.png') }}">
    <title>SNEAKERS STORE</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/slick-theme.css') }}">

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/nouislider.min.css') }}">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}">
    </script>

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- top Header -->
        <div id="top-header">
            <div class="container">
                <div class="pull-left">
                    <span>Selamat datang di toko sneakers store</span>
                </div>
            </div>
        </div>
        <!-- /top Header -->

        <!-- header -->
        <div id="header">
            <div class="container">
                <div class="pull-left">
                    <!-- Logo -->
                    <div class="header-logo">
                        <a class="logo" href="#">
                            <img src="{{ asset('image/logo.png') }}" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->

                    <!-- Search -->

                    <!-- /Search -->
                </div>
                <div class="pull-right">
                    <ul class="header-btns">
                        <!-- Cart -->
                        <li class="header-cart dropdown default-dropdown">
                            <div class="header-btns-icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <strong class="text-uppercase"><a href="{{ route ('order.cart') }}">Keranjang</a></strong>
                            </a>
                        </li>
                        <!-- /Cart -->

                        <!-- Account -->
                        @if (Auth::check())
                        <li class="header-account dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">{{ Auth::user()->nama }}<i
                                        class="fa fa-caret-down"></i></strong>
                            </div>
                            <ul class="custom-menu">
                                <li><a href="{{ route('customer.akun', ['id' => Auth::user()->id]) }}"><i class="fa fa-user-o"></i> Akun Saya</a></li>
                                <li><a href="{{ route('order.history') }}"><i class="fa fa-check"></i> History</a></li>
                                <li>
                                    <a href="#"
                                        onclick="event.preventDefault(); document.getElementById('keluar-app').submit();"><i class="fa fa-power-off"></i> Keluar
                                    </a>
                                    <!-- form keluar app -->
                                    <form id="keluar-app" action="{{ route('logout' ) }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <!-- form keluar app end -->
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="header-account dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">Akun Saya<i class="fa fa-caret-down"></i></strong>
                            </div>
                            <a href="{{ route('auth.redirect') }}" class="text-uppercase">Login</a>
                        </li>
                        @endif
                        <!-- /Account -->


                        <!-- Mobile nav toggle-->
                        <li class="nav-toggle">
                            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                        </li>
                        <!-- / Mobile nav toggle -->
                    </ul>
                </div>
            </div>
            <!-- header -->
        </div>
        <!-- container -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">
                @php
                $kategori = DB::table('kategori')->orderBy('nama_kategori', 'asc')->get();
                @endphp
                @if (request()->segment(1) == '' || request()->segment(1) == 'beranda')
                <!-- category nav -->
                <div class="category-nav">
                    <span class="category-header">Kategori <i class="fa fa-list"></i></span>
                    <ul class="category-list">
                        @foreach ($kategori as $row)
                        <li><a href="{{ route('produk.kategori', $row->id) }}">{{ $row->nama_kategori }}</a></li>
                        @endforeach
                    </ul>

                    <ul class="category-list">
                </div>
                @else
                <div class="category-nav show-on-click">
                    <span class="category-header">Kategori <i class="fa fa-list"></i></span>
                    <ul class="category-list">
                        @foreach ($kategori as $row)
                        <li><a href="{{ route('produk.kategori', $row->id) }}">{{ $row->nama_kategori }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- /category nav -->
                @endif

                <!-- menu nav -->
                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li><a href="{{ route('produk.all') }}">Produk</a></li>
                        <li><a href="{{ route('page.lokasi') }}">Lokasi</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                    </ul>
                </div>
                <!-- menu nav -->


            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->

    @if (request()->segment(1) == '' || request()->segment(1) == 'beranda')
    <div id="home">
        <!-- container -->
        <div class="container">
            <!-- home wrap -->
            <div class="home-wrap">
                <!-- home slick -->
                <div id="home-slick">
                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{{ asset('frontend/banner/banner01.jpg') }}" alt="">
                        <div class="banner-caption text-center">
                            <h1>SNEAKERs STORE</h1>
                            <h3 class="font-weak" style="color: #30323a;">Menyediakan berbagai pilihan sepatu yang keren .</h3>
                            <button class="primary-btn">Pesan Sekarang</button>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{{ asset('frontend/banner/banner02.jpg') }}" alt="">
                        <div class="banner-caption">
                            <h1 class="primary-color">Cari Sepatu? SNEAKERS STORE aja..!</h1>
                            <h3 class="font-weak" style="color: #30323a;">
                                GASKAN 
                            </h3>
                            <button class="primary-btn">Pesan Sekarang</button>
                        </div>
                    </div>
                    <!-- /banner -->

                    <!-- banner -->
                    <div class="banner banner-1">
                        <img src="{{ asset('frontend/banner/banner03.jpg') }}" alt="">
                        <div class="banner-caption">
                            <h1 style="color: f8694a;">TERPERCAYA <span>HARGA DAN KUALIRASNYA</span></h1>
                            <button class="primary-btn">Pesan Sekarang</button>
                        </div>
                    </div>
                    <!-- /banner -->
                </div>
                <!-- /home slick -->
            </div>
            <!-- /home wrap -->
        </div>
        <!-- /container -->
    </div>
    @endif

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside widget -->
                    <!-- /aside widget -->
                    <!-- aside widget -->
                    <div class="aside">
                        <h3 class="aside-title">Filter Kategori</h3>
                        <ul class="list-links">
                            @foreach ($kategori as $row)
                            <li><a href="{{ route('produk.kategori', $row->id) }}">{{ $row->nama_kategori }}</a></li>
                            @endforeach
                        </ul>

                    </div>
                    <!-- /aside widget -->
                </div>
                <!-- /ASIDE -->

                <!-- MAIN -->
                <div id="main" class="col-md-9">
                    <!-- store top filter -->
                    <!-- /store top filter -->

                    <!-- @yieldAwal -->
                    @yield('content')
                    <!-- @yieldAkhir-->

                    <!-- store bottom filter -->

                    <!-- /store bottom filter -->
                </div>
                <!-- /MAIN -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- FOOTER -->
    <footer id="footer" class="section section-grey">
        <div class="container text-center">
            <p><strong>SNEAKERS STORE</strong> adalah toko sepatu terpercaya yang menyediakan berbagai pilihan sepatu dan layanan terbaik untuk kebutuhan Anda.</p>
            <p>&copy; {{ date('Y') }} SNEAKERS STORE. All rights reserved.</p>
        </div>
    </footer>

    <!-- jQuery Plugins -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    @stack('scripts')
</body>



</html>