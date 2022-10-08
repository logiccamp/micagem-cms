@extends("layouts.app")

@section('title')
<title>Team - {{$info['company_name']}}</title>
@endsection('title')


@section('main')


<div class="hero" id="{{$active}}">
    <div class="hero_content wow slideInLeft">
        <h3 class="wow slideInLeft" data-wow-duration="2s" data-wow-delay=".1s">Our Team</h3>
        <!-- <h3>Ultimate Flooring & Paving</h3> -->
        <div class="divider wow slideInRight" data-wow-delay="0.2s"></div>
    </div>
</div>
</div>


<section class="collections">
    <div class="container">
        <div class="section_title">
            <h3>Our Team</h3>
            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider"></div>
            <p>Meet our team.</p>
        </div>
    </div>


    <div class="section_content">
        <div class="container">

        </div>
        <div class="container-fluid">
            <div class="row gy-3 collections_grid">
                @foreach ($team as $member)
                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                    <div class="team p-1 shadow p-3 bg-white rounded">
                        <div class="team_image mx-auto text-center">
                            @if(empty($member->image))
                            <img class="img-fluid rounded-pill" height="250" width="250" style="object-fit: cover;" src="/assets/images/user_avatar.jpg" alt="">
                            @else
                            <img class="img-fluid rounded-pill" height="250" width="250" style="object-fit: cover;" src="/storage/{{$member->image}}" alt="">
                            @endif
                        </div>
                        <div class="team_name text-center">
                            <h6 class="m-0 pt-2 text-black">{{$member->name}}</h6>
                            <small>{{$member->post}}</small>
                            <p>{{$member->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


</section>


@endsection('main')


@section('scripts')
<!-- init isotope -->
<script>
    // <!-- on button click -->
    $grid = $(".collections_grid");

    $('.filter-button-groups').on('click', 'li', function() {
        var filterValue = $(this).attr('data-filter');
        // use filterFn if matches value

        $grid.children(".item").hide(100)
        $grid.children(filterValue).show(100)

    });
    // change active button class on buttons
    $('.filter-button-groups').each(function(i, buttonGroup) {
        var $buttonGroup = $(buttonGroup);
        $buttonGroup.on('click', 'li', function() {
            $buttonGroup.find('.active').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
@endsection('scripts')