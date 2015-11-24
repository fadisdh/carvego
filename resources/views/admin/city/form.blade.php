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
    {!! Form::label('country', 'country', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('country', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('code', 'code', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('code', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('country_code', 'country_code', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('country_code', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('currency', 'currency', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('currency', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('currency_code', 'currency_code', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('currency_code', null, array('class' => 'form-control')) !!}
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