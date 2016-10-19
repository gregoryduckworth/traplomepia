@extends('layouts.app')

@section('htmlheader_title', trans('roles.heading'))

@section('contentheader_title', trans('roles.heading'))

@section('main-content')
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">{!! trans('roles.all_roles') !!}</h3>
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
var swal_text = "{!! trans('swal.text_delete', ['type' => 'role']) !!}"
var swal_confirm = "{!! trans('swal.confirm_delete') !!}"
var ajax_type = "DELETE"
var ajax_route = "{!! route('api.roles.index') !!}"
var swal_success = "{!! trans('swal.success_delete') !!}"
</script>
@include('swal.table')
@endpush