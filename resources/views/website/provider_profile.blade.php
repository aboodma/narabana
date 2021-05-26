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

</style>
@endsection
@section('content')


<div class="services-wrapper bg-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <img class="" src="{{asset($provider->video_thumpnail)}}" width="250" alt="">
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{$provider->user->name}}</h2>
                        <span>{{$provider->Country->name}} / {{$provider->ProviderType->name}}</span>
                        <p>{{$provider->about_me}}</p>
                        <p><i class="fa fa-clock-o"></i> Replies in 5 days</p>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('checkout')}}" method="POST">
                            <input type="hidden" name="price" id="price">
                            <input type="hidden" name="provider_id" value="{{$provider->id}}">
                            @csrf
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach ($provider->services as $service)


                                <label class="btn btn-outline-dark">
                                    <input type="radio" onclick="select_service({{$service->Service->id}},this)" name="service_id" value="{{$service->Service->id}}"
                                        id="option{{$service->Service->id}}"> {{$service->Service->name}}
                                </label>
                                @endforeach
                            </div>
                            <br>
                            <div class="form-group mt-2">
                                <button type="submit"
                                    class="btn  btn-primary  btn-xlg form-control btn-big-pink p-2">Book Now <i class="price"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="services-wrapper bg-white py-5">
            <div class="container">
                <h2>Anthony Videos</h2>
                <div class="row freelance-slider">
                    @foreach (\App\Provider::all()->take(10) as $provider)
                    <div class="col">
                        <a href="#">
                            <div class="freelancer">
                                <img src="{{asset('images/video.png')}}">
                            </div>
                        </a>
                    </div>
                    <div class="col">
                        <a href="#">
                            <div class="freelancer">
                                <img src="{{asset('images/video.png')}}">
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="services-wrapper bg-white py-5">
            <div class="container">
                <h2>Recent Feedback</h2>
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active btn-big-pink ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small>3 days ago</small>
                        </div>
                        <p class="mb-1 text-white">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam
                            eget risus varius blandit.</p>
                        <small>Donec id elit non mi porta.</small>
                    </a>
                    <hr class="btn-big-pink p-0 m-1">
                    <a href="#" class="list-group-item list-group-item-action active btn-big-pink ">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small>3 days ago</small>
                        </div>
                        <p class="mb-1 text-white">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam
                            eget risus varius blandit.</p>
                        <small>Donec id elit non mi porta.</small>
                    </a>
                  
                </div>
            </div>
        </div>
        <div class="freelance-projects bg-white py-5">
            <div class="container">
                <h1>Singers</h1>
                <div class="row freelance-slider">
                    @foreach (\App\Provider::all()->take(10) as $provider)
    
    
                    <div class="col">
                        <a href="{{route('provider_profile',$provider->id)}}">
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
                                        <span style="font-size: 12px">{{$provider->ProviderType->name}} ,
                                            {{$provider->Country->name}}</span>
                                    </h5>
                                    <button class="btn btn-default"><i style="font-size: 21px"
                                            class="fa fa-heart-o"></i></button>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
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
