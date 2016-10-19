@extends('layouts.auth')

@section('htmlheader_title', 'Password reset')

@section('main-content')

@include('layouts.partials.errors')

@if (session('status'))
    <div class="alert alert-success">
        {!! session('status') !!}
    </div>
@endif

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center">{!! trans('message.passwordreset') !!}</h4>
            </div>

            <div class="panel-body">
                {!! Form::open(['route' => 'password.reset', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('token', $token) !!}
                    <div class="form-group has-feedback">
                        {!! Form::label('email', trans('message.email'), ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            <i class="fa fa-envelope form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        {!! Form::label('password', trans('message.password'), ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            <i class="fa fa-unlock-alt form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        {!! Form::label('password_confirmation', trans('message.retrypepassword'), ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                            <i class="fa fa-lock form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            {!! Form::submit(trans('message.passwordreset'), ['class' => 'btn btn-success']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="panel-footer">
                <a href="{!! route('login') !!}">{!! trans('message.membership') !!}</a>
                <a href="{!! route('register') !!}" class="pull-right">{!! trans('message.registermember') !!}</a>
            </div>
        </div>
    </div>
</div>
@endsection
