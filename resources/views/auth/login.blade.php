@extends('layouts.auth')

@section('htmlheader_title', 'Log in')

@section('main-content')

@include('layouts.partials.errors')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center">{!! trans('message.login') !!}</h4>
            </div>

            <div class="panel-body">
                {!! Form::open(['url' => 'login', 'class' => 'form-horizontal']) !!}
                    <div class="form-group has-feedback">
                        {!! Form::label('email', trans('message.email'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            <i class="fa fa-envelope form-control-feedback"></i>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        {!! Form::label('password', trans('message.password'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-md-10">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            <i class="fa fa-lock form-control-feedback"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">{!! trans('message.remember') !!}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            {!! Form::submit('Sign in', ['class' => 'btn btn-success btn-sm']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="panel-footer">
                <a href="{!! route('register') !!}">{!! trans('message.registermember') !!}</a>
                <a href="{!! route('password.reset') !!}" class="pull-right">{!! trans('message.forgotpassword') !!}</a>
            </div>
        </div>
    </div>
</div>    

@endsection