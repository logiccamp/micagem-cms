@extends("layouts.app")

@section('title')
<title>Contact Us - {{$info['company_name']}}</title>
@endsection('title')


@section('main')


<div class="hero" id="{{$active}}">
    <div class="hero_content wow slideInLeft">
        <h3 class="wow slideInLeft" data-wow-duration="2s" data-wow-delay=".1s">CONTACT US</h3>
        <!-- <h3>Ultimate Flooring & Paving</h3> -->
        <div class="divider wow slideInRight" data-wow-delay="0.2s"></div>
    </div>
</div>
</div>

<section class="contact_us">
    <div class="container">
        <p class="fs-6">Thank you for your interest in the {{$info['company_name']}}. Please fill out the form below to ask a question, leave a statement or to report a technical problem and we will get back to you at our earliest convenience.</p>
    </div>

    <div class="container my-5">
        <div class="row gx-4 gy-4">
            <div class="col-md-4">
                <div class="card text-center p-3 py-5">
                    <i class="fa fa-home fa-3x primary_color"></i>
                    <h4>Our Address</h4>
                    <p class="w-75 mx-auto">{{$info->company_address}}</p>
                    @if ($info->company_email2 != "")
                    <p>{{$info->company_email2}}</p>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-3 py-5">
                    <i class="fa fa-envelope fa-3x primary_color"></i>
                    <h4>Phone and Email</h4>
                    <p>{{$info->company_phone}} <br />
                        {{$info->company_email}}
                        @if ($info->company_email2 != "")
                        <br /> {{$info->company_email2}}
                        @endif
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center p-3 py-5">
                    <i class="fa fa-share fa-3x primary_color"></i>
                    <h4>Social Media</h4>
                    <p>Join us on social media </p>
                    <p class="social_media my-1">
                        @foreach ($socials as $social)
                        <a href="{{$social->handle}}" target="_blank">
                            <i class="fa fa-{{strtolower($social->social->title)}}"></i>
                        </a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map_contact py-5 last bg-white">
    <div class="container">
        <div class="row gy-5 flex-column-reverse">
            <div class="col-12 map">
                <div class="section_title">
                    <h2>Our Location</h2>
                </div>
                <div class="section_content">
                    <div class="divider mb-5"></div>
                    <div class="location">
                        <div class="map_content">
                            <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Block%20B19,%20Queen%20Shopping%20Plaza,%20Sangotedo,%20Eti-osa,%20lagos&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <!-- <iframe src="https://maps.google.com/maps?q=59+Ikorodu+Road,+Fadeyi,+Lagos,+Nigeria&output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 request_quote">
                <div class="section_title">
                    <h2 class="text-dark">Contact Us</h2>
                </div>
                <div class="section_content">
                    <div class="divider mb-5"></div>
                    <div class="quote_box">
                        <div class="quote_head">
                            <p>We are waiting for your message :)</p>
                        </div>
                        <div class="quote_content">
                            <form action="{{route('contactMessage')}}" method="POST" class="form">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6 my-2">
                                        <input type="text" name="contactname" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="form-group col-6 my-2">
                                        <input type="text" name="contactemail" class="form-control" placeholder="Your Email">
                                    </div>
                                    <div class="form-group col-12 my-2">
                                        <input type="text" name="contactphone" class="form-control" placeholder="Your Telephone">
                                    </div>
                                    <div class="form-group col-12 my-2">
                                        <textarea name="contactmessage" class="form-control" placeholder="Your message" id="" cols="30" rows="5"></textarea>
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


        <br>
    </div>
</section>

@endsection('main')