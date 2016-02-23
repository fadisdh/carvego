@extends('layouts.admin')
@section('title', 'Edit New page')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Edit Page <span>" {{ $page->title }} "</span></h2>
	</div>
	{!! Form::model($page, [ 'route' => ['admin.page.update', $page->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.page.form')
	{!! Form::close() !!}

	{!! Form::model($page, [ 'url' => 'admin/pageit/save', 'files' => true, 'method' => 'put']) !!}
		<input type="file" name="image"></input>
		<input type="submit"></input>		
		{!! csrf_field() !!}
	{!! Form::close() !!}

@endsection