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
                                <h4 class="modal-title">Add Project</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="" >Project Title</label>
                                    <input type="text" class="form-control projecttitle" placeholder="Enter project title" id="project_title">
                                </div>
                                <div class="form-group">
                                    <input type="file" onchange="addCollectionImagecHANGE()" id="addCollectionImage" multiple accept=".png, .jpg, .jpeg, .gif" class="form-control addCollectionImage d-none" placeholder="Enter Collection">
                                    <label class="w-100 text-center btn bt-gradient bg-secondary" style="width: 100%" id="addCollectionImageLabel" for="addCollectionImage">Upload Image</label>
                                </div>
                                <div class="form-group">
                                    <select name="service" class="form-select form-control addServiceTitle" id="addServiceTitle">
                                        <option value="">Select Category/Service</option>
                                        @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-end align-items-center">
                                <div class="dnone" id="successBox" style="color: green; margin-right: 20px">New Project Added</div>
                                <button id="addCollectionButton" type="button" class="btn btn-primary">Add</button>
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
                    <h3 class="animated fadeInLeft">Portfolio </h3>
                    <p class="animated fadeInDown">
                        Home <span class="fa-angle-right fa"></span> Portfolio
                    </p>
                </div>
                <div>
                    <h3>
                        <a href="#?" class="btn btn-success" onclick="showAddService()">Add Project</a>
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

                <div class="card-body">
                    <div class="responsive-table">
                        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Service</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="collectionsBody">
                                @foreach ($collections as $collection)

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

        $("#addCollectionButton").on("click", function(e) {
            e.preventDefault();
            if ($("#addServiceButton").hasClass("disabled")) return false;
            $("#addCollectionButton").text("Loading....");
            $("#addCollectionButton").addClass("disabled")
            if (!$(".addCollectionImage")[0].files) {
                alert("Please upload Image")
                $("#addCollectionButton").text("Save");
                $("#addCollectionButton").removeClass("disabled")
                return false;
            }

            if ($(".addServiceTitle").val() == '') {
                alert("Please add service title")
                $("#addCollectionButton").text("Save");
                $("#addCollectionButton").removeClass("disabled")
                return false;
            }
            var formdata = new FormData()
            var filesid = [];
            var files = $(".addCollectionImage")[0].files

            for (let i = 0; i < files.length; i++) {
                const random = Math.floor(Math.random() * 9999999999)
                const element = files[i];
                console.log(element)
                formdata.append(random, element)
                filesid = [...filesid, random]
            }
            formdata.append("filesid", filesid)
            formdata.append("service", $(".addServiceTitle").val())
            formdata.append("title", $(".projecttitle").val())

            fetch("{{route('addCollection')}}", {
                    method: 'POST',
                    body: formdata,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then((response) => response.json())
                .then((response) => {
                    $(".addServiceTitle").val('');
                    $("#addCollectionButton").text("Save");
                    $("#successBox").show();
                    $("#addCollectionButton").removeClass("disabled")
                    getCollections()
                    showAddService()
                })
            // description, serviceImage, title, addServiceDescription
        })
    });

    function getCollections() {
        fetch("{{route('getCollectionsapi')}}", {
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .then((response) => response.json())
            .then((response) => {
                $("#collectionsBody").html('')
                response.forEach(collection => {
                    const tr = `<tr>
                                    <td>
                                        <img src="{{env('APP_CDN')}}/${collection.image}" alt="" style="height: 100px; width: 100%; object-fit: cover">
                                    </td>
                                    <td>
                                        <p>${collection.title}</p>
                                    </td>
                                    <td>${collection.service.title}</td>
                                    <td>
                                        <p class="d-flex justify-content-evenly">
                                            <a href="/admin/deleteCollection/${collection.id}" class="btn btn-gradient btn-danger">Delete</a>
                                        </p>
                                    </td>
                                </tr>`
                    $("#collectionsBody").append(tr)
                });
            })
        // description, serviceImage, title, addServiceDescription
    }
    getCollections()

    function addCollectionImagecHANGE() {
        if (!$(".addCollectionImage")[0].files[0]) {
            $("#addCollectionImageLabel").removeClass("bg-primary")
            $("#addCollectionImageLabel").removeClass("text-white")
            return false;
        }

        $("#addCollectionImageLabel").addClass("bg-primary")
        $("#addCollectionImageLabel").addClass("text-white")
        $("#addCollectionImageLabel").text(`${$(".addCollectionImage")[0].files.length} item(s) selected`)

    }
</script>
@endsection