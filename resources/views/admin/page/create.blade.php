@extends('layouts.admin')
@section('title', 'Add New Page')

@section('content')
	<div class="page-header">
		<h2 class="page-title">Add New Page</h2>
	</div>
	{!! Form::model($page, [ 'route' => ['admin.page.store', $page->id], 'method' => 'post', 'class' => 'dropzone', 'files' => true]) !!}
		{{ csrf_field() }}
		@include('admin.page.form')
	{!! Form::close() !!}
@endsection