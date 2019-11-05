@extends('layouts.master')
@section('content')

<section class="content-header">
    <h1>
        Order food item
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
            <h3 class="box-title">Order form</h3>
        </div>
        <div class="box-body">

            <form action="{{ url('order') }}" method="post">
                {{ csrf_field() }}
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
                        <input type="text" name="qty" id="qty" value="{{ old('qty') }}" class="form-control"
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
                        <input type="text" name="price" id="price" value="{{ old('price') }}" class="form-control"
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
                    <input class="btn btn-primary" type="submit" value="Add item" name="additem">
                    <a href="{{ url('order/clear') }}" class="btn btn-danger">Clear cart</a>
                    <div class="pull-right">
                        <a href="{{ url('checkout') }}" class="btn btn-success">checkout</a>
                    </div>
                </div><!-- /.form group -->

            </form>

        </div><!-- /.box-body -->
        <hr>
        <div class="box-header clearfix">
            <div class="pull-left">
                <h3 class="box-title">Order table</h3>
            </div>
            <div class="form-group pull-right">
                <input type="button" onclick="printDiv('printableArea')" value="Print" class="btn btn-primary">
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding" id="printableArea">
            <table class="table table-bordered table-striped">
                <tr>
                    <th style="width: 10px">#id</th>
                    <th>Product name</th>
                    <th>Qty</th>
                    <th>Uom</th>
                    <th>Price</th>
                    <th>Product total</th>
                    <th style="width: 140px" class="hidden-print">Options</th>
                </tr>
                @foreach(Cart::content() as $content)
                <tr>
                    <td>{{ $content->id }}</td>
                    <td>{{ $content->name }}</td>
                    <td>{{ $content->qty }}</td>
                    <td>{{ $content->options->uom }}</td>
                    <td>{{ $content->price }}</td>
                    <td>{{ $content->price * $content->qty }}</td>
                    <td class="hidden-print">
                        <a href="{{ url('order/'.$content->rowId.'/edit') }}" class="btn btn-default">Edit</a>
                        <form class="pull-right" action="{{ url('order/'.$content->rowId)}}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit" name="remove" value="remove">
                        </form>
                    </td>
                </tr>
                @endforeach
                <tfoot>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td>Total</td>
                        <td>{{ Cart::total() }}</td>
                        <td colspan="2" class="hidden-print">&nbsp;</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div><!-- /.box -->

</section>

<script>
    function printDiv(print) {
        var printContents = document.getElementById(print).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>


@endsection