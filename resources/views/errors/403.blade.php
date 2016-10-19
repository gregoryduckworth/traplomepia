@extends('errors.basic')

@section('htmlheader_title', trans('errors.access_denied'))

@section('contentheader_title', trans('errors.403_error'))

@section('main-content')
<div class="error-page">
    <h2 class="headline text-red">403</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-red"></i> Oops! {!! trans('errors.access_denied') !!}.</h3>
        <p>
            <a href="{!! route('home') !!}">{!! trans('errors.return_home') !!}</a>
        </p>
    </div><!-- /.error-content -->
</div><!-- /.error-page -->
@endsection