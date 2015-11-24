@extends('layouts.admin')
@section('title', 'Add New System User')

@section('content')
	<h1>New System User</h1>
	{!! Form::model($systemUser, [ 'route' => ['admin.systemuser.store', $systemUser->id], 'method' => 'post']) !!}
		{!! csrf_field() !!}
		@include('admin.systemuser.form')
	{!! Form::close() !!}
@endsection