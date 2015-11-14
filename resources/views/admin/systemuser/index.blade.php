@extends('layouts.admin')
@section('title', 'System Users')

@section('content')
	<h2 class="page-header">System Users</h2>
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			@foreach($systemUsers as $systemUser)
				<tr>
					<td>{{ $systemUser->id }}</td>
					<td>{{ $systemUser->name() }}</td>
					<td>{{ $systemUser->email }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection