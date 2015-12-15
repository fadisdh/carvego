@if($errors->count() > 0)
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif


<div class="form-group">
    {!! Form::label('title', 'title', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('slug', 'slug', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('slug', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('type', 'type', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('type', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('content', 'content', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::textarea('content', null, array('class' => 'form-control')) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('Page Image') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group">  
    {!! Form::submit('Save', array('class' => 'form-btn col-md-1 col-md-offset-11')) !!}
</div>

{{-- 
<div class="form-group">
		<input type="hidden" name="admin" value="1">
		<input type="submit">
</div> --}}