@extends('layouts.app')

@section('title',' | Create New Currency')

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
            <div class="panel-heading">Add New Currency</div>
            <div class="panel-body">
                {!! Form::model(new App\Currency, ['route' => ['currencies.store'],'id'=>'form','novalidate'=>'novalidate'])  !!}
                @include('currency/partials/_form', ['submit_text' => 'Create'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
