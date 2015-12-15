@extends('layouts.admin')
@section('title', 'Add New User')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Add New User</h2>
	</div>
	{!! Form::model($user, [ 'route' => ['admin.user.store', $user->id], 'method' => 'post']) !!}
		{!! csrf_field() !!}
		@include('admin.user.form')
	{!! Form::close() !!}
@endsection