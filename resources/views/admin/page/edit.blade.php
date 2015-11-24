@extends('layouts.admin')
@section('title', 'Edit New page')

@section('content')
	<h1>Edit page</h1>
	{!! Form::model($page, [ 'route' => ['admin.page.update', $page->id], 'method' => 'put']) !!}
		{!! csrf_field() !!}
		@include('admin.page.form')
	{!! Form::close() !!}
@endsection