@extends('layouts.admin')

@section('content')
<div class="panel box-shadow-none content-header" style="position: relative;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="animated fadeInLeft">Testimonials </h3>
                    <p class="animated fadeInDown">
                        Home <span class="fa-angle-right fa"></span> Testimonials
                    </p>
                </div>
                <div>
                    <h3>
                        <a href="/admin/testimonials/add">Add New</a>
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
                                    <th>Name</th>
                                    <th>Message</th>
                                    <th>Post</th>
                                    <th>Company</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="servicesBody">
                                @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>{{$testimonial->name}}</td>
                                    <td>{{$testimonial->message}}</td>
                                    <td>{{$testimonial->post}}</td>
                                    <td>{{$testimonial->company}}</td>
                                    <td>
                                        <p class="d-flex justify-content-evenly">
                                            <a href="/admin/testimonials/delete/{{$testimonial->id}}" class="btn btn-gradient btn-danger">Delete</a>
                                            <a href="/admin/testimonials/edit/{{$testimonial->id}}" class="btn btn-gradient btn-success">Edit</a>
                                        </p>
                                    </td>
                                </tr>
                                @endforeach
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


    });
</script>
@endsection