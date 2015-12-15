@extends('layouts.admin')
@section('title', 'Edit User')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Edit User <span>" {{ $user->name() }} "</span></h2>
	</div>
	{!! Form::model($user, [ 'route' => ['admin.user.update', $user->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.user.form')
	{!! Form::close() !!}
@endsection