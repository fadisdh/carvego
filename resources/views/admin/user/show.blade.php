@extends('layouts.admin')
@section('title', 'User')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10"><span>{{ $user->name() }}</span></h2>
		<a href="{{ URL::route('admin.user.edit', $user->id) }}" class="btn col-md-2">Edit User</a>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">ID</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $user->id }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Firstname</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $user->firstname }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Lastname</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $user->lastname }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Email</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $user->email }}</div>
	</div>
@endsection