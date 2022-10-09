@extends('layouts.admin')

@section('content')
<div class="panel box-shadow-none content-header" style="position: relative;">
    <div class="col-md-12 modal-example" id="addService">
        <div class="col-md-12 ">
            <form action="">
                <div class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" onclick="showAddService()" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Add Service</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control addServiceTitle" placeholder="Enter Service">
                                </div>
                                <div class="form-group">
                                    <input type="file" onchange="serviceImageChange()" id="addServiceImage" class="form-control addServiceImage d-none" placeholder="Enter Service">
                                    <label class="w-100 text-center btn bt-gradient bg-secondary text-dark" style="width: 100%" id="addServiceImageLabel" for="addServiceImage">Upload Image</label>
                                </div>
                                <div class="form-group">
                                    <textarea name="description" id="" class="form-control addServiceDescription" cols="30" rows="3" placeholder="Service Description here"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-end align-items-center">
                                <div class="dnone" id="successBox" style="color: green; margin-right: 20px">New Service Added</div>
                                <button id="addServiceButton" type="button" class="btn btn-primary">Add</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </form>
        </div>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="animated fadeInLeft">Services </h3>
                    <p class="animated fadeInDown">
                        Home <span class="fa-angle-right fa"></span> Services
                    </p>
                </div>
                <div>
                    <h3>
                        <a href="#?" onclick="showAddService()">Add New</a>
                    </h3>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid settings">
    <div class="row">
        <div class="col-12 m-2">
            <div class="card">
                <div class="card-heading py-5">
                   
                </div>
                <div class="card-body">
                    <div class="responsive-table">
                        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="servicesBody">
                                <!-- @foreach ($services as $service)
                                <tr>
                                    <td>
                                        <img src="{{$service->image}}" alt="" style="height: 100px; width: 100%; object-fit: cover">
                                    </td>
                                    <td>{{$service->title}}</td>
                                    <td>{{$service->description}}</td>
                                    <td>
                                        <p class="d-flex justify-content-evenly">
                                            <a href="" class="btn btn-gradient btn-danger">Delete</a>
                                            <a href="" class="btn btn-gradient btn-success">Edit</a>
                                        </p>
                                    </td>
                                </tr>
                                @endforeach -->
                            </tbody>
                        </table>
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
        setTimeout(() => {
            $('#datatables-example').DataTable();
        }, 1000);

        showAddService = () => {
            $("#addService").slideToggle(100)
        }
        $('#summernote').summernote({
            height: 300
        });

        $("#addServiceButton").on("click", function(e) {
            e.preventDefault();
            if ($("#addServiceButton").hasClass("disabled")) return false;
            $("#addServiceButton").text("Loading....");
            $("#addServiceButton").addClass("disabled")
            if (!$(".addServiceImage")[0].files[0]) {
                alert("Please upload Image")
                $("#addServiceButton").text("Save");
                $("#addServiceButton").removeClass("disabled")
                return false;
            }

            if ($(".addServiceTitle").val() == '') {
                alert("Please add service title")
                $("#addServiceButton").text("Save");
                $("#addServiceButton").removeClass("disabled")
                return false;
            }
            var formdata = new FormData()
            formdata.append("title", $(".addServiceTitle").val())
            formdata.append("description", $(".addServiceDescription").val())
            formdata.append("image", $(".addServiceImage")[0].files[0])

            fetch("{{route('addService')}}", {
                    method: 'POST',
                    body: formdata,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then((response) => response.json())
                .then((response) => {
                    $(".addServiceTitle").val('');
                    $(".addServiceDescription").val('');
                    $("#addServiceButton").text("Save");
                    $("#successBox").show();
                    $("#addServiceButton").removeClass("disabled")
                    getServices()
                })
            // description, serviceImage, title, addServiceDescription
        })



        function getServices() {
            fetch("{{route('getServicesapi')}}", {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then((response) => response.json())
                .then((response) => {
                    $("#servicesBody").html('')
                    response.forEach(service => {
                        const tr = ` <tr>
                            <td>
                                <img src="{{env('APP_CDN')}}/${service.image}" alt="" style="height: 100px; width: 100px; object-fit: cover">
                            </td>
                            <td>${service.title}</td>
                            <td>${service.description}</td>
                            <td>
                                <p class="d-flex justify-content-evenly">
                                    <a onclick="if (!confirm('Are you sure to delete')) return false" href="/admin/deleteservice/${service.id}" class="btn btn-gradient btn-danger">Delete</a>
                                    <a href="/admin/services/edit/${service.id}" class="btn btn-gradient btn-success" onclick="editService()">Edit</a>
                                </p>
                            </td>
                        </tr>`
                        $("#servicesBody").append(tr)
                    });
                })
            // description, serviceImage, title, addServiceDescription
        }
        getServices()
    });
</script>
@endsection