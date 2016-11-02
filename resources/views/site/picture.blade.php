
<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! trans('settings.change_site_picture') !!}</h3>
    </div>
    <div class="box-body">
        <div class="col-md-4">
            <h6>Current Picture</h6>
            <img src="{!! $global_settings['picture'] !!}" class="img-responsive">
        </div>
        <div class="col-md-8">
            <h6>Update Picture</h6>
            {!! Form::open() !!}
                <div class="form-group">
                    <span id="text-error" class="text-danger"></span>
                    {!! Form::file('image', ['id' => 'image', 'class' => 'file-loading']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@push('javascript')
<script>
$(function() {
    $("#image").fileinput({ 
        uploadUrl: '{!! route('api.settings.image') !!}',
        showRemove: false,
        showPreview: false,
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