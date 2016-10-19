@extends('errors.basic')

@section('htmlheader_title', trans('errors.500_error'))

@section('main-content')
<div class="error-page">
    <h2 class="headline text-red">500</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-red"></i> {!! trans('errors.oops') !!}</h3>
        <h3>{!! trans('errors.something_wrong') !!}</h3>
        <p>
            <a href="{!! route('home') !!}">{!! trans('errors.return_home') !!}</a>
        </p>
    </div>
</div><!-- /.error-page -->
@endsection
