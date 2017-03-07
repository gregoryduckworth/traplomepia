<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! trans('users.change_password') !!}</h3>
    </div>
    <div class="box-body">
        {!! Form::open(['id' => 'form', 'route' => 'api.profile.password', 'redirect' => route('profile.index'), '_method' => 'PATCH', 'class' => 'col-md-12']) !!}
            <div class="form-group">
                {!! Form::label('old_password', trans('users.old_password')) !!}
                {!! Form::password('old_password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', trans('users.new_password')) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', trans('users.password_confirmation')) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit(trans('common.submit'), ['name' => 'change-password', 'class' => 'pull-right btn btn-success']) !!}
        {!! Form::close() !!}
    </div>
</div>

@push('javascript')
@include('layouts.partials.swal.form')
@endpush
