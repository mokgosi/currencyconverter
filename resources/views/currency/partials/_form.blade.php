<div class="form-group">
    {{ Form::label('name', 'Currency Name:') }}
    {{ Form::text('name', null, ['class'=> 'form-control','required'=>'']) }}
</div>
<div class="form-group">
    {{ Form::label('code', 'Currency Code:') }}
    {{ Form::text('code', null, ['class'=> 'form-control','required'=>'']) }}
</div>
<div class="form-group">
    {{ Form::label('usd_equivalent', 'USD Equivalent:') }}
    {{ Form::text('usd_equivalent', null, ['class'=> 'form-control','required'=>'']) }}
</div>
<div class="button-group ">
    {{ Form::submit($submit_text, ['class'=>'btn btn-success']) }}
    <a href="{{ route('currencies.index') }}" class="btn btn-default" >Cancel</a>
</div>