@extends('layouts.admin')
@section('title', 'cities')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">Cities</h2>
		<a href="{{ URL::route('admin.city.create') }}" class="btn col-md-2">Add New city</a>
	</div>
	<table class="table table-responsive table-striped table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>city</th>
				<th>country</th>
				<th>code</th>
				<th>country_code</th>
				<th>currency</th>
				<th>currency_code</th>
				<th width="15"><span class="fa fa-eye"></span></th>
				<th width="15"><span class="fa fa-edit"></span></th>
				<th width="15"><span class="fa fa-trash"></span></th>
			</tr>
		</thead>
		<tbody>
			@foreach($cities as $city)
				<tr>
					<td>{{ $city->id }}</td>
					<td>{{ $city->name }}</td>
					<td>{{ $city->country }}</td>
					<td>{{ $city->code }}</td>
					<td>{{ $city->country_code }}</td>
					<td>{{ $city->currency }}</td>
					<td>{{ $city->currency_code }}</td>
					<td><a href="{{ URL::route('admin.city.show', $city->id) }}" title="View"><span class="fa fa-eye"></span></a></td>
					<td><a href="{{ URL::route('admin.city.edit', $city->id) }}" title="Edit"><span class="fa fa-edit"></span></a></td>
					<td><a href="{{ URL::route('admin.city.destroy', $city->id) }}" title="Delete"><span class="fa fa-trash"></span></a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="pagination-container">
		<?php echo $cities->render(); ?>
	</div>
@endsection