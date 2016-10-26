@extends('layouts.auth')

@section('main-content')

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>{!! $global_settings['site_full_name'] !!}</h1>
        <p>Main homepage for the site</p>
    </div>

@endsection