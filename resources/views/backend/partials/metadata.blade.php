<link rel="shortcut icon" href="{{asset('themes/'.config('app.themes').'/images/favicons/favicon.png')}}" type="image/x-icon">
{{ Html::style(asset('themes/admin/css/theme-blue.css'), ['id' => 'theme']) }}
@yield('append_css')