@extends('layouts.app')

@section('htmlheader_title', trans('message.welcome_title'))

@section('contentheader_title', trans('message.welcome_title'))

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{!! trans('message.welcome_title') !!}</h3>
        </div>

        <div class="box-body">
            
        </div>

    </div>
@endsection
