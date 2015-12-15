@extends('layouts.base')
@section('title', 'Admin Login')

@section('container')
<div class="admin-login">
	<div class="login-box">
		<h2 class="login-title">Log In</h2>
		@if(count($errors))
			<h3 class="login-error">Please check errors in email or password</h3>
		@endif
		<form action="{!! route('admin.getLogin') !!}" method="POST">
			<div class="form-group row {{ $errors->first('email') ? 'has-error' : '' }}">
				<label class="form-label col-md-3" for="email">Email</label>
			    <input class="form-control col-md-9" type="text" name="email">
			</div>
			<div class="form-group row {{ $errors->first('password') ? 'has-error' : '' }}">
				<label class="form-label col-md-3" for="password">Password</label>
			    <input class="form-control col-md-9" type="password" name="password">
			</div>
			<div class="form-group row">
				<a href="#" class="forget-pass">Forgot Your Password?</a>
			</div>
			<div class="form-group row">
				<input class="btn" type="submit" value="Log In">
			</div>
			{{ csrf_field() }}
		</form>
	</div>
</div>
@endsection