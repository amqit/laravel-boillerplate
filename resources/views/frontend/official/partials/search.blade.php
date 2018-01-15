<div class="mini-page-wrapper hidden-xs">
    <section class="container mini-page mini-page-compact">
        <div class="col-lg-12 no-padding">
            <h2 class="search_title col-lg-7  no-padding">
                @lang('placeholder.discover')
            </h2>
            <form action="{{url('login')}}" class="form-horizontal col-lg-5 no-padding" method="post">
                {{ csrf_field() }}
                {!! Form::text('keyword', old('keyword'),['class' => 'form-control search_input', 'autocomplete' => 'off', 'placeholder' => __('placeholder.search')]); !!}
            </form>
        </div>
    </section>
</div>