@extends('layouts.admin')

@section('content')
<div class="panel box-shadow-none content-header" style="position: relative;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="animated fadeInLeft">Add Testimonials </h3>
                    <p class="animated fadeInDown">
                        Home <span class="fa-angle-right fa"></span> Add Testimonials
                    </p>
                </div>
                <div>
                    <h3>
                        <a href="/admin/testimonials/">go back</a>
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
                    <form action="" class="form">
                        <div class="d-flex align-items-center justify-content-end">
                            <button id="summerButton" class="btn btn-gradient btn-success">Save</button>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Name</label>
                                <input id="name" type="text" require name="name" id="" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Post</label>
                                <input id="post" type="text" require name="post" id="" class="form-control">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Company</label>
                                <input id="company" type="text" require name="company" id="" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea name="note" id="note" require cols="30" rows="10" class="form-control"></textarea>
                            <!-- <div id="summernote"></div> -->
                        </div>
                    </form>
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

        $('#summernote').summernote({
            height: 200
        });

        $('#summerButton').on('click', function(e) {
            e.preventDefault();

            const formdata = new FormData();
            // const summernote = $(".note-editable")[0].outerHTML
            // var note = summernote.replace('contenteditable="true" style="height: 200px;" spellcheck="false"', '')
            formdata.append("name", $("#name").val())
            formdata.append("post", $("#post").val())
            formdata.append("company", $("#company").val())
            formdata.append("message", $("#company").val())

            fetch("{{route('addTestimonial')}}", {
                    method: 'POST',
                    body: formdata,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })
                .then((response) => response.json())
                .then((response) => {
                    window.location.assign('/admin/testimonials')
                    console.log(response)
                })

        });

    });
</script>
@endsection