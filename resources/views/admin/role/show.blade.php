@extends('layouts.admin')
@section('title', 'Role')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">{{ $role->name }}</span></h2>
		<a href="{{ URL::route('admin.role.edit', $role->id) }}" class="btn col-md-2">Edit Role</a>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">ID</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $role->id }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Role Name</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $role->name }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Permissions</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $role->permissions }}</div>
	</div>
@endsection