@if($errors->count() > 0)
    <div class="form-group result-block">
        <h3>Please check the wrong fields marked in red then submit</h3>
    </div>
@endif

<div class="form-group row {{ $errors->first('name') ? 'has-error' : '' }}">
    {!! Form::label('name', 'Role Name', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('name') }}</div>
    </div>
</div>

<div class="form-group row {{ $errors->first('permissions') ? 'has-error' : '' }}">
    {!! Form::label('permissions', 'Permissions', array('class' => 'form-label col-md-2')) !!}
    <div class="col-md-10">
        {!! Form::textarea('permissions', null, array('class' => 'form-control')) !!}
    </div>
    <div class="col-md-10 col-md-offset-2">
        <div class="help-block">{{ $errors->first('permissions') }}</div>
    </div>
</div>

<div class="form-group row form-btns">
    <a href="{{ URL::route('admin.role.index') }}" class="form-btn btn">Cancel</a> 
    {!! Form::submit('Save', array('class' => 'form-btn btn col-md-1 col-md-offset-11')) !!}
</div>
