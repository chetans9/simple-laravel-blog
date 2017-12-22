@extends('layouts.admin.template')
@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Posts</h1>
    </div>
  </div>
<section>
  @include('includes.admin.alerts')
  <div class="container-fluid text-right" style="margin-bottom: 16px;">
    <a class="btn btn-success" href="{{url('/admin/posts/create')}}">
      Add New
    </a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Post Title</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($list as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        
        <td>@if($post->active==1) <span class="label label-success">Active</span> @else <span class="label label-danger">Deactivated</span> @endif</td>
        <td>
          <a href="{{url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-primary">
            <span class="glyphicon glyphicon-edit"></span>
          </a>
          <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$post->id}}">
            <span class="glyphicon glyphicon-trash"></span>
          </a>
          <div class="modal fade" id="deleteModal{{$post->id}}" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Delete</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to delete this post?</p>
                </div>
                <div class="modal-footer">
                  {{Form::open(['url'=>url('admin/posts/'.$post->id),'method'=>'delete'])}}
                  <button type="submit" class="btn btn-default">Yes</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                  {{Form::close()}}
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
  <div class="row">
    <div class="col-lg-offset-4">
      {{$list->links()}}
    </div>
  </div>
@endsection