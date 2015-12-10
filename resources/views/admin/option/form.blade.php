@if($errors->count() > 0)
    <div class="form-group help-block">
        <h3>Please check the wrong fields marked in red then submit</h3>
    </div>
@endif

<div class="form-group {{ $errors->first('key') ? 'has-error' : '' }}">
    {!! Form::label('key', 'Key', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('key', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('key') }}</div>
    </div>
</div>

<div class="form-group {{ $errors->first('value') ? 'has-error' : '' }}">
    {!! Form::label('value', 'Value', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('value', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('value') }}</div>
    </div>
</div>

<div class="form-group {{ $errors->first('type') ? 'has-error' : '' }}">
    {!! Form::label('type', 'Type', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('type', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('type') }}</div>
    </div>
</div>

<div class="form-group form-btns">
    <a href="{{ URL::route('admin.option.index') }}" class="form-btn btn">Cancel</a>
    {!! Form::submit('Save', array('class' => 'form-btn btn col-md-2 col-md-offset-10')) !!}
</div>