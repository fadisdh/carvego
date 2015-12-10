@extends('layouts.admin')
@section('title', 'city')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">{{ $city->name }}</span></h2>
		<a href="{{ URL::route('admin.city.edit', $city->id) }}" class="btn col-md-2">Edit city</a>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">ID</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $city->id }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">City Name</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $city->name }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Country</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $city->country }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">City Code</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $city->code }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Country Code</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $city->country_code }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Currency</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $city->currency }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Currency Code</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $city->currency_code }}</div>
	</div>
@endsection