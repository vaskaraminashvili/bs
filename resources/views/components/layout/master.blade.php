<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- admixer -->

    <title>{{$data['title'] ?? 'BS' }} - Business Insider</title>
    <meta itemprop="name" content="{{$data['title'] ?? '' }}"/>
    <meta itemprop="description" content="{{$data['description'] ?? '' }}"/>
    <meta itemprop="image" content="{{$data['image'] ?? '' }}"/>
    <meta name="description" content="{{$data['description'] ?? '' }}"/>
    <meta name="keywords" content="{{$data['keywords'] ?? '' }}"/>
    <meta name="copyright" content="https://www.businessinsider.ge/ka">
    <meta name="author" content="ProService">
    <meta name="country" content="Georgia">
    <meta name="robots" content="index, all">
    <meta name="contactOrganization" content="https://www.businessinsider.ge/ka">
    <meta name="contactStreetAddress1" content='Georgia, Tbilisi'>
    <meta name="contactCity" content="Tbilisi">
    <meta name="contactCountry" content="Georgia">
    <meta name="linkage" content="{{$data['linkage'] ?? ''}}">


    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{$data['title'] ?? ''}}"/>
    <meta property="og:description" content="{{$data['description'] ?? ''}}"/>
    <meta property="og:image" content="{{$data['image'] ?? ''}}"/>
    <meta property="og:image" content="img/metas/fb_im.png"/>
    <meta property="og:url" content="{{$data['url'] ?? ''}}"/>
    <meta property="og:site_name" content="{{env('APP_NAME')}}"/>
    <meta property="og:see_also" content="{{env('APP_URL')}}"/>
    <meta name="linkedin:owner" content="business-insider-georgia">
    <meta name="linkedin:page_id" content="business-insider-georgia">

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="{{env('APP_NAME')}}"/>
    <meta name="twitter:title" content="{{$data['title'] ?? ''}}">
    <meta name="twitter:description" content="{{$data['description'] ?? ''}}"/>
    <meta name="twitter:creator" content="{{env('APP_NAME')}}"/>
    <meta name="twitter:image:src" content="{{$data['image'] ?? ''}}"/>
    <meta name="twitter:domain" content="{{env('APP_URL')}}"/>

     <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/log.jpg') }}">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/bi.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/bi.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/bi.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/bi.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/bi.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/bi.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/bi.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/bi.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/bi.png') }}">


    <link rel="shortcut icon" href="{{ asset('img/bi.png') }}" type="image/x-icon">
    <link rel="icon" type="image/png" href="{{ asset('img/bi.png') }}">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('img/bi.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- ========== Start Stylesheet ========== -->

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/linear-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/redesign.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css?v=1.0') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('styles')
    {{ $styles ?? '' }}
    <script src="{{ asset('js/modernizr-3.5.0.min.js') }}"></script>

    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>

    <script src=" https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.js "></script>
    <link href=" https://cdn.jsdelivr.net/npm/swiper@11.0.5/swiper-bundle.min.css " rel="stylesheet">

    <!-- ========== End Stylesheet ========== -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-EVSDSTVDRZ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-EVSDSTVDRZ');
    </script>

</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v16.0"
        nonce="xwfAYPf8"></script>
<x-menu/>
 {{ $slot }}
<x-footer/>

<!-- Javascripts File
    ============================================= -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/functions.js') }}"></script>

@stack('scripts')

</body>
</html>
