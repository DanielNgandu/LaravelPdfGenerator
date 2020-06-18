<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>InvoiceGenerator | Home</title>
    <meta name="description" content="Free Bootstrap 4 Template by uicookies.com">
    <meta name="keywords" content="Free website templates, Free bootstrap themes, Free template, Free bootstrap, Free website template">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/law-icons/font/flaticon.html')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/helpers.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing-2.css')}}">
</head>
<body data-spy="scroll" data-target="#pb-navbar" data-offset="200">
<nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
{{--            <img src="/logos/apple-icon.png" class="rounded-circle" style="height: 50px;">--}}
            Home
        </a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="ion-navicon"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="probootstrap-navbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#section-home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#section-features">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Sign Up</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Sign In</a></li>
                <li class="nav-item cta-btn ml-xl-2 ml-lg-2 ml-md-0 ml-sm-0 ml-0 "><a class="nav-link" href="{{ route('register') }}" target="_blank"><span class="pb_rounded-4 px-4 ">Get Started</span></a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="pb_cover_v3 overflow-hidden cover-bg-indigo cover-bg-opacity text-left pb_gradient_v1 pb_slant-light" id="section-home">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6">
                <h2 class="heading mb-3">Invoice Generator</h2>
                <div class="sub-heading">
                    <p class="mb-4">Make beautiful invoices on the go with one click! And have access to all your invoices in one place.</p>
                    <p class="mb-5"><a class="btn btn-success btn-lg pb_btn-pill smoothscroll" href="{{ route('register') }}"><span class="pb_font-14 text-uppercase pb_letter-spacing-1">Get Started!</span></a></p>
                </div>
            </div>
            <div class="col-md-1">
            </div>
            <div class="col-md-5 relative align-self-center">
                <form action="#" class="bg-white rounded pb_form_v1">
                    <h2 class="mb-4 mt-0 text-center">Sign Up for Free</h2>
                    <div class="form-group">
                        <input type="text" class="form-control pb_height-50 reverse" placeholder="Full name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control pb_height-50 reverse" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control pb_height-50 reverse" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <div class="pb_select-wrap">
                            <select class="form-control pb_height-50 reverse">
                                <option value="" selected>Type</option>
                                <option value="">Basic</option>
                                <option value="">Business</option>
                                <option value="">Free</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg btn-block pb_btn-pill  btn-shadow-blue" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="pb_section pb_slant-light" id="section-features">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <img src="{{ asset('assets/images/phone_3.png')}}" alt="Image placeholder" class="img-fluid">
            </div>
            <div class="col-lg-8 pl-md-5 pl-sm-0">
                <div class="row">
                    <div class="col">
                        <h2>Application Features</h2>
                        <p class="pb_font-20">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <div class="media pb_feature-v2 text-left mb-1 mt-5">
                            <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-ios-bookmarks-outline pb_icon-gradient"></i></div>
                            <div class="media-body">
                                <h3 class="mt-2 mb-2 heading">Minimal Design</h3>
                                <p class="text-sans-serif pb_font-16">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                            </div>
                        </div>
                        <div class="media pb_feature-v2 text-left mb-1 mt-5">
                            <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-ios-infinite-outline pb_icon-gradient"></i></div>
                            <div class="media-body">
                                <h3 class="mt-2 mb-2 heading">Unlimited Posibilities</h3>
                                <p class="text-sans-serif pb_font-16">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="media pb_feature-v2 text-left mb-1 mt-5">
                            <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-ios-speedometer-outline pb_icon-gradient"></i></div>
                            <div class="media-body">
                                <h3 class="mt-2 mb-2 heading">Fast Loading</h3>
                                <p class="text-sans-serif pb_font-16">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                            </div>
                        </div>
                        <div class="media pb_feature-v2 text-left mb-1 mt-5">
                            <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="ion-ios-color-filter-outline  pb_icon-gradient"></i></div>
                            <div class="media-body">
                                <h3 class="mt-2 mb-2 heading">Component Based Design</h3>
                                <p class="text-sans-serif pb_font-16">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="pb_footer bg-light pt-20" role="contentinfo">
    <div class="container">
        <div class="col text-center">

        </div>
        <div class="row">
            <div class="col text-center">
                <div class="col">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <p class="pb_font-14">&copy; {{date("Y") }} <a href="#">Invoice Generator</a>. All Rights Reserved. <br> Designed &amp; Developed by: <a href="https://danielngandu.com/">Daniel Ng`andu</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<div id="pb_loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" /><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#1d82ff" /></svg></div>
<script src="{{ asset('assets/js/jquery.min.js')}}" type="c57cfae5931f82fccdf836b6-text/javascript"></script>
<script src="{{ asset('assets/js/popper.min.js')}}" type="c57cfae5931f82fccdf836b6-text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}" type="c57cfae5931f82fccdf836b6-text/javascript"></script>
<script src="{{ asset('assets/js/slick.min.js')}}" type="c57cfae5931f82fccdf836b6-text/javascript"></script>
<script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js')}}" type="c57cfae5931f82fccdf836b6-text/javascript"></script>
<script src="{{ asset('assets/js/jquery.waypoints.min.js')}}" type="c57cfae5931f82fccdf836b6-text/javascript"></script>
<script src="{{ asset('assets/js/jquery.easing.1.3.js')}}" type="c57cfae5931f82fccdf836b6-text/javascript"></script>
<script src="{{ asset('assets/js/main.js')}}" type="c57cfae5931f82fccdf836b6-text/javascript"></script>
<script src="{{ asset('ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="c57cfae5931f82fccdf836b6-|49" defer=""></script>


</body>
</html>
