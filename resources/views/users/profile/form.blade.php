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

<br />

<a href="{!! URL::previous() !!}" class="pull-left btn btn-danger">{!! trans('common.cancel') !!}</a>
{!! Form::submit(trans('common.submit'), ['class' => 'pull-right btn btn-success']) !!}

@push('javascript')
<script>
	var url = "{!! route('api.profile.update') !!}";
	var type = "PATCH";
	var swal_redirect = "{!! route('profile.index') !!}";
</script>
@include('swal.form')
@endpush