@extends('layouts.app')

@section('title',' | Edit Currency')

@section('stylesheets')
    {{ Html::style('css/parsley.css') }}
@endsection

@section('javascript')
    {{ Html::script('js/parsley.min.js') }}
    {{ Html::script('js/scripts.js') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit </div>
            <div class="panel-body">
                {!! Form::model($currency, ['route' => ['currencies.update', $currency->id],'method' => 'Patch'])  !!}
                @include('currency/partials/_form', ['submit_text' => 'Update', 'currency' => $currency])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
