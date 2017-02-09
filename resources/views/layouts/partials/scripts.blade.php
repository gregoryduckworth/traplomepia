<!-- REQUIRED JS SCRIPTS -->
<script src="/js/external.js " type="text/javascript"></script>
<!-- App JS -->
<script src="{!! mix('js/app.js') !!}" type="text/javascript"></script>

@if($currentUser)
<script>
	$.ajaxSetup({ 
		beforeSend: function (xhr) {
    		xhr.setRequestHeader('Authorization', 'Bearer {!! $currentUser->api_token !!}');
		}
	});
</script>
@endif

@include('sweet::alert')
@stack('javascript')