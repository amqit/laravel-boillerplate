<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <title>@yield('title') | {{config('app.name')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="{{config('app.description')}}" />
    <meta name="keywords" content="{{config('app.keywords')}}" />
    <meta name="author" content="{{config('app.author')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('backend.partials.metadata')
</head>
<body>
<div class="page-container">
    @include('backend.partials.sidebar')
    <div class="page-content">
        @include('backend.partials.header')
        @yield('breadcrumbs')
        <div class="page-content-wrap">
            @yield('content')
        </div>
    </div>
</div>
@include('backend.partials.parts')
@include('backend.partials.scripts')
</body>
</html>






