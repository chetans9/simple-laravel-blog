@extends('layouts.admin.template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Contact</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{"Contact details"}}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>

                                <th>Name</th>
                                <td>{{$contact->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$contact->email}}</td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td>{{$contact->message}}</td>
                            </tr>


                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
    @endsection