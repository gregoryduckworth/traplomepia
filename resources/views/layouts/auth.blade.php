<!DOCTYPE html>
<html>

@include('layouts.partials.htmlheader')

<body style="padding-top:70px;">
    @include('layouts.partials.navigation')

    <div class="container">
        @yield('main-content')
    </div>
    
</body>

@include('layouts.partials.scripts')
 
</html>