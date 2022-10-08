@extends("layouts.app")

@section('title')
<title>Collections - {{$info['company_name']}}</title>
@endsection('title')


@section('main')


<div class="hero" id="{{$active}}">
    <div class="hero_content wow slideInLeft">
        <h3 class="text-uppercase wow slideInLeft" data-wow-duration="2s" data-wow-delay=".1s">{{$service->title}} - Collections</h3>
        <!-- <h3>Ultimate Flooring & Paving</h3> -->
        <div class="divider wow slideInRight" data-wow-delay="0.2s"></div>
    </div>
</div>
</div>


<section class="collections">
    <div class="container">
        <div class="section_title">
            <h3>{{$service->title}}</h3>
            <!-- <h3>We provide quality Flooring Services</h3> -->
            <div class="divider"></div>
        </div>
    </div>


    <div class="section_content">
        <div class="container">


        </div>
        <div class="container-fluid">
            @if (count($collections) == 0)
            <div class="text-center">No items in the catalog <a href="/">Go Back</a> </div>
            @endif
            <div class="row gy-3 collections_grid">
                @foreach ($collections as $collection)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 item {{$collection->Service->id}}">
                    <div class="collection_block">
                        <div class="wow slideInRight collection_image">
                            <img src="{{env('APP_CDN')}}/{{$collection->image}}" class="img-fluid w-100" alt="">
                        </div>
                        <div class="collection_content"></div>
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