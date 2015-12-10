@extends('layouts.admin')
@section('title', 'Add New city')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Add New City</h2>
	</div>
	{!! Form::model($city, [ 'route' => ['admin.city.store', $city->id], 'method' => 'post']) !!}
		{!! csrf_field() !!}
		@include('admin.city.form')
	{!! Form::close() !!}
@endsection