@extends('layouts.admin')
@section('title', 'Add New Role')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Add New Role</h2>
	</div>
	{!! Form::model($role, [ 'route' => ['admin.role.store', $role->id], 'method' => 'post']) !!}
		{!! csrf_field() !!}
		@include('admin.role.form')
	{!! Form::close() !!}
@endsection