@extends('layouts.master')

@section('title','Show all Department')

@section('header')
    <h1>
        Show all roles
        <small><a href="{{ url('department/create')}}">Create</a></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
    </ol>
@endsection

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Show department table</h3>
    </div>
    <!-- /.box-header -->
    @if(count($departments) > 0)
        <div class="box-body no-padding">
            <table class="table table-striped">
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Department name</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th style="width: 140px">Options</th>
                </tr>
                @foreach($departments as $department)
                    <tr>
                        <td>{{ $department->id }}</td>
                        <td>{{ $department->dept_name }}</td>
                        <td>{{ $department->description }}</td>
                        <td>{{ $department->dept_name }}</td>
                        <td>
                            <a href="{{ url('department/'.$department->id.'/edit') }}" class="btn btn-default">edit</a>
                            <form class="pull-right" action="{{ url('department/'.$department->id) }}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{$departments->links()}}

        </div>

    @else
        <div class="box-body no-padding">
            <h3>No data yet</h3>
        </div>
    @endif


    <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection
