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
                <div class="p-4 bg-white rounded shadow-sm my-3">
                    <h6 class="mb-2 font-weight-bold">Add New Service
                    </h6>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="list-group">
                                @php 
                                $serv = \App\ProviderService::where('provider_id',auth()->user()->provider->id)->get();
                                $data = array();
                                foreach ($serv as $ser) {
                                   array_push($data,$ser->service_id);
                                }
                                @endphp
                                @foreach (DB::table('services')->
                                whereNotIn('id',$data)
                                ->get() as $service)
                                    
                             
                                <a href="{{route('provider.add_service',$service->id)}}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{$service->name}}</h5>
                                     
                                    </div>
                                    <p class="mb-1">{{$service->description}}</p>
                               
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
                <div class="p-4 bg-white rounded shadow-sm mb-3">
                    <h5 class="mb-4 font-weight-bold text-center">My Services
                    </h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="list-group">
                         
                                @foreach (auth()->user()->provider->services as $provider_service)
                                    
                             
                                <a href="#" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{$provider_service->service->name}}</h5>
                                        <span class="badge badge-success">{{$provider_service->price}} USD</span>
                                     
                                    </div>
                                    <p class="mb-1">{{$provider_service->service->description}}</p>
                               
                                </a>
                                @endforeach
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
