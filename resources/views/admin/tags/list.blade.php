@extends('layouts.admin.template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tags</h1>
        </div>
    </div>
    <section>
        <div class="container-fluid text-right" style="margin-bottom: 16px;">
            <a class="btn btn-success" href="{{route('tags.create')}}">
                Add New
            </a>
        </div>
        @include('includes.admin.alerts')
        <div class="container-fluid text-right" style="margin-bottom: 16px;">

        </div>
        <table class="table" id="list-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            {{--@foreach($tags as $tag)--}}
                {{--<tr>--}}
                    {{--<td>{{$tag->id}}</td>--}}
                    {{--<td>{{$tag->name}}</td>--}}
                    {{--<td>--}}
                        {{--<a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary">--}}
                            {{--<span class="glyphicon glyphicon-edit"></span>--}}
                        {{--</a>--}}
                        {{--<a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$tag->id}}">--}}
                            {{--<span class="glyphicon glyphicon-trash"></span>--}}
                        {{--</a>--}}
                        {{--<div class="modal fade" id="deleteModal{{$tag->id}}" role="dialog">--}}
                            {{--<div class="modal-dialog modal-lg">--}}
                                {{--<div class="modal-content">--}}
                                    {{--<div class="modal-header">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                        {{--<h4 class="modal-title">Delete</h4>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-body">--}}
                                        {{--<p>Are you sure you want to delete this tag?</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-footer">--}}
                                        {{--{{Form::open(['url'=>url('admin/tags/'.$tag->id),'method'=>'delete'])}}--}}
                                        {{--<button type="submit" class="btn btn-default">Yes</button>--}}
                                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">No</button>--}}
                                        {{--{{Form::close()}}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</td>--}}
                {{--</tr>--}}
            {{--@endforeach--}}
            </tbody>
        </table>
        </div>
    </section>
@endsection

@section('page_scripts')
<script type="text/javascript">

    $(function() {
        var table = $('#list-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('tags.index') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                {data: 'actions', name: 'actions', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection

