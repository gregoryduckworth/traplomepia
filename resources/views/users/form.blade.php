{!! Form::hidden('id', null) !!}

<div class="form-group">
	{!! Form::label('title', trans('usermanagement.title')) !!}
	{!! Form::select('title', ['Mr.' => 'Mr.', 'Miss.' => 'Miss.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', 'Dr.' => 'Dr.', 'Prof.' => 'Prof.'], null, ['placeholder' => 'Please select a title', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('first_name', trans('usermanagement.first_name')) !!}
	{!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('last_name', trans('usermanagement.last_name')) !!}
	{!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', trans('usermanagement.email')) !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('dob', trans('usermanagement.dob')) !!}
	{!! Form::date('dob', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('gender', trans('usermanagement.gender')) !!}
	{!! Form::select('gender', [ trans('usermanagement.male') => trans('usermanagement.male'), trans('usermanagement.female') => trans('usermanagement.female') ], null, ['class' => 'form-control']) !!}
</div> 

<a href="{!! URL::previous() !!}" class="pull-left btn btn-danger">{!! trans('usermanagement.cancel') !!}</a>
{!! Form::submit(trans('usermanagement.submit'), ['class' => 'pull-right btn btn-success']) !!}

@push('javascript')
<script>
@if(Request::segment(3) == 'create')
var url = "{!! route('api.users.store') !!}";
var type = "POST";
@else
var url = "{!! route('api.users.update', Request::segment(3)) !!}";
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
                    window.location.href = "{!! route('admin.users.index') !!}"
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