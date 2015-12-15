@extends('layouts.admin')
@section('title', 'Edit New page')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Edit Option <span>" {{ $option->key }} "</span></h2>
	</div>
	{!! Form::model($option, [ 'route' => ['admin.option.update', $option->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.option.form')
	{!! Form::close() !!}
@endsection