@extends('layouts.app')

@section('htmlheader_title', trans('users.title'))

@section('contentheader_title', trans('users.title'))

@section('main-content')
@include('users.breadcrumbs')

	<div class="col-md-4">
		<div class="box">
			<div class="box-header with-border">
				{!! trans('users.show_user') !!}
			</div>

			<div class="box-body">
				<img class="img-responsive center-block" src="//www.clker.com/cliparts/B/R/Y/m/P/e/blank-profile-hi.png"><br />
				<p class="text-center">
				{!! $user->title !!} {!! $user->name !!}<br />
				</p>
			</div>

			<div class="box-footer">
				<h4>Details:</h4>
				Email: {!! $user->email !!}<br />
			</div>
		</div>
	</div>

	<div class="col-md-8">
		<div class="nav-tabs-custom" id="tabs">
			<ul class="nav nav-tabs" id="user-details">
				<li class="active">
					<a href="#address" data-toggle="tab" data-url="/api/users/1">{!! trans('users.addresses') !!}</a>
				</li>
				<li><a href="#other" data-toggle="tab" data-url="/api/users/2">{!! trans('users.other') !!}</a></li>
			</ul>
			<div id="tab-content" class="tab-content">
				@include('tabs.address')
				@include('tabs.other')
			</div>
		</div>
	</div>

@endsection

@push('javascript')
<script>
//the reason for the odd-looking selector is to listen for the click event
// on links that don't even exist yet - i.e. are loaded from the server.
$('#tabs').on('click','.tablink,#user-details a',function (e) {
    e.preventDefault();
    var url = $(this).attr("data-url");

    console.log(url);
    if (typeof url !== "undefined") {
        var pane = $(this), href = this.hash;

        // ajax load from data-url
        $(href).load(url,function(result){      
            pane.tab('show');
        });
    } else {
        $(this).tab('show');
    }
});
</script>
@endpush