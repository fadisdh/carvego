@extends('layouts.admin')
@section('title', 'Edit Role')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Edit Role <span>" {{ $role->name }} "</span></h2>
	</div>
	{!! Form::model($role, [ 'route' => ['admin.role.update', $role->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.role.form')
	{!! Form::close() !!}
@endsection