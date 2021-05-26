@extends('layouts.website')
@section('style')
    <style>
        .menu-item{
            color:#000;
            font-size: 14px;
        }
        .active-menu{
            font-weight: bolder;
            color:#d47fa6 !important;
        }
    </style>
@endsection
@section('content')
<div class="main-page second py-5">
    <div class="container">
        <div class="row">
            @include('parts.customer_sidebar')
            <div class="col-lg-8 right">
                <div class="d-flex align-items-center p-3 bg-white rounded shadow-sm h5 m-0">
                    <b>Active orders</b>
                    <div class="ml-auto d-flex align-items-center h5 m-0 text-muted">
                        15 ($5000)
                    </div>
                </div>
                <div class="p-4 bg-white rounded shadow-sm my-3">
                    <h6 class="mb-2 font-weight-bold">How to build your success on Miver in 3 steps
                    </h6>
                    <p class="m-0">The key to your success on Miver is the brand you build for yourself through your
                        Miver reputation. We gathered some tips and resources to help you become a leading seller on
                        Miver.
                    </p>
                </div>
                <div class="p-4 bg-white rounded shadow-sm mb-3">
                    <h5 class="mb-4 font-weight-bold text-center">Take these steps to become a top seller on Miver
                    </h5>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="display-4 my-2">
                                <i class="fa fa-volume-up text-success" aria-hidden="true"></i>
                            </div>
                            <h6 class="font-weight-bold">Get noticed</h6>
                            <p class="text-muted">Hone your skills and expand your knowledge with online courses. You’ll
                                be able to offer more services and <b>gain more exposure</b> with every course
                                completed.
                            </p>
                            <button class="btn btn-outline-success" type="submit"> Share Your Gigs </button>
                        </div>
                        <div class="col-lg-4">
                            <div class="display-4 my-2">
                                <i class="fa fa-book text-success" aria-hidden="true"></i>
                            </div>
                            <h6 class="font-weight-bold">Get more skills &amp; exposure</h6>
                            <p class="text-muted">Watch this free online course to learn how to create an outstanding
                                service experience for your buyer and grow your career as an online freelancer.
                            </p>
                            <button class="btn btn-outline-success" type="submit"> Explore Learn </button>
                        </div>
                        <div class="col-lg-4">
                            <div class="display-4 my-2">
                                <i class="fa fa-star text-success" aria-hidden="true"></i>
                            </div>
                            <h6 class="font-weight-bold">Become a successful seller!</h6>
                            <p class="text-muted">Hone your skills and expand your knowledge with online courses. You’ll
                                be able to offer more services and <b>gain more exposure</b> with every course
                                completed.
                            </p>
                            <button class="btn btn-outline-success" type="submit"> Watch Free Course </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
