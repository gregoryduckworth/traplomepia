{!! Form::hidden('id', null) !!}

<div class="form-group">
	{!! Form::label('title', trans('users.title')) !!}
	{!! Form::select('title', [trans('users.mr') => trans('users.mr'), trans('users.miss') => trans('users.miss'), trans('users.mrs') => trans('users.mrs'), trans('users.ms') => trans('users.ms'), trans('users.dr') => trans('users.dr'), trans('users.prof') => trans('users.prof')], null, ['placeholder' => trans('users.select_title'), 'class' => 'form-control']) !!}
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
{!! Form::submit(trans('common.submit'), ['name' => 'submit', 'class' => 'pull-right btn btn-success']) !!}

@push('javascript')
@include('layouts.partials.swal.form')
@endpush
