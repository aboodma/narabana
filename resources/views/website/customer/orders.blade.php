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
                        <div class="col-md-12">
                           <div class="table-responsive">
                               <table class="table  table-hover table-bordered">
                                   <thead class="thead-dark">
                                       <tr>
                                        <th>ID</th>
                                        <th>Service Name</th>
                                        <th>Provider Name</th>
                                        <th>Status</th>
                                        <th>Total Price</th>
        
                                    </tr>                                   
                                </thead>
                                   <tbody>
                                       @foreach ($orders as $order)
                                       <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->service->name}}</td>
                                        <td>{{$order->provider->user->name}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->total_price}}</td>
                                    </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                           </div>
                        </div>
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

        $('.service-slider').slick({
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 6,
            centerMode: true,
            centerPadding: '60px',
            // adaptiveHeight: true,

        });
    })
    //   freelance-slider

</script>
@endsection
