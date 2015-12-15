@extends('layouts.admin')
@section('title', 'Add New System User')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Add New System User</h2>
	</div>
	{!! Form::model($systemUser, [ 'route' => ['admin.systemuser.store', $systemUser->id], 'method' => 'post']) !!}
		{!! csrf_field() !!}
		@include('admin.systemuser.form')
	{!! Form::close() !!}
@endsection