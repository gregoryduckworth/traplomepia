@extends('layouts.auth')

@section('htmlheader_title', 'Register')

@section('main-content')

@include('layouts.partials.errors')

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="text-center">{!! trans('message.register') !!}</h4>
            </div>
            @if(config('settings.registration') === 'open')
                <div class="panel-body">
                    {!! Form::open(['route' => 'register.post', 'class' => 'form-horizontal']) !!}
                        <div class="form-group">
                            {!! Form::label('first_name', trans('users.first_name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('last_name', trans('users.last_name'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::label('email', trans('message.email'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                <i class="fa fa-envelope form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::label('password', trans('message.password'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                <i class="fa fa-unlock-alt form-control-feedback"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::label('password_confirmation', trans('users.password_confirmation'), ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                                <i class="fa fa-lock form-control-feedback"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="terms">{!! trans('message.agree_terms') !!}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-8">
                                {!! Form::submit(trans('message.register'), ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="panel-footer">
                    <a href="{!! route('login') !!}" class="text-center">{!! trans('message.membership') !!}</a>
                    <a href="#" class="pull-right" data-toggle="modal" data-target="#termsModal">{!! trans('message.terms') !!}</a>
                </div>
            @else
                <div class="panel-body">
                    <p class="text-center">{!! trans('message.registration_closed') !!}</p>
                </div>
            @endif
        </div>
    </div>
</div>


@endsection

@push('javascript')

    @include('auth.terms')

@endpush
