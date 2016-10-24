<script>
    $("#form").on("submit", function(e) {
        e.preventDefault();
        var form = $(this);
    	$.ajax({
            type: form.attr('_method'),
            url: form.attr('action'),
            data: form.serialize(),
            dataType: 'JSON',
        }).done(function(data) {
            // Capitalise the first letter and send the user to the redirected page
    		swal({title: data.status.charAt(0).toUpperCase() + data.status.slice(1), text: data.msg, type: data.status}, function(){
                window.location.href = form.attr('redirect');
            });
    	}).fail(function(data) {
            // Display any errors that have been returned
    		errors = data.responseJSON;
    		errorsHTML = '';
            $.each(errors, function(key,value){
                errorsHTML += "<span class='text-danger'>" + value[0] + "</span><br>";
            });
            swal({title: "{!! trans('swal.text_oops') !!}", text: errorsHTML, type: data.status, html: true});
    	});
    });
</script>
