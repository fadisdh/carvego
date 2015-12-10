@extends('layouts.admin')
@section('title', 'Edit New city')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Edit City <span>" {{ $city->name }} "</span></h2>
	</div>
	{!! Form::model($city, [ 'route' => ['admin.city.update', $city->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.city.form')
	{!! Form::close() !!}
@endsection