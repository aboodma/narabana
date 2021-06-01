@extends('layouts.website')
@section('style')
<style>
    .menu-item {
        color: #000;
        font-size: 14px;
    }

    .active-menu {
        font-weight: bolder;
        color: #d47fa6 !important;
    }

</style>

@endsection
@section('content')
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            @include('parts.customer_sidebar')
            <div class="col-lg-8 right">
                
                <div class="p-4 bg-white rounded shadow-sm mb-3">
                    <h5 class="mb-4 font-weight-bold text-center">My Orders
                    </h5>
                    <div class="row">
                      
                            @foreach ($orders as $order) 
                                @if ($order->service->is_video) 
                                <div class="col-md-6">
                                    <a href="#">
                                        <div class="freelancer" >
                                            <video style="width: 100%" controls>
                                                <source src="{{$order->details->provider_message}}" type="video/webm">
                                            </video>
                                            
                                            <div class="freelancer-footer">
                    
                                                <h5 style="padding: 0px;">
                                                    <span style="font-size: 12px"></span>
                                                </h5>
                                                
                                            </div>
                                        </div>
                                    </a>
                                </div>
                             
                            </div>
                                @endif
                            @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {

     
    })
    //   freelance-slider

</script>
@endsection
