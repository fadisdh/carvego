@extends('layouts.admin')
@section('title', 'Edit User')

@section('content')
	<h1>Edit User</h1>
	{!! Form::model($user, [ 'route' => ['admin.user.update', $user->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.user.form')
	{!! Form::close() !!}
@endsection