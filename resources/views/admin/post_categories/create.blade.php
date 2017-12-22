@extends('layouts.admin.template')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Category</h1>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        {{Form::open(['url' => route("posts-categories.store"), 'method' => 'POST'])}}
           @include('admin.post_categories.form')
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary" value="Save">
        </div>
        {{Form::close()}}
    </div>

</div>

@endsection

