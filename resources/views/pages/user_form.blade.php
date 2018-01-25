<div class="form-group">
    <div class="col-md-4 control-label">
    	{!! Form::label('name','Login :') !!}
    </div>
    <div class="col-md-6">
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 control-label">
    	{!! Form::label('email','E-mail :') !!}
    </div>
    <div class="col-md-6">
        {!! Form::email('email',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-4 control-label">
    	{!! Form::label('password','Hasło :') !!}
    </div>
    <div class="col-md-6">
        {!! Form::password('password',null,['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div style="text-align:right;" class="col-md-6">
        {!! Form::submit($buttonText,['class'=>'btn btn-primary']) !!}
    </div>
</div>