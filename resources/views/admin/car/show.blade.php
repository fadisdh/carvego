@extends('layouts.admin')
@section('title', 'Page')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">{{ $car->title }}</span></h2>
		<a href="{{ URL::route('admin.car.edit', $car->id) }}" class="btn col-md-2">Edit Car</a>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">ID</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $car->id }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Title</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $car->title }}</div>
	</div>
@endsection