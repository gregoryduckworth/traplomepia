@include('layouts.partials.datatables.actions.show', ['data' => $data, 'view' => $view])

@include('layouts.partials.datatables.actions.edit', ['data' => $data, 'view' => $view])

{{-- We want to ensure the Administrator role cannot be deleted --}}
@if($data->display_name != 'Administrator')
	@include('layouts.partials.datatables.actions.delete', ['data' => $data, 'view' => $view])
@endif
