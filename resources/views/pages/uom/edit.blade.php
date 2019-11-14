@extends('layouts.master')

@section('title','Edit Unit Of Measurement')

@section('header')
    <h1>
        Edit usre role
        <small><a href="{{ url('uom')}}">Preview</a></small>
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
        <h3 class="box-title">Edit Unit Of Measurement</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form uom="form" action="{{ url('uom/'.$uom->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="box-body">
            <div class="form-group">
                <label for="name">Unit Of Measurement name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $uom->uom_name }}">
                @if ($errors->has('name'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Unit Of Measurement description</label>
                <textarea class="form-control" name="description" id="description" rows="4">{{ $uom->description }}</textarea>
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
