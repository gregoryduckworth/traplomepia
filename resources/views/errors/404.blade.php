@extends('errors.basic')

@section('htmlheader_title', trans('errors.404_error'))

@section('main-content')
<div class="box box-solid">
	<div class="box-body">
		<div class="error-page">
		    <h2 class="headline text-yellow">404</h2>
		    <div class="error-content">
		        <h3><i class="fa fa-warning text-yellow"></i> {!! trans('errors.oops') !!}</h3>
		        <h3>{!! trans('errors.page_not_found') !!}.</h3>
		        <p>
		            <a href="{!! route('home') !!}" class="pull-right">{!! trans('errors.return_home') !!}</a>
		        </p>
		    </div><!-- /.error-content -->
		</div><!-- /.error-page -->
	</div>
</div>
@endsection
