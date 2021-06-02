<!DOCTYPE html>
<html>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gurdeep singh osahan">
    <meta name="author" content="Gurdeep singh osahan">
    <title>Miver - LMS & Freelance Services Marketplace for Businesses HTML Template</title>

    <link rel="icon" type="image/png" href="images/fav.svg">

    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/fontawesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/icons/css/materialdesignicons.min.css')}}" media="all" rel="stylesheet" type="text/css">

    <link href="{{asset('vendor/slick-master/slick/slick.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('vendor/lightgallery-master/dist/css/lightgallery.min.css')}}" rel="stylesheet">

    <link href="{{asset('vendor/select2/css/select2-bootstrap.css')}}" />
    <link href="{{asset('vendor/select2/css/select2.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    @yield('style')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light topbar static-top shadow-sm bg-white osahan-nav-top px-0">
        <div class="container">

            <a class="navbar-brand" href="{{route('welcome')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>

            <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" style="border-top-left-radius:20px;border-bottom-left-radius:20px;padding:20px"
                        class="form-control bg-white small" placeholder="Find Services..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-dark"
                            style="border-top-right-radius:20px;border-bottom-right-radius:20px;" type="button">
                            <i class="fa fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <ul class="navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications d-sm-none">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" href="#" id="searchDropdown"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-search fa-fw"></i>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right p-3 shadow-sm animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Find Services..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                @guest
                <li class="nav-item dropdown no-arrow no-caret mr-3 ">
                    <a class="btn btn-outline-danger pink-btn" id="navbarDropdownAlerts" href="{{route('login')}}"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Login
                    </a>

                </li>
                <li class="nav-item dropdown no-arrow no-caret mr-3 ">
                    <a class="btn btn-outline-secondary sec-btn" id="navbarDropdownAlerts" href="{{route('register')}}"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sign Up
                    </a>

                </li>
                <li class="nav-item dropdown no-arrow no-caret mr-3 ">
                    <a class="btn btn-outline-secondary sec-btn" id="navbarDropdownAlerts" href="{{route('be_our_partner')}}"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Be Our Partner
                    </a>

                </li>
                @endguest
                @auth
                <li class="nav-item dropdown no-arrow no-caret mr-3 ">
                    <a class="btn btn-outline-secondary sec-btn" id="navbarDropdownAlerts" href="@if(auth()->user()->user_type == 1){{route('provider.dashboard')}} @elseif(auth()->user()->user_type == 0){{route('customer_dashboard')}} @else {{route('admin.home')}}  @endif" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dashboard
                    </a>

                </li>
                <li class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts"
                        href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </a>
                    
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
            </form>
                <li class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications">
                    <button class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts"
                    href="{{ route('logout') }}" role="button" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                        </button>
                    
                </li>
                <li class="nav-item">
                    Welcome <br>
                     {{auth()->user()->name}}
                </li>
                
                @endauth


            </ul>
        </div>
    </nav>

    @yield('content')


    
    <footer class="bg-white">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="footer-list">
                    <h2>Categories</h2>
                    <ul class="list">
                        <li><a href="#">Graphics &amp; Design</a></li>
                        <li><a href="#">Digital Marketing</a></li>
                        <li><a href="#">Writing &amp; Translation</a></li>
                        <li><a href="#">Video &amp; Animation</a></li>
                        <li><a href="#">Music &amp; Audio</a></li>
                        <li><a href="#">Programming &amp; Tech</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
                <div class="footer-list">
                    <h2>About</h2>
                    <ul class="list">
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press &amp; News</a></li>
                        <li><a href="#">Partnerships</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Intellectual Property Claims</a></li>
                        <li><a href="#" target="_blank">Investor Relations</a></li>
                    </ul>
                </div>
                <div class="footer-list">
                    <h2>Support</h2>
                    <ul class="list">
                        <li><a href="#">Help &amp; Support</a></li>
                        <li><a href="#">Trust &amp; Safety</a></li>
                        <li><a href="#">Selling on Miver
                            </a>
                        </li>
                        <li><a href="#">Buying on Miver
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer-list">
                    <h2>Community</h2>
                    <ul class="list">
                        <li><a href="#">Events</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Forum</a></li>
                        <li><a href="#">Community Standards</a></li>
                        <li><a href="#">Podcast</a></li>
                        <li><a href="#">Affiliates</a></li>
                        <li><a href="#">Invite a Friend</a></li>
                        <li><a href="#">Become a Seller</a></li>
                        <li><a href="#">Miver
                                Elevate<small>Exclusive Benefits</small></a>
                        </li>
                    </ul>
                </div>
                <div class="footer-list">
                    <h2>More From Miver</h2>
                    <ul class="list">
                        <li><a href="#">Miver
                                Pro</a>
                        </li>
                        <li><a href="#">Miver
                                Studios</a>
                        </li>
                        <li><a href="#">Miver
                                Logo Maker</a>
                        </li>
                        <li><a href="#">Get Inspired</a></li>
                        <li><a href="#">ClearVoice<small>Content Marketing</small></a></li>
                        <li><a href="#">AND CO<small>Invoice Software</small></a></li>
                        <li><a href="#">Learn<small>Online Courses</small></a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <div class="logo">
                    <a href="{{route('welcome')}}">
                        <img src="{{asset('images/logo.png')}}">
                    </a>
                </div>
                <p>© Copyright 2022 Miver. All Rights Reserved
                </p>
                <ul class="social">
                    <li>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>



    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}" type="3ebbb932e316a3ee2377425e-text/javascript"></script>


    <script src="{{asset('js/jqBootstrapValidation.js')}}" type="3ebbb932e316a3ee2377425e-text/javascript"></script>
    <script src="{{asset('js/contact_me.js')}}" type="3ebbb932e316a3ee2377425e-text/javascript"></script>

    <script src="{{asset('vendor/slick-master/slick/slick.js')}}" type="3ebbb932e316a3ee2377425e-text/javascript" charset="utf-8">
    </script>

    <script src="{{asset('vendor/lightgallery-master/dist/js/lightgallery-all.min.js')}}"
        type="3ebbb932e316a3ee2377425e-text/javascript"></script>

    <script src="{{asset('vendor/select2/js/select2.min.js')}}" type="3ebbb932e316a3ee2377425e-text/javascript"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @yield('script')
    <script src="{{asset('js/custom.js')}}" type="3ebbb932e316a3ee2377425e-text/javascript"></script>

</body>



</html>
