{!! Form::hidden('id', null) !!}

<div class="form-group">
	{!! Form::label('display_name', trans('roles.display_name')) !!}
	{!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('description', trans('roles.description')) !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('permissions', trans('roles.permissions')) !!}
	@foreach($permissions as $permission)
		<div class="input-group col-md-3">
			<span class="input-group-addon">
				{!! Form::checkbox('permissions[]', $permission->id, (isset($role)) ? $role->hasPermission($permission->name) : null) !!}
			</span>
			{!! Form::label('permissions', $permission->display_name, ['class' => 'form-control']) !!}
		</div>
	@endforeach
</div>

<a href="{!! URL::previous() !!}" class="pull-left btn btn-danger">{!! trans('common.cancel') !!}</a>
{!! Form::submit(trans('common.submit'), ['class' => 'pull-right btn btn-success']) !!}

@push('javascript')
<script>
@if(Request::segment(3) == 'create')
var url = "{!! route('api.roles.store') !!}";
var type = "POST";
@else
var url = "{!! route('api.roles.update', Request::segment(3)) !!}";
var type = "PATCH";
@endif 

$("#form").on("submit", function(e) {
    e.preventDefault(); 
	$.ajax({
        type: type,
        url: url,
        data: $("#form").serialize(),
        dataType: 'JSON',
    }).done(function(data) {
		swal({title: "!! trans('swal.text_success') !!}!", text: data.msg, type: data.status}, function(){
            window.location.href = "{!! route('admin.roles.index') !!}"
        });  
	}).fail(function(data) {
		console.log(data);
		errors = data.responseJSON;
		errorsHTML = '';
        $.each(errors, function(key,value){
            errorsHTML += "<span class='text-danger'>" + value[0] + "</span><br>"; 
        });
        swal({title: "{!! trans('swal.text_oops') !!}", text: errorsHTML, type: "error", html: true});
	});
});
</script>
@endpush