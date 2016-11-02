<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! trans('users.change_profile_picture') !!}</h3>
    </div>
    <div class="box-body">
        {!! Form::open() !!}
            <span id="text-error" class="text-danger"></span>
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
        uploadUrl: '{!! route('api.profile.image') !!}',
        showPreview: false,
        showRemove: false,
        allowedFileTypes: ['image'],
    }).on('filepreupload', function(event, data, msg) {
       data.jqXHR.setRequestHeader('Authorization', 'Bearer {!! $currentUser->api_token !!}');
    }).on('fileuploaderror', function(event, data, msg) {
       $('#text-error').html(msg);
    });
});
</script>
@include('swal.form-file')
@endpush