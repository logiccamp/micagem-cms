@extends("layouts.admin")


@section('content')
<div class="container-fluid settings">
    <div class="my-4">
        <div class="row">
            <div class="col-md-6">
                <div class="hero overlay" style='background: url("{{env('APP_CDN')}}/{{$banner}}")'>
                    <div class="hero_content wow slideInLeft">
                        <h3 class="wow slideInLeft" data-wow-duration="2s" data-wow-delay=".1s">{{$header_text}}</h3>
                        <!-- <h3>Ultimate Flooring & Paving</h3> -->
                        <div class="divider wow slideInRight" data-wow-delay="0.2s"></div>
                        <p>{{$sub_text}}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center my-3">
                    <input onchange="bannerChange()" type="file" accept=".png, .jpg" class="d-none homeBg" id="homeBg" hidden>
                    <Label class="btn btn-primary" for="homeBg">Change Background</Label>
                </div>
            </div>
            <div class="col-md-6">
                <form action="{{route('updateHomeBanner')}}" method="post">
                    @csrf
                    <div class="my-3">
                        <label for="">Header text</label>
                        <input type="text" class="form-control" value="{{$header_text}}" require name="header_text">
                    </div>

                    <div class="my-3">
                        <label for="">Header Sub-text</label>
                        <input type="text" class="form-control" value="{{$sub_text}}" require name="header_sub_text">
                        <input type="text" hidden class="form-control d-none" value="{{$page_name}}" require name="page_name">
                    </div>

                    <div class="my-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <hr>
        </div>



    </div>
</div>
@endsection


@section('scripts')
<script>
    function bannerChange() {
        if (!$(".homeBg")[0].files[0]) {

            return false;
        }
        const file = $(".homeBg")[0].files[0]
        var formdata = new FormData();
        formdata.append("banner", file)
        formdata.append("page", '{{$page_name}}')
        fetch("{{route('changeHomeBanner')}}", {
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
        console.log(file)
    }
</script>
@endsection