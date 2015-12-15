@extends('layouts.admin')
@section('title', 'Options')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">Options</h2>
		<a href="{{ URL::route('admin.option.create') }}" class="btn col-md-2">Add New Option</a>
	</div>
	<table class="table table-responsive table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Key</th>
				<th>Value</th>
				<th>Type</th>
				<th width="15"><span class="fa fa-eye"></span></th>
				<th width="15"><span class="fa fa-edit"></span></th>
				<th width="15"><span class="fa fa-trash"></span></th>
			</tr>
		</thead>
		<tbody>
			@foreach($options as $option)
				<tr>
					<td>{{ $option->id }}</td>
					<td>{{ $option->key }}</td>
					<td>{{ $option->value }}</td>
					<td>{{ $option->type }}</td>
					<td><a href="{{ URL::route('admin.option.show', $option->id) }}" title="View"><span class="fa fa-eye"></span></a></td>
					<td><a href="{{ URL::route('admin.option.edit', $option->id) }}" title="Edit"><span class="fa fa-edit"></span></a></td>
					<td><a href="{{ URL::route('admin.option.destroy', $option->id) }}" title="Delete"><span class="fa fa-trash"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination-container">
		<?php echo $options->render(); ?>
	</div>
@endsection