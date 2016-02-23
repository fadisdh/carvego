<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title') @yield('subtitle') | Carvego</title>

	@section('meta')

	@show

	@section('links')

	@show

	@section('styles')
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/dropzone/dropzone.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/common/app.css') }}">
	@show

	@section('scripts')
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="{{ asset('assets/vendor/jquery.autocomplete/jquery.autocomplete.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendor/dropzone/dropzone.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/common/js/app.js') }}"></script>
	@show

	@yield('inlineStyles')

	@yield('inlineScripts')

	@section('analytics')

	@show
</head>
<body>
	@yield('container')
</body>
</html>