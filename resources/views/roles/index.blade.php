@extends('layouts.app')

@section('htmlheader_title', trans('roles.title'))

@section('contentheader_title', trans('roles.title'))

@section('main-content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{!! trans('roles.all_users') !!}</h3>
		</div>

		<div class="box-body table-responsive">
			<table class="table table-striped display" id="datatable">
				<thead>
					<tr>
						<th>{!! trans('roles.display_name') !!}</th>
						<th>{!! trans('roles.description') !!}</th>
						<th>{!! trans('roles.actions') !!}</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>{!! trans('roles.display_name') !!}</th>
						<th>{!! trans('roles.description') !!}</th>
						<th>{!! trans('roles.actions') !!}</th>
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
	"ajax": "{!! route('api.roles.index') !!}",
	"aoColumns": [
		{ "data": "display_name" },
		{ "data": "description" },
		{ "data": "actions" },
	],
	"columnDefs": [{
		"targets": -1,
		"orderable": false,
		"searchable": false,
	}],
	"autoWidth": false,
});

var btn = "#delete_btn"
var swal_text = "All the details for the role will be deleted."
var swal_confirm = "Yes, delete it!"
var ajax_type = "DELETE"
var ajax_route = "{!! route('api.roles.index') !!}"
var swal_success = "Deleted!"

// When the delete button is hit, show the modal 
// with the confirmation button
$(document).on('click', btn, function(e){
    e.preventDefault();
    var self = $(this);
    swal({
        title: "Are you sure?",
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
      		switch(data.status){
      			case 'success':
      				swal(swal_success, data.msg, "success");
      				break;
      		}      
	        table.ajax.reload(null, false);
      	}).fail(function(data) {
      		console.log(data.responseText);
        	swal("Oops", "We couldn't connect to the server!", "error");
      	});
    });
});
</script>
@endpush