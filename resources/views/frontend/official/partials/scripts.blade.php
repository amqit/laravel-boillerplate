{{ Html::script(asset('themes/'.config('app.themes').'/js/jquery-1.10.2.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/'.config('app.themes').'/js/jquery.easing.1.3.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/'.config('app.themes').'/js/bootstrap.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/'.config('app.themes').'/js/modernizr-2.6.2.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/'.config('app.themes').'/js/owl.carousel.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/'.config('app.themes').'/js/jquery.magnific-popup.min.js'), ['type' => 'text/javascript']) }}
@yield('append_js')
{{ Html::script(asset('themes/'.config('app.themes').'/js/custom.js'), ['type' => 'text/javascript']) }}
<script type="text/javascript">
    function appModal(url, title, classes) {
        // $('#app-modal-content').html(' ....Loading content, please wait ...');
        $('.modal-title').html(title);
        $('.modal-dialog').addClass(classes);
        $('#app-modal-content').load(url, function () {});
        $('#app-modal').modal('show');
    }

    $('document').ready(function () {
        var _token="{{ csrf_token() }}";
        var base_url="{{ url('/') }}";
        var back_url="{{ url()->previous() }}"
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxPrefilter(function(options, originalOptions, jqXHR){
            if (options.type.toLowerCase() === "post") {
                options.data = options.data || "";
                options.data += options.data?"&":"";
                options.data += "_token=" + csrf_token;
            }
        });
        var token = "{{csrf_token()}}";
        var root = "{{URL::asset('/')}}";
    });
</script>
@yield('custom_js')