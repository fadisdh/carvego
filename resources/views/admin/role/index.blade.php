@extends('layouts.admin')
@section('title', 'roles')

@section('content')
	<h2 class="page-header">roles</h2>
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>#</th>
				<th>role name</th>
				<th>role permissions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($roles as $role)
				<tr>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
					<td>{{ $role->permissions }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection