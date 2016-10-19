@extends('layouts.app')

@section('htmlheader_title', trans('message.home'))

@section('contentheader_title', trans('message.home'))

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{!! trans('message.home') !!}</h3>
        </div>

        <div class="box-body">
            
        </div>

    </div>
@endsection
