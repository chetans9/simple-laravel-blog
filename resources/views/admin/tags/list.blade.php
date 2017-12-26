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
            </tbody>
        </table>
        <div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Delete</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this tag?</p>
                    </div>
                    <div class="modal-footer">
                        {{Form::open(['url'=>url('admin/tags/'),'method'=>'delete',"id"=>"data-delete-form"])}}
                        <button type="submit" class="btn btn-default">Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page_scripts')
    <script type="text/javascript">

        $(function () {
            var table = $('#list-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('tags.index') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'actions', name: 'actions', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection

