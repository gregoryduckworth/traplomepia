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
	// Fill the table with data and provide the relevant information 
	// based on the url for the correct view
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

	// Depending on which view we are rendering, we need to decide whether we want 
	// the delete button or the restore button to appear
	@if(Request::segment(3) != 'deleted')
		var btn = "#delete_btn";
		var swal_text = "{!! trans('swal.text_delete', ['type' => trans('users.user')]) !!}";
		var swal_confirm = "{!! trans('swal.confirm_delete') !!}";
		var ajax_type = "DELETE";
		var ajax_route = "{!! route('api.users.index') !!}";
	@else
		var btn = "#restore_btn";
		var swal_text = "{!! trans('swal.text_restore', ['type' => trans('users.user')]) !!}";
		var swal_confirm = "{!! trans('swal.confirm_restore') !!}";
		var ajax_type = "GET";
		var ajax_route = "{!! route('api.users.restore') !!}";
	@endif
</script>
@include('layouts.partials.swal.table')
@endpush