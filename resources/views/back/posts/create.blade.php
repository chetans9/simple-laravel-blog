@extends('back.layouts.template')


@section('content')

<div class="row">
    <div class="col-md-12">
        {{Form::open(['url' => route("posts.store"), 'method' => 'POST'])}}
            @include('back.posts.form')
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" value="Save">
        </div>
        {{Form::close()}}
    </div>

</div>

@endsection

