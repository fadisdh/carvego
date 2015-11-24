@extends('layouts.admin')
@section('title', 'Add New city')

@section('content')
	<h1>New Page</h1>
	{!! Form::model($city, [ 'route' => ['admin.city.store', $city->id], 'method' => 'post']) !!}
		{!! csrf_field() !!}
		@include('admin.city.form')
	{!! Form::close() !!}
@endsection