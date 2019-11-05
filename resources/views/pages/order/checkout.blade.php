@extends('layouts.master')
@section('content')

<section class="content-header">
    <h1>
        Checkout the Order form
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
    </ol>
</section>

<section class="content">
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Order table checkout</h3>
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
        <hr>
        <div class="box-body">

            <form action="{{ url('checkout') }}" method="post">
                {{ csrf_field() }}
                <!-- Date range -->
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="customer">Customer</label>
                        <select class="form-control select2" name="customer" id="customer">
                            @foreach( $suppliers as $supp_id => $supplier)
                            <option value="{{ $supp_id }}">{{ $supplier }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('customer'))
                        <p class="text-danger">
                            <small>{{ $errors->first('customer') }}</small>
                        </p>
                        @endif
                    </div><!-- /.form group -->
                    <div class="form-group col-sm-4">
                        <label for="reference">Reference:</label>
                        <input type="text" name="reference" id="reference" value="{{ old('reference') }}" class="form-control"
                            placeholder="reference" />
                        @if ($errors->has('reference'))
                        <p class="text-danger">
                            <small>{{ $errors->first('reference') }}</small>
                        </p>
                        @endif
                    </div><!-- /.form group -->
                    <div class="form-group col-sm-4">
                        <label for="remarks">Remarks</label>
                        <input type="text" name="remarks" id="remarks" value="{{ old('remarks') }}" class="form-control"
                            placeholder="Remarks" />
                        @if ($errors->has('phone'))
                        <p class="text-danger">
                            <small>{{ $errors->first('phone') }}</small>
                        </p>
                        @endif
                    </div><!-- /.form group -->
                </div>
                <!-- end orw -->

                <!-- Date and time range -->
                <div class="form-group">
                    <input class="btn btn-success" type="submit" value="Finish order" name="finishorder">
                </div><!-- /.form group -->

            </form>

        </div><!-- /.box-body -->


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