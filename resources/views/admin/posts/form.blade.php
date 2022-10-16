
@section('page_css')
<link href="{{URL::asset('back/css/select2.min.css')}}" rel="stylesheet" type="text/css">
@endsection
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
    {{Form::select("category_id",$categories,null, array("class"=>"form-control","id"=>"category_id"))}}
    @if ($errors->has('category'))
        <span class="help-block">
                <strong>{{ $errors->first('category') }}</strong>
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

<div class="form-group{{ $errors->has('tags[]') ? ' has-error' : '' }}">
    {{Form::label('tags', 'Tags')}}
    {{Form::select("tags[]",$post_tags, null, array("class"=>"form-control","id"=>"tags","multiple"=>"multiple"))}}
    @if ($errors->has('tags[]'))
        <span class="help-block">
                <strong>{{ $errors->first('tags[]') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('featured_image') ? ' has-error ':''}}">
{{Form::label('featured_image','Featured image * ')}}
    {{Form::file('featured_image',null,array("class"=>"form-control","id"=>"featured_image"))}}
        <img id="preview_featured_image" class="inputImgPreview" src="@if(isset($post)){{$post->featured_image->thumb}} @endif" class="img-thumbnail"/>
    @if ($errors->has('featured_image'))
        <span class="help-block">
                <strong>{{ $errors->first('featured_image') }}</strong>
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

    <script type="text/javascript" src="{{URL::asset('back/js/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('back/js/select2.min.js')}}"></script>

    <script type="text/javascript">
        CKEDITOR.replace( 'content' );

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
        $("#featured_image").change(function() {
            readURL(this);
        });

        $(document).ready(function() {

            $("#category_id").select2();

            $("#tags").select2({
                minimumInputLength: 2,
                multiple: true,
                quietMillis: 100,
                ajax: {
                    url: '{{url('admin/tags-suggest')}}',
                    dataType: 'json',
                    data : function (params) {
                        var query = {
                            search: params.term,
                        }
                        return query;
                        
                    },
                    processResults : function (data) {
                        return {
                            results: data.results
                        };
                    }
                }
            });
        });
    </script>
@endsection

