<script>
    $("#form-file").on("submit", function(e) {
        e.preventDefault();
        var form = $(this),
            formData = new FormData(form[0]);
    	$.ajax({
            type: form.attr('_method'),
            url: form.attr('action'),
            data: formData,
            dataType: 'JSON',
            contentType: false,
            processData: false,
        }).done(function(data) {
            // Capitalise the first letter and send the user to the redirected page
    		swal({title: data.status.charAt(0).toUpperCase() + data.status.slice(1), text: data.msg, type: data.status}, function(){
                // If the form is successfully submitted then 
                // redirect to the new page
                if(data.status == 'success'){
                    window.location.href = form.attr('redirect');
                }
            });
    	}).fail(function(data) {
            // Display any errors that have been returned
    		errors = data.responseJSON;
    		errorsHTML = '';
            $.each(errors, function(key,value){
                errorsHTML += "<span class='text-danger'>" + value[0] + "</span><br>";
            });
            swal({title: "{!! trans('swal.text_oops') !!}", text: errorsHTML, type: "error", html: true});
    	});
    });
</script>
