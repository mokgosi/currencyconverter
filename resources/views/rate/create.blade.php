@extends('layouts.app')

@section('title',' | Create New Rate')

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
            <div class="panel-heading">Add New Rate</div>
            <div class="panel-body">
                {!! Form::model(new App\Rate, ['route' => ['rates.store'],'id'=>'form','novalidate'=>'novalidate'])  !!}
                @include('rate/partials/_form', ['submit_text' => 'Create'])
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
