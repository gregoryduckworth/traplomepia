{!! Form::hidden('id', null) !!}

<div class="form-group">
	{!! Form::label('display_name', trans('roles.display_name')) !!}
	{!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('description', trans('roles.description')) !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<a href="{!! URL::previous() !!}" class="pull-left btn btn-danger">{!! trans('common.cancel') !!}</a>
{!! Form::submit(trans('common.submit'), ['class' => 'pull-right btn btn-success']) !!}

@push('javascript')
<script>
@if(Request::segment(3) == 'create')
var url = "{!! route('api.roles.store') !!}";
var type = "POST";
@else
var url = "{!! route('api.roles.update', Request::segment(3)) !!}";
var type = "PATCH";
@endif 

$("#form").on("submit", function(e) {
    e.preventDefault(); 
	$.ajax({
        type: type,
        url: url,
        data: $("#form").serialize(),
        dataType: 'JSON',
    }).done(function(data) {
		switch(data.status){
			case "success":
				swal({title: "Success!", text: data.msg, type: data.status}, function(){
                    window.location.href = "{!! route('admin.roles.index') !!}"
                });
				break;
		}      
	}).fail(function(data) {
		console.log(data);
		errors = data.responseJSON;
		errorsHTML = '';
        $.each(errors, function(key,value){
            errorsHTML += "<span class='text-danger'>" + value[0] + "</span><br>"; 
        });
        swal({title: "Oops!", text: errorsHTML, type: "error", html: true});
	});
});
</script>
@endpush