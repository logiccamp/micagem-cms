@extends("layouts.admin")


@section('content')
<div class="panel box-shadow-none content-header" style="position: relative;">
    <div class="panel-body">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="animated fadeInLeft">About Us Page </h3>
                    <p class="animated fadeInDown">
                        Home <span class="fa-angle-right fa"></span> Pages <span class="fa-angle-right fa"></span> About
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid settings">
    <div class="my-4">

        <div class="my-3 card p-3">
            <legend>Slides</legend>
            <form action="{{route('addAboutSlide')}}" method="POST" class="form py-3" enctype="multipart/form-data">
                @csrf
                <input type="file" name="slide" id="slide" require class="form-control" />
                <button class="btn primary_btn">Add</button>
            </form>
            <div class="d-flex" style="flex-wrap:wrap">
                @foreach ($slides as $slide)
                <div class="px-3">
                    <img height="100" src="{{env('APP_CDN')}}/{{$slide->image}}" class="img-fluid" alt="">
                    <form action="{{route('deleteSlide', $slide->id)}}" method="POST">
                        @csrf
                        <button class="w-100 btn">&times;</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
        <br>
        <form action="">
            <legend>About Content</legend>
            <div class="row px-4">
                <div class="col-md-6">
                    <input type="text" id="about_heading" class="form-control" value="{{$about->about_heading}}" />
                </div>
                <hr>
                <div class="col-md-12">
                    <div id="summernote">{!! $about->about_us !!}</div>
                </div>
                <div class="col-md-12">
                    <button id="aboutContent" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
        <br />
        <div class="my-3">
            <legend>Our Mission</legend>
            <div class="row px-4">
                <div class="col-md-6 my-3">
                    <form action="{{route('missionContent')}}" method="post">
                        @csrf
                        <textarea id="our_mission" name="mission" class="form-control" rows="10">{{$about->mission}}</textarea>
                        <div class="col-md-12">
                            <button id="aboutContent" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6 my-3">
                    <img src="{{env('APP_CDN')}}/{{$about->mission_banner}}" class="form-control" style="height: 200px; width: 100%; object-fit: contain" />
                    <div>
                        <form action="{{route('updateMissionBanner')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" required id="mission_banner" accept=".png, .jpg, .jpeg" name="missionBanner" class="form-control my-3" />
                            <button type="submit" class="btn btn-default">Change</button>
                        </form>
                    </div>
                </div>
                <hr>
            </div>
        </div>


        <br />
        <div class="my-3">
            <legend>Our Vision</legend>
            <div class="row px-4">
                <div class="col-md-6 my-3">
                    <form action="{{route('visionContent')}}" method="post">
                        @csrf
                        <textarea id="our_vision" name="vision" class="form-control" rows="10">{{$about->vision}}</textarea>
                        <div class="col-md-12">
                            <button id="aboutContent" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6 my-3">
                    <img src="{{env('APP_CDN')}}/{{$about->vision_banner}}" class="form-control" style="height: 200px; width: 100%; object-fit: contain" />
                    <div>
                        <form action="{{route('updateVisionBanner')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" required id="vision_banner" accept=".png, .jpg, .jpeg" name="visionBanner" class="form-control my-3" />
                            <button type="submit" class="btn btn-default">Change</button>
                        </form>
                    </div>
                </div>
                <hr>
            </div>
        </div>



    </div>
</div>
@endsection


@section('scripts')
<script>
    $("#summernote").summernote({
        height: 200
    })

    function missionBanner() {
        alert("hello")
    }

    $("#aboutContent").on("click", function(e) {
        e.preventDefault();

        const summernote = $(".note-editable")[0].outerHTML
        var note = summernote.replace('contenteditable="true" style="height: 200px;" spellcheck="false"', '')
        note = note.replace('<div class="note-editable panel-body" contenteditable="true" style="height: 200px;">', '')
        note = note.replace('<div class="note-editable panel-body" contenteditable="true" style="height: 200px;" spellcheck="true">', '')
        note = note.replace('<div class="note-editable panel-body" >', '')
        note = note.replace('</div>', '')
        console.log(note)
        var formdata = new FormData();
        formdata.append("about_heading", $("#about_heading").val())
        formdata.append("content", note)

        fetch("{{route('updateAboutContent')}}", {
                method: 'POST',
                body: formdata,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .then((response) => response.json())
            .then((response) => {
                window.location.reload();
            })
    })
</script>
@endsection