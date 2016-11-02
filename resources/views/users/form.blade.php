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
@include('layouts.partials.swal.form')
@endpush
