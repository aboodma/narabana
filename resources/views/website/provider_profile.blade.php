@extends('layouts.website')
@section('title',$provider->user->name)
@section('style')
<style>
    .slick-track {
        float: left;
    }

    .resp-sharing-button__link,
    .resp-sharing-button__icon {
        display: inline-block
    }

    .resp-sharing-button__link {
        text-decoration: none;
        color: #fff;
        margin: 0.2em
    }

    .resp-sharing-button {
        border-radius: 5px;
        transition: 25ms ease-out;
        padding: 0.5em 0.75em;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif
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

    .resp-sharing-button--hackernews:hover,
    .resp-sharing-button--hackernews:focus {
        background-color: #FB6200
    }

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

    .resp-sharing-button--whatsapp {
        background-color: #25D366;
        border-color: #25D366;
    }

    .resp-sharing-button--whatsapp:hover,
    .resp-sharing-button--whatsapp:active {
        background-color: #1DA851;
        border-color: #1DA851;
    }

    .resp-sharing-button--telegram {
        background-color: #54A9EB;
    }

    .resp-sharing-button--telegram:hover {
        background-color: #4B97D1;
    }

</style>
@endsection
@section('content')
<div class="services-wrapper bg-white py-2 ">
    <div class="container">
        <div class="row d-inline d-none d-sm-block d-md-none">
            <ol class="breadcrumb bg-white mb-0 pb-0">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{route('FilterByType',$provider->ProviderType->id)}}">{{_ti($provider->ProviderType->name)}}</a>
                </li>
                <li class="breadcrumb-item active font-weight-bold" aria-current="page">{{$provider->user->name}}</li>
            </ol>
        </div>
        <div class="row d-none d-lg-block">
            <ol class="breadcrumb bg-white ">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item"><a
                        href="{{route('FilterByType',$provider->ProviderType->id)}}">{{_ti($provider->ProviderType->name)}}</a>
                </li>
                <li class="breadcrumb-item active font-weight-bold" aria-current="page">{{$provider->user->name}}</li>
            </ol>
        </div>
        <div class="row d-inline d-none d-sm-block d-md-none ">
            <div class="col-md-12 d-flex justify-content-between">
                <h2 class="pb-0">{{$provider->user->name}} <i class="fas fa-check-circle text-primary"
                        style="font-size: large;"></i>
                </h2>
                <button class="btn btn-icon " type="button" data-toggle="modal" data-target="#share"> <i
                    class="fa fa-share-square"></i> </button>
            </div>
            <div class="col-md-12">
                <span class="pb-2 mb-2 ">{{_ti($provider->Country->name)}} /
                    {{_ti($provider->ProviderType->name)}}</span>
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

                <video id="v-{{$provider->id}}" style="width: 100%" loop preload="false" autoplay="true" tabindex="0">

                    <source src="{{asset($provider->video)}}" type="video/mp4">
                </video>
                <span id="play-{{$provider->id}}" onclick="playVideo('{{$provider->id}}')"
                    class="fa fa-play play-btn"></span>
                <span id="pause-{{$provider->id}}" onclick="pauseVideo('{{$provider->id}}')"
                    class="fa fa-pause pause-btn"></span>
            </div>
            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <h2 class="d-none d-lg-block">{{$provider->user->name}} <i
                                    class="fas fa-check-circle text-primary" style="font-size: large;"></i>
                            </h2>
                            <button class="btn btn-icon d-none d-lg-block" type="button" data-toggle="modal" data-target="#share"> <i
                                    class="fa fa-share-square"></i> </button>
                        </div>
                        <span class="pb-2 mb-2 d-none d-lg-block">{{_ti($provider->Country->name)}} /
                            {{_ti($provider->ProviderType->name)}}</span>



                        <p class="pt-2">{{$provider->about_me}}</p>
                        <p style="font-weight: bold;color: #ba6089;"><i class="fa fa-clock-o"
                                style="color: #ba6089;font-size: initial;"></i> {{__('Replies in 5 days')}}</p>
                        @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->count() != 0)
                        <p> <i
                                class="fa fa-star @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate >= 1) text-warning @endif"></i>
                            <i
                                class="fa fa-star @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate >= 2) text-warning @endif"></i>
                            <i
                                class="fa fa-star @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate >= 3) text-warning @endif"></i>
                            <i
                                class="fa fa-star @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate >= 4) text-warning @endif"></i>
                            <i
                                class="fa fa-star @if($provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate == 5) text-warning @endif"></i>
                            / <span
                                class="font-weight-bold">{{$provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->first()->rate->rate}}
                                {{__('Star')}} </span>
                        </p>
                        <p class="font-weight-bold" style="text-decoration:underline; font-size:14px; color:black"><a
                                style="color:black" href="#" data-toggle="modal"
                                data-target="#exampleModal">{{__('Show More Reviews')}}
                                ({{$provider->orders->whereIn('id',\App\OrderReview::pluck('order_id'))->count()}})</a>
                        </p>
                        @else
                        <p> <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            <i class="fa fa-star "></i>
                            / <span class="font-weight-bold">{{__('0 Star')}} </span>
                        </p>
                        <p class="font-weight-bold" style="text-decoration:underline; font-size:14px; color:black"><a
                                style="color:black" href="#">{{__('Show More Reviews (0)')}}</a></p>

                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 copyright p-2 pb-3">
                        <ul class="social " style="margin-left: 0">
                            @if($provider->links_fb != null)
                            <li>
                                <a href="{{$provider->links_fb}}"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            @endif
                            @if($provider->links_tweet != null)
                            <li>
                                <a href="{{$provider->links_tweet}}"><i class="fab fa-twitter"
                                        aria-hidden="true"></i></a>
                            </li>
                            @endif
                            @if($provider->links_youtube != null)
                            <li>
                                <a href="{{$provider->links_youtube}}"><i class="fab fa-youtube"
                                        aria-hidden="true"></i></a>
                            </li>
                            @endif
                            @if($provider->links_tiktok != null)
                            <li>
                                <a href="{{$provider->links_tiktok}}"><i class="fab fa-tiktok"
                                        aria-hidden="true"></i></a>
                            </li>
                            @endif
                            @if($provider->links_ig != null)
                            <li>
                                <a href="{{$provider->links_ig}}"><i class="fab fa-instagram"
                                        aria-hidden="true"></i></a>
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
                                <label class="btn btn-outline-success service_select @if($loop->first) active @endif"
                                    id="{{$service->Service->id}}">
                                    <input type="radio" class="service_select" @if($loop->first) checked @endif
                                    value="{{$service->Service->id}}" name="service_id" id="{{$service->Service->id}}" >
                                    {{_ti($service->Service->name)}}
                                </label>
                                @endforeach
                            </div>
                            <br>
                            <div class="form-group bg-light rounded p-1 " id="description_row" style="display: none">


                                <h5>{{__('Service Descrption')}}</h5>
                                <p id="description" class=""></p>


                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" @if($provider->services->count() == 0) disabled @endif
                                    class="btn btn-success btn-xlg form-control rd-in p-2
                                    @if($provider->services->count() == 0) disabled @endif ">{{__('Book Now')}} <i
                                        class="price"></i> </button>
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
                            <video id="v-{{$order->id}}" style="width: 100%" @php
                                $file_name=explode('.',$order->details->provider_message);
                                $poster_path = public_path("uploads/thumbs/").$file_name[0].".jpg";
                                @endphp
                                @if(file_exists(public_path("uploads/thumbs/".$file_name[0].".jpg")))
                                poster="{{asset("uploads/thumbs/".$file_name[0].".jpg")}}"

                                @endif
                                >
                                <source src="{{asset($order->details->provider_message)}}" type="video/mp4">
                            </video>
                            <span id="play-{{$order->id}}" onclick="playVideo('{{$order->id}}')" class="fa fa-play"
                                style="position: absolute;
                                    bottom: 50%;
                                    left: 50%;
                                    display:block;
                                    transform: translate(-50%,50%);
                                    font-size: 50px;
                                    opacity: .8;
                                    transition: opacity,font-size .4s;
                                    color: #fff;"></span>
                            <span id="pause-{{$order->id}}" onclick="pauseVideo('{{$order->id}}')" class="fa fa-pause"
                                style="position: absolute;
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
                    @foreach (\App\Provider::where('provider_type_id',$provider->ProviderType->id)->get()->take(10) as
                    $provider)
                    <div class="col">
                        <a href="{{route('provider_profile',$provider->slug)}}">
                            <div class="freelancer">
                                <div>
                                    <div class="top-right p-1 text-center">
                                        <span class="fa fa-heart-o"></span>
                                    </div>
                                    @if($provider->services()->exists())
                                    <div class="bottom-left p-1">
                                        <span>{{$provider->services->first()->price}} USD</span> <i
                                            class="fa fa-video-camera"></i>

                                    </div>
                                    @endif
                                    <img src="{{asset($provider->user->avatar)}}">
                                </div>

                                <div class="freelancer-footer">

                                    <h5 style="padding: 0px;">{{$provider->user->name}}
                                        <span
                                            style="font-size: 12px">{{ucfirst(strtolower(_ti($provider->ProviderType->name)))}}
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="shareLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body border-0">
                    <div class="d-flex justify-content-start">

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Link</label>
                                    <textarea style="resize: none;" name="" readonly class="form-control" id="" cols="30" rows="1">{{URL::current()}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- Sharingbutton Facebook -->
                                <a class="resp-sharing-button__link"
                                    href="https://facebook.com/sharer/sharer.php?u={{URL::current()}}"
                                    target="_blank" rel="noopener" aria-label="Share on Facebook">
                                    <div
                                        class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--large">
                                        <div aria-hidden="true"
                                            class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z" />
                                                </svg>
                                        </div>Share on Facebook
                                    </div>
                                </a>

                                <!-- Sharingbutton Twitter -->
                                <a class="resp-sharing-button__link"
                                    href="https://twitter.com/intent/tweet/?text=Follow Me Here &amp;url={{URL::current()}}"
                                    target="_blank" rel="noopener" aria-label="Share on Twitter">
                                    <div
                                        class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--large">
                                        <div aria-hidden="true"
                                            class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z" />
                                                </svg>
                                        </div>Share on Twitter
                                    </div>
                                </a>

                                <!-- Sharingbutton E-Mail -->
                                <a class="resp-sharing-button__link"
                                    href="mailto:?subject=Follow Me Here &amp;body={{URL::current()}}"
                                    target="_self" rel="noopener" aria-label="Share by E-Mail">
                                    <div
                                        class="resp-sharing-button resp-sharing-button--email resp-sharing-button--large">
                                        <div aria-hidden="true"
                                            class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z" />
                                                </svg></div>Share by E-Mail
                                    </div>
                                </a>

                                <!-- Sharingbutton LinkedIn -->
                                <a class="resp-sharing-button__link"
                                    href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{URL::current()}}&amp;title=Follow Me Here &amp;summary=Follow Me Here &amp;source={{URL::current()}}"
                                    target="_blank" rel="noopener" aria-label="Share on LinkedIn">
                                    <div
                                        class="resp-sharing-button resp-sharing-button--linkedin resp-sharing-button--large">
                                        <div aria-hidden="true"
                                            class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M6.5 21.5h-5v-13h5v13zM4 6.5C2.5 6.5 1.5 5.3 1.5 4s1-2.4 2.5-2.4c1.6 0 2.5 1 2.6 2.5 0 1.4-1 2.5-2.6 2.5zm11.5 6c-1 0-2 1-2 2v7h-5v-13h5V10s1.6-1.5 4-1.5c3 0 5 2.2 5 6.3v6.7h-5v-7c0-1-1-2-2-2z" />
                                                </svg>
                                        </div>Share on LinkedIn
                                    </div>
                                </a>

                                <!-- Sharingbutton WhatsApp -->
                                <a class="resp-sharing-button__link"
                                    href="whatsapp://send?text=Follow Me Here %20{{URL::current()}}"
                                    target="_blank" rel="noopener" aria-label="Share on WhatsApp">
                                    <div
                                        class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--large">
                                        <div aria-hidden="true"
                                            class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z" />
                                                </svg>
                                        </div>Share on WhatsApp
                                    </div>
                                </a>

                                <!-- Sharingbutton Telegram -->
                                <a class="resp-sharing-button__link"
                                    href="https://telegram.me/share/url?text=Follow Me Here &amp;url={{URL::current()}}"
                                    target="_blank" rel="noopener" aria-label="Share on Telegram">
                                    <div
                                        class="resp-sharing-button resp-sharing-button--telegram resp-sharing-button--large">
                                        <div aria-hidden="true"
                                            class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path
                                                    d="M.707 8.475C.275 8.64 0 9.508 0 9.508s.284.867.718 1.03l5.09 1.897 1.986 6.38a1.102 1.102 0 0 0 1.75.527l2.96-2.41a.405.405 0 0 1 .494-.013l5.34 3.87a1.1 1.1 0 0 0 1.046.135 1.1 1.1 0 0 0 .682-.803l3.91-18.795A1.102 1.102 0 0 0 22.5.075L.706 8.475z" />
                                                </svg>
                                        </div>Share on Telegram
                                    </div>
                                </a>


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
        $('#exampleModal').on('show.bs.modal', function (event) {
            $.ajax({
                url: "{{route('reviews')}}",
                type: "POST",
                data: {
                    "_token": "{{csrf_token()}}",
                    "provider_id": $("#provider_id").val()
                },
                success: function (res) {
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
                responsive: [{
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
                    url: "{{route('service_check')}}",
                    type: "GET",
                    data: {
                        service_id: $('input[name="service_id"]:checked').val(),
                        provider_id: $("#provider_id").val()
                    },
                    success: function (re) {
                        $(".price").html(re.providerService.price + " USD");
                        $("#description_row").show();
                        $("#description").html(re.description);
                        $("#price").val(re.providerService.price);
                    }
                });
            }

            $(".service_select").click(function () {
                $("#description_row").hide();

                $.ajax({
                    url: "{{route('service_check')}}",
                    type: "GET",
                    data: {
                        service_id: this.id,
                        provider_id: $("#provider_id").val()
                    },
                    success: function (re) {
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
            var vid = $("#v-" + id);
            var play_i = $("#play-" + id);
            var pause_i = $("#pause-" + id);
            play_i.hide();
            pause_i.show();

            $("#v-" + id).get(0).play();
        }

        function pauseVideo(id) {
            var vid = $("#v-" + id);
            var play_i = $("#play-" + id);
            var pause_i = $("#pause-" + id);
            play_i.show();
            pause_i.hide();

            $("#v-" + id).get(0).pause();
        }

    </script>
    @endsection
