@extends('layouts.master')

@section('title','Show All Products')

@section('content-header')
	<h1>
		Show Users Table
		<small><a href="{{url('product/create')}}">Create New User</a></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Forms</a></li>
		<li class="active">General Elements</li>
	</ol>
@endsection

@section('content')

	<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Show product Table</h3>
	</div><!-- /.box-header -->

	<!-- /.box-header -->
    @if(count($products) > 0)
        <div class="box-body no-padding">
            <table class="table table-striped table-hover">
                <tr>
                    
                    <th style="width: 10px">#</th>
                    <th>Product Name</th>
                    <th>Description</th> 
                    <th>Picture</th>                   
                    <th>UoM Name</th>
                    <th>Ptype Name</th>
                    
                    
                    <th style="width: 140px">Options</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td style="width: 50px"><img style="width:100%" src="{{asset('uploads/products/'.$product->picture)}}" alt="" /></td>
                        <td>{{ isset($product->uom_name) ? $product->uom_name : '' }}</td>
                        <td>{{ isset($product->ptype_name) ? $product->ptype_name : '' }}</td>
                         
                        <td>
                            <a href="{{ url('product/'.$product->id.'/edit') }}" class="btn btn-default">edit</a>
                            <form class="pull-right" action="{{ url('product/'.$product->id) }}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{$products->links()}}

        </div>

    @else
        <div class="box-body no-padding">
            <h3>No data yet</h3>
        </div>
    @endif

	
</div>
	
@endsection