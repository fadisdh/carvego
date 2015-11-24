@extends('layouts.admin')
@section('title', 'Add New Page')

@section('content')
	<h1>New Page</h1>
	{!! Form::model($page, [ 'route' => ['admin.page.store', $page->id], 'method' => 'post']) !!}
		{!! csrf_field() !!}
		@include('admin.page.form')
	{!! Form::close() !!}
@endsection