@extends('layouts.admin')
@section('title', 'System Users')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">System Users</h2>
		<a href="{{ URL::route('admin.systemuser.create') }}" class="btn col-md-2">Add System User</a>
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
			@foreach($systemUsers as $systemUser)
				<tr>
					<td>{{ $systemUser->id }}</td>
					<td>{{ $systemUser->name() }}</td>
					<td>{{ $systemUser->email }}</td>
					<td><a href="{{ URL::route('admin.systemuser.show', $systemUser->id) }}" title="View"><span class="fa fa-eye"></span></a></td>
					<td><a href="{{ URL::route('admin.systemuser.edit', $systemUser->id) }}" title="Edit"><span class="fa fa-edit"></span></a></td>
					<td><a href="{{ URL::route('admin.systemuser.destroy', $systemUser->id) }}" title="Delete"><span class="fa fa-trash"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection