@if($errors->count() > 0)
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif

<div class="form-group">
	<label class="form-label col-sm-2">First Name:</label>
	<div class="col-sm-10">
		<input type="text" name="firstname" class="form-control" value="{{ $systemUser->firstname }}">
	</div>
</div>

<div class="form-group">
	<label class="form-label col-sm-2">Last Name:</label>
	<div class="col-sm-10">
		<input type="text" name="lastname" class="form-control" value="{{ $systemUser->lastname }}">
	</div>
</div>

<div class="form-group">
	<label class="form-label col-sm-2">Email:</label>
	<div class="col-sm-10">
		<input type="email" name="email" class="form-control" value="{{ $systemUser->email }}">
	</div>
</div>

<div class="form-group">
	<label class="form-label col-sm-2">Password:</label>
	<div class="col-sm-10">
		<input type="password" name="password" class="form-control">
	</div>
</div>

<div class="form-group">
	<label class="form-label col-sm-2">Password Conform:</label>
	<div class="col-sm-10">
		<input type="password" name="password_confirmation" class="form-control">
	</div>
</div>
<div class="form-group">
		<input type="hidden" name="admin" value="1">
		<input type="submit">
</div>