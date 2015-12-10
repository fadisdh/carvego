@extends('layouts.admin')
@section('title', 'pages')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">Informative Pages</h2>
		<a href="{{ URL::route('admin.page.create') }}" class="btn col-md-2">Add New Page</a>
	</div>
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Slug</th>
				<th>Type</th>
				<th width="15"><span class="fa fa-eye"></span></th>
				<th width="15"><span class="fa fa-edit"></span></th>
				<th width="15"><span class="fa fa-trash"></span></th>
			</tr>
		</thead>
		<tbody>
			@foreach($pages as $page)
				<tr>
					<td>{{ $page->id }}</td>
					<td>{{ $page->title }}</td>
					<td>{{ $page->slug }}</td>
					<td>{{ $page->type }}</td>
					<td><a href="{{ URL::route('admin.page.show', $page->id) }}" title="View"><span class="fa fa-eye"></span></a></td>
					<td><a href="{{ URL::route('admin.page.edit', $page->id) }}" title="Edit"><span class="fa fa-edit"></span></a></td>
					<td><a href="{{ URL::route('admin.page.destroy', $page->id) }}" title="Delete"><span class="fa fa-trash"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination-container">
		<?php echo $pages->render(); ?>
	</div>
@endsection