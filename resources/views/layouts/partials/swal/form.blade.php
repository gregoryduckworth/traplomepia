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
    		if(data.status == 'success'){
                swal({title: "{!! trans('swal.text_success') !!}", text: data.msg, type: data.status}, function(){
                // If the form is successfully submitted then
                // redirect to the new page
                    window.location.href = form.attr('redirect');
                });
            }else{
                swal({title: "{!! trans('swal.text_error') !!}", text: data.msg, type: data.status, html: true});
            }
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
