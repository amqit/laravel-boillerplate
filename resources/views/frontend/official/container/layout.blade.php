<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{config('app.description')}}" />
    <meta name="keywords" content="{{config('app.keywords')}}" />
    <meta name="author" content="{{config('app.author')}}" />
    <meta property="og:title" content="{{config('app.title')}}"/>
    <meta property="og:image" content="{{config('app.logo')}}"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:site_name" content="{{config('app.name')}}"/>
    <meta property="og:description" content="{{config('app.description')}}"/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('frontend.official.partials.metadata')
</head>
<body id="outer-page">
    <div id="top"></div>
    <div id="fh5co-page">
        @include('frontend.official.partials.navigation')
        @include('frontend.official.container.header')
        <main id="fh5co-main" role="main">
            @yield('content')
            @yield('left-sidebar')
            @yield('right-sidebar')
        </main>
        @include('frontend.official.container.footer')
    </div>
    @include('frontend.official.partials.parts')
    @include('frontend.official.partials.scripts')
</body>
</html>
