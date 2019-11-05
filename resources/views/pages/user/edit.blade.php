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
        <h3 class="box-title">Edit User</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{ url('user/'.$user->id) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="box-body">
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                @if ($errors->has('name'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                @if ($errors->has('email'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </p>
                @endif
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="{{ $user->password }}">
                @if ($errors->has('password'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('password') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{ $user->password_confirmation }}">
            </div>
            <div class="form-group">
                 <label for="role">Role </label>
	                 <select class="form-control" name="role_id" id="role"> 
	                 	   <option value="{{$role_id}}">{{$user->$role}}</option>
	                 </select>
            </div>

            <div class="form-group">
                 <label>Department </label>
	                 <select class="form-control" name="department_id"> 
	                 	   <option>{{$user->null}}</option>
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