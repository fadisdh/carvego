@if($errors->count() > 0)
    <div class="form-group result-block">
        <h3>Please check the wrong fields marked in red then submit</h3>
    </div>
@endif

<div class="form-group row {{ $errors->first('title') ? 'has-error' : '' }}">
    {!! Form::label('title', 'Title', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('title') }}</div>
    </div>
</div>

<div class="form-group row {{ $errors->first('slug') ? 'has-error' : '' }}">
    {!! Form::label('slug', 'Slug', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('slug', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('slug') }}</div>
    </div>
</div>

<div class="form-group row {{ $errors->first('type') ? 'has-error' : '' }}">
    {!! Form::label('type', 'Type', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('type', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('type') }}</div>
    </div>
</div>

<div class="form-group row {{ $errors->first('content') ? 'has-error' : '' }}">
    {!! Form::label('content', 'Content', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::textarea('content', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('content') }}</div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('Page Image') !!}
    {!! Form::file('image', null) !!}
</div>

<div class="form-group row form-btns">
    <a href="{{ URL::route('admin.page.index') }}" class="form-btn btn">Cancel</a>
    {!! Form::submit('Save', array('class' => 'form-btn btn col-md-2 col-md-offset-10')) !!}
</div>

<div class="form-group">  
    {!! Form::submit('Save', array('class' => 'form-btn col-md-1 col-md-offset-11')) !!}
</div>

{{-- 
<div class="form-group">
		<input type="hidden" name="admin" value="1">
		<input type="submit">
</div> --}}
>>>>>>> origin/Mosaabk
