

<div class="form-group{{ $errors->has('image_title') ? ' has-error' : '' }}">
    {{Form::label('image_title', 'title *')}}
    {{Form::text("image_title", null, array("class"=>"form-control","id"=>"image_title"))}}
    @if ($errors->has('image_title'))
        <span class="help-block">
                <strong>{{ $errors->first('image_title') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('image_desc') ? ' has-error' : '' }}">
    {{Form::label('image_desc', 'Short Description')}}
    {{Form::text("image_desc", null, array("class"=>"form-control","id"=>"image_desc"))}}
    @if ($errors->has('image_desc'))
        <span class="help-block">
                <strong>{{ $errors->first('image_desc') }}</strong>
        </span>
    @endif
</div>



<div class="form-group{{ $errors->has('image') ? ' has-error ':''}}">
{{Form::label('image','image * ')}}
    {{Form::file('image',null,array("class"=>"form-control","id"=>"image"))}}
    <img id="preview_image"   @if(isset($gallery)) src="{{ asset($gallery->image->thumb)}}" @endif class="inputImgPreview" src="" class="img-thumbnail"/>
    @if ($errors->has('image'))
        <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
    <label>Active : </label>
    <label class="radio-inline">
        {{Form::radio('active','1',true,['id'=>'yes'])}} Yes
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
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var targetPreview = 'preview_'+$(input).attr('id');
                reader.onload = function(e) {
                    $('#'+targetPreview).attr('src', e.target.result).show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
    </script>
    @endsection

