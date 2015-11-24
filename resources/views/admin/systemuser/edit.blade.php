@extends('layouts.admin')
@section('title', 'Edit New System User')

@section('content')
	<h1>Edit System User</h1>
	{!! Form::model($systemUser, [ 'route' => ['admin.systemuser.update', $systemUser->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.systemuser.form')
	{!! Form::close() !!}
@endsection