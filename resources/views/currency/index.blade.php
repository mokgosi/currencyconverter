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
            <div class="panel-heading"><b>Currency List</b></div>
            <div class="panel-body">
                <div class="form-group">
                    <a href="{{ route('currencies.create')}}" class="btn btn-success btn-sm">Create New</a>
                    <!--<a href="{{ route('refresh-list')}}" class="btn btn-warning btn-sm" id="refresh-list">Update Rates</a>-->
                </div>
                <table class="table table-bordered table-striped" id='currencyList'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Currency</th>
                            <th>Code</th>
                            <th>USD_Eq.</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; ?>
                        @foreach($currencies as $currency)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $currency->name }}</td>
                            <td>{{ $currency->code }}</td>
                            <td>{{ $currency->usd_equivalent }}</td>
                            <td><a href="{{route('currencies.show', $currency->id)}}" class="btn btn-xs btn-info">View</a> | 
                                <a href="{{route('currencies.edit', $currency->id)}}" class="btn btn-xs btn-primary">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {{ $currencies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
