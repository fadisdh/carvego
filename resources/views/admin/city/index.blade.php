@extends('layouts.admin')
@section('title', 'cities')

@section('content')
	<h2 class="page-header">cities</h2>
	<table class="table table-responsive">
		<thead>
			<tr>
				<th>#</th>
				<th>city</th>
				<th>country</th>
				<th>code</th>
				<th>country_code</th>
				<th>currency</th>
				<th>currency_code</th>
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
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection