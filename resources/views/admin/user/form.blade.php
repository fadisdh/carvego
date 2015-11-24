@if($errors->count() > 0)
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif


<div class="form-group {{ $errors->first('firstname') ? 'has-error' : '' }}">
    {!! Form::label('firstname', 'First Name', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('firstname', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('firstname') }}</div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('lastname', 'Last Name', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('lastname', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::email('email', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('password', 'Password', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::password('password', array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('password_confirmation', 'Password Conform', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('role', 'Role', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('role', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('admin', 'Admin', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('admin', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">  
    {!! Form::submit('Save', array('class' => 'form-btn col-md-1 col-md-offset-11')) !!}
</div>

{{-- 
<div class="form-group">
		<input type="hidden" name="admin" value="1">
		<input type="submit">
</div> --}}