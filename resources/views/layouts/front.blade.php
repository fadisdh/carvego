<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title') | Carvego</title>

	@section('meta')

	@show

	@section('links')

	@show

	@section('styles')
		{{ HTML::style('assets/common/css/style.css') }}
	@show

	@section('scripts')
		{{ HTML::script('assets/common/js/app.js') }}
	@show

	@section('inlineStyles')

	@show

	@section('inlineScripts')

	@show

	@section('analytics')

	@show
</head>
<body>
	@section('container')

	@show
</body>
</html>