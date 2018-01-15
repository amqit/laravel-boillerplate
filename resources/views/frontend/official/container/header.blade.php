<header id="fh5co-header" role="banner">
    <div class="container">
        <nav class="nav">
            <ul>
                <li>
                    <a href="#" class="fh5co-header-bars js-nav-toggle"><span>@lang('text.menu')</span> <i class="ti-menu"></i></a>
                </li>
                @guest
                <li>
                    <a href="#" onclick="appModal('{{url('login')}}','@lang("text.signin_title")',null)" class="fh5co-header-bars"><span>@lang('auth.login')</span> <i class="ti-lock"></i></a>
                </li>
                @else
                    <li>
                        <a href="#" class="fh5co-header-bars"><span>{{session('fullname')}}</span> <i class="ti-user"></i></a>
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> @lang('text.profile')</a></li>
                            @if(session('alias') == 'superadmin')
                                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> @lang('text.administration')</a></li>
                            @else
                                <li><a href="#"><i class="fa fa-dashboard"></i> @lang('text.my_account')</a></li>
                            @endif
                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> @lang('auth.logout')
                                </a>
                                <form id="logout-form" action="{{ route('frontend.auth.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                <li>
                    <a href="#" class="fh5co-header-bars"><span>@lang('text.language')</span> <i class="ti-flag"></i></a>
                    <ul>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>
        <a href="{{url('/')}}" id="fh5co-header-logo" class="hidden-xs"><img src="{{asset('themes/official/images/logo.png')}}" alt="{{config('app.name')}}"></a>
        <h1 class="fh5co-header-intro"><span class="hidden-xs">@lang('text.tagline')</span></h1>
    </div>
</header>