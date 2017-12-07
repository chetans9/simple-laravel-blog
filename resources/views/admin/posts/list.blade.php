@extends('layouts.admin.template')

@section('content')

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
      <th>Summary</th>
      <th>active</th>

      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($list as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->summary}}</td>
      <td>{{$post->active}}</td>
      <td>
      <a href="{{url('admin/posts/'.$post->id.'/edit')}}" class="btn btn-primary">
        <span class="glyphicon glyphicon-edit"></span>
      </a>
      <a href="{{url('admin/posts/delete')}}" class="btn btn-danger">
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
