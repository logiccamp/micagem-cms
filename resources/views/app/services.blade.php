@extends("layouts.app")

@section('title')
<title>Services - {{$info['company_name']}}</title>
@endsection('title')


@section('main')


<div class="hero" id="{{$active}}">
    <div class="hero_content wow slideInLeft">
        <h3 class="wow slideInLeft" data-wow-duration="2s" data-wow-delay=".1s">OUR SERVICES</h3>
        <!-- <h3>Ultimate Flooring & Paving</h3> -->
        <div class="divider wow slideInRight" data-wow-delay="0.2s"></div>
    </div>
</div>
</div>


<section class="services">
    <div class="container">
        <div class="section_title">
            <h3>Our Service</h3>
            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider"></div>
            <p>To many clients like homes and offices</p>
        </div>

        <!-- Rugs, Vinyl Sheet, Vinyl Tile, Carpet, Laminate, Hardwood,  -->
        <div class="section_content my-5">
            <div class="row gy-3">
                @foreach ($services as $service)
                <div class="col-md-6 col-sm-6 p-3">
                    <div class="card p-0 wow swing" data-wow-delay="0.2s" data-wow-duration="1s"">
                    <div class=" service_block">
                        <img src="{{env('APP_CDN')}}/{{$service->image}}" class="img-fluid w-100" alt="">
                        <div class="content">
                            <a href="#?">
                                <h4>{{$service->title}}</h4>
                            </a>
                        </div>
                    </div>
                    <p class="p-3 text-dark p-sm-2">
                        {{$service->description}}
                    </p>

                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="section_footer">
        <div class="text-center">
            <a href="collections" class="btn btn-default secondary_bg text-white bg-lg">View Portfolio</a>
        </div>
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
@endsection('main')