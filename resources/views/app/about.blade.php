@extends("layouts.app")

@section('title')
<title>About Us - {{$info['company_name']}}</title>
@endsection('title')


@section('main')

<div class="hero" id="{{$active}}">
    <div class="hero_content wow slideInLeft">
        <h3 class="wow slideInLeft" data-wow-duration="2s" data-wow-delay=".1s">ABOUT US</h3>
        <!-- <h3>Ultimate Flooring & Paving</h3> -->
        <div class="divider wow slideInRight" data-wow-delay="0.2s"></div>
    </div>
</div>
</div>


<section class="about">
    <div class="container">
        <div class="section_title">
            <h3 class="wow rubberBand" data-wow-duration="1s" data-wow-delay="0.2s">About Us</h3>
            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider wow bounceInDown" data-wow-duration="2s" data-wow-delay="0.2s"></div>
            <p class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="0.2s">Who we are</p>
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

<section class="mission_vision">
    <div class="container">
        <div class="row gx-3 mission_vision_row">
            <div class="col-lg-6 mission">
                <div class="section_title">
                    <h3 class="wow rubberBand" data-wow-duration="1s" data-wow-delay="0.2s">Our Mission</h3>
                    <div class="divider divider wow bounceInDown" data-wow-duration="2s" data-wow-delay="0.2s"></div>
                </div>
                <div class="section_content wow bounceInDown" data-wow-duration="2s" data-wow-delay="0.2s">
                    <p>{{ $aboutPage->mission }}</p>
                    <div class="section_image my-1">
                        <img class="img-fluid w-100" src="/storage/{{$aboutPage->mission_banner}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 vision">
                <div class="section_title">
                    <h3>Our Vision</h3>
                    <div class="divider"></div>
                </div>
                <div class="section_content">
                    <div class="section_image my-1">
                        <img class="img-fluid w-100" src="/storage/{{$aboutPage->vision_banner}}" alt="">
                    </div>
                    <p>{{ $aboutPage->vision }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="section_title">
            <h3 class="wow rubberBand" data-wow-duration="1s" data-wow-delay="0.2s">Our Goal</h3>
            <div class="divider divider wow bounceInDown" data-wow-duration="2s" data-wow-delay="0.2s"></div>
        </div>
        <div class="section_content wow bounceInDown " style="max-width: 600px; width: 95%; margin: 0 auto;" data-wow-duration="2s" data-wow-delay="0.2s">
            <p>{{ $aboutPage->goal }}</p>
        </div>
    </div>
</section>


<section class="facts py-5">
    <div class="container">
        <div class="section_title">
            <h3 class="wow rubberBand" data-wow-duration="1s" data-wow-delay="0.2s">Our Achievements</h3>
            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider wow bounceInDown" data-wow-duration="2s" data-wow-delay="0.2s"></div>
            <p class="wow slideInLeft" data-wow-duration="2s" data-wow-delay="0.2s">Interesting Facts</p>
        </div>

        <div class="section_content">
            <div class="row achievements">
                <div class="col">
                    <h3 class="numbers">
                        1000
                    </h3>
                    <small>Completed Products</small>
                </div>

                <div class="col">
                    <h3 class="numbers">
                        102
                    </h3>
                    <small>Clients</small>
                </div>

                <div class="col">
                    <h3 class="numbers">
                        78
                    </h3>
                    <small>Workers</small>
                </div>

                <div class="col-12 request_quote mt-5 text-center">
                    <a href="" class="btn primary_bg text-white wow slideInRight" data-wow-duration="2s" data-wow-delay="0.1s">Request Quote</a>
                </div>
            </div>
        </div>

    </div>
</section>


<section class="out_team bg-white py-5">
    <div class="container">
        <div class="section_title">
            <h3 class="wow rubberBand" data-wow-duration="1s" data-wow-delay="0.2s">Our Team</h3>
            <div class="divider divider wow bounceInDown" data-wow-duration="2s" data-wow-delay="0.2s"></div>
            <p>Meet our team</p>
        </div>
        <div class="our_team_grid">
            @foreach ($team as $member)
            <div class="card team p-1">
                <div class="team_image">
                    <img class="img-fluid" src="/storage/{{$member->image}}" alt="">
                </div>
                <div class="team_name">
                    <h6>{{$member->name}}</h6>
                    <small>{{$member->post}}</small>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection('main')