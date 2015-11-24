@extends('layouts.admin')
@section('title', 'Add New Role')

@section('content')
	<h1>New Role</h1>
	{!! Form::model($role, [ 'route' => ['admin.role.store', $role->id], 'method' => 'post']) !!}
		{!! csrf_field() !!}
		@include('admin.role.form')
	{!! Form::close() !!}
@endsection