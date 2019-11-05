@extends('layouts.master')
@section('content')

<section class="content-header">
    <h1>
        Product Item edit form
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
    </ol>
</section>

<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Order edit form</h3>
        </div>
        <div class="box-body">

            <form action="{{ url('order/'.$CartRow->rowId) }}" method="post">
                {{ csrf_field() }}
                {{ method_field("PUT") }}
                <!-- Date range -->
                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="product">Product</label>
                        <select class="form-control select2" name="product" id="product">
                            @foreach( $products as $product_id => $product)
                            <option value="{{ $product_id }}">{{ $product }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('product'))
                        <p class="text-danger">
                            <small>{{ $errors->first('product') }}</small>
                        </p>
                        @endif
                    </div><!-- /.form group -->
                    <div class="form-group col-sm-3">
                        <label for="qty">Qty:</label>
                        <input type="text" name="qty" id="qty" value="{{ $CartRow->qty }}" class="form-control"
                            placeholder="quantity" />
                        @if ($errors->has('qty'))
                        <p class="text-danger">
                            <small>{{ $errors->first('qty') }}</small>
                        </p>
                        @endif
                    </div><!-- /.form group -->
                    <div class="form-group col-sm-3">
                        <label for="uom">Uom</label>
                        <select class="form-control select2" name="uom" id="uom">
                            @foreach( $uoms as $uom_id => $uom)
                            <option value="{{ $uom_id }}">{{ $uom }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('uom'))
                        <p class="text-danger">
                            <small>{{ $errors->first('uom') }}</small>
                        </p>
                        @endif
                    </div><!-- /.form group -->
                    <div class="form-group col-sm-3">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" value="{{ $CartRow->price }}" class="form-control"
                            placeholder="price" />
                        @if ($errors->has('price'))
                        <p class="text-danger">
                            <small>{{ $errors->first('price') }}</small>
                        </p>
                        @endif
                    </div><!-- /.form group -->
                </div>
                <!-- end orw -->

                <!-- Date and time range -->
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="Update item" name="updateitem">
                    <a href="{{ url('item/clear/'.$CartRow->rowId) }}" class="btn btn-danger">Clear cart</a>
                    <div class="pull-right">
                        <a href="{{ url('checkout') }}" class="btn btn-success">checkout</a>
                    </div>
                </div><!-- /.form group -->

            </form>

        </div><!-- /.box-body -->

    </div><!-- /.box -->

</section>


@endsection