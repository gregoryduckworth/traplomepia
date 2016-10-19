<!DOCTYPE html>
<html>

@include('layouts.partials.htmlheader')

<body style="padding-top:70px;">
	<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="#">{!! Config::get('site.full_name') !!}</a>
	        </div>
	        <div id="navbar" class="navbar-collapse collapse">
	            <ul class="nav navbar-nav">
	                <li class="active"><a href="{!! route('home') !!}">Home</a></li>
	            </ul>
	        </div><!--/.nav-collapse -->
	    </div>
	</nav>

    <div class="container">
        @yield('main-content')
    </div>

</body>

@include('layouts.partials.scripts')

</html>
