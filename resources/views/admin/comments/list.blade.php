@extends('layouts.admin.template')

@section('content')

<section>
  @include('includes.admin.alerts')
  <div class="container-fluid text-right" style="margin-bottom: 16px;">
    
  </div>
  <table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>user name</th>
      <th>user email</th>
      <th>Approved</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comments as $comment)
    <tr>
      <td>{{$comment->id}}</td>
      <td>{{$comment->user_name}}</td>
      <td>{{$comment->user_email}}</td>
      <td>@if($comment->active==1) <span class="label label-success">Approved</span> @else <span class="label label-danger">Disapproved</span> @endif</td>
      <td>
      <a href="{{route('admin.comments.edit',['id'=>$comment->id])}}" class="btn btn-primary">
        <span class="glyphicon glyphicon-edit"></span>
      </a>
      <a href="{{url('admin/comment/delete')}}" class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span>
      </a>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>
</div>

</section>
@endsection
