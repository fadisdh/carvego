@extends('layouts.admin')
@section('title', 'Add New User')

@section('content')
	<h1>New User</h1>
	{!! Form::model($user, [ 'route' => ['admin.user.store', $user->id], 'method' => 'post']) !!}
		{!! csrf_field() !!}
		@include('admin.user.form')
	{!! Form::close() !!}
@endsection