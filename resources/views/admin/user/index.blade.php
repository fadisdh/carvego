@extends('layouts.admin')
@section('title', 'System Users')

@section('content')
	<h2 class="page-header">Users</h2>
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ $user->id }}</td>
					<td>{{ $user->name() }}</td>
					<td>{{ $user->email }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection