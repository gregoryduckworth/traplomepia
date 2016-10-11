@extends('layouts.app')

@section('htmlheader_title', trans('usermanagement.title'))

@section('contentheader_title', trans('usermanagement.title'))

@section('main-content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{!! trans('usermanagement.edit_user') !!}</h3>
		</div>

		<div class="box-body">
			{!! Form::model($user, ['id' => 'form', 'url' => 'admin/users/' . $user->id, 'method' => 'PATCH', 'class' => 'col-md-12']) !!}
				@include('users.form')
			{!! Form::close() !!}
		</div>
		
	</div>
@endsection