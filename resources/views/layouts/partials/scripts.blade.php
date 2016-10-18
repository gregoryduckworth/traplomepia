<!-- REQUIRED JS SCRIPTS -->
<script src="{!! elixir('js/external.js') !!}" type="text/javascript"></script>
<!-- App JS -->
<script src="{!! elixir('js/all.js') !!}" type="text/javascript"></script>

<script>
	$.ajaxSetup({ 
		beforeSend: function (xhr) {
    		xhr.setRequestHeader('Authorization', 'Bearer {!! $currentUser->api_token !!}');
		},				 
	});
</script>

@include('sweet::alert')
@stack('javascript')