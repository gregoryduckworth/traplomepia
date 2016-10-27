@extends('layouts.app')

@section('htmlheader_title', trans('users.profile'))

@section('contentheader_title', trans('users.profile'))

@section('main-content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! $currentUser->title !!} {!! $currentUser->name !!}</h3>
        <a href="{!! route('profile.edit') !!}" class="pull-right btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="{!! trans('common.edit') !!}"><i class="fa fa-edit"></i></a>
    </div>

    <div class="box-body">
    	<div class="col-md-3">
    		<img class="img-thumbnail img-responsive center-block" src="{!! $currentUser->picture !!}">
    	</div>
    	<div class="col-md-9">
	    	<table class="table table-striped">
                <tr><td><label>{!! trans('users.title') !!}:</label></td><td>{!! $currentUser->title !!}</td></tr>
	    		<tr><td><label>{!! trans('users.first_name') !!}:</label></td><td>{!! $currentUser->first_name !!}</td></tr>
	    		<tr><td><label>{!! trans('users.last_name') !!}:</label></td><td>{!! $currentUser->last_name !!}</td></tr>
	    		<tr><td><label>{!! trans('users.email') !!}:</label></td><td>{!! $currentUser->email !!}</td></tr>
	    		<tr><td><label>{!! trans('users.dob') !!}:</label></td><td>{!! $currentUser->dob !!}</td></tr>
	    	</table>
	    </div>
    </div>
</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! trans('users.change_password') !!}</h3>
    </div>
    <div class="box-body">
        {!! Form::open(['id' => 'form', 'route' => 'api.profile.password', 'redirect' => route('profile.index'), '_method' => 'PATCH', 'class' => 'col-md-12']) !!}
            <div class="form-group">
                {!! Form::label('old_password', trans('users.old_password')) !!}
                {!! Form::password('old_password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', trans('users.new_password')) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', trans('users.password_confirmation')) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit(trans('common.submit'), ['class' => 'pull-right btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection

@push('javascript')
@include('swal.form')
@endpush
