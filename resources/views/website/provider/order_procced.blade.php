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
            @include('parts.provider_sidebar')
            <div class="col-lg-8 right">
                
                <div class="p-4 bg-white rounded shadow-sm mb-3">
                    <h5 class="mb-4 font-weight-bold text-center">Order Procced
                    </h5>
                    <div class="row">
                        <div class="col-md-12">
                           <div class="card bg-light">
                               <div class="card-header bg-white">
                                {{$order->service->name}}
                               </div>
                               <div class="card-body">
                                {{$order->service->description}}
                               </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-header bg-white">
                                    Order Inforamtions
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-stiped">
                                            
                                            <tbody>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <td>{{$order->user->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>To</th>
                                                    <td>{{$order->details->to}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Message</th>
                                                    <td>{{$order->details->customer_message}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Price</th>
                                                    <td>{{$order->total_price}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-header bg-white">
                                    Order Procced
                                </div>
                                <div class="card-body">
                                   @if ($order->service->is_video)
                                   <form action="{{route('provider.video_order_upload')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                    <div class="form-group">
                                        <label for="">
                                            Video Upload
                                        </label>
                                        <input type="file" name="video" accept="video/*" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-success">Upload</button>
                                    </div>
                                </form>
                                @else
                                    <form action="{{route('provider.other_order_upload')}}" method="POST">
                                        @csrf
                                    <input type="hidden" name="order_id" value="{{$order->id}}">

                                        <div class="form-group">
                                            <label for="">
                                                    Provider Note
                                            </label>
                                            <textarea name="provider_note" class="form-control" id="" cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="form-group row ">
                                            <button class="btn btn-primary rd-in btn-block">Procced</button>
                                        </div>

                                    </form>
                                   @endif
                                </div>
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
