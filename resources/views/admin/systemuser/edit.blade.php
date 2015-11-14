@extends('layouts.admin')
@section('title', 'Add New System User')

@section('content')
	<h1>New System User</h1>
	<form action="{{ route('admin.systemuser.update', $systemUser->id) }}" method="post">
		{{ csrf_field() }}
		@include('admin.systemuser.form')
		<input type="hidden" name="_method" value="put" />
	</form>
@endsection