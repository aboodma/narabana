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

    .sec-btn {
        border-radius: 20px;
    }

</style>
@endsection
@section('content')
    

    <div class="services-wrapper bg-white py-5">
        <div class="container">
            <div class="row main-slider">

                
                <div class="col-md-12">
                    <div class="service">
                        <img src="images/banner-1.png" style="height: 75%" >
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


    <div class="services-wrapper bg-white py-3">
        <div class="container">
            <p style="font-weight: 800;font-size:1.3rem; color:#241332" class="pb-0 mb-1">Categories

                <a href="{{route('categories')}}" style="color:#d47fa6; font-weight:800" class="float-right"> <small style="font-size: 13px ; font-weight:700">See all </small></a>
            </p>
            <div class="row service-slider">
                @foreach (App\ProviderType::all() as $providerType)
    
                    <div class="col">
                        <a href="{{route('FilterByType',$providerType->id)}}">
                        <div class="service">
                            <div class="bak"></div>
    
                            <img width="100" src="{{asset($providerType->image)}}">
                            <h3 class="text-center">{{$providerType->name}}</h3>
                        </div>
                    </a>
                    </div>
            
                @endforeach


            </div>
        </div>
    </div>



    <div class="freelance-projects bg-white py-3">
        <div class="container">
            <p style="font-weight: 800;font-size:1.3rem; color:#241332" class="pb-0 mb-1">Featured

                <a href="{{route('categories')}}" style="color:#d47fa6; font-weight:800" class="float-right"> <small style="font-size: 13px ; font-weight:700">See all </small></a>
            </p>
            <div class="row ">
                @foreach (\App\Provider::where('is_approved',true)->take(4)->get() as $provider)


                <div class=" col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6">
                    <a href="{{route('provider_profile',$provider->id)}}">
                        <div class="freelancer">
                            <img src="{{asset($provider->user->avatar)}}">
                            
                            <div class="freelancer-footer">
    
                                <h5 style="padding: 0px;">{{$provider->user->name}}
                                    <span style="font-size: 12px">{{ucfirst(strtolower($provider->ProviderType->name))}} <br>
                                        {{ucfirst(strtolower($provider->Country->name))}}</span>
                                </h5>
                                
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="freelance-projects bg-white py-3">
        <div class="container">
          <div class="row">
              <div class="col-md-12">
                <p style="font-weight: 800;font-size:1.3rem; color:#241332" class="pb-0 mb-1">Sport Player
                    <a href="{{route('categories')}}" style="color:#d47fa6; font-weight:800" class="float-right"> <small style="font-size: 13px ; font-weight:700">See all </small></a>
                </p>
               
                <div class="row ">
                    @foreach (\App\Provider::where('provider_type_id',1)->take(4)->get() as $provider)
    
    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6">
                        <a href="{{route('provider_profile',$provider->id)}}">
                            <div class="freelancer">
                                <img src="{{asset($provider->user->avatar)}}">
                                {{-- <h3 style="position: absolute;
                                left: 27px;
                                bottom: 68px;
                                font-size: 14px;
                                font-weight: bold;
                                text-transform: capitalize;
                                color: #3c3c3c;
                                background-color: #dfeaea;
                                padding: 3px;
                                border-radius: 3px;">1000 TL <i class="fa fa-video-camera"></i> </h3> --}}
                                <div class="freelancer-footer">
        
                                    <h5 style="padding: 0px;">{{$provider->user->name}}
                                        <span style="font-size: 12px">{{$provider->ProviderType->name}} <br>
                                            <small>{{$provider->Country->name}}</small></span>
                                    </h5>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
              </div>
              <div class="col-md-12">
                <p style="font-weight: 800;font-size:1.3rem; color:#241332" class="pb-0 mb-1">Singer
                    <a href="{{route('categories')}}" style="color:#d47fa6; font-weight:800" class="float-right"> <small style="font-size: 13px ; font-weight:700">See all </small></a>
                </p>
                <div class="row ">
                    @foreach (\App\Provider::where('provider_type_id',2)->take(10)->get() as $provider)
    
    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6">
                        <a href="{{route('provider_profile',$provider->id)}}">
                            <div class="freelancer">
                              
                                <img src="{{asset($provider->user->avatar)}}">
                               
                                <div class="freelancer-footer">
        
                                    <h5 style="padding: 0px;">{{$provider->user->name}}
                                        <span style="font-size: 12px">{{$provider->ProviderType->name}} <br>
                                            <small>{{$provider->Country->name}}</small></span>
                                    </h5>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
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
                
                centerPadding: '60px',
                adaptiveHeight: true,
                responsive:[
                    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow:2,
        slidesToScroll: 1
      }
    }
                ]

            });
            $('.freelance-slider').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4,
                
                centerPadding: '60px',
                adaptiveHeight: true,
                responsive:[
                    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
                ]

            });
            $('.freelance-category').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4,
                
                centerPadding: '60px',
                adaptiveHeight: true,
                responsive:[
                    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
                ]
                

            });
            $('.main-slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 2000,
                fade: true,
            });
        })
        //   freelance-slider

    </script>
@endsection