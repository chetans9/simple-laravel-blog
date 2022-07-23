@extends('layouts.admin.template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Categories</h1>
        </div>
    </div>
    <section>
        @include('includes.admin.alerts')
        <div class="container-fluid text-right" style="margin-bottom: 16px;">
            <a class="btn btn-success" href="{{url('/admin/posts-categories/create')}}">
                Add New
            </a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $post_category)
                <tr>
                    <td>{{$post_category->id}}</td>
                    <td>{{$post_category->name}}</td>

                    <td>
                        <a href="{{route('posts-categories.edit',['posts_category'=>$post_category->id])}}" class="btn btn-primary">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="{{url('admin/posts/delete')}}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$post_category->id}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                        <div class="modal fade" id="deleteModal{{$post_category->id}}" role="dialog">
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
                                        {{Form::open(['url'=>route('posts-categories.destroy',$post_category->id),'method'=>'delete'])}}
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
