

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{Form::label('name', 'Category name')}}
    {{Form::text("name", null, array("class"=>"form-control","id"=>"title"))}}
    @if ($errors->has('name'))
        <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
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

