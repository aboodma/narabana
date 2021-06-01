<div class="col-lg-3 left">
    <div class="mb-3 border rounded list-sidebar overflow-hidden bg-white">
        <div class="box-title p-3 border-bottom">
          <h6 class="m-0">Menu</h6>
        </div>
        <ul class="list-group list-group-flush">
            <li>
                <a  class="p-3 d-inline-block w-100 border-bottom text-muted  @if (Route::is('provider.dashboard')) active-menu   @endif" href="{{route('provider.dashboard')}} " > <i class="fa fa-dashboard"></i> Dashboard</a>
              </li>
          <li>
            <a class="p-3 d-inline-block w-100 border-bottom text-muted @if (Route::is('provider.profile')) active-menu   @endif" 
            @if(auth()->user()->provider->is_approved)
            href="{{route('provider.profile')}}"
            @endif
            > <i class="fa fa-address-card-o"></i> My Profile</a>
          </li>
          <li>
            <a class="p-3 d-inline-block w-100 border-bottom text-muted @if (Route::is('provider.services')) active-menu   @endif" 
            @if(auth()->user()->provider->is_approved)
            href="{{route('provider.services')}}"
            @endif
            > <i class="fa fa-gears"></i> My Services</a>
          </li>
          <li>
            <a class="p-3 d-inline-block w-100 border-bottom text-muted @if (Route::is('provider.services')) active-menu   @endif" 
            @if(auth()->user()->provider->is_approved)
            href="{{route('provider.orders',"onGoing")}}"
            @endif
            > <i class="fa fa-cart-plus"></i> On Going Orders</a>
          </li>
          <li>
            <a class="p-3 d-inline-block w-100 border-bottom text-muted @if (Route::is('provider.services')) active-menu   @endif" 
            @if(auth()->user()->provider->is_approved)
            href="{{route('provider.orders',"history")}}"
            @endif
            > <i class="fa fa-cart-plus"></i> Orders History</a>
          </li>

          <li>
            <a class="p-3 d-inline-block w-100 border-bottom text-muted" 
   
            href="#Breadcrumb"

            > <i class="fa fa-sign-out"></i> Logout</a>
          </li>
          
          
        </ul>
      </div>
</div>