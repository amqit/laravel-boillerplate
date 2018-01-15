<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if you want to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="btn btn-success btn-lg">@lang('button.yes')</a>
                    <button class="btn btn-default btn-lg mb-control-close">@lang('button.no')</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="message-box message-box-danger animated fadeIn" data-sound="alert" id="mb-destroy">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-exclamation-triangle"></span> Delete <strong>Confirmation</strong></div>
            <div class="mb-content">
                <p>Are you sure you want to delete <strong><span id="data-name"></span></strong>? </p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('formDelete').submit();"
                       class="btn btn-success btn-lg">@lang('button.yes')</a>
                    <button type="button" class="btn btn-default btn-lg mb-destroy-close" data-dismiss="modal" aria-label="Close">@lang('button.no')</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="app-modal" role="dialog">
    <div class="modal-dialog modal-primary">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body" id="app-modal-content">
            </div>
        </div>
    </div>
</div>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden" style="display: none;">
    {{ csrf_field() }}
</form>