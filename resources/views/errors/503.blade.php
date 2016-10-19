@extends('errors.basic')

@section('htmlheader_title', trans('errors.503_error'))

@section('main-content')
<div class="error-page">
    <h2 class="headline text-red">503</h2>
    <div class="error-content">
        <h3><i class="fa fa-warning text-red"></i> {!! trans('errors.oops') !!}</h3>
        <h3>{!! trans('errors.unable_to_handle') !!}</h3>
        <p>
            <a href="{!! route('home') !!}">{!! trans('errors.return_home') !!}</a>
        </p>
    </div>
</div><!-- /.error-page -->
@endsection