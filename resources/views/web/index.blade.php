@extends('layouts.web')

@section('content')
{{ Form::open(['action' => 'WebController@convert', 'class'=>"form-inline", 'method' => 'GET', 'id' => 'currencyConvertionForm']) }}
<div class="form-group">
    {{ Form::label('amount', 'Amount:') }}
    {{ Form::text('amount', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('convertFrom', 'From:') }}
    {{ Form::select('convertFrom', $currencies, null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('convertTo', 'To:') }}
    {{ Form::select('convertTo', $currencies, null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Convert', ['class'=>'btn btn-primary']) }}
</div>
{{ Form::close() }}
<div class='convertedAmount'></div>
@endsection
