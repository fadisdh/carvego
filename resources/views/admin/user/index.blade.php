@extends('layouts.admin')
@section('title', 'Users')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">Users</h2>
		<a href="{{ URL::route('admin.user.create') }}" class="btn col-md-2">Add New User</a>
	</div>
	<table class="table table-responsive table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th width="15"><span class="fa fa-eye"></span></th>
				<th width="15"><span class="fa fa-edit"></span></th>
				<th width="15"><span class="fa fa-trash"></span></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name() }}</td>
					<td>{{ $user->email }}</td>
					<td><a href="{{ URL::route('admin.user.show', $user->id) }}" title="View"><span class="fa fa-eye"></span></a></td>
					<td><a href="{{ URL::route('admin.user.edit', $user->id) }}" title="Edit"><span class="fa fa-edit"></span></a></td>
					<td><a href="{{ URL::route('admin.user.destroy', $user->id) }}" title="Delete"><span class="fa fa-trash"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection