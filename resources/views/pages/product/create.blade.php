@extends('layouts.master')

@section('title','Create a new Product')

@section('header')
<h1>
    Create a new Product
    <small><a href="{{ url('product')}}">Preview</a></small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
</ol>
@endsection

@section('content')

<!--Create product Start here -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Product</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="{{ url('product') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product">
                @if ($errors->has('name'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="description">Product description</label>
                <textarea class="form-control" name="description" id="description" rows="4" placeholder="Product description"></textarea>
                @if ($errors->has('description'))
                    <p class="help-block">
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                    </p>
                @endif
            </div>
			<div class="form-group">
                <label>UOM </label>
                <select class="form-control" name="uom_id">
                    @foreach($uoms as  $uom)
                    <option value="{{$uom_id}}">{{$uom}}</option>
                    @endforeach
                </select>
                @if ($errors->has('uom_id'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('uom_id') }}</small>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label>Product Type  </label>
                <select class="form-control" name="producttype_id">
                    @foreach($producttypes as $producttype)
                    <option value="{{$producttype_id}}">{{$producttype}}</option>
                    @endforeach
                </select>
                @if ($errors->has('producttype_id'))
                    <p class="help-block text-danger">
                        <small class="text-danger">{{ $errors->first('producttype_id') }}</small>
                    </p>
                @endif
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