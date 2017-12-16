

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{Form::label('name', 'name *')}}
    {{Form::text("name", null, array("class"=>"form-control","id"=>"name"))}}
    @if ($errors->has('name'))
        <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {{Form::label('email', 'Email *')}}
    {{Form::email("email",null, array("class"=>"form-control","id"=>"email"))}}
    @if ($errors->has('email'))
        <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {{Form::label('password', 'Password *')}}

    {{Form::text("password", null, array("class"=>"form-control","id"=>"password"))}}
    @if ($errors->has('content'))
        <span class="help-block">
                <strong>{{ $errors->first('content') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('confirm_password') ? ' has-error ':''}}">
{{Form::label('confirm_password','Confirm password * ')}}
    {{Form::text('confirm_password',null,array("class"=>"form-control","id"=>"confirm_password"))}}

        <img id="preview_featured_image" class="inputImgPreview" src="" class="img-thumbnail"/>
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

<div class="form-group{{ $errors->has('featured_post') ? ' has-error' : '' }}">
    <label>Featured : </label>
    <label class="radio-inline">
        {{Form::radio('featured_post','1',null,['id'=>'yes'])}} Yes
    </label>
    <label class="radio-inline">
        {{Form::radio('featured_post','0',true,['id'=>'yes'])}} No
    </label>
    @if ($errors->has('featured_post'))
        <span class="help-block">
                <strong>{{ $errors->first('featured_post') }}</strong>
        </span>
    @endif
</div>


@section('page_scripts')
@endsection

