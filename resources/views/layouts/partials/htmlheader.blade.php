<head>
    <meta charset="UTF-8">
    <title>{!! config('settings.full_name') !!} - @yield('htmlheader_title', 'Home')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <!-- Bootstrap -->
    <link href="{!! asset('css/external.css') !!}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{!! mix('css/app.css') !!}" rel="stylesheet" type="text/css" />
</head>
