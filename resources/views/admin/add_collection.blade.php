@extends('layouts.admin')

@section('content')

<div class="container-fluid settings">
    <div class="row">
        <div class="col-12 m-2">
            <form action="{{route('addCollection')}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-heading py-5">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-6 text-center">
                                <h3>Add Project</h3>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" value="">
                        </div>
                        <div class="form-group">
                            <select name="service" class="form-select form-control addServiceTitle" id="addServiceTitle">
                                <option value="">Select Category/Service</option>
                                @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-4">
                            <div class="text-info">Let your customers know the full details of this project.</div>
                            <label for="">Full Description</label>
                            <div id="summernote"></div>
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
    $(document).ready(function() {});
</script>
@endsection