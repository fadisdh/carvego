@extends('layouts.admin')
@section('title', 'Edit New page')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Edit Car <span>" {{ $car->title }} "</span></h2>
	</div>
	{!! Form::model($car, [ 'route' => ['admin.car.update', $car->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.car.form')
	{!! Form::close() !!}
@endsection