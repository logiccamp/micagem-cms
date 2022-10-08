@extends('layouts.admin')

@section('content')
<div class="panel box-shadow-none content-header">
    <div class="panel-body">
        <div class="col-md-12">
            <h3 class="animated fadeInLeft">Edit Settings</h3>
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
                        <div class="w-75" style="text-align : right">
                            <a href="/admin/settings">Go Back</a>
                        </div>
                        @if(Session::has('errors'))
                        <div class="alert">
                            <ul class="text-danger">
                                @foreach (json_decode(Session::get('errors')) as $error)
                                @foreach ($error as $err)
                                <li>
                                    {{$err}},
                                </li>
                                @endforeach
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{route('editSettings')}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" name="address" class="form-text mask-time" value="{{$info->company_address}}">
                                    <label>Address</label>
                                </div>
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" name="address2" class="form-text mask-time" value="{{$info->company_address2}}">
                                    <label>Address 2</label>
                                </div>
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="email" class="form-text mask-time" name="email" value="{{$info->company_email}}">
                                    <label>Email</label>
                                </div>
                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="email" class="form-text mask-time" name="email2" value="{{$info->company_email2}}">
                                    <label>Email - 2</label>
                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <input type="text" class="form-text mask-time" name="telephone" value="{{$info->company_phone}}">
                                    <label>Telephone</label>
                                </div>

                                <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                    <div class="panel p-0 m-0">

                                        <div class="panel-body">
                                            <textarea class="form-control" name="short_description" cols="30" rows="10">{{$info->short_description}}</textarea>

                                        </div>
                                    </div>
                                    <label>Short Description</label>
                                </div>

                                <div class="form-group">
                                    <button class="btn  btn-gradient btn-success">Update</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400
        });
    });
</script>
@endsection