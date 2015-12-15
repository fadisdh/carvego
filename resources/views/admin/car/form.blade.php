@if($errors->count() > 0)
    <div class="form-group help-block">
        <h3>Please check the wrong fields marked in red then submit</h3>
    </div>
@endif

<div class="form-group {{ $errors->first('title') ? 'has-error' : '' }}">
    {!! Form::label('title', 'Title', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('title', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('title') }}</div>
    </div>
</div>

<div class="form-group {{ $errors->first('description') ? 'has-error' : '' }}">
    {!! Form::label('description', 'Description', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('description') }}</div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('Car Image') !!}
    {!! Form::file('image[]', null) !!}
</div>
<div class="form-group">
    {!! Form::label('Car Image') !!}
    {!! Form::file('image[]', null) !!}
</div>
<div class="form-group">
    {!! Form::label('Car Image') !!}
    {!! Form::file('image[]', null) !!}
</div>

<div class="form-group {{ $errors->first('price') ? 'has-error' : '' }}">
    {!! Form::label('price', 'Price', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('price', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('price') }}</div>
    </div>
</div>

<div class="form-group {{ $errors->first('make') ? 'has-error' : '' }}">
    {!! Form::label('make', 'Make', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('make', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('make') }}</div>
    </div>
</div>

<div class="form-group {{ $errors->first('model') ? 'has-error' : '' }}">
    {!! Form::label('model', 'Model', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('model', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('model') }}</div>
    </div>
</div>

<div class="form-group form-btns">
    <a href="{{ URL::route('admin.car.index') }}" class="form-btn btn">Cancel</a>
    {!! Form::submit('Save', array('class' => 'form-btn btn col-md-2 col-md-offset-10')) !!}
</div>