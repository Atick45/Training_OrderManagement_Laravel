@extends('layouts.master')

@section('title','Create a new User')

@section('header')
<h1>
    Create a new user
    <small><a href="{{ url('user')}}">Preview</a></small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
</ol>
@endsection

@section('content')

<!--Create User Start here -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create User</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{ url('user') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter username">
                @if ($errors->has('name'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter username">
                @if ($errors->has('email'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </p>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                @if ($errors->has('password'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm Password">
            </div>
            <div class="form-group">
                <label>Role </label>
                <select class="form-control" name="role_id">
                    @foreach($roles as $role_id => $role)
                    <option value="{{$role_id}}">{{$role}}</option>
                    @endforeach
                </select>
                @if ($errors->has('role_id'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('role_id') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label>Department </label>
                <select class="form-control" name="department_id">
                    @foreach($departments as $dept_id => $dept)
                    <option value="{{$dept_id}}">{{$dept}}</option>
                    @endforeach
                </select>
                @if ($errors->has('department_id'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('department_id') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile" name="image">
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- /.box -->




@endsection