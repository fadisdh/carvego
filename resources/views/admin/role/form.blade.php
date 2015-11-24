@if($errors->count() > 0)
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif


<div class="form-group">
    {!! Form::label('name', 'name', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('permissions', 'permissions', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::textarea('permissions', null, array('class' => 'form-control')) !!}
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