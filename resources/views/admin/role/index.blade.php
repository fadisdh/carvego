@extends('layouts.admin')
@section('title', 'roles')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">User's Roles</h2>
		<a href="{{ URL::route('admin.role.create') }}" class="btn col-md-2">Add New Role</a>
	</div>
	<table class="table table-responsive table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>role name</th>
				<th>role permissions</th>
				<th width="15"><span class="fa fa-eye"></span></th>
				<th width="15"><span class="fa fa-edit"></span></th>
				<th width="15"><span class="fa fa-trash"></span></th>
			</tr>
		</thead>
		<tbody>
			@foreach($roles as $role)
				<tr>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
					<td>{{ $role->permissions }}</td>
					<td><a href="{{ URL::route('admin.role.show', $role->id) }}" title="View"><span class="fa fa-eye"></span></a></td>
					<td><a href="{{ URL::route('admin.role.edit', $role->id) }}" title="Edit"><span class="fa fa-edit"></span></a></td>
					<td><a href="{{ URL::route('admin.role.destroy', $role->id) }}" title="Delete"><span class="fa fa-trash"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination-container">
		<?php //echo $roles->render(); ?>
	</div>
@endsection