@extends('layouts.auth')

@section('main-content')

    <!-- Main component for a primary marketing message or call to action -->
    <div>
        <h1>
        	<img src="{!! $global_settings['picture'] !!}" class="pull-right">
        	{!! $global_settings['full_name'] !!}
        </h1>
        <p>Main homepage for the site</p>
    </div>

@endsection