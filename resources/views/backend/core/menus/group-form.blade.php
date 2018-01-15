{!! Form::open(['route' => 'admin.system.menus.group_store','class' => 'form-horizontal form-label-left','novalidate']) !!}
<div class="panel-body">
    <div class="form-group {{ $errors->has('menu_group') ? ' has-error' : '' }}">
        {!! Form::label('menu_group', __('text.name').' *',['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']) !!}
        <div class="col-lg-6 col-sm-6 col-xs-12">
            {!! Form::text('menu_group', @$item->menu_group ? @$item->menu_group : old('menu_group'),['required' => 'required', 'class' => 'form-control']); !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('menu_group_alias') ? ' has-error' : '' }}">
        {!! Form::label('menu_group_alias', __('text.slug').' *',['class' => 'control-label col-lg-3 col-sm-3 col-xs-12']) !!}
        <div class="col-lg-6 col-sm-6 col-xs-12">
            {!! Form::text('menu_group_alias', @$item->menu_group_alias ? @$item->menu_group_alias : old('menu_group_alias'),['required' => 'required', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="panel-footer">
    <div class="row">
        <div class="col-lg-12 text-right">
            {!! Form::hidden('secure_id', @$secure_id) !!}
            <a href="{{route('admin.system.menus.index')}}" class="btn btn-danger" type="button"><i
                        class="fa fa-close"></i> @lang('button.cancel')</a>
            <button type="submit" class="btn btn-success"><i
                        class="fa fa-check"></i> @lang('button.save')</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
<script type="text/javascript">
    $('document').ready(function () {
        $('#menu_group').on('keyup', function () {
            var alias = slugify(this.value);
            $('#menu_group_alias').val(alias);
        })
    });
</script>