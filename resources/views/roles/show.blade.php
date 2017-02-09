@extends('layouts.app')

@section('htmlheader_title', trans('roles.heading'))

@section('contentheader_title', trans('roles.heading'))

@section('main-content')
@include('roles.breadcrumbs')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{!! trans('roles.show_role', ['role' => $role->display_name]) !!}</h3>
			@permission('manage-roles')
				<a href="{!! url('admin/roles/'.$role->id.'/edit') !!}" class="btn btn-xs btn-warning pull-right" data-toggle="tooltip" data-placement="top" title="{!! trans('message.edit') !!}"><i class="fa fa-edit"></i></a>
			@endpermission
		</div>

		<div class="box-body">
			<label>{!! trans('roles.display_name') !!}</label>: {!! $role->display_name !!}<br />
			<label>{!! trans('roles.description') !!}</label>: {!! $role->description !!}<br />
			<label>{!! trans('roles.permissions') !!}</label>: 
				<ul>
				@foreach($role->permissions as $permission)
					<li>{!! $permission->display_name !!}</li>
				@endforeach
				</ul>
		</div>
	</div>
@endsection