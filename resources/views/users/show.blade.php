@extends('layouts.app')

@section('htmlheader_title', trans('users.heading'))

@section('contentheader_title', trans('users.heading'))

@section('main-content')
@include('users.breadcrumbs')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! $user->title !!} {!! $user->name !!}</h3>
        <a href="{!! route('admin.users.edit', $user->id) !!}" class="pull-right btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="{!! trans('common.edit') !!}"><i class="fa fa-edit"></i></a>
    </div>

    <div class="box-body">
    	<div class="col-md-3">
    		<img class="img-thumbnail img-responsive center-block" src="{!! $user->picture !!}">
    	</div>
    	<div class="col-md-9">
	    	<table class="table table-striped">
                <tr><td><label>{!! trans('users.title') !!}:</label></td><td>{!! $user->title !!}</td></tr>
	    		<tr><td><label>{!! trans('users.first_name') !!}:</label></td><td>{!! $user->first_name !!}</td></tr>
	    		<tr><td><label>{!! trans('users.last_name') !!}:</label></td><td>{!! $user->last_name !!}</td></tr>
	    		<tr><td><label>{!! trans('users.email') !!}:</label></td><td>{!! $user->email !!}</td></tr>
	    		<tr><td><label>{!! trans('users.dob') !!}:</label></td><td>{!! $user->dob !!}</td></tr>
	    	</table>
	    </div>
    </div>
</div>

@endsection

@push('javascript')
@endpush