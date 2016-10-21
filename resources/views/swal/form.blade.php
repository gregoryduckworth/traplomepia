<script>
    $("#form").on("submit", function(e) {
        e.preventDefault();
    	$.ajax({
            type: type,
            url: url,
            data: $("#form").serialize(),
            dataType: 'JSON',
        }).done(function(data) {
    		swal({title: data.status.charAt(0).toUpperCase() + data.status.slice(1), text: data.msg, type: data.status}, function(){
                window.location.href = swal_redirect;
            });
    	}).fail(function(data) {
    		errors = data.responseJSON;
    		errorsHTML = '';
            $.each(errors, function(key,value){
                errorsHTML += "<span class='text-danger'>" + value[0] + "</span><br>";
            });
            swal({title: "{!! trans('swal.text_oops') !!}", text: errorsHTML, type: "error", html: true});
    	});
    });
</script>
