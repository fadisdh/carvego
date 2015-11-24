@extends('layouts.admin')
@section('title', 'pages')

@section('content')
	<h2 class="page-header">pages</h2>
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>#</th>
				<th>title</th>
				<th>slug</th>
				<th>type</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pages as $page)
				<tr>
					<td>{{ $page->id }}</td>
					<td>{{ $page->title }}</td>
					<td>{{ $page->slug }}</td>
					<td>{{ $page->type }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection