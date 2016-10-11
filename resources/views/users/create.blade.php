@extends('layouts.app')

@section('htmlheader_title', trans('users.title'))

@section('contentheader_title', trans('users.title'))


@section('main-content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{!! trans('users.create_user') !!}</h3>
		</div>

		<div class="box-body">
			{!! Form::model(null, ['id' => 'form', 'route' => 'admin.users.create', 'method' => 'POST', 'class' => 'col-md-12']) !!}
				@include('users.form')
			{!! Form::close() !!}
		</div>
	</div>
@endsection