@extends('layouts.backend')
@section('page_header','Service Create')
@section('page_toolbar')

@endsection
@section('content')

<div class="content flex-column-fluid" id="kt_content">
 
    <div class="col-md-12">
        <!--begin::Card-->
        <div class="card card-custom gutter-b example example-compact">
            <div class="card-header">
                <h3 class="card-title">Create Service</h3>
                
            </div>
            <!--begin::Form-->
            <form action="{{route('admin.service_update',$service->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group mb-8">
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{$service->name}}" class="form-control" placeholder="Enter Name ">
                    </div>
                   
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control" id="" cols="30" rows="5">{{$service->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Is Video</label>
                        <select class="form-control" name="is_video" id="">
                            <option value="0">True</option>
                            <option value="1">False</option>
                        </select>
                    </div>

                    
                   
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
      
        
    </div>
  
</div>
<!--end::Content-->
@endsection
