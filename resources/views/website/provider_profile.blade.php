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

                <video id="v-{{$provider->id}}" style="width: 100%" loop preload="false" autoplay   tabindex="0">
                    <source src="{{asset($provider->video)}}" type="video/mp4">
                </video>
                <span id="play-{{$provider->id}}" onclick="playVideo('{{$provider->id}}')" class="fa fa-play" style="position: absolute;
                bottom: 50%;
                left: 50%;
                display:block;
                transform: translate(-50%,50%);
                font-size: 50px;
                opacity: .8;
                transition: opacity,font-size .4s;
                color: #fff;"></span>
                <span id="pause-{{$provider->id}}" onclick="pauseVideo('{{$provider->id}}')" class="fa fa-pause" style="position: absolute;
                    display:none;
                    bottom: 50%;
                    left: 50%;
                    transform: translate(-50%,50%);
                    font-size: 50px;
                    opacity: .8;
                    transition: opacity,font-size .4s;
                    color: #fff;"></span>
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

                          
                                    <label class="btn btn-outline-dark service_select" id="{{$service->Service->id}}">
                                      <input type="radio" class="service_select"  value="{{$service->Service->id}}" name="service_id" id="{{$service->Service->id}}"  > {{$service->Service->name}}
                                    </label>
                                  
                                {{-- <label class="btn btn-outline-dark">
                                    <input type="radio" class="service_select"  name="service_id" value="{{$service->Service->id}}"
                                        id="service"> {{$service->Service->name}}
                                </label> --}}
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
                    @foreach ($provider->orders->where('status',2) as $order)
                    @if ($order->service->is_video) 
                    <div class="col">
                   
                            <div class="freelancer">
                                <video id="v-{{$order->id}}" style="width: 100%" >
                                    <source src="{{asset($order->details->provider_message)}}" type="video/mp4">
                                </video>
                                <span id="play-{{$order->id}}" onclick="playVideo('{{$order->id}}')" class="fa fa-play" style="position: absolute;
                                    bottom: 50%;
                                    left: 50%;
                                    display:block;
                                    transform: translate(-50%,50%);
                                    font-size: 50px;
                                    opacity: .8;
                                    transition: opacity,font-size .4s;
                                    color: #fff;"></span>
                                    <span id="pause-{{$order->id}}" onclick="pauseVideo('{{$order->id}}')" class="fa fa-pause" style="position: absolute;
                                        display:none;
                                        bottom: 50%;
                                        left: 50%;
                                        transform: translate(-50%,50%);
                                        font-size: 50px;
                                        opacity: .8;
                                        transition: opacity,font-size .4s;
                                        color: #fff;"></span>
                            </div>
                       
                    </div>
                    @endif
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

            $(".service_select").click(function(){
                $.ajax({
                  url:"{{route('service_check')}}",
                  type:"GET",
                data:{service_id:this.id},
                  success : function (re) {
                      $(".price").html(re.price + " USD");
                      $("#price").val(re.price);
                  }
              });
            //    $('#'+this.id).parent().toggleClass('active');
            });

        });
     
        //   freelance-slider
        function playVideo(id) {
            var vid =$("#v-"+id); 
            var play_i =$("#play-"+id);
            var pause_i =$("#pause-"+id);
            play_i.hide();
            pause_i.show();

            $("#v-"+id).get(0).play();
                }
        function pauseVideo(id) {
            var vid =$("#v-"+id); 
            var play_i =$("#play-"+id);
            var pause_i =$("#pause-"+id);
            play_i.show();
            pause_i.hide();

            $("#v-"+id).get(0).pause();
        }
    </script>
    @endsection
