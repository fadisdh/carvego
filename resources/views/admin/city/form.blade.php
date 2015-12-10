@if($errors->count() > 0)
    <div class="form-group help-block">
        <h3>Please check the wrong fields marked in red then submit</h3>
    </div>
@endif


<div class="form-group {{ $errors->first('name') ? 'has-error' : '' }}">
    {!! Form::label('name', 'City Name', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('name') }}</div>
    </div>
</div>

<div class="form-group {{ $errors->first('country') ? 'has-error' : '' }}">
    {!! Form::label('country', 'Country', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('country', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('country') }}</div>
    </div>
</div>

<div class="form-group {{ $errors->first('code') ? 'has-error' : '' }}">
    {!! Form::label('code', 'City Code', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('code', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('code') }}</div>
    </div>
</div>

<div class="form-group {{ $errors->first('country_code') ? 'has-error' : '' }}">
    {!! Form::label('country_code', 'Country Code', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('country_code', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('country_code') }}</div>
    </div>
</div>

<div class="form-group {{ $errors->first('currency') ? 'has-error' : '' }}">
    {!! Form::label('currency', 'Currency', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('currency', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('currency') }}</div>
    </div>
</div>

<div class="form-group {{ $errors->first('currency_code') ? 'has-error' : '' }}">
    {!! Form::label('currency_code', 'Currency Code', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('currency_code', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('currency_code') }}</div>
    </div>
</div>

<div class="form-group form-btns">
    <a href="{{ URL::route('admin.city.index') }}" class="form-btn btn">Cancel</a>
    {!! Form::submit('Save', array('class' => 'form-btn btn col-md-2 col-md-offset-10')) !!}
</div>