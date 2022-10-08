<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="description" content="LSS ADMIN V.1">
    <meta name="author" content="Logic Software Solutions">
    <meta name="keyword" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LSS ADMIN</title>

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/asset/css/bootstrap.min.css')}}">

    <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/asset/css/plugins/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/asset/css/plugins/simple-line-icons.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/asset/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/asset/css/plugins/summernote.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/asset/css/plugins/datatables.bootstrap.min.css') }}" />
    <link href="{{ asset('assets/admin/asset/css/style.css') }}" rel="stylesheet">
    <!-- end: Css -->

    <link rel="shortcut icon" href="{{asset ('assets/admin/asset/img/logomi.png')}}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="mimin" class="dashboard">
    <!-- start: Header -->
    <nav class="navbar navbar-default header navbar-fixed-top">
        <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <div class="opener-left-menu is-open">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>
                <a href="/admin" class="navbar-brand">
                    <b>LSS ADMIN</b> <small>v 1.1</small>
                </a>

                <ul class="nav navbar-nav search-nav d-none">
                    <li>
                        <div class="search">
                            <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                            <div class="form-group form-animate-text">
                                <input type="text" class="form-text" required>
                                <span class="bar"></span>
                                <label class="label-search">Type anywhere to <b>Search</b> </label>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right user-nav">
                    <li class="user-name"><span>{{auth()->user()->name}}</span></li>
                    <li class="dropdown avatar-dropdown">
                        <img src="/assets/admin/asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
                        <ul class="dropdown-menu user-dropdown">
                            <li><a href="/admin/general"><span class="fa fa-user"></span> My Profile</a></li>
                            <li><a href="#"><span class="fa fa-calendar"></span> My Calendar</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="more">
                                <ul>
                                    <li>
                                        <a href="/admin/settings"><span class="fa fa-cogs"></span></a>
                                    </li>
                                    <li><a href="/admin/general"><span class="fa fa-lock"></span></a></li>
                                    <li>
                                        <form action="{{route('logout')}}" method="post">
                                            @csrf
                                            <button style="background: transparent; border: none; padding: 0; margin: 0; color: black" class="bg-none"><span class="fa fa-power-off text-dark"></span></button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end: Header -->

    <div class="container-fluid mimin-wrapper">

        <!-- start:Left Menu -->
        <div id="left-menu">
            <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li>
                        <div class="left-bg"></div>
                    </li>
                    <li class="time">
                        <h1 class="animated fadeInLeft">21:00</h1>
                        <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li class="active ripple">
                        <a href="/admin"><span class="fa-home fa"></span> Dashboard
                        </a>
                    </li>
                    <li class="ripple">
                        <a class="tree-toggle nav-header">
                            <span class="fa-diamond fa"></span> Pages
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                        </a>
                        <ul class="nav nav-list tree">
                            <li><a href="/admin/pages/home">Home</a></li>
                            <li><a href="/admin/pages/about">About</a></li>
                        </ul>
                    </li>
                    <li class="ripple">
                        <a href="/admin/services">
                            <span class="fa-diamond fa"></span> Services
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/testimonials">
                            <span class="fa-diamond fa"></span> Testimonials
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/collections">
                            <span class="fa-diamond fa"></span> Portfolio
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/clients">
                            <span class="fa-diamond fa"></span> Clients
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/team">
                            <span class="fa-diamond fa"></span> Team
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/general" class="">
                            <span class="fa-diamond fa"></span> General
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/settings">
                            <span class="fa-diamond fa"></span> Settings
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- end: Left Menu -->


        <!-- start: content -->
        <div id="content">
            @yield('content')
        </div>
        <!-- end: content -->

    </div>

    <!-- start: Mobile -->
    <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft" style="height: 100vh; background: #2196F3">
                <ul class="nav nav-list">
                    <li class="active ripple">
                        <a href="/admin">
                            <span class="fa-home fa"></span>Dashboard
                        </a>
                    </li>
                    <li class="ripple">
                        <a class="tree-toggle nav-header">
                            <span class="fa-diamond fa"></span> Pages
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                        </a>
                        <ul class="nav nav-list tree">
                            <li><a href="/admin/pages/home">Home</a></li>
                            <li><a href="/admin/pages/about">About</a></li>
                        </ul>
                    </li>
                    <li class="ripple">
                        <a href="/admin/services">
                            <span class="fa-diamond fa"></span> Services
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/testimonials">
                            <span class="fa-diamond fa"></span> Testimonials
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/collections">
                            <span class="fa-diamond fa"></span> Portfolio
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/team">
                            <span class="fa-diamond fa"></span> Team
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/clients">
                            <span class="fa-diamond fa"></span> Clients
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/general" class="">
                            <span class="fa-diamond fa"></span> General
                        </a>
                    </li>
                    <li class="ripple">
                        <a href="/admin/settings">
                            <span class="fa-diamond fa"></span> Settings
                        </a>
                    </li>
                 
                
                </ul>
            </div>
        </div>
    </div>

    <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
    </button>
    <!-- end: Mobile -->

    <!-- start: Javascript -->
    <script src="{{ asset('assets/admin/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/asset/js/jquery.ui.min.js') }}"></script>
    <script src="{{ asset('assets/admin/asset/js/bootstrap.min.js') }}"></script>


    <!-- plugins -->
    <script src="{{asset('assets/admin/asset/js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/asset/js/plugins/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('assets/admin/asset/js/plugins/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/admin/asset/js/plugins/jquery.datatables.min.js') }}"></script>

    <!-- custom -->

    <script src="{{ asset('assets/admin/asset/js/main.js') }}"></script>
    <script>
        function editService(id) {

        }

        function serviceImageChange() {
            if (!$(".addServiceImage")[0].files[0]) {
                $("#addServiceImageLabel").removeClass("bg-primary")
                return false;
            }
            const file = $(".addServiceImage")[0].files[0]
            $("#addServiceImageLabel").addClass("bg-primary")
            $("#addServiceImageLabel").text("1 item selected")
            console.log(file)
        }
    </script>
    @yield('scripts')
    <!-- end: Javascript -->
</body>

</html>