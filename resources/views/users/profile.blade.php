@extends('layouts.app')

@section('htmlheader_title', trans('users.profile'))

@section('contentheader_title', trans('users.profile'))

@section('main-content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! $currentUser->name !!}</h3>
    </div>

    <div class="box-body">
    	<div class="col-md-3">
    		<img class="img-thumbnail img-responsive center-block" src="//www.clker.com/cliparts/B/R/Y/m/P/e/blank-profile-hi.png">	
    	</div>
    	<div class="col-md-9">
	    	<table class="table table-striped">
	    		<tr><td><label>{!! trans('users.first_name') !!}:</label></td><td>{!! $currentUser->first_name !!}</td></tr>
	    		<tr><td><label>{!! trans('users.last_name') !!}:</label></td><td>{!! $currentUser->last_name !!}</td></tr>
	    		<tr><td><label>{!! trans('users.email') !!}:</label></td><td>{!! $currentUser->email !!}</td></tr>
	    		<tr><td><label>{!! trans('users.dob') !!}:</label></td><td>{!! $currentUser->dob !!}</td></tr>
	    	</table>
	    </div>
    </div>

</div>

@endsection

@push('javascript')

@endpush