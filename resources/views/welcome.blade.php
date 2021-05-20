<!DOCTYPE html>
<html>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gurdeep singh osahan">
    <meta name="author" content="Gurdeep singh osahan">
    <title>Miver - LMS & Freelance Services Marketplace for Businesses HTML Template</title>

    <link rel="icon" type="image/png" href="images/fav.svg">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/fontawesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">

    <link href="vendor/slick-master/slick/slick.css" rel="stylesheet" type="text/css">

    <link href="vendor/lightgallery-master/dist/css/lightgallery.min.css" rel="stylesheet">

    <link href="vendor/select2/css/select2-bootstrap.css" />
    <link href="vendor/select2/css/select2.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

    <link href="css/style.css" rel="stylesheet">
    <style>
        .bak {
	background: #2a4d6c69;
	width: 100%;
	background-size: cover;
	height: 100%;
	position: absolute;
}
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light topbar static-top shadow-sm bg-white osahan-nav-top px-0">
        <div class="container">

            <a class="navbar-brand" href="index-2.html"><img src="images/logo.png" alt=""></a>

            <form class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" style="border-top-left-radius:20px;border-bottom-left-radius:20px;padding:20px" class="form-control bg-white small" placeholder="Find Services..."
                        aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-dark" style="border-top-right-radius:20px;border-bottom-right-radius:20px;"  type="button">
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
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                        aria-labelledby="navbarDropdownAlerts">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-bell mr-2">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                            Alerts Center
                        </h6>
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-activity">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                </svg>
                            </div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 29, 2020</div>
                                <div class="dropdown-notifications-item-content-text">This is an alert message. It's
                                    nothing serious, but it requires your attention.</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-bar-chart">
                                    <line x1="12" y1="20" x2="12" y2="10"></line>
                                    <line x1="18" y1="20" x2="18" y2="4"></line>
                                    <line x1="6" y1="20" x2="6" y2="16"></line>
                                </svg>
                            </div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 22, 2020</div>
                                <div class="dropdown-notifications-item-content-text">A new monthly report is ready.
                                    Click here to view!</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-danger">
                                <svg class="svg-inline--fa fa-exclamation-triangle fa-w-18" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="exclamation-triangle" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z">
                                    </path>
                                </svg>

                            </div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 8, 2020</div>
                                <div class="dropdown-notifications-item-content-text">Critical system failure, systems
                                    shutting down.</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user-plus">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg>
                            </div>
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-details">December 2, 2020</div>
                                <div class="dropdown-notifications-item-content-text">New user request. Woody has
                                    requested access to the organization.</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-footer" href="alerts.html">View All Alerts</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages"
                        href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-mail">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                        aria-labelledby="navbarDropdownMessages">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-mail mr-2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            Message Center
                        </h6>
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <img class="dropdown-notifications-item-img" src="images/user/s7.png">
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                    laborum.</div>
                                <div class="dropdown-notifications-item-content-details">Emily Fowler · 58m</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <img class="dropdown-notifications-item-img" src="images/user/s8.png">
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                    consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                    voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                    laborum.</div>
                                <div class="dropdown-notifications-item-content-details">Diane Chambers · 2d</div>
                            </div>
                        </a>
                        <a class="dropdown-item dropdown-notifications-footer" href="messages.html">Read All
                            Messages</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow no-caret dropdown-user">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                        href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><img class="img-fluid" src="images/user/s4.png"></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                        aria-labelledby="navbarDropdownUserImage">
                        <h6 class="dropdown-header d-flex align-items-center">
                            <img class="dropdown-user-img" src="images/user/s4.png">
                            <div class="dropdown-user-details">
                                <div class="dropdown-user-details-name">Askbootstrap</div>
                                <div class="dropdown-user-details-email"><a
                                        href="https://askbootstrap.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                        data-cfemail="046d65696b77656c656a446369656d682a676b69">[email&#160;protected]</a>
                                </div>
                            </div>
                        </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="account.html">
                            <div class="dropdown-item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-settings">
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <path
                                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                    </path>
                                </svg>
                            </div>
                            Account
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="dropdown-item-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                            </div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="services-wrapper bg-white py-5">
        <div class="container">
            <div class="row main-slider">
                
                <div class="col-md-12">
                    <div class="service">
                        <img src="images/pro_banner_1400px-2x.png">
                        <h3 style="position: absolute;
                        left: 41%;
                        top: 50%;
                        font-size: 36px;
                        font-weight: bold;
                        text-transform: capitalize;
                        color: #fff;"><span>Build Your Brand</span> Logo Design</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="service">
                        <img src="images/banner.png">
                        <h3 style="position: absolute;
                        left: 41%;
                        top: 50%;
                        font-size: 36px;
                        font-weight: bold;
                        text-transform: capitalize;
                        color: #fff;"><span>Build Your Brand</span> Logo Design</h3>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <div class="services-wrapper bg-white py-5">
        <div class="container">
            <h2>Categories</h2>
            <div class="row service-slider">
                @foreach (App\ProviderType::all() as $providerType)
                <div class="col">
                    <div class="service">
                        <div class="bak"></div>

                        <img width="100" src="{{asset($providerType->image)}}">
                        <h3 class="text-center">{{$providerType->name}}</h3>
                    </div>
                </div>
                @endforeach
               
          
            </div>
        </div>
    </div>



    <div class="freelance-projects bg-white py-5">
        <div class="container">
            <h1>Featured</h1>
            <div class="row freelance-slider">
                @foreach (\App\Provider::all()->take(10) as $provider)
                    
            
                <div class="col">
                    <div class="freelancer">
                        <img src="{{asset($provider->user->avatar)}}">
                        <h3 style="position: absolute;
                        left: 27px;
                        bottom: 68px;
                        font-size: 14px;
                        font-weight: bold;
                        text-transform: capitalize;
                        color: #3c3c3c;
                        background-color: #dfeaea;
                        padding: 3px;
                        border-radius: 3px;">1000 TL <i class="fa fa-video-camera"></i> </h3>
                        <div class="freelancer-footer">
                            
                            <h5 style="padding: 0px;">{{$provider->user->name}}
                                <span style="font-size: 12px">{{$provider->ProviderType->name}} , {{$provider->Country->name}}</span>
                            </h5>
                            <button class="btn btn-default"><i style="font-size: 21px" class="fa fa-heart-o"></i></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


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
                    <a href="index-2.html">
                        <img src="images/logo.png">
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



    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="3ebbb932e316a3ee2377425e-text/javascript"></script>


    <script src="js/jqBootstrapValidation.js" type="3ebbb932e316a3ee2377425e-text/javascript"></script>
    <script src="js/contact_me.js" type="3ebbb932e316a3ee2377425e-text/javascript"></script>

    <script src="vendor/slick-master/slick/slick.js" type="3ebbb932e316a3ee2377425e-text/javascript" charset="utf-8">
    </script>

    <script src="vendor/lightgallery-master/dist/js/lightgallery-all.min.js"
        type="3ebbb932e316a3ee2377425e-text/javascript"></script>

    <script src="vendor/select2/js/select2.min.js" type="3ebbb932e316a3ee2377425e-text/javascript"></script>

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<script>
            
          $(document).ready(function(){
            $('.service-slider').slick({
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 6,
            centerMode: true,
            centerPadding: '60px',
            adaptiveHeight: true,
          
            });
            $('.freelance-slider').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            centerMode: true,
            centerPadding: '60px',
            adaptiveHeight: true,
          
            });
            $('.main-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:false,
            autoplay:true,
            autoplaySpeed:2000,
            fade: true,
            });
          })
        //   freelance-slider
        </script>
    <script src="js/custom.js" type="3ebbb932e316a3ee2377425e-text/javascript"></script>

</body>



</html>
