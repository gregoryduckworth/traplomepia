@extends('layouts.app')

@section('htmlheader_title', trans('usermanagement.title'))

@section('contentheader_title', trans('usermanagement.title'))


@section('main-content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{!! trans('usermanagement.all_users') !!}</h3>
		</div>

		<div class="box-body table-responsive">
			<table class="table table-striped display" id="datatable">
				<thead>
					<tr>
						<th>{!! trans('usermanagement.first_name') !!}</th>
						<th>{!! trans('usermanagement.last_name') !!}</th>
						<th>{!! trans('usermanagement.email') !!}</th>
						<th>{!! trans('usermanagement.updated_at') !!}</th>
						<th>{!! trans('usermanagement.actions') !!}</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>{!! trans('usermanagement.first_name') !!}</th>
						<th>{!! trans('usermanagement.last_name') !!}</th>
						<th>{!! trans('usermanagement.email') !!}</th>
						<th>{!! trans('usermanagement.updated_at') !!}</th>
						<th>{!! trans('usermanagement.actions') !!}</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
@endsection

@push('javascript')
<script>
// Fill the table with data
var table = $("#datatable").DataTable({
	"processing": true,
	"serverSide": true,
	"ajax": "{!! Request::segment(3) == 'deleted' ? route('api.users.deleted') : route('api.users.index') !!}",
	"aoColumns": [
		{ "data": "first_name" },
		{ "data": "last_name" },
		{ "data": "email" },
		{ "data": "updated_at" },
		{ "data": "actions" },
	],
	"columnDefs": [{
		"targets": -1,
		"orderable": false,
		"searchable": false,
	}],
	"autoWidth": false,
});

// When the delete button is hit, show the modal 
// with the confirmation button
$(document).on('click', '#delete_btn', function(e){
    e.preventDefault();
    var self = $(this);
    swal({
        title: "Are you sure?",
        text: "All the details for the user will be deleted.",
        type: "warning",
        showCancelButton: true,
        showLoaderOnConfirm: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false,
	},function(){
        $.ajax({
            type: "DELETE",
            url: "{!! route('api.users.index') !!}/" + self.data('id'),
            data:{
            	id: self.data('id'),
            	_token: "{!! csrf_token() !!}",
            },
            dataType: "json",
        }).done(function(data) {
      		switch(data.status){
      			case 'success':
      				swal("Deleted!", data.msg, "success");
      				break;
      			case 'role': 
      				swal("Stop!", "User has a role, so cannot be deleted!", "error");
      				break;
      		}      
	        table.ajax.reload(null, false);
      	}).fail(function(data) {
        	swal("Oops", "We couldn't connect to the server!", "error");
      	});
    });
});
</script>
@endpush