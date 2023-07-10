<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bugra - Argenova</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/app/img/logo/favicon.ico')}}">

    <!-- all css here -->

    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="{{asset('assets/app/css/bootstrap.min.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('assets/app/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/app/css/owl.transitions.css')}}">
    <!-- Animate css -->
    <link rel="stylesheet" href="{{asset('assets/app/css/animate.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('assets/app/css/meanmenu.min.css')}}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{asset('assets/app/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/app/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/app/css/flaticon.css')}}">
    <!-- venobox css -->
    <link rel="stylesheet" href="{{asset('assets/app/css/venobox.css')}}">
    <!-- magnific css -->
    <link rel="stylesheet" href="{{asset('assets/app/css/magnific.min.css')}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets/app/style.css')}}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('assets/app/css/responsive.css')}}">

    <!-- modernizr css -->
    <script src="{{asset('assets/app/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>

    <!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->


    <header class="header-one">
        <!-- header-area start -->
        <div id="sticker" class="header-area hidden-xs">
            <div class="container">
                <div class="row">
                    <!-- logo start -->
                    <div class="col-md-3 col-sm-3">
                        <div class="logo">
                            <!-- Brand -->
                            <a class="navbar-brand page-scroll black-logo" href="/bugrapasli">
                                <img src="{{asset('assets/app/img/logo/logo.png')}}" style="" alt="">
                            </a>
                        </div>
                        <!-- logo end -->
                    </div>
                        <!-- mainmenu start -->
                        <nav class="navbar navbar-default">
                            <div class="collapse navbar-collapse" id="navbar-example">
                                <div class="main-menu">
                                    <ul class="nav navbar-nav navbar-right">
                                        @php
                                        $menus = DB::table('p_menu')
                                        ->where(['position' => 'header', 'root_id' => null, 'deleted' => 0])
                                        ->orderBy('order_id', 'asc')->get();
                                        @endphp
                                        @foreach ($menus as $menu)
                                        @php
                                        $menuSlug = DB::table('p_slug')
                                        ->where(['id' => $menu->slug_id])
                                        ->first();
                                        @endphp
                                        @php $subs = DB::table('p_menu')->where(['root_id' => $menu->id, 'deleted' =>
                                        false])->orderBy('order_id', 'asc')->get();
                                        @endphp
                                        @if(count($subs) > 0)
                                        <li><a class="pages" href="#">{{ $menu->name }}</a>
                                            <ul class="sub-menu">
                                                @foreach($subs as $sub)
                                                @php
                                                $SubmenuSlug = DB::table('p_slug')
                                                ->where(['id' => $sub->slug_id])
                                                ->first();
                                                @endphp
                                                <li><a href="{{ route('AppRoot', ['slug' =>$SubmenuSlug->name]) }}"
                                                        title="{{ $sub->name }}">{{ $sub->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @else
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('AppRoot', ['slug' =>$menuSlug->name]) }}"
                                                title="{{ $menu->name }}">{{ $menu->name }}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!-- mainmenu end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area end -->
        <!-- mobile-menu-area start -->
        <div class="mobile-menu-area hidden-lg hidden-md hidden-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <div class="logo">
                                <a href="/bugrapasli"><img src="{{asset('assets/app/img/logo/logo.png')}}" alt="" /></a>
                            </div>
                            <nav id="dropdown">
                                <ul>
                                    @php
                                        $menus = DB::table('p_menu')
                                        ->where(['position' => 'header', 'root_id' => null, 'deleted' => 0])
                                        ->orderBy('order_id', 'asc')->get();
                                        @endphp
                                        @foreach ($menus as $menu)
                                        @php
                                        $menuSlug = DB::table('p_slug')
                                        ->where(['id' => $menu->slug_id])
                                        ->first();
                                        @endphp
                                        @php $subs = DB::table('p_menu')->where(['root_id' => $menu->id, 'deleted' =>
                                        false])->orderBy('order_id', 'asc')->get();
                                        @endphp
                                        @if(count($subs) > 0)
                                        <li><a class="pages" href="#">{{ $menu->name }}</a>
                                            <ul class="sub-menu">
                                                @foreach($subs as $sub)
                                                @php
                                                $SubmenuSlug = DB::table('p_slug')
                                                ->where(['id' => $sub->slug_id])
                                                ->first();
                                                @endphp
                                                <li><a href="{{ route('AppRoot', ['slug' =>$SubmenuSlug->name]) }}"
                                                        title="{{ $sub->name }}">{{ $sub->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @else
                                        <li class="nav-item"><a class="nav-link"
                                                href="{{ route('AppRoot', ['slug' =>$menuSlug->name]) }}"
                                                title="{{ $menu->name }}">{{ $menu->name }}</a></li>
                                        @endif
                                        @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile-menu-area end -->
    </header>

    @stack('content')



    <!-- Start Footer Area -->
    <footer class="footer1">
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="footer-content logo-footer">
                            <div class="footer-head">
                                <div class="footer-logo">
                                    <a href="#"><img src="{{asset('assets/app/img/logo/logo.png')}}" style="width: 60%" alt=""></a>
                                </div>
                                <p>
                                    Ulaşmak istediğiniz teknolojik hedefe, en doğru teknolojiler ve mühendislik teknikleri ile gitmenize yardımcı olurken, özverili ve samimi ekibimiz ile her zaman sizlerin yanında olacağız.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-content " >
                            <div class="footer-head ">
                                <h4>Menü</h4>
                                <ul class="footer-list">
                                    @foreach($FooterMenu as $value)
                                    @php
                                        $menuSlug = DB::table('p_slug')
                                        ->where(['id' => $value->slug_id])
                                        ->first();
                                    @endphp
                                    <li><a href="{{$menuSlug -> name}}">{{$value-> name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-content last-content">
                            <div class="footer-head">
                                <h4>Bilgi</h4>
                                <div class="footer-contacts">
                                    <p><span>Adres :</span>Dumankaya Horizon, Kordonboyu Mah. Turgut Özal Bulvarı No: 65 B Blok Kapı No : 39, Kartal/İstanbul</p>
                                    <p><span>Tel :</span> +90532 134 07 57</p>
                                    <p><span>Email :</span> info@argenova.com.tr</p>
                                </div>
                                <div class="footer-icons">
                                    <ul>
                                        @php
                                        $links = json_decode($footerLinks->content, true);
                                        @endphp

                                        @foreach($links as $title => $url)
                                        @if($url)
                                        <li>
                                            <a href="{{ $url }}">
                                                <i class="fa fa-{{ $title }}"></i>
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom Area -->
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="copyright">
                            <p>
                                {{__('translates.copyright')}} © 2020
                                <a href="#">{{__('translates.randerc')}}</a> {{__('translates.All Rights Reserved')}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom Area -->
    </footer>
    <!-- End Footer Area -->

    <!-- all js here -->

    <!-- jquery latest version -->
    <script src="{{asset('assets/app/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('assets/app/js/bootstrap.min.js')}}"></script>
    <!-- owl.carousel js -->
    <script src="{{asset('assets/app/js/owl.carousel.min.js')}}"></script>
    <!-- Counter js -->
    <script src="{{asset('assets/app/js/jquery.counterup.min.js')}}"></script>
    <!-- waypoint js -->
    <script src="{{asset('assets/app/js/waypoints.js')}}"></script>
    <!-- magnific js -->
    <script src="{{asset('assets/app/js/magnific.min.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('assets/app/js/wow.min.js')}}"></script>
    <!-- venobox js -->
    <script src="{{asset('assets/app/js/venobox.min.js')}}"></script>
    <!-- meanmenu js -->
    <script src="{{asset('assets/app/js/jquery.meanmenu.js')}}"></script>
    <!-- Form validator js -->
    <script src="{{asset('assets/app/js/form-validator.min.js')}}"></script>
    <!-- plugins js -->
    <script src="{{asset('assets/app/js/plugins.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('assets/app/js/main.js')}}"></script>
</body>

</html>