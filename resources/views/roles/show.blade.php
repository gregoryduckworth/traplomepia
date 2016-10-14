@extends('layouts.app')

@section('htmlheader_title', trans('roles.title'))

@section('contentheader_title', trans('roles.title'))

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
			<label>{!! trans('role.name') !!}</label>: {!! $role->display_name !!}<br />
			<label>{!! trans('role.description') !!}</label>: {!! $role->description !!}<br />
		</div>
	</div>
@endsection