@extends('layouts.base')

@section('subtitle', ' - Admin Panel')

@section('container')
	<div class="nav" role="navigation">
		<div id="sidebar" class="sidebar">@include('admin.common.sidebar')</div>
	</div>
	<div id="topbar" class="topbar">@include('admin.common.topbar')</div>
	<div id="main" class="main" role="main">
		<div class="container-fluid">
			@yield('content')
		</div>
	</div>

@endsection