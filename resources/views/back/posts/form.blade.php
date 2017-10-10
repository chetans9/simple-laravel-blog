

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {{Form::label('title', 'Post title')}}
    {{Form::text("title", null, array("class"=>"form-control","id"=>"title"))}}
    @if ($errors->has('title'))
        <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    {{Form::label('content', 'Content')}}

    {{Form::textarea("content", null, array("class"=>"form-control","id"=>"content"))}}
    @if ($errors->has('content'))
        <span class="help-block">
                <strong>{{ $errors->first('content') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
    <label>Active : </label>
    <label class="radio-inline">
        {{Form::radio('active','1',null,['id'=>'yes'])}} Yes
        {{--<input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked="">Yes--}}
    </label>
    <label class="radio-inline">
        {{Form::radio('active','0',null,['id'=>'yes'])}} No
    </label>
    @if ($errors->has('active'))
        <span class="help-block">
                <strong>{{ $errors->first('active') }}</strong>
        </span>
    @endif
</div>


@section('page_scripts')

    <script type="text/javascript" src="{{URL::asset('back/js/ckeditor/ckeditor.js')}}"></script>

    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection

