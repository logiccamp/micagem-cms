@extends('layouts.admin')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Settings</h3>
            <p class="animated fadeInDown">
                Home <span class="fa-angle-right fa"></span> Settings
            </p>
        </div>
    </div>
</div>
<div class="container-fluid settings">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12 panel">
                <div class="col-md-12 panel-body">
                    <div class="col-md-12">
                        <!-- 
                        name
                        address
                        email
                        tel
                        address
                        
                        logo
                        description
                        facebook, instagram, googleplus, linkedin, twitter -->
                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" disabled class="form-text mask-date" value="{{$info->company_name}}" required>
                                <label>Name</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" disabled class="form-text mask-time" value="{{$info->company_address}}">
                                <label>Address</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" disabled class="form-text mask-time" value="{{$info->company_address2}}">
                                <label>Address 2</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" disabled class="form-text mask-time" value="{{$info->company_email}}">
                                <label>Email</label>
                            </div>

                            @if ($info->company_email2 != "")
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" disabled class="form-text mask-time" value="{{$info->company_email2}}">
                                <label>Email 2</label>
                            </div>
                            @endif

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" disabled class="form-text mask-time" value="{{$info->company_phone}}">
                                <label>Telephone</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <div class="form-text mask-time">
                                    {{$info->short_description}}
                                </div>
                                <label>Short Description</label>
                            </div>

                            <div class="form-group">
                                <a href="/admin/edit-settings" class="btn  btn-gradient btn-success">Edit Settings</a>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <div>
                                    @if ($info->company_logo == '')
                                    <img src="/assets/logo-img.png" style="max-width: 200px" alt="">
                                    @else
                                    <img src="{{env('APP_CDN')}}/{{$info->company_logo}}" style="max-width: 200px" alt="">
                                    @endif
                                </div>
                                <form action="{{route('updateLogo') }}" method="post" class="my-2" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="companylogo" class="my-1" name="logo">
                                    <button class="btn btn-default " style="width: 100%; max-width: 200px">Save</button>
                                </form>
                            </div>
                            @foreach ($social_medials as $handle)
                            <div class="form-group form-animate-text" style="margin-top:10px !important; margin-bottom: 10px">
                                <input type="text" disabled class="form-text mask-phone_us" value="{{$handle->handle}}">
                                <span class="bar"></span>
                                <label> <small>{{$handle->Social->title}}</small></label>
                            </div>
                            @endforeach

                            @if (count($social_medials) == 0)
                            <a href="/admin/socials" class="btn  btn-gradient btn-success">Add Social Handles</a>
                            @else
                            <a href="/admin/socials" class="btn  btn-gradient btn-default">Update Social Handles</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection