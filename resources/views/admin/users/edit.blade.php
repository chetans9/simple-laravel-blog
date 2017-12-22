@extends('layouts.admin.template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit User</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('includes.admin.alerts')
            {{Form::model($user, ['route' => ['users.update', $user->id],'method'=>'PATCH'])}}
            @include('admin.users.form')
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
            {{Form::close()}}
        </div>

    </div>

@endsection