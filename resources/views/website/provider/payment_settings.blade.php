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
                    <h5 class="mb-4 font-weight-bold text-center">Payment Settings
                    </h5>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('provider.update_payment_settings')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Account Owner Name </label>
                                    <input type="text" value="{{auth()->user()->provider->account_name}}" name="account_name" class="form-control" required>
                                </div>
                                  <div class="form-group">
                                    <label for="">IBAN</label>
                                    <input type="text" name="iban" value="{{auth()->user()->provider->iban}}" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-success"> Save Changes </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
