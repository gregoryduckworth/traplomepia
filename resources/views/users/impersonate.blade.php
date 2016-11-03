@if(session('impersonate'))
    <div class="callout callout-warning">
        <h4>{!! trans('users.impersonate') !!}</h4>
        {!! trans('users.impersonating', ['name' => $currentUser->name]) !!}
    </div>
@endif