@extends('layouts.admin.template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Comment</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('includes.admin.alerts')

            {{Form::model($comment,[ 'route' => array('admin.comments.update', $comment->id),'method'=>'PATCH'])}}
            

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {{Form::label('user_name', 'User name')}}
                {{Form::text("user_name", null, array("class"=>"form-control","id"=>"user_name"))}}
                @if ($errors->has('user_name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('user_name') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {{Form::label('user_email', 'User Email')}}
                {{Form::text("user_email", null, array("class"=>"form-control","id"=>"user_email"))}}
                @if ($errors->has('user_email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('user_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {{Form::label('blog_title', 'Blog')}}
                {{--{{Form::text("post[title]", null, array("class"=>"form-control","id"=>"blog_title","disabled"=>"disabled"))}}--}}
                <a href="{{route('posts.edit',$comment->post->id)}}">{{$comment->post->title}}</a>
                @if ($errors->has('user_email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('user_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                {{Form::label('comment', 'Comment *')}}

                {{Form::textarea("content", null, array("class"=>"form-control","id"=>"comment"))}}
                @if ($errors->has('content'))
                    <span class="help-block">
                            <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                <label>Approve : </label>
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
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
            {{Form::close()}}
        </div>

    </div>

@endsection