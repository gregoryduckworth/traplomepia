@extends('layouts.app')

@section('htmlheader_title', trans('users.heading'))

@section('contentheader_title', trans('users.heading'))

@section('main-content')
@include('users.profile.breadcrumbs')

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{!! trans('users.edit_user') !!}</h3>
		</div>

		<div class="box-body">
			{!! Form::model($currentUser, ['id' => 'form', 'method' => 'PATCH', 'class' => 'col-md-12']) !!}
				@include('users.profile.form')
			{!! Form::close() !!}
		</div>

	</div>
@endsection
