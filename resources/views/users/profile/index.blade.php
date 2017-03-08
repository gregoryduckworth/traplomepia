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
                <tr>
                    <td><label>{!! trans('users.title') !!}:</label></td>
                    <td>{!! $currentUser->title !!}</td>
                </tr>
	    		<tr>
                    <td><label>{!! trans('users.first_name') !!}:</label></td>
                    <td>{!! $currentUser->first_name !!}</td>
                </tr>
	    		<tr>
                    <td><label>{!! trans('users.last_name') !!}:</label></td>
                    <td>{!! $currentUser->last_name !!}</td>
                </tr>
	    		<tr>
                    <td><label>{!! trans('users.email') !!}:</label></td>
                    <td>{!! $currentUser->email !!}</td>
                </tr>
	    		<tr>
                    <td><label>{!! trans('users.dob') !!}:</label></td>
                    <td>{!! $currentUser->dob !!}</td>
                </tr>
	    	</table>
	    </div>
    </div>
</div>

@include('users.profile.picture')
@include('users.profile.password')

@endsection

@push('javascript')

@endpush
