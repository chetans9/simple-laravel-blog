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
                <th>Post</th>
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
                    <td>{{$comment->post->title}}</td>
                    <td>@if($comment->active==1) <span class="label label-success">Approved</span> @else <span
                                class="label label-danger">Disapproved</span> @endif</td>
                    <td>
                        <a href="{{route('admin.comments.edit',['id'=>$comment->id])}}" class="btn btn-primary">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="#" class="btn btn-danger" data-toggle="modal"
                           data-target="#deleteModal{{$comment->id}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                        <div class="modal fade" id="deleteModal{{$comment->id}}" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this comment?</p>
                                    </div>
                                    <div class="modal-footer">
                                        {{Form::open(['url'=>url('admin/comments/'.$comment->id),'method'=>'delete'])}}
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
        </div>

    </section>
@endsection
