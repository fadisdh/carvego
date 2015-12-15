@extends('layouts.admin')
@section('title', 'cars')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">Cars</h2>
		<a href="{{ URL::route('admin.car.create') }}" class="btn col-md-2">Add New Car</a>
	</div>
	<table class="table table-responsive table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Description</th>
				<th>Image</th>
				<th>Price</th>
				<th>Make</th>
				<th>Model</th>
				<th width="15"><span class="fa fa-eye"></span></th>
				<th width="15"><span class="fa fa-edit"></span></th>
				<th width="15"><span class="fa fa-trash"></span></th>
			</tr>
		</thead>
		<tbody>
			@foreach($cars as $car)
				<tr>
					<td>{{ $car->id }}</td>
					<td>{{ $car->title }}</td>
					<td>{{ $car->description }}</td>
					<td>{{ $car->image }}</td>
					<td>{{ $car->price }}</td>
					<td>{{ $car->make }}</td>
					<td>{{ $car->model }}</td>
					<td><a href="{{ URL::route('admin.car.show', $car->id) }}" title="View"><span class="fa fa-eye"></span></a></td>
					<td><a href="{{ URL::route('admin.car.edit', $car->id) }}" title="Edit"><span class="fa fa-edit"></span></a></td>
					<td><a href="{{ URL::route('admin.car.destroy', $car->id) }}" title="Delete"><span class="fa fa-trash"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination-container">
		<?php echo $cars->render(); ?>
	</div>
@endsection