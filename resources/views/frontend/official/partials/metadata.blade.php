<link rel="shortcut icon" href="{{asset('themes/'.config('app.themes').'/images/favicons/favicon.png')}}" type="image/x-icon">
{{--<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>--}}
{{ Html::style(asset('themes/'.config('app.themes').'/css/bootstrap.min.css')) }}
{{ Html::style(asset('themes/'.config('app.themes').'/css/owl.carousel.min.css')) }}
{{ Html::style(asset('themes/'.config('app.themes').'/css/owl.theme.default.min.css')) }}
{{ Html::style(asset('themes/'.config('app.themes').'/css/magnific-popup.css')) }}
{{ Html::style(asset('themes/'.config('app.themes').'/css/style.css')) }}
{{ Html::style(asset('themes/'.config('app.themes').'/css/custom.css')) }}
{{ Html::style(asset('themes/'.config('app.themes').'/css/themify-icons.css')) }}
@yield('append_css')
<!--[if lt IE 9]>
{{ Html::script(asset('js/html5shiv.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('js/respond.min.js'), ['type' => 'text/javascript']) }}
<![endif]-->
@yield('custom_css')