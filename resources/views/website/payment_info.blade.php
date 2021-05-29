@extends('layouts.website')
@section('style')
<style>
    .bak {
        background: #2a4d6c69;
        width: 100%;
        background-size: cover;
        height: 100%;
        position: absolute;
    }

    .pink-btn {
        color: #d47fa6;
        border-color: #d47fa6;
        border-radius: 20px;
    }

    .pink-btn:hover {
        color: #fff !important;
        background-color: #d47fa6 !important;
        border-color: #d47fa6 !important;
    }

    .btn-big-pink {
        background-color: #d47fa6 !important;
        border-color: #d47fa6 !important;

    }


    .sec-btn {
        border-radius: 20px;
    }
    .rd-in {
        border-radius: 20px;
    }

</style>
@endsection
@section('content')


<div class="services-wrapper bg-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-1">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('pay')}}" method="POST">
                            <input type="hidden" name="service_id" value="{{$request->service_id}}">
                            <input type="hidden" name="provider_id" value="{{$request->provider_id}}">
                            <input type="hidden" name="price" value="{{$request->price}}">
                            <input type="hidden" name="from" value="{{$request->from}}">
                            <input type="hidden" name="to" value="{{$request->to}}">
                            <input type="hidden" name="customer_message" value="{{$request->customer_message}}">

                            @csrf
                            <div class="form-group">
                                <legend>Payment Inforamtions</legend>
                            <small>Your card will not get charged until the video is complete <br></small>
                            </div>
                            
                            <div class="form-group">
                                <label for="">
                                    Card Holder Name
                                </label>
                                <input type="text" class="form-control rd-in" placeholder="Smith John" name="card_holder_name">
                                <small>This field is required </small>
                            </div>
                            <div class="form-group">
                                <label for="">Card Number</label>
                                <input type="text" class="form-control rd-in" placeholder="xxxx-xxxx-xxxx-xxxx-xxxx" name="card_number">
                                <small>This field is required </small>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">
                                            Exp.Month
                                        </label>
                                        <select class="form-control rd-in" name="exp_month" id="">
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 offset-md-1">
                                    <div class="form-group">
                                        <label for="">
                                            Exp.Year
                                        </label>
                                        <select class="form-control rd-in" name="exp_month" id="">
                                            @for ($i = 2021; $i <= 2035; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 offset-md-1">
                                    <div class="form-group">
                                        <label for="">
                                            CVC
                                        </label>
                                        <input type="number" name="cvc" class="form-control rd-in" maxlength="3" id="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                                <div class="row justify-content-between form-group ml-1 mr-1">
                                    <h5>Sub Total</h5>
                                    <p><b>100$</b></p>
                                </div>
                                <div class="row justify-content-between form-group ml-1 mr-1">
                                    <h5>Tax Fee</h5>
                                    <p><b>10$</b></p>
                                </div>
                                <hr>
                                <div class="row justify-content-between form-group ml-1 mr-1">
                                    <h3>Total</h3>
                                    <p><b>110$</b></p>
                                </div>
                            
                              <br>
                              <div class="form-group">
                                  <button class="btn btn-success  btn-lg btn-block" type="submit">Pay</button>
                                  <p>By Booking up you agree to Narabana <a href="">terms of service and Privacy Policy</a></p>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

                <img class="http://localhost/celebrate/narabana/public/images/video.png" src="" width="250" alt="">
            </div>
           
        </div>
     
    </div>







    @endsection
    @section('script')
    <script>
         function select_service(service_id,e) {
              $.ajax({
                  url:"{{route('service_check')}}",
                  type:"GET",
                data:{service_id:service_id},
                  success : function (re) {
                      $(".price").html(re.price + " USD");
                      $("#price").val(re.price);
                  }
              });
                $("#"+e.id).parent().toggleClass('active');
            }
        $(document).ready(function () {

            $('.freelance-slider').slick({
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 3,
                dir: "ltr",
                centerMode: true,
                centerPadding: '60px',
                // adaptiveHeight: true,

            });

           

        })
        //   freelance-slider

    </script>
    @endsection
