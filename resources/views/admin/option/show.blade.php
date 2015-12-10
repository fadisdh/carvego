@extends('layouts.admin')
@section('title', 'Page')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">{{ $option->key }}</span></h2>
		<a href="{{ URL::route('admin.option.edit', $option->id) }}" class="btn col-md-2">Edit Option</a>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">ID</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $option->id }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Key</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $option->key }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Value</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $option->value }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Type</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $option->type }}</div>
	</div>
@endsection