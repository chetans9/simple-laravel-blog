@extends('layouts.admin.template')
@section('content')
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Users</h1>
    </div>
  </div>
<section>
  @include('includes.admin.alerts')
  <div class="container-fluid text-right" style="margin-bottom: 16px;">
    <a class="btn btn-success" href="{{route('users.create')}}">
      Add New
    </a>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>

      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        

        <td>
          <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-primary">
            <span class="glyphicon glyphicon-edit"></span>
          </a>
          <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$user->id}}">
            <span class="glyphicon glyphicon-trash"></span>
          </a>
          <div class="modal fade" id="deleteModal{{$user->id}}" role="dialog">
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
                  {{Form::open(['url'=>url('admin/users/'.$user->id),'method'=>'delete'])}}
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
<div class="text-center">
  {{$users->links()}}
</div>
</section>
@endsection