<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$settings->site_name}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('user/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('user/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{asset('user/vendor/owl.carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('user/vendor/owl.carousel/assets/owl.theme.default.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('user/css/style.pink.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('user/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">


    



    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
    <!-- navbar-->
    <header class="header mb-5">
        <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
        <div id="top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offer mb-3 mb-lg-0"><a href="#" class="btn btn-success btn-sm">Offer of the
                            day</a><a href="#" class="ml-1">Get flat 35% off on orders over $50!</a></div>
                    <div class="col-lg-6 text-center text-lg-right">
                        <ul class="menu list-inline mb-0">
                            <li class="list-inline-item"><a href="#" data-toggle="modal"
                                    data-target="#login-modal">Login</a></li>
                            <li class="list-inline-item"><a href="register.html">Register</a></li>
                            <li class="list-inline-item"><a href="contact.html">Contact</a></li>
                            <li class="list-inline-item"><a href="#">Recently viewed</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true"
                class="modal fade">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Customer login</h5>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="customer-orders.html" method="post">
                                <div class="form-group">
                                    <input id="email-modal" type="text" placeholder="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input id="password-modal" type="password" placeholder="password"
                                        class="form-control">
                                </div>
                                <p class="text-center">
                                    <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                                </p>
                            </form>
                            <p class="text-center text-muted">Not registered yet?</p>
                            <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>!
                                It is easy and done in 1 minute and gives you access to special discounts and much more!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** TOP BAR END ***-->


        </div>
        @include('includes.nav')
        <div id="search" class="collapse">
            <div class="container">
                <form role="search" class="ml-auto">
                    <div class="input-group">
                        <input type="text" placeholder="Search" class="form-control">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </header>
    @yield('content')
    <!--
    *** FOOTER ***
    _________________________________________________________
    -->
    @include('includes.footer')
    <!-- *** COPYRIGHT END ***-->
    <!-- JavaScript files-->
    <script src="{{asset('user/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('user/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('user/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('user/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js')}}"></script>
    <script src="{{asset('user/js/front.js')}}"></script>
    <script>
        $(document).ready(function () {
            let promo = $('.promo');
            if ($('.promo').length > 1) {
                $('.promo:first').css('top', '0px');
                $('.promo:not(:first)').css('top', '0px');
                let a = $('.promo:first').css('top');
                $p = $('.promo:not(:first)');
                let i = 0;
                $.each($p, function () {
                    i += parseInt($(this).css('top')) + 50;
                    $(this).css('top', i);

                })
                console.log(a);
            }
        });

    </script>
</body>

</html>
