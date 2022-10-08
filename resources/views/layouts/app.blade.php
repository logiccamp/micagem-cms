<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welcome to {{$info['company_name']}}, furnishings and global designs limited ,your number one source for all kinds of wall to wall carpet , window blinds, artificial grass carpet , center rugs, Armstrong pvc carpet.">
    <meta name="keywords" content="Carptets, Rug, PVC, Flooring">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{env('APP_CDN')}}/{{$info->company_logo}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div class="banner overlay" id="{{$page->page_name !== 'Home' ? 'page' : ''}}" style='background-repeat: no-repeat; background-position: center !important; background: url("{{env('APP_CDN')}}/{{$page->banner}}")'>
            <header class="px-lg-3">
                <nav class="navbar navbar-expand-lg navbar-dark bg-none py-3">
                    <a class="navbar-brand" href="#"><img style="height: 72px" class="img-fluid" src="{{env('APP_CDN')}}/{{$info->company_logo}}" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-0">
                            <li class="nav-item {{ $active == 'Home' ? 'active' : '' }}">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item {{ $active == 'About' ? 'active' : '' }}">
                                <a class="nav-link" href="/about-us">About</a>
                            </li>

                            <li class="nav-item {{ $active == 'Services' ? 'active' : '' }}">
                                <a class="nav-link" href="/services">Services</a>
                            </li>

                            <li class="nav-item {{ $active == 'Portfolio' ? 'active' : '' }}">
                                <a class="nav-link" href="/portfolio">Portfolio</a>
                            </li>
                            <li class="nav-item {{ $active == 'Team' ? 'active' : '' }}">
                                <a class="nav-link" href="/teams">Our Team</a>
                            </li>
                            <li class="nav-item {{ $active == 'Contact' ? 'active' : '' }}">
                                <a class="nav-link" href="/contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            @yield("main")

            <section class="testimonial_quote last">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 tesimonials">
                            <div class="section_title">
                                <h2>Client Feedback</h2>
                            </div>
                            <div class="section_content">
                                <div class="divider mb-5"></div>
                                @if (count($testimonials) > 1)
                                <div class="tesimonials_slider">
                                    @foreach ($testimonials as $testimonial)
                                    <div class="testimonial">
                                        <div class="testimonial_content">
                                            <p>{{$testimonial->message}}</p>
                                        </div>
                                        <div class="testimonial_user mt-5">
                                            <h6 class="m-0">{{$testimonial->name}}</h6>
                                            <small class="primary_color">{{$testimonial->post}} of {{$testimonial->company}}</small>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="tesimonials_slier">
                                    @foreach ($testimonials as $testimonial)
                                    <div class="testimonial">
                                        <div class="testimonial_content">
                                            <p>{{$testimonial->message}}</p>
                                        </div>
                                        <div class="testimonial_user mt-5">
                                            <h6 class="m-0">{{$testimonial->name}}</h6>
                                            <small class="primary_color">{{$testimonial->post}} of {{$testimonial->company}}</small>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 request_quote" id="requestQuote">
                            <div class="section_title">
                                <h2>Get a free Quote</h2>
                            </div>
                            <div class="section_content">
                                <div class="divider mb-5"></div>
                                <div class="quote_box">
                                    <div class="quote_head">
                                        <p>We are waiting for your message .</p>
                                    </div>
                                    <div class="quote_content">
                                        <form action="{{route('submitQuote')}}" method="POST" class="form">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-6 my-2">
                                                    <input type="text" class="form-control" placeholder="Your Name" name="quotename">
                                                </div>
                                                <div class="form-group col-6 my-2">
                                                    <input type="text" class="form-control" placeholder="Your Email" name="quoteemail">
                                                </div>
                                                <div class="form-group col-12 my-2">
                                                    <textarea name="quotemessage" class="form-control" placeholder="Your message" id="" cols="30" rows="5"></textarea>
                                                </div>
                                                <div class="form-group col-12 my-2">
                                                    <button class="btn primary_bg text-white">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
            <footer class="bg-dark py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="theme1_footerdiv wow fadeInUp" data-wow-delay="0.5s">
                                <a href="/"><img style="height: 100px" src="{{env('APP_CDN')}}/{{$info->company_logo}}" class="" alt="herbal-pure-footer-logo"></a>
                                <p>{{$info->short_description}}</p>
                                <div class="theme1_social_icon mx-0">
                                    <ul style="padding-inline-start: 0;">
                                        @foreach ($socials as $handle)
                                        <li><a href="{{$handle->handle}}" class="wow fadeIn" data-wow-delay="0.8s"><i class="fa fa-{{ strtolower($handle->social->title)}}"></i></a></li>
                                        @endforeach
                                        <!-- <li><a href="#" class="wow fadeIn" data-wow-delay="1s"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#" class="wow fadeIn" data-wow-delay="1.2s"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#" class="wow fadeIn" data-wow-delay="1.4s"><i class="fa fa-linkedin"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="theme1_footerdiv text-center wow fadeInUp" data-wow-delay="0.5s">
                                <h3>Links</h3>
                                <ul class="theme1_footer_links p-0">
                                    <li>
                                        <p><a href="#">Home</a></p>
                                    </li>
                                    <li>
                                        <p><a href="#">About</a></p>
                                    </li>
                                    <li>
                                        <p><a href="#">Portfolio</a></p>
                                    </li>
                                    <li>
                                        <p><a href="#">Gallery</a></p>
                                    </li>
                                    <li>
                                        <p><a href="#">Contact Us</a></p>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="theme1_footerdiv wow fadeInUp" data-wow-delay="0.5s">
                                <h3>Get in Touch</h3>
                                <ul class="theme1_footer_contact p-0">
                                    <li>
                                        <span><i class="fa fa-envelope"></i></span>
                                        <p>
                                            <a href="#">{{$info->company_email}}</a>
                                            @if ($info->company_email2 != "")
                                            , <a href="tel:{{$info->company_email2}}">{{$info->company_email2}}</a>
                                            @endif
                                        </p>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-phone"></i></span>
                                        <p>{{$info->company_phone}}</p>
                                    </li>
                                    <li>
                                        <span><i class="fa fa-home"></i></span>
                                        <p>{{$info->company_address}}</p>
                                    </li>
                                    @if ($info->company_address2 != "")
                                    <li>
                                        <span><i class="fa fa-home"></i></span>
                                        <p>{{$info->company_address2}}</p>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
            <div class="copyright_wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <p>Copyright © {{date('Y')}} <a class="text-white" href="/admin">{{$info->company_name}}</a>, All Rights Reserved by <a target="_blank" href="//logiccamp.com.ng">Logic Software Solutions</a>.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
        <script src="{{asset('assets/js/isotope.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script src="//code.tidio.co/mmugeyvpuzaqbikbnzlcpwcbschhj40a.js" async></script>
        @yield('scripts')
</body>

</html>