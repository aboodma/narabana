@extends('layouts.website')
@section('title',$provider->user->name)
@section('style')
<style>
    .slick-track{
        float: left;
    }
    .resp-sharing-button__link,
.resp-sharing-button__icon {
  display: inline-block
}

.resp-sharing-button__link {
  text-decoration: none;
  color: #fff;
  margin: 0.5em
}

.resp-sharing-button {
  border-radius: 5px;
  transition: 25ms ease-out;
  padding: 0.5em 0.75em;
  font-family: Helvetica Neue,Helvetica,Arial,sans-serif
}

.resp-sharing-button__icon svg {
  width: 1em;
  height: 1em;
  margin-right: 0.4em;
  vertical-align: top
}

.resp-sharing-button--small svg {
  margin: 0;
  vertical-align: middle
}

/* Non solid icons get a stroke */
.resp-sharing-button__icon {
  stroke: #fff;
  fill: none
}

/* Solid icons get a fill */
.resp-sharing-button__icon--solid,
.resp-sharing-button__icon--solidcircle {
  fill: #fff;
  stroke: none
}

.resp-sharing-button--twitter {
  background-color: #55acee
}

.resp-sharing-button--twitter:hover {
  background-color: #2795e9
}

.resp-sharing-button--pinterest {
  background-color: #bd081c
}

.resp-sharing-button--pinterest:hover {
  background-color: #8c0615
}

.resp-sharing-button--facebook {
  background-color: #3b5998
}

.resp-sharing-button--facebook:hover {
  background-color: #2d4373
}

.resp-sharing-button--tumblr {
  background-color: #35465C
}

.resp-sharing-button--tumblr:hover {
  background-color: #222d3c
}

.resp-sharing-button--reddit {
  background-color: #5f99cf
}

.resp-sharing-button--reddit:hover {
  background-color: #3a80c1
}

.resp-sharing-button--google {
  background-color: #dd4b39
}

.resp-sharing-button--google:hover {
  background-color: #c23321
}

.resp-sharing-button--linkedin {
  background-color: #0077b5
}

.resp-sharing-button--linkedin:hover {
  background-color: #046293
}

.resp-sharing-button--email {
  background-color: #777
}

.resp-sharing-button--email:hover {
  background-color: #5e5e5e
}

.resp-sharing-button--xing {
  background-color: #1a7576
}

.resp-sharing-button--xing:hover {
  background-color: #114c4c
}

.resp-sharing-button--whatsapp {
  background-color: #25D366
}

.resp-sharing-button--whatsapp:hover {
  background-color: #1da851
}

.resp-sharing-button--hackernews {
background-color: #FF6600
}
.resp-sharing-button--hackernews:hover, .resp-sharing-button--hackernews:focus {   background-color: #FB6200 }

.resp-sharing-button--vk {
  background-color: #507299
}

.resp-sharing-button--vk:hover {
  background-color: #43648c
}

.resp-sharing-button--facebook {
  background-color: #3b5998;
  border-color: #3b5998;
}

.resp-sharing-button--facebook:hover,
.resp-sharing-button--facebook:active {
  background-color: #2d4373;
  border-color: #2d4373;
}

.resp-sharing-button--twitter {
  background-color: #55acee;
  border-color: #55acee;
}

.resp-sharing-button--twitter:hover,
.resp-sharing-button--twitter:active {
  background-color: #2795e9;
  border-color: #2795e9;
}

.resp-sharing-button--tumblr {
  background-color: #35465C;
  border-color: #35465C;
}

.resp-sharing-button--tumblr:hover,
.resp-sharing-button--tumblr:active {
  background-color: #222d3c;
  border-color: #222d3c;
}

.resp-sharing-button--email {
  background-color: #777777;
  border-color: #777777;
}

.resp-sharing-button--email:hover,
.resp-sharing-button--email:active {
  background-color: #5e5e5e;
  border-color: #5e5e5e;
}

.resp-sharing-button--pinterest {
  background-color: #bd081c;
  border-color: #bd081c;
}

.resp-sharing-button--pinterest:hover,
.resp-sharing-button--pinterest:active {
  background-color: #8c0615;
  border-color: #8c0615;
}


</style>
@endsection
@section('content')
<div class="services-wrapper bg-white py-2 ">
    <div class="container">
        <div class="row d-inline d-none d-sm-block d-md-none">
            <ol class="breadcrumb bg-white mb-0 pb-0">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('FilterByType',$provider->ProviderType->id)}}">{{_ti($provider->ProviderType->name)}}</a></li>
                <li class="breadcrumb-item active font-weight-bold" aria-current="page">{{$provider->user->name}}</li>
              </ol>
        </div>
        <div class="row d-none d-lg-block">
            <ol class="breadcrumb bg-white ">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('FilterByType',$provider->ProviderType->id)}}">{{_ti($provider->ProviderType->name)}}</a></li>
                <li class="breadcrumb-item active font-weight-bold" aria-current="page">{{$provider->user->name}}</li>
              </ol>
        </div>
        <div class="row d-inline d-none d-sm-block d-md-none">
            <div class="col-md-12">
                <h2 class="pb-0">{{$provider->user->name}} <i class="fas fa-check-circle text-primary" style="font-size: large;"></i>
                </h2>
            </div>
        </div>
        
        <div class="row">
           
           
            <div class="col-md-3">
                <img style="position: absolute;
                width: 30%;
                align-self: center;
                top: 84%;
                filter: brightness(100);
                float: right;
                right: 7%;
                " src="{{asset('images/logo.png')}}" alt="">

                <video
               
                id="v-{{$provider->id}}" style="width: 100%" loop preload="false" autoplay="true"   tabindex="0">
                    
                    <source src="{{asset($provider->video)}}" type="video/mp4">
                </video>
                <span id="play-{{$provider->id}}" onclick="playVideo('{{$provider->id}}')" class="fa fa-play play-btn" ></span>
                <span id="pause-{{$provider->id}}" onclick="pauseVideo('{{$provider->id}}')" class="fa fa-pause pause-btn" ></span>
            </div>
            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="d-none d-lg-block">{{$provider->user->name}} <i class="fas fa-check-circle text-primary" style="font-size: large;"></i>
                        </h2>
                        <span class="pb-2 mb-2">{{_ti($provider->Country->name)}} / {{_ti($provider->ProviderType->name)}}</span> <!-- Sharingbutton Facebook -->
                        <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsharingbuttons.io" target="_blank" rel="noopener" aria-label="">
                          <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--circle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="11.5"/><path d="M15.84 9.5H13.5V8.48c0-.53.35-.65.6-.65h1.4v-2.3h-2.35c-2.3 0-2.65 1.7-2.65 2.8V9.5h-2v2h2v7h3v-7h2.1l.24-2z"/></svg>
                            </div>
                          </div>
                        </a>
                        
                        <!-- Sharingbutton Twitter -->
                        <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;url=http%3A%2F%2Fsharingbuttons.io" target="_blank" rel="noopener" aria-label="">
                          <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--circle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.5 7.4l-2 .2c-.4-.5-1-.8-2-.8C13.3 6.8 12 8 12 9.4v.6c-2 0-4-1-5.4-2.7-.2.4-.3.8-.3 1.3 0 1 .4 1.7 1.2 2.2-.5 0-1 0-1.2-.3 0 1.3 1 2.3 2 2.6-.3.4-.7.4-1 0 .2 1.4 1.2 2 2.3 2-1 1-2.5 1.4-4 1 1.3 1 2.7 1.4 4.2 1.4 4.8 0 7.5-4 7.5-7.5v-.4c.5-.4.8-1.5 1.2-2z"/><circle cx="12" cy="12" r="11.5"/></svg>
                            </div>
                          </div>
                        </a>
                        
                        <!-- Sharingbutton Tumblr -->
                        <a class="resp-sharing-button__link" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;caption=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;content=http%3A%2F%2Fsharingbuttons.io&amp;canonicalUrl=http%3A%2F%2Fsharingbuttons.io&amp;shareSource=tumblr_share_button" target="_blank" rel="noopener" aria-label="">
                          <div class="resp-sharing-button resp-sharing-button--tumblr resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--circle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="11.5"/><path d="M12.5 4.5v3h2v2h-2v3.72c0 2.47 1.48 2.7 3 1.7v2.7c-4.1 1.92-6-.62-6-3.6V9.5h-2V8.14c.55-.18 1.24-.43 1.63-.77.4-.33.7-.73.94-1.2.24-.46.4-.95.5-1.67h1.93z"/></svg>
                            </div>
                          </div>
                        </a>
                        
                        <!-- Sharingbutton E-Mail -->
                        <a class="resp-sharing-button__link" href="mailto:?subject=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;body=http%3A%2F%2Fsharingbuttons.io" target="_self" rel="noopener" aria-label="">
                          <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--circle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.5 16c0 .8-.7 1.5-1.5 1.5H6c-.8 0-1.5-.7-1.5-1.5V8c0-.8.7-1.5 1.5-1.5h12c.8 0 1.5.7 1.5 1.5v8zm-2-7.5L12 13 6.5 8.5m11 6l-4-2.5m-7 2.5l4-2.5"/><circle cx="12" cy="12" r="11.5"/></svg>
                            </div>
                          </div>
                        </a>
                        
                        <!-- Sharingbutton Pinterest -->
                        <a class="resp-sharing-button__link" href="https://pinterest.com/pin/create/button/?url=http%3A%2F%2Fsharingbuttons.io&amp;media=http%3A%2F%2Fsharingbuttons.io&amp;description=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking." target="_blank" rel="noopener" aria-label="">
                          <div class="resp-sharing-button resp-sharing-button--pinterest resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--circle">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><circle cx="12" cy="12" r="11.5"/><path d="M8 11.2c-.15-.32-.25-.72-.25-1.22 0-2.32 1.74-4.4 4.53-4.4 2.47 0 3.82 1.5 3.82 3.52 0 2.64-1.17 4.88-2.9 4.88-.97 0-1.7-.8-1.46-1.77.28-1.14.8-2.4.8-3.23 0-.76-.4-1.38-1.23-1.38-.95 0-1.74 1-1.74 2.37 0 .86.3 1.45.3 1.45l-1.2 5c-.34 1.5-.04 3.33-.02 3.5.02.1.16.15.22.06.1-.12 1.26-1.56 1.66-3l.66-2.53c.32.6 1.25 1.14 2.24 1.14 2.95 0 4.95-2.7 4.95-6.3 0-2.73-2.3-5.27-5.82-5.27-4.36 0-6.57 3.14-6.57 5.75 0 .85.18 1.64.53 2.28l1.5-.8z"/></svg>
                            </div>
                          </div>
                        </a>
                        
                        
                        <p class="pt-2">{{$provider->about_me}}</p>
                        <p style="font-weight: bold;color: #ba6089;"><i class="fa fa-clock-o" style="color: #ba6089;font-size: initial;"></i> {{__('Replies in 5 days')}}</p>
                        @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->count() != 0)
                        <p> <i class="fa fa-star @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate >= 1) text-warning @endif"></i> 
                                <i class="fa fa-star @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate >= 2) text-warning @endif"></i>
                                <i class="fa fa-star @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate >= 3) text-warning @endif"></i> 
                                <i class="fa fa-star @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate >= 4) text-warning @endif"></i>
                                <i class="fa fa-star @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate == 5) text-warning @endif"></i>
                                / <span class="font-weight-bold">{{$provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate}} {{__('Star')}} </span>    
                            </p>
                        <p class="font-weight-bold" style="text-decoration:underline; font-size:14px; color:black"><a style="color:black" href="#" data-toggle="modal" data-target="#exampleModal">{{__('Show More Reviews')}} ({{$provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->count()}})</a></p>
                            @else 
                            <p> <i class="fa fa-star "></i> 
                                <i class="fa fa-star "></i>
                                <i class="fa fa-star "></i> 
                                <i class="fa fa-star "></i>
                                <i class="fa fa-star "></i>
                                / <span class="font-weight-bold">{{__('0 Star')}} </span>    
                            </p>
                        <p class="font-weight-bold" style="text-decoration:underline; font-size:14px; color:black"><a style="color:black" href="#">{{__('Show More Reviews (0)')}}</a></p>

                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 copyright p-2 pb-3" >
                        <ul class="social " style="margin-left: 0">
                            @if($provider->links_fb != null)
                            <li>
                                <a href="{{$provider->links_fb}}"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            @endif
                            @if($provider->links_tweet != null)
                            <li>
                                <a href="{{$provider->links_tweet}}"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            @endif
                            @if($provider->links_youtube != null)
                            <li>
                                <a href="{{$provider->links_youtube}}"><i class="fab fa-youtube" aria-hidden="true"></i></a>
                            </li>
                            @endif
                            @if($provider->links_tiktok != null)
                            <li>
                                <a href="{{$provider->links_tiktok}}"><i class="fab fa-tiktok" aria-hidden="true"></i></a>
                            </li>
                            @endif
                            @if($provider->links_ig != null)
                            <li>
                                <a href="{{$provider->links_ig}}"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('checkout')}}" method="POST">
                            <input type="hidden" name="price" id="price">
                            <input type="hidden" id="provider_id" name="provider_id" value="{{$provider->id}}">
                            @csrf
                            <div class=" btn-group-toggle" data-toggle="buttons">
                                @foreach ($provider->services as $service)
                                    <label class="btn btn-outline-success service_select @if($loop->first) active @endif" id="{{$service->Service->id}}">
                                      <input type="radio" class="service_select" @if($loop->first) checked @endif value="{{$service->Service->id}}" name="service_id" id="{{$service->Service->id}}"  > {{_ti($service->Service->name)}}
                                    </label>
                                @endforeach
                            </div>
                            <br>
                            <div class="form-group bg-light rounded p-1 "id="description_row" style="display: none">
                           
                    
                                    <h5>{{__('Service Descrption')}}</h5>
                                    <p id="description" class=""></p>
                                
                     
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit"
                                @if($provider->services->count()  == 0) disabled @endif
                                    class="btn  btn-success  btn-xlg form-control rd-in  p-2 @if($provider->services->count()  == 0) disabled @endif ">{{__('Book Now')}} <i class="price"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        @if($provider->orders->count() != 0)
        <div class="services-wrapper bg-white py-5">
            <div class="container">
                <h2>{{$provider->user->name}} {{__('Videos')}}</h2>
                <div class="row freelance-slider">
                    @foreach ($provider->orders->where('status',2) as $order)
                    @if ($order->service->is_video) 
                    <div class="col">
                   
                            <div class="freelancer">
                                <video id="v-{{$order->id}}" style="width: 100%"
                                        @php 
                                        $file_name= explode('.',$order->details->provider_message);
                                        $poster_path = public_path("uploads/thumbs/").$file_name[0].".jpg";
                                        @endphp
                                        @if(file_exists(public_path("uploads/thumbs/".$file_name[0].".jpg")))
                                        poster="{{asset("uploads/thumbs/".$file_name[0].".jpg")}}"

                                        @endif
                                    >
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
        @endif
        <div class="freelance-projects bg-white py-5">
            <div class="container">
                <h1>{{_ti($provider->ProviderType->name)}}</h1>
                <div class="row freelance-slider">
                    @foreach (\App\Provider::where('provider_type_id',$provider->ProviderType->id)->get()->take(10) as $provider)
                    <div class="col">
                        <a href="{{route('provider_profile',$provider->slug)}}">
                            <div class="freelancer">
                                <div>
                                    <div class="top-right p-1 text-center">
                                        <span class="fa fa-heart-o"></span>
                                    </div>
                                    @if($provider->services()->exists())
                                    <div class="bottom-left p-1">
                                        <span>{{$provider->services->first()->price}} USD</span> <i class="fa fa-video-camera"></i>
            
                                    </div>
                                    @endif
                                    <img src="{{asset($provider->user->avatar)}}">
                                </div>
        
                                <div class="freelancer-footer">
        
                                    <h5 style="padding: 0px;">{{$provider->user->name}}
                                        <span style="font-size: 12px">{{ucfirst(strtolower(_ti($provider->ProviderType->name)))}}
                                            <br>
                                            {{ucfirst(strtolower(_ti($provider->Country->name)))}}</span>
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="exampleModalLabel">{{__('Reviews')}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body border-0" id="modal_body">
              
            </div>
            
          </div>
        </div>
      </div>
    @endsection
    @section('script')
    <script>

        $('#exampleModal').on('show.bs.modal', function (event) {
            $.ajax({
                url:"{{route('reviews')}}",
                type:"POST",
                data:{"_token":"{{csrf_token()}}","provider_id":$("#provider_id").val()},
                success : function(res){
                    $("#modal_body").html("");

                    $("#modal_body").html(res);
                }
            });
        })
        $(document).ready(function () {
           
            checkers();
            $('.freelance-slider').slick({
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 3,
                dir: "ltr",
                centerMode: false,
                // centerPadding: '60px',
                // adaptiveHeight: true,
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
        slidesToScroll: 2
      }
    }
                ]
            });
            
            function checkers() {
                $("#description_row").hide();
                $.ajax({
                  url:"{{route('service_check')}}",
                  type:"GET",
                data:{service_id:$('input[name="service_id"]:checked').val(),provider_id:$("#provider_id").val()},
                  success : function (re) {
                    $(".price").html(re.providerService.price + " USD");
                      $("#description_row").show();
                      $("#description").html(re.description);
                      $("#price").val(re.providerService.price);
                  }
              });
            }

            $(".service_select").click(function(){
                $("#description_row").hide();

                $.ajax({
                  url:"{{route('service_check')}}",
                  type:"GET",
                data:{service_id:this.id,provider_id:$("#provider_id").val()},
                  success : function (re) {
                      $(".price").html(re.providerService.price + " USD");
                      $("#description_row").show();
                      $("#description").html(re.description);
                      $("#price").val(re.providerService.price);
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
