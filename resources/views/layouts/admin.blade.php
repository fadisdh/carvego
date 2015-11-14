@extends('layouts.base')

@section('subtitle', ' - Admin Panel')

@section('container')
	<div class="nav" role="navigation">
		<div id="topbar" class="topbar">@yield('topbar')</div>
		<div id="sidebar" class="sidebar">@include('admin.common.sidebar')</div>
	</div>
	<div id="main" class="main" role="main">
		<div class="container-fluid">
			@yield('content')
		</div>
	</div>

@endsection