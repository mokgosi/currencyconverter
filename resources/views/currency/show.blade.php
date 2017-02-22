@extends('layouts.app')

@section('title',' | Viewing Currency')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Viewing: {{ $currency->name }}</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <tr><td>Name:</td><td>{{ $currency->name }}</td></tr>
                    <tr><td>Code:</td><td>{{ $currency->code }}</td></tr>
                    <tr><td>USD Equivalent:</td><td>{{ $currency->code }}</td></tr>
                    <tr><td>Created:</td><td>{{ $currency->created_at }}</td></tr>
                    <tr><td>Updated:</td><td>{{ $currency->updated_at }}</td></tr>
                </table>
                {{ link_to_route('currencies.index','Cancel',null,['class'=>'btn btn-default']) }}
                {{ link_to_route('currencies.edit','Edit',[$currency->id],['class'=>'btn btn-primary']) }}
                {{ Form::open(['route' => ['currencies.destroy', $currency->id], 
                                'method' => 'DELETE', 'style' => 'display:inline' ]) }}
                {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection
