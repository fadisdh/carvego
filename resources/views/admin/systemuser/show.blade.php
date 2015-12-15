@extends('layouts.admin')
@section('title', 'System User')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10"><span>{{ $systemUser->name() }}</span></h2>
		<a href="{{ URL::route('admin.systemuser.edit', $systemUser->id) }}" class="btn col-md-2">Edit System User</a>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">ID</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $systemUser->id }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Firstname</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $systemUser->firstname }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Lastname</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $systemUser->lastname }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Email</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $systemUser->email }}</div>
	</div>
@endsection