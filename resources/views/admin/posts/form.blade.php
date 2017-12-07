

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {{Form::label('title', 'Post title *')}}
    {{Form::text("title", null, array("class"=>"form-control","id"=>"title"))}}
    @if ($errors->has('title'))
        <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
    {{Form::label('category_id', 'Category *')}}
    {{Form::select("category_id",[""=>"Select"]+$categories,null, array("class"=>"form-control","id"=>"category_id"))}}
    @if ($errors->has('category_id'))
        <span class="help-block">
                <strong>{{ $errors->first('category_id') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    {{Form::label('content', 'Content *')}}

    {{Form::textarea("content", null, array("class"=>"form-control","id"=>"content"))}}
    @if ($errors->has('content'))
        <span class="help-block">
                <strong>{{ $errors->first('content') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('featured_image') ? ' has-error ':''}}">
{{Form::label('featured_image','Featured image * ')}}
    {{Form::file('featured_image',null,array("class"=>"form-control","id"=>"featured_image"))}}
    @if ($errors->has('featured_image'))
        <span class="help-block">
                <strong>{{ $errors->first('featured_image') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
    <label>Active : </label>
    <label class="radio-inline">
        {{Form::radio('active','1',null,['id'=>'yes'])}} Yes
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

