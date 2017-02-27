@extends('layouts.app')

@section('title',' | List')

@section('stylesheets')
{{ Html::style('css/dataTables.bootstrap.min.css') }}
@endsection

@section('javascript')
{{ Html::script('js/jquery.dataTables.min.js') }}
{{ Html::script('js/dataTables.bootstrap.min.js') }}
{{ Html::script('js/scripts.js') }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Rates List</b></div>
            <div class="panel-body">
                <div class="form-group">
                    <a href="{{ route('rates.create')}}" class="btn btn-success btn-sm">Create New</a>
                    <a href="{{ route('refresh-list')}}" class="btn btn-warning btn-sm" id="refresh-list">Update Rates</a>
                </div>
                <table class="table table-bordered table-striped" id='currencyList'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Pair</th>
                            <th>Rate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach($rates as $rate)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $rate->pair }}</td>
                            <td>{{ $rate->rate }}</td>
                            <td><a href="{{route('rates.show', $rate->id)}}" class="btn btn-xs btn-info">View</a> | 
                                <a href="{{route('rates.edit', $rate->id)}}" class="btn btn-xs btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{ $rates->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
