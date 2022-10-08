@extends("layouts.app")

@section('title')
<title>{{$page['page_name']}} - {{$info['company_name']}}</title>
@endsection('title')

@section('main')

<div class="hero" id="active">
    <div class="hero_content wow slideInLeft">
        <h3 class="wow slideInLeft" data-wow-duration="2s" data-wow-delay=".1s">{{$page->header_text}}</h3>
        <!-- <h3>Ultimate Flooring & Paving</h3> -->
        <div class="divider wow slideInRight" data-wow-delay="0.2s"></div>
        <p>{{$page->sub_text}} </p>
        <div class="">
            <a href="#requestQuote" class="btn primary_bg btn-sm text-white wow slideInLeft" data-wow-duration="2s" data-wow-delay=".4s">About Us</a>
            <span class="mx-2"></span>
            <a href="#requestQuote" class="btn btn-outline-success btn-sm text-white wow slideInRight" data-wow-duration="1s" data-wow-delay=".4s">Request Quote</a>
        </div>
    </div>
</div>
</div>


<section class="about">
    <div class="container">
        <div class="section_title">
            <h3>About {{$info['company_name']}}</h3>

            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider"></div>
            <p>Who we are</p>
        </div>

        <div class="section_content">
            <div class="row">
                <div class="col-md-6">
                    <h3>{{$aboutPage->about_heading}}</h3>
                    <div class="divider"></div>
                    <div class="about_us_content">
                        {!! $aboutPage->about_us !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about_home_carousel">
                        @foreach ($slides as $slide)
                        <div class="item">
                            <img src="{{env('APP_CDN')}}/{{$slide->image}}" class="img-fluid w-100" alt="" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

<section class="services">
    <div class="container">
        <div class="section_title">
            <h3>Our Services</h3>
            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider"></div>
            <p>To many clients like homes and offices</p>
        </div>

        <!-- Rugs, Vinyl Sheet, Vinyl Tile, Carpet, Laminate, Hardwood,  -->
        <div class="section_content mt-3">
            <div class="row gy-3">
                @foreach ($services as $service)
                <div class="col-md-4 col-sm-6 wow fadeIn" data-wow-delay="0.2s" data-wow-duration="1s">
                    <div class="service_block">
                        <img src="{{env('APP_CDN')}}/{{$service->image}}" class="img-fluid w-100" alt="">
                        <div class="content">
                            <a href="/collections/{{$service->title}}">
                                <h4>{{$service->title}}</h4>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>


    </div>
</section>


<section class="collections">
    <div class="container">
        <div class="section_title">
            <h3>Our Portfolio</h3>
            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider"></div>
            <p>Just a glance into our portfolio.</p>
        </div>
    </div>

    <div class="section_content">
        <div class="container">
            <div class="row gy-3 collections_grid">
                @foreach ($collections as $collection)
                <div class="col-lg-4 col-md-4 col-sm-6 col-6 item {{$collection->Service->id}}">
                    <div class="collection_block">
                        <div class="collection_image">
                            <img src="{{env('APP_CDN')}}/{{$collection->image}}" class="img-fluid w-100" alt="">
                        </div>
                        <div class="collection_content">
                            <div class="section_title mt-2">
                                <h3 class="fs-5">
                                    {{$collection->title}}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="section_footer my-5">
                <div class="text-center">
                    <a href="/collections" class="btn primary_bg text-white bg-lg">Go to Portfolio</a>
                </div>
            </div>
        </div>


        <section class="out_team bg-white py-5">
            <div class="container">
                <div class="section_title text-center">
                    <h3 class="wow rubberBand" data-wow-duration="1s" data-wow-delay="0.2s">Our Team</h3>
                    <div class="divider mx-auto divider wow bounceInDown" data-wow-duration="2s" data-wow-delay="0.2s"></div>
                    <p>Meet our team</p>
                </div>
                <div class="our_team_grid">
                    @foreach ($team as $member)
                    <div class="card team p-1">
                        <div class="team_image">
                            @if(empty($member->image))
                            <img class="img-fluid" height="300" style="object-fit: cover;" src="/assets/images/user_avatar.jpg" alt="">
                            @else
                            <img class="img-fluid" height="300" style="object-fit: cover;" src="/storage/{{$member->image}}" alt="">
                            @endif
                        </div>
                        <div class="team_name">
                            <h6 class="m-0 pt-2">{{$member->name}}</h6>
                            <small>{{$member->post}}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="out_team py-5">
            <div class="container">
                <div class="section_title text-center">
                    <h3 class="wow rubberBand" data-wow-duration="1s" data-wow-delay="0.2s">Our Clients</h3>
                    <div class="divider mx-auto divider wow bounceInDown" data-wow-duration="2s" data-wow-delay="0.2s"></div>
                    <p>Our Clients and Projects Delivered</p>
                </div>
                <div class="row row-cols-2 row-cols-md-3">
                    @foreach ($clients as $client)
                    <div class="p-2">
                        <div class="card p-2" style="min-height: 150px;">
                            <div class="team_name px-2">
                                <!-- <span class="fa-diamond fa"></span> -->
                                <h4 class="m-0 text-dark pt-2 text-center">{{$client->name}}</h4>
                                <small class="text-dark">{{$client->project}}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
</section>



@endsection('main')


@section('scripts')
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
@endsection