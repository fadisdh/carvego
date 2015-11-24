@extends('layouts.admin')
@section('title', 'Edit Role')

@section('content')
	<h1>Edit Role</h1>
	{!! Form::model($role, [ 'route' => ['admin.role.update', $role->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.role.form')
	{!! Form::close() !!}
@endsection