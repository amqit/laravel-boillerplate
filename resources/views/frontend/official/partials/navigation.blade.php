<nav role="navigation" id="fh5co-nav-slide">
    <div class="fh5co-nav-inner">
        <ul>
            @foreach(navigation('publictopbar') as $row)
                <li class="{{active($row->module)}}"><a href="{!! $row->module !!}">{!! $row->menu_title !!}</a></li>
            @endforeach
        </ul>
    </div>
</nav>