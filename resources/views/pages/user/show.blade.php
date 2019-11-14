@extends('layouts.master')

@section('title','Show All Users')

@section('content-header')
	<h1>
		Show Users Table
		<small><a href="{{url('user/create')}}">Create New User</a></small>
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
		<h3 class="box-title">Show Users Table</h3>
	</div><!-- /.box-header -->

	<!-- /.box-header -->
    @if(count($users) > 0)
        <div class="box-body no-padding">
            <table class="table table-striped table-hover">
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Picture</th>
                    <th>User Name</th>
                    <th>Email</th>                    
                    <th>Role Name</th>
                    
                    
                    <th style="width: 140px">Options</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td style="width: 50px"><img style="width:100%" src="{{asset('uploads/users/'.$user->picture)}}" alt="" /></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ isset($user->role_name) ? $user->role_name : '' }}</td>
                        
                         
                        <td>
                            <a href="{{ url('user/'.$user->id.'/edit') }}" class="btn btn-default">edit</a>
                            <form class="pull-right" action="{{ url('user/'.$user->id) }}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {{$users->links()}}

        </div>

    @else
        <div class="box-body no-padding">
            <h3>No data yet</h3>
        </div>
    @endif

	
</div>
	
@endsection