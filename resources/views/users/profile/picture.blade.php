<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! trans('users.change_profile_picture') !!}</h3>
    </div>
    <div class="box-body">
        {!! Form::open(['id' => 'form-file', 'route' => 'api.profile.image', 'redirect' => route('profile.index'), '_method' => 'POST', 'class' => 'col-md-12']) !!}
            <span id="image-error"></span>
            <div class="form-group">
                {!! Form::file('image', ['id' => 'image', 'class' => 'file-loading']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

@push('javascript')
<script>
$(function() {
    $("#image").fileinput({ 
        'showPreview': false,
        'showRemove': false,
        'allowedFileTypes': ['image'],
    }).on('fileerror', function(event, data, msg) {
        $('#image-error').text(msg);
    }).on('fileloaded', function(event, data, msg){
        $('#image-error').text('');
    });
});
</script>
@include('swal.form-file')
@endpush