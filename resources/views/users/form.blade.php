{!! Form::hidden('id', null) !!}

<div class="form-group">
	{!! Form::label('title', trans('users.title')) !!}
	{!! Form::select('title', ['Mr.' => 'Mr.', 'Miss.' => 'Miss.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', 'Dr.' => 'Dr.', 'Prof.' => 'Prof.'], null, ['placeholder' => 'Please select a title', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('first_name', trans('users.first_name')) !!}
	{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('last_name', trans('users.last_name')) !!}
	{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', trans('users.email')) !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('dob', trans('users.dob')) !!}
	{!! Form::date('dob', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('gender', trans('users.gender')) !!}
	{!! Form::select('gender', [ trans('users.male') => trans('users.male'), trans('users.female') => trans('users.female') ], null, ['class' => 'form-control']) !!}
</div> 

<div class="form-group">
	{!! Form::label('roles', trans('users.roles')) !!}
	@foreach($roles as $role)
		<div class="input-group col-md-3">
			<span class="input-group-addon">
				{!! Form::checkbox('roles[]', $role->id, (isset($user)) ? $user->hasRole($role->name) : null) !!}
			</span>
			{!! Form::label('roles', $role->display_name, ['class' => 'form-control']) !!}
		</div>
	@endforeach
</div>

<br />

<a href="{!! URL::previous() !!}" class="pull-left btn btn-danger">{!! trans('common.cancel') !!}</a>
{!! Form::submit(trans('common.submit'), ['class' => 'pull-right btn btn-success']) !!}

@push('javascript')
<script>
@if(Request::segment(3) == 'create')
var url = "{!! route('api.users.store') !!}";
var type = "POST";
@else
var url = "{!! route('api.users.update', Request::segment(3)) !!}";
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
		swal({title: "{!! trans('swal.text_success') !!}!", text: data.msg, type: data.status}, function(){
            window.location.href = "{!! route('admin.users.index') !!}"
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