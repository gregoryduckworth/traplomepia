@include('datatables.actions.show', ['data' => $data, 'view' => $view])

@include('datatables.actions.edit', ['data' => $data, 'view' => $view])

{{-- We want to ensure the user cannot delete themselves --}}
@if($currentUser->id != $data->id)
@include('datatables.actions.delete', ['data' => $data, 'view' => $view])
@endif
