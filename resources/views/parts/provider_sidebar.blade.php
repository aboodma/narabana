<div class="row">
    <div class="col-lg-12">
        <div class="profile_info">
            <div class="seller-card">
                <div>
                   
                </div>
                <div><a href="#" class="ambassadors-badge">{{auth()->user()->provider->providerType->name}}</a></div>
                <div class="user-profile-info">
                    <div>
                        <div class="user-profile-image">
                            <label class="user-pict">
                                <img src="{{asset(auth()->user()->avatar)}}" class="img-fluid user-pict-img" alt="Askbootstrap">
                                <a href="#"
                                    class="user-badge-round user-badge-round-med locale-en-us top-rated-seller"></a></label>
                        </div>
                    </div>
                    <div class="user-profile-label">
                        <div class="username-line">
                            <a href="#" class="seller-link">{{auth()->user()->name}}</a>
                        </div>
                        <div class="oneliner-wrapper">
                            <small class="oneliner">{{auth()->user()->provider->providerType->name}}</small>
                            <div class="ratings-wrapper">
                                <p class="rating-text"><strong>5.0</strong> (1k+ reviews)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buttons-wrapper">
                    <a href="#" class="btn btn-success btn-contact-me js-contact-me js-open-popup-join">Show Profile</a>
                    <div class="btn-lrg-standard btn-white btn-custom-order">Edit</div>
                </div>
                <div class="user-stats-desc">
                    <ul class="user-stats">
                        <li class="location">From<strong> {{ucfirst(strtolower(auth()->user()->provider->country->name))}}</strong></li>
                        <li class="member-since">Member since<strong>{{\Carbon\Carbon::createFromTimeStamp(strtotime(auth()->user()->created_at))->diffForHumans()}}</strong></li>
                        <li class="response-time">Avg. Response Time<strong>2 h</strong></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 pb-3">
        <div class="bg-white  shadow-sm ">
            <div class="dropdown-menu-show clearfix pt-2 pr-2 pl-2">
                <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                    aria-controls="collapseExample" style="font-weight: 600
         " class=" text-dark">
                    <p class="float-left"><b>Menu</b> </p>
                    <span class="fa fa-angle-double-down float-right"></span>
                </a>

            </div>
        </div>
        <div id="collapseExample" class="bg-white rounded shadow-sm sidebar-fix collapse show pb-2">

            <div class="dropdown-menu-show">
                <a class="dropdown-item py-2 @if (Route::is('provider.dashboard')) active   @endif"
                    href="{{route('provider.dashboard')}} ">
                    Profile
                </a>
                <a class="dropdown-item py-2" @if (auth()->user()->provider->is_approved)
                    href="{{route('provider.profile')}}"
                    @endif>
                    Profile Settings
                </a>

                <a class="dropdown-item py-2" href="edit-billing.html">
                    Payment Settings
                </a>
                <a class="dropdown-item py-2 @if (Route::is('provider.services')) active   @endif"
                    @if(auth()->user()->provider->is_approved)
                    href="{{route('provider.orders',"onGoing")}}"
                    @endif>
                    On Going Orders
                </a>
                <a class="dropdown-item py-2 @if (Route::is('provider.services')) active   @endif"
                    @if(auth()->user()->provider->is_approved)
                    href="{{route('provider.orders',"history")}}"
                    @endif>
                    Order History
                </a>
                <a class="dropdown-item py-2" @if(auth()->user()->provider->is_approved)
                    href="{{route('provider.services')}}"
                    @endif>
                    My Services
                </a>
                <a class="dropdown-item py-2" href="edit-billing.html">
                    My Wallet
                </a>




                <a class="dropdown-item py-2 " href="edit-payment.html">
                    Log Out
                </a>
            </div>
        </div>
    </div>
</div>
