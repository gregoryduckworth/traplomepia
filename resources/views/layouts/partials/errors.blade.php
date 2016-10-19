@if (count($errors) > 0)
    <div class="alert alert-danger">
    	<strong>Whoops!</strong> {!! trans('message.someproblems') !!}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif
