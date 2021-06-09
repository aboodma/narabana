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
            <div class="col-lg-4">
                @include('parts.provider_sidebar')
            </div>
            <div class="col-lg-8 right">
                
                <div class="p-4 bg-white rounded shadow-sm mb-3">
                    <h5 class="mb-4 font-weight-bold text-center">{{__('My Orders')}}
                    </h5>
                    <div class="row">
                        <div class="col-md-12">
                           <div class="table-responsive">
                               <table class="table  table-hover table-bordered">
                                   <thead class="thead-dark">
                                       <tr>
                                        <th>{{__('ID')}}</th>
                                        <th>{{__('Service Name')}}</th>
                                        <th>{{__('Provider Name')}}</th>
                                        <th>{{__('Status')}}</th>
                                        <th>{{__('Total Price')}}</th>
                                        <th>{{__('Options')}}</th>
        
                                    </tr>                                   
                                </thead>
                                   <tbody>
                                       @foreach ($orders as $order)
                                       <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->service->name}}</td>
                                        <td>{{$order->provider->user->name}}</td>
                                        <td>@if ($order->status == 0)
                                            <span class="badge badge-warning">{{__('Pending')}}</span>
                                            @elseif($order->status == 1)
                                            <span class="badge badge-warning">{{__('Accepted')}}</span>
                                            @elseif($order->status == 2)
                                            <span class="badge badge-success">{{__('Completed')}}</span>
                                            @elseif($order->status == 3)
                                            <span class="badge badge-danger">{{__('Rejected')}}</span>
                                        @endif</td>
                                        <td>{{$order->total_price}}</td>
                                        <td>
                                            @if($order->status == 0)
                                            <a href="{{route('provider.OrderChangeStatus',[1,$order->id])}}" class="btn btn-success">{{__('Accept')}}</a>
                                            <a href="{{route('provider.OrderChangeStatus',[3,$order->id])}}" class="btn btn-danger">{{__('Reject')}}</a>

                                            @elseif($order->status == 1)
                                            <a href="{{route('provider.orders_procced',$order->id)}}" class="btn btn-success">{{__('Procced')}}</a>


                                            @endif
                                        </td>
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
