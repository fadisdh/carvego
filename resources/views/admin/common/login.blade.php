<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Login</title>
</head>
<body>
	@if(count($errors))
		@foreach($errors->all() as $error)
			{{ $error }}
		@endforeach
	@endif
	<form action="{!! route('admin.getLogin') !!}" method="POST">
		<input type="text" name="email">
		<input type="password" name="password">
		<input type="submit">
		{{ csrf_field() }}
	</form>
</body>
</html>