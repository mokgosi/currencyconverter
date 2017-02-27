<div class="form-group">
    {{ Form::label('pair', 'Pair:') }}
    {{ Form::text('pair', null, ['class'=> 'form-control','required'=>'']) }}
</div>
<div class="form-group">
    {{ Form::label('rate', 'Rate:') }}
    {{ Form::text('rate', null, ['class'=> 'form-control','required'=>'']) }}
</div>
<div class="button-group ">
    {{ Form::submit($submit_text, ['class'=>'btn btn-success']) }}
    <a href="{{ route('rates.index') }}" class="btn btn-default" >Cancel</a>
</div>