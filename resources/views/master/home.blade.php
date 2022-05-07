<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/home/css/style.css">
    <link rel="stylesheet" href="/home/css/responsive.css">
    <link rel="stylesheet" href="/css/iziToast.css">
    <link rel="stylesheet" href="/css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{@csrf_token()}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>
@include('home.section.top_header')
<div id="site-holder">
{{--    @includeWhen((Route::currentRouteName()==''),'home.teacher.sidebar')--}}
    @yield('main_body')
    @include('home.section.footer_home')

</div>
<script type="text/javascript" src="/home/js/jquery-2.2.0.min.js"></script>
<script type="text/javascript" src="/home/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/home/js/metisMenu.js"></script>
<script type="text/javascript" src="/home/js/lightbox.js"></script>
<script type="text/javascript" src="/home/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/home/js/imagesloaded.pkgd.js"></script>
<script type="text/javascript" src="/home/js/template.js"></script>
<script src="/js/iziToast.js"></script>
<script src="/js/fun.js"></script>

<script type="text/javascript" src="/js/app.js"></script>


{!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::renderJs() !!}
</body>
@include('sweet::alert')
</html>
