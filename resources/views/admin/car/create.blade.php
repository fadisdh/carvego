@extends('layouts.admin')
@section('title', 'Add New Page')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Add New Car</h2>
	</div>
	{!! Form::model($car, [ 'route' => ['admin.car.store', $car->id], 'method' => 'post','files' => true,'enctype'=>"multipart/form-data"]) !!}
		{!! csrf_field() !!}
		@include('admin.car.form')
	{!! Form::close() !!}
@endsection