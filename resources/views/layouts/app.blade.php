<!DOCTYPE html>
<html class="no-js" lang="zxx">

<!-- Mirrored from aonetheme.com/sf-html-demo/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Mar 2022 16:15:49 GMT -->

<head>

    <!-- META -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="" />

    <!-- FAVICONS ICON -->
    <link rel="icon" href="/images/ccc1.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="/images/ccc1.png" />

    <!-- PAGE TITLE HERE -->
    <title>Cudo Services</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- BOOTSTRAP STYLE SHEET -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <!-- Bootstrap toggle -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap4-toggle.min.css">
    <!-- Bootstrap seclect -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-select.min.css" />
    <!-- Price Range Slider -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-slider.min.css" />
    <!-- Bootstrap data table -->
    <link rel="stylesheet" type="text/css" href="/css/dataTables.bootstrap4.min.css">
    <!-- Dropzone -->
    <link rel="stylesheet" type="text/css" href="/css/dropzone.css">
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="/css/font.css" />
    <!-- Feather icon -->
    <link rel="stylesheet" type="text/css" href="/css/feather.css" />
    <!-- Fontawesome -->
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <!-- Lc light box popup -->
    <link rel="stylesheet" type="text/css" href="/css/lc_lightbox.css" />
    <!-- Magnific Popup -->
    <link rel="stylesheet" type="text/css" href="/css/magnific-popup.min.css">
    <!-- Custom Scrollbar -->
    <link rel="stylesheet" type="text/css" href="/css/m-custom-scrollbar.min.css" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.min.css">
    <!-- Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="/css/slick.min.css">
    <!-- Slick Theme -->
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css">
    <!-- Main STyle Sheet -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">

</head>

<body>
    <!-- LOADING AREA START ===== -->
    <div class="loading-area">
        <div class="loading-box"></div>
        <div class="loading-pic">
            <div class="windows8">
                <div class="wBall" id="wBall_1">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_2">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_3">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_4">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_5">
                    <div class="wInnerBall"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- LOADING AREA  END ====== -->
    <div class="page-wraper">
        <!-- HEADER START -->
        <header class="site-header header-style-2 mobile-sider-drawer-menu header-full-width">
            <div class="sticky-header main-bar-wraper  navbar-expand-lg">
                <div class="main-bar">

                    <div class="container clearfix">
                        <!--Logo section start-->


                        <div class="my-account-logo">
                            <a href="{ route('welcome') }}"><img src="/images/ccc1.png" alt=""></a>
                        </div>
                        <!--Logo section End-->

                        <!-- NAV Toggle Button -->
                        <button id="mobile-side-drawer" data-target=".header-nav" data-toggle="collapse" type="button"
                            class="navbar-toggler collapsed">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar icon-bar-first"></span>
                            <span class="icon-bar icon-bar-two"></span>
                            <span class="icon-bar icon-bar-three"></span>
                        </button>

                        <!-- MAIN Vav -->
                        <div class="nav-animation header-nav navbar-collapse collapse d-flex justify-content-start">

                            <ul class=" nav navbar-nav">
                                <li class="has-child "><a href="{route('welcome') }}">Home</a></li>
                                </li>
                                <li><a href="{{ route('otp.page')  }}">Contact </a></li>
                                <li><a href="{{  route('about.us')  }}">About </a></li>
                            </ul>

                        </div>

                        <!-- Header Right Section-->
                        <div class="extra-nav header-2-nav">
                            <div class="extra-cell">
                                <div class="extra-nav header-2-nav">
                                    <div class="extra-cell">
                                        @guest
                                        <!--Login-->
                                        <button type="button" class="site-button aon-btn-login" data-toggle="modal"
                                            data-target="#login-signup-model">
                                            <a href="{{ route('register') }}"><i class="fa fa-user"></i> Account</a>

                                        </button>
                                        <!--Sign up-->
                                        @endguest


                                        @if (Auth::user())
                                        @auth
                                        <!--Login-->
                                        <ul class="header-widget-wrap">


                                            <li class="header-widget">
                                                <div class=" sf-toogle-btn">
                                                    {{ Auth::user()->name }}<i class="feather-power"></i></i>
                                                </div>
                                                <div class="ws-toggle-popup popup-tabs-wrap-section user-welcome-area">
                                                    @if (Auth::user())
                                                    <ul class="user-welcome-list">
                                                        <li><strong>Welcome , <span
                                                                    class="site-text-primary">{{ Auth::user()->name }}</span></strong>
                                                        </li>
                                                        <a class="dropdown-item" onclick="logout()" href="#">Logout</a>

                                                        <form id="logout-form" action="{{ route('logout') }} "
                                                            method="post"> @csrf</form>


                                                    </ul>
                                                    @endif
                                                </div>
                                            </li>


                                        </ul>
                                        @endauth
                                        @endif
                                    </div>

                                </div>


                                @if (Auth::user())
                                @auth
                                <!--Login-->
                                <ul class="header-widget-wrap">


                                    <li class="header-widget">
                                        <div class=" sf-toogle-btn">
                                            {{ Auth::user()->name }}<i class="feather-power"></i></i>
                                        </div>
                                        <div class="ws-toggle-popup popup-tabs-wrap-section user-welcome-area">
                                            @if (Auth::user())
                                            <ul class="user-welcome-list">
                                                <li><strong>Welcome , <span class="site-text-primary">Auth User
                                                            here</span></strong>
                                                </li>
                                                <a class="dropdown-item" onclick="logout()" href="#">Logout</a>

                                                <form id="logout-form" action="{{ route('logout') }} " method="post">
                                                    @csrf</form>


                                            </ul>
                                            @endif
                                        </div>
                                    </li>


                                </ul>
                                @endauth
                                @endif
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </header>

        @yield('content')


        <!-- FOOTER START -->
        <footer class="site-footer footer-light">


            <!-- FOOTER BLOCKES START -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Footer col 1-->
                        <div class="col-lg-4 col-md-6 col-sm-6  m-b30">
                            <div class="sf-site-link sf-widget-cities">
                                <h4 class="sf-f-title">About</h4>
                                <ul>
                                    <li><a href="{ route('about.us') }}">Cudo Services</a></li>

                                </ul>
                            </div>
                        </div>

                        <!-- Footer col 2-->
                        <div class="col-lg-4 col-md-6 col-sm-6  m-b30">
                            <div class="sf-site-link sf-widget-cities">
                                <h4 class="sf-f-title">Userful Links</h4>
                                <ul>
                                    <li><a href="{ route('welcome') }}">Home</a></li>
                                    <li><a href="{ route('services') }}">Vendors</a></li>
                                    <li><a href="{ route('contact') }}">Contact </a></li>
                                    <li><a href="{ route('blog') }}">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Footer col 1-->

                        <!-- Footer col 1-->
                        <div class="col-lg-4 col-md-6 col-sm-6  m-b30">
                            <div class="sf-site-link sf-widget-contact">
                                <h4 class="sf-f-title">Contact Info</h4>
                                <ul>
                                    {{-- <li>India</li>
                                    <li>+41 232 525 5257</li>
                                    <li>+41 856 525 5369</li> --}}
                                    <li>hello@cudoservices.com</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- FOOTER COPYRIGHT -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="sf-footer-bottom-section">
                        <div class="sf-f-logo"><a href="javascript:void(0);"><img src="/storage/image//logo-dark.png"
                                    alt=""></a>
                        </div>
                        <div class="sf-f-copyright">
                            <span>Copyright 2022 | Cudo Services. All Rights Reserved</span>
                        </div>

                        <div class="sf-f-social">
                            <ul class="socila-box">
                                <li><a target="#" href="https://twitter.com/Cudoservice"><i
                                            class="fa fa-twitter"></i></a></li>
                                <li><a target="#" href="https://www.facebook.com/Cudo-Services-102028239182951"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a target="#" href="https://www.instagram.com/cudoservices/"><i
                                            class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </footer>
        <!-- FOOTER END -->

        <!-- BUTTON TOP START -->
        <button class="scroltop"><span class="fa fa-angle-up  relative" id="btn-vibrate"></span></button>

    </div>



    <!-- Login Sign Up Modal -->

    <!-- Login Sign Up Modal -->


    <!-- JAVASCRIPT  FILES ========================================= -->
    <script src="/js/jquery-3.6.0.min.js"></script><!-- JQUERY.MIN JS -->
    <script src="/js/popper.min.js"></script><!-- POPPER.MIN JS -->
    <script src="/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
    <script src="/js/bootstrap-select.min.js"></script><!-- BOOTSTRAP SELECT -->
    <script src="/js/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
    <script src="/js/magnific-popup.min.js"></script><!-- MAGNIFIC-POPUP JS -->
    <script src="/js/waypoints.min.js"></script><!-- WAYPOINTS JS -->
    <script src="/js/counterup.min.js"></script><!-- COUNTERUP JS -->
    <script src="/js/waypoints-sticky.min.js"></script><!-- STICKY HEADER -->
    <script src="/js/isotope.pkgd.min.js"></script><!-- MASONRY  -->

    <script src="/js/owl.carousel.min.js"></script><!-- OWL  SLIDER  -->
    <script src="/js/slick.min.js"></script><!-- OWL  SLIDER  -->

    <script src="/js/theia-sticky-sidebar.js"></script><!-- STICKY SIDEBAR  -->
    <script src="/js/m-custom-scrollbar.min.js"></script><!-- my account left panel scroller -->
    <script src="/js/dropzone.js"></script><!-- /storage/image/ upload -->

    <script src="/js/bootstrap4-toggle.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap4.min.js"></script>

    <script src="/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
    <script src="/js/lc_lightbox.lite.js"></script><!-- IMAGE POPUP -->
    <script src="/js/bootstrap-slider.min.js"></script><!-- Form js -->


    {{-- sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session()->has('success'))
    <script>
        Swal.fire({
            title: "Successful!",
            text: "{{ session()->get('success') }}",
            icon: "success",
            button: " Aww yess!",
        });

    </script>
    @endif

    @if (session()->has('error'))
    <script>
        Swal.fire({
            title: "Ooops!",
            text: "{{ session()->get('error') }}",
            icon: "error",
            button: " Ok",
        });

    </script>
    @endif

    <script>
        function logout() {
            $('#logout-form').submit();
        }

    </script>


</body>


<!-- Mirrored from aonetheme.com/sf-html-demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Mar 2022 16:14:30 GMT -->

</html>
