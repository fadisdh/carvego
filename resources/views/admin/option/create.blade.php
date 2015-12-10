@extends('layouts.admin')
@section('title', 'Add New Option')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Add New Option</h2>
	</div>
	{!! Form::model($option, [ 'route' => ['admin.option.store', $option->id], 'method' => 'post']) !!}
		{!! csrf_field() !!}
		@include('admin.option.form')
	{!! Form::close() !!}
@endsection