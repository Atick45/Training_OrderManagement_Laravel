@extends('layouts.master')

@section('title','Edit Department')

@section('header')
    <h1>
        Edit usre role
        <small><a href="{{ url('department')}}">Preview</a></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
@endsection

@section('content')

<!-- general form elements -->
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Department</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form department="form" action="{{ url('department/'.$department->id) }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="box-body">
            <div class="form-group">
                <label for="name">Department name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $department->dept_name }}">
                @if ($errors->has('name'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Department description</label>
                <textarea class="form-control" name="description" id="description" rows="4">{{ $department->description }}</textarea>
                @if ($errors->has('description'))
                    <p class="help-block">
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                    </p>
                @endif
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<!-- /.box -->

@endsection
