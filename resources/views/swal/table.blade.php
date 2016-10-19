<script>
// When the delete button is hit, show the modal 
// with the confirmation button
$(document).on('click', btn, function(e){
    e.preventDefault();
    var self = $(this);
    swal({
        title: "{!! trans('swal.are_you_sure') !!}",
        text: swal_text,
        type: "warning",
        showCancelButton: true,
        showLoaderOnConfirm: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: swal_confirm,
        closeOnConfirm: false,
	},function(){
        $.ajax({
            type: ajax_type,
            url: ajax_route + "/" + self.data('id'),
            data:{
            	id: self.data('id'),
            	_token: "{!! csrf_token() !!}",
            },
            dataType: "json",
        }).done(function(data) {
			swal({title: swal_success, text: data.msg, type: "success"});   
	        table.ajax.reload(null, false);
      	}).fail(function(data) {
        	swal({title: "{!! trans('swal.text_oops') !!}", text: "{!! trans('swal.could_not_connect') !!}", type: "error"});
      	});
    });
});
</script>