@extends('layouts.admin')
@section('title', 'Page')

@section('content')
	<div class="page-header">
		<h2 class="page-title col-md-10">{{ $page->title }}</span></h2>
		<a href="{{ URL::route('admin.page.edit', $page->id) }}" class="btn col-md-2">Edit Page</a>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">ID</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $page->id }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Title</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $page->title }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">slug</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $page->slug }}</div>
	</div>
	<div class="row adminview-row">
		<div class="col-md-2 adminview-key">Content</div>
	    <div class="col-md-9 col-md-offset-1 adminview-val">{{ $page->content }}</div>
	</div>
@endsection