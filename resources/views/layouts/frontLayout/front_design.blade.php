<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('css/frontend-css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend-css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend-css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend-css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend-css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend-css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend-css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontend-css/easyzoom.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('js/frontend-js/html5shiv.js')}}"></script>
    <script src="{{asset('js/frontend-js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('images/frontend-images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('mages/frontend-images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('image/frontend-imagess/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('image/frontend-imagess/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('image/frontend-imagess/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>

@include('layouts.frontLayout.front_header')

@yield('content')

@include('layouts.frontLayout.front_header')

<script src="{{asset('js/frontend-js/jquery.js')}}"></script>
<script src="{{asset('js/frontend-js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/frontend-js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('js/frontend-js/price-range.js')}}"></script>
<script src="{{asset('js/frontend-js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('js/frontend-js/main.js')}}"></script>
<script src="{{asset('js/frontend-js/easyzoom.js')}}"></script>
    <script>
        // Instantiate EasyZoom instances
        var $easyzoom = $('.easyzoom').easyZoom();

        // Setup thumbnails example
        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

        $('.thumbnails').on('click', 'a', function(e) {
            var $this = $(this);

            e.preventDefault();

            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
        });

        // Setup toggles example
        var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

        $('.toggle').on('click', function() {
            var $this = $(this);

            if ($this.data("active") === true) {
                $this.text("Switch on").data("active", false);
                api2.teardown();
            } else {
                $this.text("Switch off").data("active", true);
                api2._init();
            }
        });
    </script>
</body>
</html>