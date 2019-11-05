@extends('layouts.master')

@section('title','Create a new supplier')

@section('header')
    <h1>
        Create a new role
        <small><a href="{{ url('supplier')}}">Preview</a></small>
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
        <h3 class="box-title">Create Supplier</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form supplier="form" action="{{ url('supplier') }}" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label for="name">Supplier name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Supplier name">
                @if ($errors->has('name'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Supplier description</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Supplier description"></textarea>
                @if ($errors->has('description'))
                    <p class="help-block">
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                    </p>
                @endif
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
