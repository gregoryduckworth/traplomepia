@extends('layouts.app')

@section('htmlheader_title', trans('roles.heading'))

@section('contentheader_title', trans('roles.heading'))

@section('main-content')
@include('roles.breadcrumbs')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{!! trans('roles.create_role') !!}</h3>
		</div>

		<div class="box-body">
			{!! Form::model(null, ['id' => 'form', 'route' => 'admin.roles.create', 'method' => 'POST', 'class' => 'col-md-12']) !!}
				@include('roles.form')
			{!! Form::close() !!}
		</div>
	</div>
@endsection