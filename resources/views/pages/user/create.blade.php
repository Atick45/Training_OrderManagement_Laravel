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
    <form role="form" action="{{ url('user') }}" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputUSER">User Name</label>
                <input type="text" class="form-control" id="exampleInputUSER" name="name" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter username">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input type="password" class="form-control" name="password-confirm" id="password-confirm" placeholder="Enter Confirm Password">
            </div>
            <div class="form-group">
                <label>Role </label>
                <select class="form-control">
                    @foreach($roles as $role_id => $role)
                    <option value="{{$role_id}}">{{$role}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Department </label>
                <select class="form-control">
                    @foreach($departments as $dept_id => $dept)
                    <option value="{{$dept_id}}">{{$dept}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile" name="image">

                <p class="help-block">Example block-level help text here.</p>
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