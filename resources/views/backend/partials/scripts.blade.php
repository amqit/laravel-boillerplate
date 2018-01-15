<audio id="audio-alert" src="{{asset('themes/admin/audio/alert.mp3')}}" preload="auto"></audio>
<audio id="audio-fail" src="{{asset('themes/admin/audio/fail.mp3')}}" preload="auto"></audio>
{{ Html::script(asset('themes/admin/js/plugins/jquery/jquery.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/jquery/jquery-ui.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/bootstrap/bootstrap.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/icheck/icheck.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/noty/jquery.noty.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/noty/layouts/bottomRight.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/noty/themes/default.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/scrolltotop/scrolltopcontrol.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/bootstrap/bootstrap-datepicker.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/owl/owl.carousel.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/moment.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/daterangepicker/daterangepicker.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/datatables/jquery.dataTables.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/validationengine/languages/jquery.validationEngine-'.config('app.locale').'.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/validationengine/jquery.validationEngine.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/jquery-validation/jquery.validate.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/jquery-validation/localization/messages_'.config('app.locale').'.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/select2/select2.full.min.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins/select2/i18n/'.config('app.locale').'.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/plugins.js'), ['type' => 'text/javascript']) }}
{{ Html::script(asset('themes/admin/js/actions.js'), ['type' => 'text/javascript']) }}
@yield('append_js')
<script type="text/javascript">
    function appModal(url, title, classes) {
        // $('#app-modal-content').html(' ....Loading content, please wait ...');
        $('.modal-title').html(title);
        $('.modal-dialog').addClass(classes);
        $('#app-modal-content').load(url, function () {});
        $('#app-modal').modal('show');
    }

    function appRemove(id, title) {
        $('#data-name').html(title);
        $('#mb-destroy').modal({
            show: true,
            backdrop: 'static',
            keyboard: false
        });
        $('#row-id').val(id);
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

        var jvalidate = $("#appForm").validate({
            ignore: [],
            rules: {
                username: {
                    minlength: 5,
                    maxlength: 15
                },
                password: {
                    minlength: 5,
                    maxlength: 15
                },
                'password_confirmation': {
                    minlength: 5,
                    maxlength: 15,
                    equalTo: "#password"
                },
                age: {
                    min: 10,
                    max: 100
                },
                email: {
                    email: true
                },
                date: {
                    date: true
                }
            }
        });

        $('.id').hide();
        $('.nl').hide();
        $('#locale').on('change', function () {
            var lang = this.value;
            if (lang === 'id') {
                $('.id').show();
                $('.en').hide();
                $('.nl').hide();
            } else if (lang === 'nl') {
                $('.id').hide();
                $('.en').hide();
                $('.nl').show();
            } else {
                $('.id').hide();
                $('.en').show();
                $('.nl').hide();
            }
        });

        @if(session()->has('message'))
            @if(session('type') == 'success')
                noty({text: "<i class='fa fa-check-circle'></i> {{session('message')}}", layout: "bottomRight", type: "success"});
            @endif
            @if(session('type') == 'error')
                noty({text: "<i class='fa fa-times-circle'></i> {{session('message')}}", layout: "bottomRight", type: "error"});
            @endif
            @if(session('type') == 'info')
                noty({text: "<i class='fa fa-info-circle'></i> {{session('message')}}", layout: "bottomRight", type: "information"});
            @endif
            @if(session('type') == 'warning')
                noty({text: "<i class='fa fa-exclamation-circle'></i> {{session('message')}}", layout: "bottomRight", type: "warning"});
            @endif
        @endif
    });
</script>
@yield('custom_js')

