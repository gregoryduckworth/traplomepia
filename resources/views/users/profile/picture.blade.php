<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! trans('users.change_profile_picture') !!}</h3>
    </div>
    <div class="box-body">
        {!! Form::open(['id' => 'form-file', 'route' => 'api.profile.image', 'redirect' => route('profile.index'), '_method' => 'POST', 'class' => 'col-md-12']) !!}
            <div class="form-group">
                {!! Form::file('image', ['id' => 'image', 'class' => 'file-loading']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

@push('javascript')
@include('layouts.partials.form.image-upload')
@include('layouts.partials.swal.form-file')
@endpush