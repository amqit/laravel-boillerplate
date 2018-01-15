@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	    <ul style="padding: 0px;list-style-type: none;">
	    	@foreach ($errors->all() as $error)
        		<li><i class="fa fa-info-circle"></i> {{ $error }}</li>
    		@endforeach
	    </ul>
	</div>
@endif