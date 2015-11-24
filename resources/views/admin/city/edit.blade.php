@extends('layouts.admin')
@section('title', 'Edit New city')

@section('content')
	<h1>Edit city</h1>
	{!! Form::model($city, [ 'route' => ['admin.city.update', $city->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.city.form')
	{!! Form::close() !!}
@endsection