@extends('layouts.app')

@section('htmlheader_title', trans('settings.site'))

@section('contentheader_title', trans('settings.site'))

@section('main-content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! trans('settings.site') !!}</h3>
    </div>

    <div class="box-body">
    	{!! Form::model($global_settings, ['id' => 'form', 'route' => 'api.settings.update', 'redirect' => route('admin.settings.index'), '_method' => 'PATCH', 'class' => 'col-md-12']) !!}

            <div class="form-group">
                {!! Form::label('registration', trans('settings.registration') ) !!}
                {!! Form::select('registration', [ 'on' => trans('settings.on'), 'off' => trans('settings.off')], null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('colour_scheme', trans('settings.colour_scheme') ) !!}
                {!! Form::select('colour_scheme', [
                	'black' => trans('settings.black'), 
                	'blue' => trans('settings.blue'),
                	'green' => trans('settings.green'),
                	'red' => trans('settings.red'),
                	'yellow' => trans('settings.yellow'),
                	'purple' => trans('settings.purple'),
                	], null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit(trans('common.submit'), ['class' => 'pull-right btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection

@push('javascript')
@include('swal.form')
@endpush