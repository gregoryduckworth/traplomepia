<div class="box">
    <div class="box-header">
        <h3 class="box-title">{!! trans('site.change_site_picture') !!}</h3>
    </div>
    <div class="box-body">
        {!! Form::open(['id' => 'form-file', 'route' => 'api.settings.image', 'redirect' => route('admin.settings.index'), '_method' => 'POST', 'class' => 'col-md-12']) !!}
            <span id="image-text"></span>
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
        $('#image-text').text(msg);
    }).on('fileloaded', function(event, data, msg){
        $('#image-text').text('');
    });
});
</script>
@include('swal.form-file')
@endpush