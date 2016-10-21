@extends('layouts.app')

@section('htmlheader_title', trans('roles.heading'))

@section('contentheader_title', trans('roles.heading'))

@section('main-content')
@include('roles.breadcrumbs')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{!! trans('roles.edit_role') !!}</h3>
		</div>

		<div class="box-body">
			{!! Form::model($role, ['id' => 'form', 'route' => ['api.roles.update', $role->id], 'redirect' => route('admin.roles.index'), '_method' => 'PATCH', 'class' => 'col-md-12']) !!}
				@include('roles.form')
			{!! Form::close() !!}
		</div>

	</div>
@endsection