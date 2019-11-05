@extends('layouts.master')

@section('title','Create a new producttype')

@section('header')
    <h1>
        Create a new producttype
        <small><a href="{{ url('producttype')}}">Preview</a></small>
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
        <h3 class="box-title">Create Producttype</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form producttype="form" action="{{ url('producttype') }}" method="POST">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label for="name">Producttype name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Producttype name">
                @if ($errors->has('name'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Producttype description</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Producttype description"></textarea>
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
