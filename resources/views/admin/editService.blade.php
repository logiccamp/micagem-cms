@extends('layouts.admin')

@section('content')

<div class="container-fluid settings">
    <div class="row">
        <div class="col-12 m-2">
            <form action="{{route('updateService', $service->id)}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-heading py-5">
                        <div class="row justify-content-between align-items-center p-3">
                            <div class="col-md-6 text-center">
                                <h3>{{$service->title}}</h3>
                            </div>

                            <div class="col-md-6 text-center">
                                <img style="height: 100px; width: 100px" src="{{env('APP_CDN')}}/{{$service->image}}" />
                                <div class="form-group my-1">
                                    <label class="w-100 text-center btn bt-gradient bg-secondary" id="addServiceImageLabel" for="addServiceImage">Change</label>
                                    <input type="file" onchange="editserviceImageChange()" id="addServiceImage" class="form-control addServiceImage d-none" placeholder="Enter Service">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div>
                            <label for="">Title</label>
                            <input type="text" class="form-control" value="{{$service->title}}">
                        </div>
                        <div class="my-4">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="5">{{$service->description}}</textarea>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    function editserviceImageChange() {
        alert("Hechange")
    }
    $(document).ready(function() {});
</script>
@endsection