@extends('layouts.app')

@section('title',' | Viewing Rate')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Viewing: {{ $rate->pair }}</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <tr><td>Pair:</td><td>{{ $rate->pair }}</td></tr>
                    <tr><td>Rate:</td><td>{{ $rate->rate }}</td></tr>
                    <tr><td>Created:</td><td>{{ $rate->created_at }}</td></tr>
                    <tr><td>Updated:</td><td>{{ $rate->updated_at }}</td></tr>
                </table>
                {{ link_to_route('rates.index','Cancel',null,['class'=>'btn btn-default']) }}
                {{ link_to_route('rates.edit','Edit',[$rate->id],['class'=>'btn btn-primary']) }}
                {{ Form::open(['route' => ['rates.destroy', $rate->id], 
                                'method' => 'DELETE', 'style' => 'display:inline' ]) }}
                {{ Form::submit('Delete', ['class'=>'btn btn-danger']) }}
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection
