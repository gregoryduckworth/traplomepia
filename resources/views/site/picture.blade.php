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
            {!! Form::open(['id' => 'form-file', 'route' => 'api.settings.image', 'redirect' => route('admin.settings.index'), '_method' => 'POST', 'class' => 'col-md-12']) !!}
                <div class="form-group">
                    {!! Form::file('image', ['id' => 'image', 'class' => 'file-loading']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@push('javascript')
<script>
// TODO: Update it to upload the picture through uploadURL
// - Watch out for 401 error, which could be due
// to the api_token or _token
// 
// //uploadUrl: '{!! route('api.settings.image') !!}',
// 
$(function() {
    $("#image").fileinput({ 
        showRemove: false,
        allowedFileTypes: ['image'],
        browseOnZoneClick: true,
        dropZoneTitle: 'Drag &amp; drop new image here...',
    });
});
</script>
@include('swal.form-file')
@endpush