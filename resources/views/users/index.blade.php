@extends('layouts.app')

@section('htmlheader_title', trans('users.heading'))

@section('contentheader_title', trans('users.heading'))

@section('main-content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{!! trans('users.all_users') !!}</h3>
		</div>

		<div class="box-body table-responsive">
			<table class="table table-striped display" id="datatable">
				<thead>
					<tr>
						<th>{!! trans('users.first_name') !!}</th>
						<th>{!! trans('users.last_name') !!}</th>
						<th>{!! trans('users.email') !!}</th>
						<th>{!! trans('users.updated_at') !!}</th>
						<th>{!! trans('users.actions') !!}</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>{!! trans('users.first_name') !!}</th>
						<th>{!! trans('users.last_name') !!}</th>
						<th>{!! trans('users.email') !!}</th>
						<th>{!! trans('users.updated_at') !!}</th>
						<th>{!! trans('users.actions') !!}</th>
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

@if(Request::segment(3) != 'deleted')
var btn = "#delete_btn"
var swal_text = "{!! trans('users.swal_text_delete') !!}"
var swal_confirm = "{!! trans('users.swal_confirm_delete') !!}"
var ajax_type = "DELETE"
var ajax_route = "{!! route('api.users.index') !!}"
var swal_success = "{!! trans('users.swal_success_delete') !!}"
@else
var btn = "#restore_btn"
var swal_text = "{!! trans('users.swal_text_restore') !!}"
var swal_confirm = "{!! trans('users.swal_confirm_restore') !!}"
var ajax_type = "GET"
var ajax_route = "{!! route('api.users.restore') !!}"
var swal_success = "{!! trans('users.swal_success_restore') !!}"
@endif

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
        	swal("{!! trans('roles.swal_text_oops') !!}", "{!! trans('users.swal_could_not_connect') !!}", "error");
      	});
    });
});
</script>
@endpush